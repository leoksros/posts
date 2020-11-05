<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only('create');
        $this->middleware('owner')->only('edit','update','destroy');

    }

    
    public function index()
    {
        return view('posts.list',
	
      [ 'posts' => Post::orderBy('created_at','desc')->get()
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatePost();
        
        $path = $request->file("image")->store("public");
        $img_name = basename($path);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $img_name,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('posts.show',$post->id)->with('status','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.post',
        [ 
            'post' => Post::findOrFail($id)
        ]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit',
        [
            'post' => Post::findOrFail($id),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        request()->validate([
            'title' => 'required|min:3|max:255',            
            'content' => 'required|min:3|max:255'
        ]);
                        
        $post = Post::findOrFail($id);
        
        $post->update(request()->all());
       
        return redirect()->route('posts.show',$id)->with('status','Post modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('status','Post deleted successfully');
    }

    public function validatePost()
    {       
        return request()->validate([
            'title' => 'required|min:3|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'content' => 'required|min:3|max:255'
        ]);
    }
}

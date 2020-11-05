<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
/* use App\Http\Middleware\Auth;*/
use Illuminate\Support\Facades\Auth;

class PostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $post = Post::findOrFail(array_values($request->route()->parameters())[0]);
        
        if(Auth::guest())
        {
            return redirect()->route('posts.index');        
        }
        if($post->user_id != Auth::user()->id)
        {
            return redirect()->route('posts.index');            
        }
      
        return $next($request);
        

        

    }
}

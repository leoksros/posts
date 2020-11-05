@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                                
                <div class="row justify-content-center">
                    <div class="col">
                        <h1>POSTS</h1>
                    </div>                
                </div>

                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @elseif(session('no'))
                        <div class="alert alert-danger text-center">
                            {{ session('no') }}
                        </div>
                @endif

              
                @if(count($posts) > 0)
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach ($posts as $post)
                            <div class="col mb-4">
                                <div class="card h-100">                            
                                    <img src="{{asset("/storage/$post->image")}}" class="card-img-top img-fluid p-1" alt="...">
                                    <div class="card-body">
                                        <a href="{{route('posts.show',$post->id)}}"><h5 class="card-title">{{$post->title}}</h5></a>                                     
                                    </div>
                         
                                    @auth
                                        @if(Auth::user()->id == $post->user_id)
                                            <div class="row justify-content-around pb-4">
                                                <div class="col-4">
                                                    <button class="btn btn-warning"><a href="{{route('posts.edit', $post->id)}} ">Edit</a></button>
                                                </div>
                                                <div class="col-4">

                                                    <form onclick="return confirm('Está seguro de eliminar?')" action="{{route('posts.destroy', $post->id)}}" method="POST" name="formulario" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>             
                                                    </form> 
                                                    
                                                </div>
                                            </div>
                                        @endif
                                    @endauth
                                 
                                </div>
                            </div>
                        @endforeach                                
                    </div>
                @else 
                    
                    <div class="h1 text-center">
                        We don't have posts yet.
                    </div>
                
                @endif

            </div>

        </div>

    </div>


@endsection
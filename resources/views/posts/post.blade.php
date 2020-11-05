@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row d-flex justify-content-center">
        
        
    
        <div class="col">

            @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                @elseif(session('no'))
                        <div class="alert alert-danger text-center">
                            {{ session('no') }}
                        </div>
            @endif

            <div class="card-header text-center border"><h3>Title: {{ $post->title }}</h3></div>
            <br>
               
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-6 text-center">
                <img  src="{{asset("/storage/$post->image")}}"  alt="" class="img-fluid"> 
            </div>
    
            <div class="col-sm-12 col-md-7 col-lg-6">
    
                <div class="row">
                        <div class="col mt-3 mb-3 font-weight-bold">
                        <p class="h3">Category: {{$post->category->name}}</p>                        
                        </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <br>                             
                        <p>{{$post->content}}</p>                               
                        <p><b>Owner: </b> {{$post->user->name}} </p>                                                                              
                        <br>
                    </div>                        
                </div> 

                @auth
                    @if(Auth::user()->id == $post->user_id)    
                        <div class="d-flex justify-content-center mt-3">                    

                            <div class="col">
                                <a href="{{route('posts.edit', $post->id)}}"><button class="btn btn-success btn-lg">Edit</button></a> 

                            </div>
                            <div class="col">
                                <form onclick="return confirm('Está seguro de eliminar?')" action="{{route('posts.destroy', $post->id)}}" method="POST" name="formulario" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg">Delete</button>             
                                </form> 
                            </div>

                            
                        </div>                    
                    @endif 
                @endauth 
                
            </div>  
        </div>
         
           
            
        </div>
    </div>
       
</div>


@endsection
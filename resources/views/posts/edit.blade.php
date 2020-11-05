@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Edit post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">

                            <div class="col">

                                <div class="form-group row">
                                    <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
        
                                    <div class="col-md-6">
                                        
                                        <select id="category" name="category_id" class="custom-select form-control">
                                                                                        
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ ($post->category->name == $category->name) ? 'selected' : '' }}  >{{ $category->name }}</option>
                                            @endforeach     
        
                                        </select>
                                        
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
        
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="title" class="tituloArticulo col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
        
                                    <div class="col-md-6">
                                        <input   id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}" required autocomplete="title" autofocus>
        
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                    <label for="content" class="tituloArticulo col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
        
                                    <div class="col-md-6">
                                        <input  id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{$post->content}}" required autocomplete="content" autofocus>
        
                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    
                            </div>

                            <div class="col-sm-12 col-lg-5 text-center">                            
                                <img src="{{asset("/storage/$post->image")}}"  alt="" class="img-fluid align-middle mb-md-3 mb-xs-3">                        
                            </div>

                            
                            
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Upload changes') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
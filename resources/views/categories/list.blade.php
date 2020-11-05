@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @forelse ($categories as $category)                                               
                            <li>   Hola ID: {{ $category->id }}</li>                                      
                        @empty
                    </ul>        
                               
                        Categories doesn't exists.

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

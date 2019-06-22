@extends('layouts/app')

@section('content')
    <a href='/posts' class='btn btn-outline-dark btn-sm'>Back</a>
    <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style='width:100%' src="/storage/cover_images/{{$post->cover_image}}" alt="">
            </div>
            <div class="col-md-8 col-sm-8">
                <h2><a href="/posts/{{$post->id}}">{!! $post->title !!}</a></h2>
                {{-- parse html from ckeditor add !! to front/back --}}
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    @if(!Auth::guest())
    {{-- #user logged in == author --}}
        @if(Auth::user()->id == $post->user_id) 
            <a href='/posts/{{$post->id}}/edit' class='btn btn-outline-secondary btn-sm'>Edit</a>
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST' ])!!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-danger']) }}
            {!! Form::close() !!}
        @endif   
    @endif
@endsection 
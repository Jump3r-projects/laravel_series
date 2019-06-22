@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <p>Create a new <a href="/posts/create" class='btn btn-outline-primary btn-sm'>Post!</a></p>

                    <hr>
                    <div>
                        <br>
                        <div class="container">
                            <h3>Your posts</h3>
                            @if(count($posts) > 0)
                            <table class='table table-striped'>
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class='btn btn-sm btn-outline-primary'>Edit</a></td>
                                    <td>{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
                                           {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-danger']) }}
                                            {!! Form::close() !!}</td>
                                </tr>
                                @endforeach
                            </table>
                            @else 
                                <p>No posts found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

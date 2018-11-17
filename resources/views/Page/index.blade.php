@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3>Find what you want to know here</h3>
            {!! Form::open(['action' => 'PostsController@search', 'method'=>'get']) !!}
            <div class="row">
                <div class="col-md-9">
                    {{Form::text('search','',['class'=>'form-control searchbar', 'placeholder'=>'search'])}}
                </div>
                <div class="col-md-3">
                    {{Form::submit('search', ['class'=> 'btn btn-primary btnsearch'])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 cardbox">
                <div class="card lecard">
                    <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <small>written by {{$post->user->name}}</small>
                        <p class="card-text">{{$post->body}}</p>
                        <a href="{{url('post/'.$post->id)}}" class="card-link">See Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
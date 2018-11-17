@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Your Personal Receipt</h2>
        {!!Form::open(['action'=>'PostsController@store', 'method'=>'post', 'enctype'=>'multipart/form-data'])!!}
        <div class="row">
            <div class="col-md-6">
                {{Form::label('title','Your Title')}}
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'add title here'])}}
                {{Form::label('body','Receipt Description')}}
                {{Form::text('body','',['class'=>'form-control','placeholder'=>'add description here'])}}
                {{Form::label('ingredients','Receipt Ingredients')}}
                {{Form::textArea('ingredients','',['class'=>'form-control','placeholder'=>'use new line for new ingredients'])}}
                {{Form::label('directions','Receipt Directions')}}
                {{Form::textArea('directions','',['class'=>'form-control','placeholder'=>'use new line for next step'])}}
            </div>
            <div class="col-md-6">
                {{Form::file('cover_image')}}
                {{Form::submit('submit',['class'=>'btn btn-success'])}}
            </div>
        </div>
        {!!Form::close()!!}
    </div>
@endsection
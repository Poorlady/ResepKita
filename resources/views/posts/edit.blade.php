@extends('layouts.app')
<?php   $ingredients = str_replace(',',"\r\n",$post->ingridients);
        $directions = str_replace(',',"\r\n",$post->directions);?>
@section('content')
    <div class="container">
        <h2>Add Your Personal Receipt</h2>
        <div class="col-md-6">
            {!!Form::open(['action'=>['PostsController@update',$post->id], 'method'=>'POST'])!!}
                {{Form::label('title','Your Title')}}
                {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'add title here'])}}
                {{Form::label('body','Receipt Description')}}
                {{Form::text('body',$post->body,['class'=>'form-control','placeholder'=>'add description here'])}}
                {{Form::label('ingredients','Receipt Ingredients')}}
                {{Form::textArea('ingredients',$ingredients,['class'=>'form-control','placeholder'=>'use new line for new ingredients'])}}
                {{Form::label('directions','Receipt Directions')}}
                {{Form::textArea('directions',$directions,['class'=>'form-control','placeholder'=>'use new line for next step'])}}
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('submit',['class'=>'btn btn-success'])}}
            {!!Form::close()!!}
        </div>
    </div>
@endsection
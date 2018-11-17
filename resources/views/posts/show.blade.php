@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{$post->title}}</h2>
            <small>written by {{$post->user->name}}</small>
            <hr>
            <p>{{$post->body}}</p>
        </div>
        <div class="col-md-6">
                <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Ingridients</h3>
            <hr>
            <ol>
                <?php $ingridients = explode(',',$post->ingridients);?>
                    @foreach ($ingridients as $item)
                        <li>{{$item}}</li>                
                    @endforeach
                </ol>   
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Directions</h3>
            <hr>
            <ol>
                <?php $directions = explode(',',$post->directions);?>
                @foreach ($directions as $item)
                    <li>{{$item}}</li>                
                @endforeach
            </ol> 
        </div>
    </div>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a class="btn btn-primary" href="/post/{{$post->id}}/edit">Edit</a>
            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}  
        @endif
       
    @endif
</div>
    
@endsection
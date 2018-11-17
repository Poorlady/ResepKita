@extends('layouts.app')

@section('content')
<div class="container">
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
                </div>
            </div>
        </div>
    </div>
    @if (count($posts)>0)
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 cardbox">
            <div class="card lecard">
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
    @endif
</div>
@endsection

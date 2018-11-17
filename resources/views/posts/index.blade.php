@extends('layouts.app')


@section('content')

<div class="container">
        <div class="row">
                @foreach ($datas as $data)
                <div class="col-md-4 cardbox">
                    <div class="card lecard">
                        <div class="card-body">
                            <h4 class="card-title">{{$data->title}}</h4>
                            <small>written by {{$data->user->name}}</small>
                            <p class="card-text">{{$data->body}}</p>
                            <a href="{{url('post/'.$data->id)}}" class="card-link">See Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{$datas->links()}}
                </div>
            </div>
</div>

@endsection

@extends('parent')
@section('main')
<div class="jumbotron text-center">
    <div align="right">
        <a href="{{route('welcome.index')}}" class="btn btn-default">Back</a>
    </div>
    <br/>
    <h2>Title-{{$data->title}}</h2>
    <br/>
    <img src="{{ URL::to('/images/'.$data->image)}}" class="img-thumbnail"/>
    <h3>Description-<br/>
        {{$data->description}}</h3>
    <h3>Name-<h1>{{$user_info->name}}</h1></h3>
</div>

@endsection
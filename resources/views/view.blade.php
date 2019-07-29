@extends('parent')
@section('main')
<div class="jumbotron text-center">
    <div align="right">
        <a href="{{route('welcome.index')}}" class="btn btn-default">Back</a>
    </div>
    <br/>
    <img src="{{ URL::to('/images/'.$data->image)}}" class="img-thumbnail"/>
    <h3>Title-{{$data->title}}</h3>
    <h3>Description-{{$data->description}}</h3>
</div>

@endsection
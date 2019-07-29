@extends('parent')
@section('main')
<div class="jumbotron text-center">
    <div align="right">
        <a href="{{route('welcome.index')}}" class="btn btn-default">Back</a>
    </div>
    <form method="post" action="{{route('welcome.update', $data->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group" align="center">
            <div class="form-group">
                <label class="col-md-4 text-right">Title</label>
                <div class="col-md-8">
                    <input type="text" name="title" class="form-control input-group-lg" value="{{$data->title}}">
                </div>
            </div>
            <br/>
            <br/>
            <div class="form-group">
                <label class="col-md-4 text-right">Category</label>
                <div class="col-md-8">
                    <input type="text" name="category_id" class="form-control input-group-lg" value="{{$data->category_id}}">
                </div>
            </div>
            <br/>
            <br/>
            <div class="form-group">
                <label class="col-md-4 text-right">Image</label>
                <div class="col-md-8">
                    <input type="file" name="image">
                    <td><img src="{{ URL::to('/images/'.$data->image)}}" class="img-thumbnail" width="75"/></td>
                    <input type="hidden" name="hidden_image" value="{{$data->image}}"/>
                </div>
            </div>
            <br/>
            <br/>
            <div class="form-group">
                <label class="col-md-4 text-right">Description</label>
                <div class="col-md-8">
                    <input type="text" name="description" class="form-control input-group-lg" value="{{$data->description}}">
                </div>
            </div>
            <br/>
            <br/>
            <div class="form-group text-center">
                <input type="submit" name="add" class="btn btn-primary " value="Edit">
            </div>
        </div>
    </form>
</div>

@endsection
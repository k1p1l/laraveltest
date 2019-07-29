<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
<div class="flex-center position-ref">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/welcome') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
@extends('parent')
@section('main')
    <div align="right">
        <a href="{{route('welcome.create')}}" class="btn btn-success">Add</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

    <table class="table table-bordered table-striped table-info">
        <tr>
            @if (Auth::check() && Auth::user()->is_Admin)
            <th width="15%">Image</th>
            <th width="10%">Title</th>
            <th width="10%">Category</th>
            <th width="20%">Description</th>
            <th width="20%">Tools</th>
            @else
                <th width="15%">Image</th>
                <th width="10%">Title</th>
                <th width="10%">Category</th>
                <th width="20%">Description</th>
                <th width="20%">Tools</th>
                @endif
        </tr>

        @foreach($data as $row)
            <tr>
                <th><img src="{{ URL::to('/images/'.$row->image)}}" class="img-thumbnail" width="75"></th>
                <td>{{$row->title}}</td>
                <td>{{$row->category_id}}</td>
                <td>{{$row->description}}</td>
                <td>
                    @if (Auth::check() && Auth::user()->is_Admin)
                    <a href="{{route('welcome.show', $row->id)}}" class="btn btn-primary">Show</a>
                    <a href="{{route('welcome.edit', $row->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('welcome.destroy', $row->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                        @else
                        <a href="{{route('welcome.show', $row->id)}}" class="btn btn-primary">Show</a>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
@endsection
{!! $data->links() !!}}


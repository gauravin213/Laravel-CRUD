@extends('layouts.default')
@section('content')


    <form action="{{url('/search')}}" method="GET">
        <input type="text" name="search">
        <button>Search</button>



    </form>

    <a href="{{url('/search')}}?id=3">id 3</a>

    <a href="{{url('/search')}}?id=4">id 4</a>

    <a href="{{url('/search')}}?id=5">id 5</a>

    <a href="{{url('/search')}}?id=6">id 6</a>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>blog CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blog.create') }}"> Create New Blog</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($blog as $member)
    <tr>
        <td>{{ ++$i }}</td>
        <td><img class="card-img-top" src="{{url('uploads/'.$member->filename)}}" alt="{{$member->filename}}" style="width: 100%"></td>
        <td>{{ $member->title}}</td>
        <td>{{ $member->description}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('blog.show',$member->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('blog.edit',$member->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['blog.destroy', $member->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $blog->render() !!}
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div>
                    
                    <ul>
                        @can('isAdmin')
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">New post</a></li>
                        <li><a href="#">Edit post</a></li>
                        @endcan

                        @can('isAuthor')
                        <li><a href="#">New post</a></li>
                        <li><a href="#">Edit post</a></li>
                        @endcan

                        @can('isEditor')
                        <li><a href="#">Edit post</a></li>
                        @endcan
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

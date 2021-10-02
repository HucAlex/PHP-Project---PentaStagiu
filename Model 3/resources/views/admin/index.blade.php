@extends('layouts.admin')

@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{Session::get('info')}}</p>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create')}}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    @foreach($authors as $index => $author)
    <div class="row">
        <div class="col-md-12">
            <p> <strong>{{ $author->title }}</strong>
                <strong>{{ $author->author_name }}</strong>
                <strong>{{ $publishers[$index]->publisher_name }}</strong>
                <strong>{{ $publishers[$index]->publisher_year }}</strong>
                
                <a href="{{ route('admin.edit', ['id' => $author->id]) }}">Edit</a>
                <a href="{{ route('admin.delete', ['id' => $author->id]) }}">Delete</a>
            </p>
        </div>
    </div>
    @endforeach
@endsection
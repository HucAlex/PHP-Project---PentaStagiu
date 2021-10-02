@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">Digital Library</p>
        </div>
    </div>

    @foreach($authors as $index => $author) 
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{ $author->title }}</h1>
            <p>{{ $author->author_name }}</p>
            <p>{{ $publishers[$index]->publisher_name }}</p>
            <p>{{ $publishers[$index]->publisher_year }}</p>
            <p><a href="{{ route('blog.post', ['id' => $author->id]) }}">Read more...</a></p>
        </div>
    </div>
    <hr>
    @endforeach

@endsection
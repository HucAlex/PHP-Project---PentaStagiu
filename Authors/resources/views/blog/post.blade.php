@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{ $author->title }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>{{ $author->author_name }}</p>
        </div>

        <div class="col-md-12">
            <p>{{ $publisher->publisher_name }}</p>
        </div>

        <div class="col-md-12">
            <p>{{ $publisher->publisher_year }}</p>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ $author->title }}">
                </div>

                <div class="form-group">
                    <label for="content">Author</label>
                    <input
                            type="text"
                            class="form-control"
                            id="content"
                            name="author_name"
                            value="{{ $author->author_name }}">
                </div>

                <div class="form-group">
                    <label for="content">Publisher Name</label>
                    <input
                            type="text"
                            class="form-control"
                            id="content"
                            name="publisher_name"
                            value="{{ $publisher->publisher_name }}">
                </div>

                <div class="form-group">
                    <label for="content">Publisher_year</label>
                    <input
                            type="text"
                            class="form-control"
                            id="content"
                            name="publisher_year"
                            value="{{ $publisher->publisher_year }}">
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $authorId }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.create') }}" method="post">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group">
                    <label for="content">Author</label>
                    <input type="text" class="form-control" id="content" name="author_name">
                </div>

                <div class="form-group">
                    <label for="content">Publisher Name</label>
                    <input type="text" class="form-control" id="content" name="publisher_name">
                </div>

                <div class="form-group">
                    <label for="content">Publisher Year</label>
                    <input type="text" class="form-control" id="content" name="publisher_year">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
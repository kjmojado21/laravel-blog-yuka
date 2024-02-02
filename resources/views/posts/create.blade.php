@extends('layouts.app')

@section('title'.'Create post')

@section('content')
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label fw-bold" >Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Description</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="form-text">
                Accepted Formats: jpeg, jpg, png, gif <br>
                Maximum file size: 148mb
            </div>
        </div>
        <button type="submit" class="px-5 btn btn-primary">Post</button>
    </form>
@endsection

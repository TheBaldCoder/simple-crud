@extends('layouts.base')

@section('content')
<h2 class="mb-4">Post: {{ $post->title }}</h2>

<form method="post" action="{{ route('posts.store' )}}">

    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="title" name="title" placeholder="title"
            value="{{ $post->title }}">
        <label for="floatingInput">Title</label>
    </div>

    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3 form-floating">
        <textarea disabled class="form-control" placeholder="Insert description here..." id="description"
            name="description" style="height: 200px">{{ $post->description }}</textarea>
        <label for="floatingTextarea2">Description</label>
    </div>
    <div>
        <a href="{{ route('posts.index') }}">Back</a>
    </div>

</form>
@endsection
@extends('layouts.base')

@section('content')
<div class="d-flex justify-content-between align-items-end">
    <h1 class="fw-bold text-decoration-underline">Posts</h1>
    <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Create</a>
</div>

<div class="mt-4">
    @forelse ($posts as $post)
    <div class="col mt-3">
        <div class="card">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                <p class="card-text">{{ $post->description }}</p>
                <span class="text-secondary">{{ $post->created_at->format('j F, Y') }}</span>
            </div>
            <div class="card-footer">
                <div>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Details</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div>
        <p>There are no posts...</p>
    </div>
    @endforelse
</div>
@endsection
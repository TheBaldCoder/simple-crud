@extends('layouts.base')

@section('content')
<div class="d-flex justify-content-between align-items-end">
    <h1 class="fw-bold text-decoration-underline">Posts</h1>
    <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Create</a>
</div>

<div class="mt-4">
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif

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
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm">Details</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Do you want to delete this post?');">Delete</button>
                    </form>
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
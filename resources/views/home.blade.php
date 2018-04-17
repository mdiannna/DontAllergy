@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <form action="{{ route('user.post.save') }}" method="post">
            @csrf
            <div class="card-header">
                <input type="text" name="title" class="form-control" placeholder="Post title">
            </div>
            <div class="card-body">
                <div class="form-group">
                    <textarea name="description" id="" class="form-control" rows="3" placeholder="Post description"></textarea>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary">Post something</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col">Title: {{ $post->title }}</div>
                    <div class="col-auto text-secondary text-right">
                        {{ $post->user->full_name }} |
                        {{ $post->updated_at }} |
                        @if (auth()->user()->id == $post->user->id)
                            <i data-post="{{ $post->id }} "class="fa fa-times delete-post">x</i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $post->description }}
            </div>
        </div>
    @endforeach
@endsection

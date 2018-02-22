@extends('layouts.master') 
@section('content')
<h1>{{ $post->title }}</h1>
{{ $post->body }}
<hr>
<ul class="list-group">
    @foreach ($post->comments as $comment)
    <li class="list-group-item">
        <strong>{{ $comment->created_at->diffForHumans() }}:</strong> {{ $comment->body }}
    </li>
    @endforeach
</ul>
<hr>
<div class="card">
    <div class="card-block">
        <form action="/posts/{{ $post->id }}/comments" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea 
                    name="body" 
                    rows="3" 
                    placeholder="You comment here..."
                    required
                    class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Add comment
                </button>
            </div>
            @include('layouts.errors')
        </form>
    </div>
</div>
@endsection
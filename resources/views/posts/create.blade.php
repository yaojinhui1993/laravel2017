@extends('layouts.master')

@section('content')

<h1> Create posts</h1>

<hr>

<form action="/posts" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title: </label>
    <input type="text" class="form-control" name="title" value={{ old('title') }}>
    </div>

    <div class="form-group">
        <label for="body">Body: </label>
    <textarea class="form-control" name="body" rows=5>{{ old('body') }}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>

    @if($errors->count() > 0)

        @foreach ($errors as $error)
           <div class="alert alert-danger">
                {{ $error->message }}  
            </div> 
        @endforeach
    @endif
</form>


@endsection
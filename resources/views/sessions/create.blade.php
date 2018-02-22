@extends('layouts.master')

@section('content')
<form action="/login" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Email Address: </label>
      <input type="email" name="email" id="email" class="form-control" placeholder="email" aria-describedby="email">
    </div>

    <div class="form-group">
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="password">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>

    @include('layouts.errors')
</form>
@endsection
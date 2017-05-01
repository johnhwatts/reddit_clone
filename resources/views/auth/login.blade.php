@extends('layouts.master')

@section('content')

<!-- resources/views/auth/login.blade.php -->

<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
    {!! csrf_field() !!}

    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        Password
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember" class="form-control"> Remember Me
    </div>

    <div class="form-group">
        <button type="submit" class= "btn btn-primary">Login</button>
    </div>
</form>

@stop

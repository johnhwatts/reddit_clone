@extends('layouts.master')

@section('content')

<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
    {!! csrf_field() !!}

    <div class="form-group">
        Name
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    </div>

    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        Password
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        Confirm Password
        <input type="password" name="password_confirmation" class="form-control">
    </div class="form-group">

    <div class="form-group">
        <button type="submit" class= "btn btn-primary">Register</button>
    </div>
</form>

@stop

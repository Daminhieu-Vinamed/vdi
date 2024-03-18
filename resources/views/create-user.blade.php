@extends('layout.master')
@section('title', 'CREATE USER')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/notification.css') }}">
@endsection
@section('content')
<form class="card shadow bg-white rounded" action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <h1>CREATE USER</h1> 
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="name">FULL NAME</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter full name" value="{{ old('name') }}">
        @error('name')
            <small id="name" class="form-text text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="col">
        <label for="username">USERNAME</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter username" value="{{ old('username') }}">
        @error('username')
            <small id="name" class="form-text text-danger">{{$message}}</small>
        @enderror
      </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="email">EMAIL</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email" value="{{ old('email') }}">
            @error('email')
                <small id="name" class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Enter password">
            @error('password')
                <small id="name" class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="col">
            <label for="password_confirmation">RE-PASSWORD</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="password_confirmation" placeholder="Enter password confirmation">
            @error('password_confirmation')
                <small id="name" class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary m-3">Submit</button>
        <button type="submit" class="btn btn-danger m-3">Cancel</button>
    </div>
  </form>
@endsection
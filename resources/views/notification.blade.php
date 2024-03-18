@extends('layout.master')
@section('title', 'UPLOAD FILES')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/notification.css') }}">
@endsection
@section('content')
    <div class="card d-flex justify-content-center">
        <div class="rounded-circle d-flex justify-content-center success">
            <i class="checkmark">✓</i>
        </div>
        <h1 class="text-center">{{$success}}</h1> 
        @if ($success === 'UPLOAD FILES SUCCESSFULLY !')
            <p>You have successfully uploaded the file, <a href="{{ route('upload.getUpload') }}">click here</a> to return if you want to upload the file again</p>
        @elseif($success === 'CREATE USER SUCCESSFULLY !')
            <p>You have create user successfully, <a href="{{ route('user.create') }}">click here</a> to return if you want to create user again</p>
        @endif
    </div>
@endsection
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
        <h1 class="text-center">Success</h1> 
        <p>You have successfully uploaded the file, <a href="{{ route('upload.getUpload') }}">click here</a> to return if you want to upload the file again</p>
    </div>
@endsection
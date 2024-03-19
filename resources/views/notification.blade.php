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
            <p>Bạn đã tải tài liệu lên thành công, <a href="{{ route('upload.getUpload') }}">nhấn vào đây</a> để quay lại nếu bạn muốn tải tài liệu lên tiếp</p>
    </div>
@endsection
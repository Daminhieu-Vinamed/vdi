@extends('layout.master')
@section('title', 'UPLOAD FILES')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/upload.css') }}">
@endsection
@section('content')
        <form class="upload" action="{{ route('upload.postUpload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload-files">
                <div class="header-upload-files">
                    <p>
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <span class="up">UP</span>
                        <span class="load">LOAD FILES TO VDI</span>
                    </p>
                </div>
                <div class="body" id="drop">
                    <i class="fa fa-file-text-o pointer-none" aria-hidden="true"></i>
                    <p class="pointer-none">
                        Nhấn <a href="" id="triggerFile"><b>vào đây</b></a> để tải tài liệu <br>
                        <b class="text-danger">Lưu ý:</b><br>
                        Chỉ cho phép tải tài liệu có tổng dung lượng tối đa 40MB
                    </p>
                    <input type="file" multiple="multiple" name="files" />
                </div>
                <div class="footer-upload-files">
                    <div class="divider">
                    <span>
                        <AR>TÀI LIỆU</AR>
                    </span>
                    </div>
                    <div class="list-files">
                    <!--   template   -->
                    </div>
                    <div>
                        <button class="importar" type="button">SỬA TÀI LIỆU</button>
                        <button class="uploadFile upload-files-to-server" type="button">TẢI TÀI LIỆU</button>
                    </div>
                </div>
            </div>
        </form>
@endsection
@push('js')
    <script src="{{ asset('assets/js/upload-files.js') }}"></script>
    <script src="{{ asset('assets/js/upload.js') }}"></script>
@endpush
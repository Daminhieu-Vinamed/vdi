@extends('layout.master')
@section('title', 'HISTORY FILE')
@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/dataTables.responsive.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow">
        <div class="d-flex justify-content-center card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH TÀI LIỆU ĐÃ TẢI LÊN</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered historyFileTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên tài liệu</th>
                            <th>Ngày tải tài liệu</th>
                            <th>Thời gian tải tài liệu</th>
                            <th>ngày sửa tài liệu</th>
                            <th>Thời gian sửa tài liệu</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên tài liệu</th>
                            <th>Ngày tải tài liệu</th>
                            <th>Thời gian tải tài liệu</th>
                            <th>ngày sửa tài liệu</th>
                            <th>Thời gian sửa tài liệu</th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/history-file.js') }}"></script>
@endpush
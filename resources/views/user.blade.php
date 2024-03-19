@extends('layout.master')
@section('title', 'USER')
@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/dataTables.responsive.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH TÀI KHOẢN NGƯỜI DÙNG</h6>
            <button class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">TẠO TÀI KHOẢN</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered userTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
      <!-- Create User Modal-->
      <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">TẠO TÀI KHOẢN NGƯỜI DÙNG</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row mb-3">
                      <div class="col">
                        <label for="name">HỌ VÀ TÊN</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter full name" value="{{ old('name') }}">
                          <small id="name" class="name-error form-text text-danger"></small>
                      </div>
                      <div class="col">
                        <label for="username">TÊN ĐĂNG NHẬP</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter username" value="{{ old('username') }}">
                          <small id="username" class="username-error form-text text-danger"></small>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col">
                          <label for="email">EMAIL</label>
                          <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email" value="{{ old('email') }}">
                          <small id="email" class="email-error form-text text-danger"></small>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col">
                          <label for="password">MẬT KHẨU</label>
                          <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Enter password">
                          <small id="password" class="password-error form-text text-danger"></small>
                        </div>
                        <div class="col">
                          <label for="re-password">XÁC NHẬN KHẨU KHẨU</label>
                          <input type="password" class="form-control" id="re-password" name="re_password" aria-describedby="re-password" placeholder="Enter re-password">
                          <small id="re-password" class="re-password-error form-text text-danger"></small>
                        </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-primary create-user" type="button">TẠO MỚI</button>
                  <button class="btn btn-danger" type="button" data-dismiss="modal">HỦY</button>
              </div>
          </div>
      </div>
  </div>
@endsection
@push('js')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/user.js') }}"></script>
@endpush
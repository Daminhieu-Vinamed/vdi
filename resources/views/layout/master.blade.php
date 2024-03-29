<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset("assets/vendor/fontawesome/css/all.min.css") }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset("assets/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    @yield('css')
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <div class="btn btn-link d-md-none rounded-circle mr-3">
                        <a href="{{ route('file.getUpload') }}"><img src="{{ asset('assets/img/logo-icon.png') }}" height="30px" alt=""></a>
                    </div>

                    <!-- Topbar Search -->
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <a href="{{ route('file.getUpload') }}"><img src="{{ asset('assets/img/logo.png') }}" height="40px" alt=""></a>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('assets/img/female.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('file.historyFile') }}">
                                    <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Lịch sử tải liệu
                                </a>
                                @if (Auth::user()->role === config('constants.number.two'))
                                    <a class="dropdown-item" href="{{ route('user.list') }}">
                                        <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Quản lý tài khoản
                                    </a>
                                @endif 
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal">
                                    <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đổi mật khẩu
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
            </div>
            <main class="d-flex justify-content-center p-4">
                @yield('content')
            </main>
            <footer class="sticky-footer bg-vmed mt-4">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-white">
                        <span>Website Developer: IT VINAMED</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Change password Modal-->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ĐỔI MẬT KHẨU</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="col">
                            <label for="current-password">MẬT KHẨU HIỆN TẠI</label>
                            <input type="password" class="form-control" name="current_password" aria-describedby="current-password" placeholder="Enter current password">
                            <small class="current-password-error form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col">
                            <label for="new-password">MẬT KHẨU MỚI</label>
                            <input type="password" class="form-control" name="new_password" aria-describedby="new-password" placeholder="Enter new password">
                            <small class="new-password-error form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col">
                            <label for="new-re-password">XÁC NHẬN MẬT KHẨU MỚI</label>
                            <input type="password" class="form-control" name="new_re_password" aria-describedby="new-re-password" placeholder="Enter new re-password">
                            <small class="new-re-password-error form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary change-password" type="button">ĐỔI</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">HỦY</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("assets/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/js/swalalert2@11.js") }}"></script>
    <script src="{{ asset("assets/js/constants.js") }}"></script>
    <script src="{{ asset("assets/js/change-password.js") }}"></script>
    @stack('js')
</body>
</html>
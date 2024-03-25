$(document).ready(function () {
    var tableUser = $(".userTable").DataTable({
        ajax: {
            type: "get",
            url: baseUrl + "user/anyData",
        },
        columns: [
            { data: "id", name: "id" },
            { data: "name", name: "name" },
            { data: "username", name: "username" },
            { data: "email", name: "email" },
            { data: "action", name: "action" },
        ],
        order: {
            name: "id",
            dir: "desc",
        },
        responsive: true,
        rowReorder: true,
        scrollX: true,
        language: {
            emptyTable: "Danh sách hiện tại đang trống",
            info: "Đang hiển thị trang _PAGE_ trên tổng _PAGES_ trang, _PAGES_ trang này có tổng _TOTAL_ tài khoản",
            lengthMenu:
                'Hiển thị <select class="form-control form-control-sm">' +
                '<option value="10">10 tài khoản trên trang</option>' +
                '<option value="20">20 tài khoản trên trang</option>' +
                '<option value="30">30 tài khoản trên trang</option>' +
                '<option value="40">40 tài khoản trên trang</option>' +
                '<option value="50">50 tài khoản trên trang</option>' +
                '<option value="-1">tất cả tài khoản trên trang</option>' +
                "</select>",
            search: "Tìm kiếm _INPUT_",
            paginate: {
                previous: '<i class="previous">&laquo;</i>',
                next: '<i class="next">&raquo;</i>',
            },
            zeroRecords: "Không có tài khoản nào có dữ liệu bạn tìm kiếm",
        },
    });
    $(document).on("click", ".edit-user", function () {
        var id = $(this).attr("id");

        $.ajax({
            url: baseUrl + "user/edit",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id: id,
            },
            success: function (response) {
                $("#id-edit").val(response.user.id);
                $("#name-edit").val(response.user.name);
                $("#username-edit").val(response.user.username);
                $("#email-edit").val(response.user.email);
            },
            error: function (response) {
                Toast.fire({
                    icon: "error",
                    text: "TÀI KHOẢN LỖI DỮ LIỆU !",
                });
            },
        });
    });

    $(document).on("click", ".add-password-user-edit", function () {
        $(".change-password-user-edit > .col").remove();
        $(".change-password-user-edit").append(`<div class="col">
                                                    <label for="password">MẬT KHẨU</label>
                                                    <input type="password" class="form-control" id="password-edit" aria-describedby="password" placeholder="Enter password">
                                                    <small class="password-error-edit form-text text-danger"></small>
                                                </div>
                                                <div class="col">
                                                    <label for="re-password">XÁC NHẬN KHẨU KHẨU</label>
                                                    <input type="password" class="form-control" id="re-password-edit" aria-describedby="re-password" placeholder="Enter re-password">
                                                    <small class="re-password-error-edit form-text text-danger"></small>
                                                </div>`);
        $(".modal-user-edit").append(`<div class="row mb-3">
                                        <div class="col">
                                            <button class="btn btn-danger remove-password-user-edit" type="button">HỦY ĐỔI MẬT KHẨU</button>
                                        </div>
                                    </div>`);
    });

    $(document).on("click", ".remove-password-user-edit", function () {
        $(".change-password-user-edit > .col").remove();
        $(".change-password-user-edit").append(`<div class="col">
                                                    <button class="btn btn-primary add-password-user-edit" type="button">ĐỔI MẬT KHẨU</button>
                                                </div>`);
        $(".modal-user-edit > .row").last().remove();
    });

    $(".update-user").click(function () {
        var valueUpdate = {
            id: $("#id-edit").val(),
            name: $("#name-edit").val(),
            username: $("#username-edit").val(),
            email: $("#email-edit").val(),
        };
        if (
            $("#password-edit").length > 0 &&
            $("#re-password-edit").length > 0
        ) {
            valueUpdate.password = $("#password-edit").val();
            valueUpdate.re_password = $("#re-password-edit").val();
        }
        $.ajax({
            url: baseUrl + "user/update",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: valueUpdate,
            success: function (response) {
                $(".name-error-edit").text("");
                $(".username-error-edit").text("");
                $(".email-error-edit").text("");

                $(".change-password-user-edit > .col").remove();
                $(".change-password-user-edit").append(`<div class="col">
                                                            <button class="btn btn-primary add-password-user-edit" type="button">ĐỔI MẬT KHẨU</button>
                                                        </div>`);
                $(".modal-user-edit > .row").last().remove();

                tableUser.ajax.reload();

                Toast.fire({
                    icon: "success",
                    title: response.notification,
                });
            },
            error: function (response) {
                var errors = response.responseJSON.errors;

                errors.name
                    ? $(".name-error-edit").text(errors.name[0])
                    : $(".name-error-edit").text("");
                errors.username
                    ? $(".username-error-edit").text(errors.username[0])
                    : $(".username-error-edit").text("");
                errors.email
                    ? $(".email-error-edit").text(errors.email[0])
                    : $(".email-error-edit").text("");
                errors.password
                    ? $(".password-error-edit").text(errors.password[0])
                    : $(".password-error-edit").text("");
                errors.re_password
                    ? $(".re-password-error-edit").text(errors.re_password[0])
                    : $(".re-password-error-edit").text("");

                Toast.fire({
                    icon: "error",
                    text: "CẬP NHẬT TÀI KHOẢN THẤT BẠI !",
                });
            },
        });
    });

    $(".create-user").click(function () {
        var name = $("input[name='name']").val();
        var username = $("input[name='username']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var re_password = $("input[name='re_password']").val();
        $.ajax({
            url: baseUrl + "user/create",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                name: name,
                username: username,
                email: email,
                password: password,
                re_password: re_password,
            },
            success: function (response) {
                $(".name-error-create").text("");
                $(".username-error-create").text("");
                $(".email-error-create").text("");
                $(".password-error-create").text("");
                $(".re-password-error-create").text("");

                $("input[name='name']").val("");
                $("input[name='username']").val("");
                $("input[name='email']").val("");
                $("input[name='password']").val("");
                $("input[name='re_password']").val("");

                tableUser.ajax.reload();

                Toast.fire({
                    icon: "success",
                    title: response.notification,
                });
            },
            error: function (response) {
                var errors = response.responseJSON.errors;

                errors.name
                    ? $(".name-error-create").text(errors.name[0])
                    : $(".name-error-create").text("");
                errors.username
                    ? $(".username-error-create").text(errors.username[0])
                    : $(".username-error-create").text("");
                errors.email
                    ? $(".email-error-create").text(errors.email[0])
                    : $(".email-error-create").text("");
                errors.password
                    ? $(".password-error-create").text(errors.password[0])
                    : $(".password-error-create").text("");
                errors.re_password
                    ? $(".re-password-error-create").text(errors.re_password[0])
                    : $(".re-password-error-create").text("");

                Toast.fire({
                    icon: "error",
                    text: "TẠO TÀI KHOẢN THẤT BẠI !",
                });
            },
        });
    });
});

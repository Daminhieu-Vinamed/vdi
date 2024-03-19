jQuery(document).ready(function($){
    var baseUrl = window.location.href;
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: function didOpen(toast) {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });
    jQuery('.create-user').click(function () {
        var name = $("input[name='name']").val();
        var username = $("input[name='username']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var re_password = $("input[name='re_password']").val();
        $.ajax({
            url: baseUrl + "user/create" ,
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name: name,
                username: username,
                email: email,
                password: password,
                re_password: re_password,
            },
            success: function(response) {
                $('.name-error').text('');
                $('.username-error').text('');
                $('.email-error').text('');
                $('.password-error').text('');
                $('.re-password-error').text('');

                $("input[name='name']").val('');
                $("input[name='username']").val('');
                $("input[name='email']").val('');
                $("input[name='password']").val('');
                $("input[name='re_password']").val('');

                Toast.fire({
                    icon: 'success',
                    title: response.notification
                })
            },
            error: function (response) {
                var errors = response.responseJSON.errors;

                errors.name ? $('.name-error').text(errors.name[0]) : $('.name-error').text('');
                errors.username ? $('.username-error').text(errors.username[0]) : $('.username-error').text('');
                errors.email ? $('.email-error').text(errors.email[0]) : $('.email-error').text('');
                errors.password ? $('.password-error').text(errors.password[0]) : $('.password-error').text('');
                errors.re_password ? $('.re-password-error').text(errors.re_password[0]) : $('.re-password-error').text('');

                Toast.fire({
                    icon: 'error',
                    text: "TẠO TÀI KHOẢN THẤT BẠI !",
                })
            }
        });
    });

    jQuery('.change-password').click(function () {     
        const current_password = $("input[name='current_password']").val();
        const new_password = $("input[name='new_password']").val();
        const new_re_password = $("input[name='new_re_password']").val();     
        $.ajax({
            url: baseUrl + "user/change-password" ,
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                current_password: current_password,
                password: new_password,
                new_re_password: new_re_password,
            },
            success: function(response) {
                $('.current-password-error').text('');
                $('.new-password-error').text('');
                $('.new-re-password-error').text('');

                $("input[name='current_password']").val('');
                $("input[name='new_password']").val('');
                $("input[name='new_re_password']").val('');   

                Toast.fire({
                    icon: 'success',
                    title: response.notification
                })
            },
            error: function (response) {
                var errors = response.responseJSON.errors;
                errors.current_password ? $('.current-password-error').text(errors.current_password[0]) : $('.current-password-error').text('');
                errors.password ? $('.new-password-error').text(errors.password[0]) : $('.new-password-error').text('');
                errors.new_re_password ? $('.new-re-password-error').text(errors.new_re_password[0]) : $('.new-re-password-error').text('');

                Toast.fire({
                    icon: 'error',
                    text: "ĐỔI MẬT KHẨU THẤT BẠI !",
                })
            }
        });
    });
})
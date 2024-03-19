jQuery(document).ready(function($){
    jQuery('.change-password').click(function () {     
        const current_password = $("input[name='current_password']").val();
        const new_password = $("input[name='new_password']").val();
        const new_re_password = $("input[name='new_re_password']").val();     
        $.ajax({
            url: baseUrl + "/change-password" ,
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
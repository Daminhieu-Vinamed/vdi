$(document).ready(function() {
  var tableUser = $('.userTable').DataTable({
    ajax: {
        type: 'get',
        url: baseUrl + 'user/anyData',
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'username', name: 'username' },
        { data: 'email', name: 'email' },
    ],
    responsive: true,
    rowReorder: true,
    scrollX: true,
    language: {
        emptyTable: 'Danh sách hiện tại đang trống',
        info: "Đang hiển thị trang _PAGE_ trên tổng _PAGES_ trang, _PAGES_ trang này có tổng _TOTAL_ tài khoản",
        lengthMenu: 'Hiển thị <select class="form-control form-control-sm">'+
                    '<option value="10">10 tài khoản trên trang</option>'+
                    '<option value="20">20 tài khoản trên trang</option>'+
                    '<option value="30">30 tài khoản trên trang</option>'+
                    '<option value="40">40 tài khoản trên trang</option>'+
                    '<option value="50">50 tài khoản trên trang</option>'+
                    '<option value="-1">tất cả tài khoản trên trang</option>'+
                    '</select>',
        search: "Tìm kiếm _INPUT_",
        paginate: {
            previous: '<i class="previous">&laquo;</i>',
            next: '<i class="next">&raquo;</i>',
        },
        zeroRecords: "Không có tài khoản nào có dữ liệu bạn tìm kiếm"
    }
  });

  $('.create-user').click(function () {
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

              tableUser.ajax.reload();

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
});

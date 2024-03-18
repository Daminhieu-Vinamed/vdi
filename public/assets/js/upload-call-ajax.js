jQuery(document).ready(function($){
    jQuery('#upload-files').click(function () {
        var files = $("input[name='files[]']")
              .map(function(){return $(this).val();}).get();
        $.ajax({
            url: "/upload" ,
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                files: files,
            },
            success: function(dataSuccess) {
                Toast.fire({
                    icon: 'success',
                    title: 'UPLOAD THÀNH CÔNG !'
                })
            },
            error: function (dataError) {
                Toast.error({
                    icon: 'error',
                    text: "UPLOAD THẤT BẠI !",
                })
            }
        });
    });
})
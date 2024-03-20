jQuery(document).ready(function ($) {
    jQuery(".upload-files-to-server").click(function () {
        alert('Do tài liệu tải lên có dung lượng lớn nên hãy chờ trong giây lát')
        var listFile = $("input[name='files']")[0].files;
        formData = new FormData();
        for (var i = 0; i < listFile.length; ++i) {
            formData.append("files[]", listFile[i]);
        }
        $.ajax({
            url: baseUrl + "upload",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                alertCenterAutoClose.fire({
                    title: response.notification,
                });
            },
            error: function () {
                alertCenterError.fire({
                    text: "HÃY TẢI FILE CÓ DUNG LƯỢNG TỐI ĐA 40MB !",
                });
            },
        });
    });
});

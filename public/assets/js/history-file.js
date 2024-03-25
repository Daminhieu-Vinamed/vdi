$(document).ready(function () {
    $(".historyFileTable").DataTable({
        ajax: {
            type: "get",
            url: baseUrl + "anyDataHistoryFile",
        },
        columns: [
            { data: "name", name: "name" },
            { data: "created_at", name: "created_at" },
            { data: "created_time", name: "created_time" },
            { data: "updated_at", name: "updated_at" },
            { data: "updated_time", name: "updated_time" },
        ],
        order: {
            name: "updated_at",
            dir: "desc",
        },
        responsive: true,
        rowReorder: true,
        scrollX: true,
        language: {
            emptyTable: "Danh sách hiện tại đang trống",
            info: "Đang hiển thị trang _PAGE_ trên tổng _PAGES_ trang, _PAGES_ trang này có tổng _TOTAL_ tài liệu",
            lengthMenu:
                'Hiển thị <select class="form-control form-control-sm">' +
                '<option value="10">10 tài liệu trên trang</option>' +
                '<option value="20">20 tài liệu trên trang</option>' +
                '<option value="30">30 tài liệu trên trang</option>' +
                '<option value="40">40 tài liệu trên trang</option>' +
                '<option value="50">50 tài liệu trên trang</option>' +
                '<option value="-1">tất cả tài liệu trên trang</option>' +
                "</select>",
            search: "Tìm kiếm _INPUT_",
            paginate: {
                previous: '<i class="previous">&laquo;</i>',
                next: '<i class="next">&raquo;</i>',
            },
            zeroRecords: "Không có tài liệu nào có dữ liệu bạn tìm kiếm",
        },
    });
});

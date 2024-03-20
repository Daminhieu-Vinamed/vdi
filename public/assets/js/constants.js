var baseUrl = window.location.origin + "/vdi/public/";

var Toast = Swal.mixin({
    toast: true,
    position: "top-right",
    customClass: {
        popup: "colored-toast",
    },
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: function didOpen(toast) {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

let timerInterval;
var alertCenterAutoClose = Swal.mixin({
    icon: "success",
    html: "Thông báo sẽ đóng sau <b></b> mili giây.",
    timer: 4000,
    timerProgressBar: true,
    didOpen: () => {
        Swal.showLoading();
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
        }, 100);
    },
    willClose: () => {
        clearInterval(timerInterval);
    },
});

var alertCenterError = Swal.mixin({
    icon: "error",
    title: "CẢNH BÁO",
    customClass: {
        confirmButton: "btn btn-primary",
    },
});

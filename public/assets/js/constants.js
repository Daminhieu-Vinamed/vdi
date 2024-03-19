var baseUrl = window.location.origin + '/vdi-upload-files/public/';

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
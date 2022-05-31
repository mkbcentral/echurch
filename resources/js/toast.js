window.$(document).ready(function () {
    toastr.options = {
    "positionClass": "toast-bottom-right",
    "progressBar": true
    };
    window.addEventListener('data-added', function (event) {
        toastr.success(event.detail.message, 'Validation');
        $('#createChurchModal').modal('hide');
        $('#createPredictionModal').modal('hide');
    });
    window.addEventListener('data-updated', function (event) {
        toastr.info(event.detail.message, 'Validation');
        $('#editChurchModal').modal('hide');
        $('#editPredictionModal').modal('hide');
    });

    window.addEventListener('data-error', function (event) {
        toastr.danger(event.detail.message, 'Validation');
    });

});




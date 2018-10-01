$(document).ready(function () {
    var toValidate = $('#lastname, #firstname, #birthDate, #phoneNumber, #mail');
    toValidate.on('keyup change', function () {
        if ($(this).val().length != 0) {
            $(this).data('valid', true);
        } else {
            $(this).data('valid', false);
        }
        if (($('#lastname').val().length != 0) && ($('#firstname').val().length != 0) && ($('#birthDate').val().length != 0) && ($('#phoneNumber').val().length != 0) && ($('#mail').val().length != 0)) {
            $('#modifyPatient').prop('disabled', false);
        } else {
            $('#modifyPatient').prop('disabled', true);
        }
    });
});
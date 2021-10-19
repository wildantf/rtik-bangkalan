$(document).ready(function() {
    $('#show-password').on('click', function() {
        if ($('#password').attr('type') == 'password') {
            $('#password').attr('type', 'text');
            $('#password-confirmation').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
            $('#password-confirmation').attr('type', 'password');
        }
    });
});
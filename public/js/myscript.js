$(document).ready(function() {
    $('.form-control').on('focus', function() {
        $(this).addClass('active');
    });
    
    $('.form-control').on('blur', function() {
        if($(this).val() === '') {
            $(this).removeClass('active');
        }
    });
});




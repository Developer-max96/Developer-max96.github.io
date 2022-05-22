$(document).ready(function() {
    $('.btn_check_varara').click(function() {
        $('.result').html('<img src="/service_check_varvara/Spinner-2.gif">');
        $.ajax({
            type: 'GET',
            url: '/service_check_varvara/ajax_check_varvara.php',
            success: function(data) {
                $('.result').html(data);
            },
            error: function(xhr, str) {
                alert('error ajax: ' + xhr.responseCode);
            }
        });
    });


});
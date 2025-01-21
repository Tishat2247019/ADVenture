$(document).ready(function() {
    $("#create_ad_form").submit(function(event) {
        event.preventDefault(); 

        var formData = new FormData(this);

        $.ajax({
            url: '../../../controller/shohan_controller/ad_check.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $(".message").html(response);
            },
            error: function(xhr, status, error) {
                $(".message").html("<h3 style='color: red;'>An error occurred while submitting your form. Please try again.</h3>");
            }
        });
    });
});

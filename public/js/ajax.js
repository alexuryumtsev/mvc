$( document ).ready(function() {
    $("#btn").click(
        function(){
            sendDataReview(form_review);
            return false;
        }
    );
});

function sendDataReview(form_review) {
    $.ajax({
        type: "POST",
        url: "apps/site/controllers/guestbook.php",
        data: {
            review : form_review,
        },
        success: function(data) {
            $("#result_form").html(data);
        }
    });
}
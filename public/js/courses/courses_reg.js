$(document).ready(function() {
    $(".register_wizard").hide();
    $("#register").show();
    $(".register_continue").click(function() {
        if (checkForm()) {
            $(".register_wizard").slideUp(800);
            $("#" + $(this).attr("data-next-id")).slideDown(800);
        }
    });

    $(".register_back_btn").click(function() {
        $(".register_wizard").slideUp(800);
        $("#register").slideDown(800);
    });
});

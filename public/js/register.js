// $(".password").val();
$(".password").on('input', function() {
    if ($(this).val().length >= 8) {
        $(".red").css("color", "green");
    } else {
        $(".red").css("color", "rgb(184, 0, 0)"); // Optional: Change color back if length isn't 8
    }
});

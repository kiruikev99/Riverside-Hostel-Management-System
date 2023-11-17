$(document).ready(function () {
    $("#image-content1").click(function () {
        $("#content1").toggle();
        $("#image-content1").toggle();
    });
    $("#content1").click(function () {
        $("#image-content1").toggle();
        $("#content1").hide();
    });
})
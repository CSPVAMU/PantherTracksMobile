// Event handlers for degree plan viewer.
$("#plan-list ul").on("click", ".plan", function () {
    $(".plan").css("background", "#fffeff");
    viewDegreePlanReq($(this).attr("id"));
    $(this).css("background", "yellow");
});


// Event handlers for degree plan viewer.
$("#plan-list ul").on("click", ".plan", function () {
    viewDegreePlanReq($(this).attr("id"));
});

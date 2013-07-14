// Event handlers for degree plan viewer.
$("#plan-list ul").on("click", ".plan", function () {
    $(".plan").css("background", "#fffeff");
    viewDegreePlanReq($(this).attr("id"));
    $(this).css("background", "yellow");
});

var singlecount = 0;
$("#add-single").click(function () {
    singlecount += 1;
    courses = [];
    $(this).parent().append("<select id=\"courses" + singlecount + "\" name=\"courses" + singlecount + "\"></select><br>");
    $.ajax({
        url: "scripts/courses.php",
        dataType: "json",
        success: function (data) {
            courses = data;
        },
        complete: function () {
            courseslen = courses.length;
            for (i = 0; i < courseslen; i++) {
                $("#courses" + singlecount).append("<option value=\"" + courses[i]["id"] + "\">" + 
                courses[i]["courseID"] + " - " + courses[i]["title"] +
                "</option>");
            }
        }
    });
});
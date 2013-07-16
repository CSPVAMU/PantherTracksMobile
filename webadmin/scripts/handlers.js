// Event handlers for degree plan viewer.
$("#plan-list ul").on("click", ".plan", function () {
    $(".plan").css("background", "#fffeff");
    viewDegreePlanReq($(this).attr("id"));
    $(this).css("background", "yellow");
});

$("#dp-create-cancel").click(function () {
    document.location.href = "index.php";
});

var singleCount = 0;
$("#add-single").click(function () {
    singleCount += 1;
    var courses = [];
    $(this).parent().append("<select id=\"courses" + singleCount + "\" name=\"courses" + singleCount + "\"></select><br>");
    $.ajax({
        url: "scripts/courses.php",
        dataType: "json",
        success: function (data) {
            courses = data;
        },
        complete: function () {
            courseslen = courses.length;
            for (i = 0; i < courseslen; i++) {
                $("#courses" + singleCount).append("<option value=\"" + courses[i]["id"] + "\">" + 
                courses[i]["courseID"] + " - " + courses[i]["title"] +
                "</option>");
            }
        }
    });
});

var electiveCount = 0;
$("#add-elective").click(function () {
    electiveCount += 1;
    $(this).parent().append("<div id=\"req-name" + electiveCount + "\" class=\"req-elective\">"
        + "Requirement Name: <input name=\"req-name" + electiveCount + "\" type=\"text\">" +
        "<input class=\"add-specific-elective\" type=\"button\" value=\"add elective course option\"><br>" +
        "</div>");
        
    var specificElectiveCount = 0;
    $(".add-specific-elective").click(function () {
        console.log("somethig");
        specificElectiveCount += 1;
        var coursesEle = [];
        $(this).parent().append("<select id=\"coursesEle" + specificElectiveCount + "\" name=\"coursesEle" + specificElectiveCount + "\"></select><br>");
        $.ajax({
            url: "scripts/courses.php",
            dataType: "json",
            success: function (data) {
                coursesEle = data;
            },
            complete: function () {
                coursesElelen = coursesEle.length;
                for (i = 0; i < coursesElelen; i++) {
                    $("#coursesEle" + specificElectiveCount).append("<option value=\"" + coursesEle[i]["id"] + "\">" + 
                    coursesEle[i]["courseID"] + " - " + coursesEle[i]["title"] +
                    "</option>");
                }
            }
        });
    });

});



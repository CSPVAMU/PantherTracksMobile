// Event handlers for degree plan viewer.
$("#plan-list ul").on("click", ".plan", function () {
    $(".plan").css("background", "#fffeff");
    viewDegreePlanReq($(this).attr("id"));
    $(this).css("background", "yellow");
});

$("#dp-create-cancel").click(function () {
    document.location.href = "index.php";
});

$(".add-single").click(function () {
    addSingleCourse($(this).attr("id"), $(this).attr("label"));
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


$("nav > ul > li").hover(function () {

    $(this).children("ul").show();

}, function () {

    $(this).children("ul").hide();

});










































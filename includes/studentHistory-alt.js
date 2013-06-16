//TODO: make this more global
var rootpath = "http://" + document.domain + "/sandbox/PantherTracksMobile/";

/**
 * Display's list of courses completd by student.
 * @param {string} display If set to "plan" will only display courses in current degree plan.
 */
function studentHistory(display) {
    $("#courseHistory").html('');
    var studentid = window.sessionStorage.student;
    if (!display) {
        var display = "all";
    }
    $.ajax({
        type: "GET",
        url: rootpath + "includes/studentRecords.php?studentid=" + studentid + "&display=" + display,
        dataType: 'json',
        success: function (data) {
            recordslen = data.length;
            for(i = 0; i < recordslen; i++) {
                //TODO: display by year and semester
                var recordObj = JSON.parse(data[i]);
                console.log(recordObj);
                $("#courseHistory").append(
                    "<li class=\"courses\">" + 
                        "<span class=\"courseID\">" + recordObj.courseID + "</span>" +
                        "<span class=\"title\">" + recordObj.title + "</span>" +
                        "<span class=\"modified\">Last updated by " + recordObj.first + " " + recordObj.last + " on " + recordObj.modifiedOn + "</span>" +
                    "</li>");
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
            console.log(ajaxOptions);
            console.log(thrownError);
        }
    });
}

// Functions for degree plan viewer.

// adds .unique() to array object
Array.prototype.unique = function(){
    var r, o, i, j, t, tt;
    r = [];
    o = {};
    for(i = 0; i < this.length; i++){
       t = this[i];
       tt = o[t] = o[t] || [];
       for(j = 0; j < tt.length; j++)
           if(tt[j] === this[i])
               break;
       if(j == tt.length)
           r.push(tt[j] = t);
     }
     return r;
}

/**
 *  List degree plans found in database.
 */
function getDegreePlanList() {
    $.ajax({
        url: "plan.php",
        dataType: "json",
        success: function(data) {
            var plansNum = data.length;
            for(i = 0; i < plansNum; i++) {
                $("#plan-list ul").append(
                    "<li id=\"" + data[i]["planID"] + "\" class=\"plan\">" + 
                        data[i]["name"] + 
                    "</li>");
            }
        },
        error: function() {
            console.log("error from getDegreePlanList()");
        }
    });
}
var uniqueReq = [];
/**
 * List requirements and courses that fulfill them for chosen degree plan.
 */
function viewDegreePlanReq(planID) {
    $("#display-table > tbody tr").each(function () {
        $(this).remove();
    });
    var uniqueReq = [];
    var planCourses = [];
    $.ajax({
        url: "plan.php?planID=" + planID,
        dataType: "json",
        success: function (data) {
            var datalen = data.length;
            for(i = 0; i < datalen; i++) {
                uniqueReq.push(data[i].requirement);
                planCourses.push([data[i].requirement, data[i].courseID, data[i].title, data[i].creditHours]);
            }
            uniqueReq = uniqueReq.unique();
        },
        complete: function () {
            $("#plan-details").removeClass("hidden");
            var numberOfRequiremetns = uniqueReq.length;
            var numberOfCourses = planCourses.length;
            
            for(i = 0; i < numberOfRequiremetns; i++) {
                var courseList = ""; 
                for (j = 0; j < numberOfCourses; j++) {
                    if (uniqueReq[i] == planCourses[j][0]) {
                        courseList += planCourses[j][2] + "<br>";
                    }
                }
                $("#display-table > tbody:last").append(
                    "<tr>" +
                        "<td>" + uniqueReq[i] + "</td>" +
                        "<td>" + courseList + "</td>" +
                    "</tr>");
            }
            $("#display-table").tablesorter({ 
                sortList: [[0,0]] 
            }); 
        },
        error: function () {
            console.log("error from viewDegreePlanReq()");
        }
    });
}











































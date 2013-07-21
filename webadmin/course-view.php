<?php include("header.html"); ?>

<h2>Courses</h2>
<div id="course-list">
    <table id="course-table" class="tablesorter">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Subject</th>
                <th>Course Title</th>
                <th>Hours</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    var courses;
    $("#course-table").append("<tbody>");
    $.ajax({
        url: "scripts/courses.php",
        dataType: "json",
        success: function (data) {
            courses = data;
        },
        complete: function () {
            console.log(courses);
            courses.forEach(function (course) {
                $("#course-table > tbody:last").append(
                    "<tr>" +
                        "<td>" + course["courseID"] + "</td>" +
                        "<td>" + course["subject"] + "</td>" +
                        "<td>" + course["title"] + "</td>" +
                        "<td>" + course["creditHours"] + "</td>" +
                        "<td><a href=\"course-edit?id=" + course["id"] + "\">edit</a></td>" +
                        "<td><a href=\"\">remove</a></td>" +
                    "</tr>");
             
            });
            $("#course-table").tablesorter();
            newheight = $("#course-table").height() + 250;
            $(".wrapper").css("height", newheight);
        }
    });
</script>

<?php include("footer.html"); ?>
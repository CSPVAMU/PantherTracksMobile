<?php include("header.html"); ?>

<h2>Degree Plans</h2>
<div id="plan-list">
    <a id="create-new" href="dp-create.php?operation=fillin">Create New Degree Plan</a>
    <ul>
    </ul>

</div>

<div id="plan-details" class="hidden">
    <table id="display-table" class="tablesorter">
        <thead>
            <tr><th>Degree Requirements</th><th>Courses</th></tr>
        </thead>
    </table>
</div>

<?php include("footer.html"); ?>

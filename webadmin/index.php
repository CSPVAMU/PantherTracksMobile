<!DOCTYPE html>
<head>
    <title>Degree Plan Viewer</title>
    <link rel="stylesheet" href="css/default.css">
    <script src="scripts/jquery-1.10.2.min.js"></script>
    <script src="scripts/jquery.tablesorter.js"></script>    
</head>

<body>
    <div class="wrapper">
        <h1>PT Mobile Web Admin</h1>
        <h2>Degree Plans</h2>
        <div id="plan-list">
            <a id="create-new" href="">Create New Degree Plan</a>
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
    </div><!--.wrapper-->

    <script src="scripts/functions.js"></script>
    <script src="scripts/handlers.js"></script>
    <script src="scripts/ready.js"></script>
</body>
</html>

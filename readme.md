Change Log
----------
- 2013-06-25 (James)
    * Changed studentRecords.php to create arrays in a more official manor.
    * Changed users.planID to users.chosenPlan in database; still need to make a dump.

- 2013-06-22 (James)
    * Removed a couple of temporary files I made notes in, but copied the [notes into the wiki]
      (https://github.com/CSPVAMU/PantherTracksMobile/wiki/some-temporary-notes).
    * Made changes to user 160 in database to refelect changes in course table.
    * Updated example database useage `includes/exampleStudentRecordCall.html`, had a problem
      creating a sql statement that would return non-plan courses. Will have to look into it more.

- 2013-06-17 (James)
    * Found the error for yesterday's last bullet, it wasn't a SQL problem it was a type in the
      database (no surprise there).
    * For tablesorter jQuery plugin to sort by columns as expected the table needs to be recreated each time. Removing and apending 's break the sorting.

- 2013-06-16 (James)
    * Added define for PDO connection in `mysql-example.php`. Seperate these into a `config.php`
      file in the future.
    * Manually added courses required for Computer Science 2012 and Computer Science 2008 degree
      plan. Still plenty of details to fill in, but hopefully some of that can wait until we have an
      easier way to input.
    * Created new columns in courses table, subject and level, for easier sorting. An SQL query that
      returns all `subject = 'MATH' AND level = 1` courses will show all freshman level math
      courses.
    * Manually updated degreePlanRequirements table for Computer Science 2012 and Computer Science
      2008 degree plan.
    * Exported database to `db_exports`.
    * Started a `webadmin` folder with the idea in mind that is where the administrative web
      interface will be. Right now it has a degree plan viewer, but there is an error in the SQL
      that gives odd results--will fix later. This is similar in functionality to the simple demo I
      showed last Wednesday except the code is more refined (html for display, ajax call to php for
      database--the original example was all php).

    > Just some thouhts on this, we're really developing three different things that all use the
    > same database. An Android app, an iOS app, and a website. Instead of repositories for each
    > maybe we can get away with just a folder for each.

- 2013-06-15 (James)
    * Changed this readme to [markdown](http://daringfireball.net/projects/markdown/) because that
      seems to be more standard than the mediawiki format.
    * Added column, courseID to StudentRecords table. Populated it with courseID based on classID in
      `degreeplan.js`. I've done my best to conform to the current code base, but there are some
      changes that will have to be made to make better use of the database. For example,
      `studenthistory.js` is dependant on the order the classes are stored in `degreeplan.js`; with
      multiple degree plans using many of the same classes this will have to be different. It will
      require some additional info in the StudentRecord table (see next bullet).
    * Added yearTaken and semesterTaken to StudentRecords table so we can sort courses by when the
      user took them. The StudentRecords table could be expanded to include the CRN, the instructor,
      or any other info we deem necessary. This would allow us to recreate the history of a specific
      class (like who was in it), an entire semester (a history of all courses offered and how many
      students took each course), what every professor has taught, and if we incorporate grades we
      can provide university wide statistics that may yield interesting result--but that's for the
      future.
    * Before I went off on the above tangent, I filled in some bogus year and semester data for
      studentID 160.
    * Created `studentusers-alt.html`, `studentHistory-alt.js`, and `studentRecords.php` (similar to
      `studenthistory.php`) to show how the new database tables can be used. The
      `studentRecords.php` file returns all student records by default. Passing display=plan through
      the URI will only return student records that apply to the students selected degree plan.
    * Created `courseDisplay.css` to be reused by sections that display course information.

- 2013-06-09 (James)
    * Made notes and diagram on table relationships.
    * More notes.

- 2013-06-08 (James)
    * Created a .gitignore file to ignore db connection file php/mysql.php and created a
      php/mysql_example.php. This way everyone can have their own local version of the database
      connection file and we don't want a file with database connection info on there anyway (with
      the idea in mind this will be open source one day). Contributors can use the example to create
      their own local version of php/mysql.php for local testing and development.
    * Created this readme file. In the future this will explain what the project is and how it
      works. Github allows for many mark up languages to be used for the readme, I chose mediawiki
      because it's the one I'm most familiar with, feel free to change it.
    * Created a folder, db_exports, has an export of the database with date. Open source versions of
      this project should only have the structure. The export named pvamu_pvplanner_2013-06-08.sql
      is the whole database.
    * Removed the .LCK files and added that to .gitignore.
    * Made notes on scripts and files in admin-plans.html (still trying to work everything out).


Notes
-----
Consider [PDO class](http://www.php.net/manual/en/class.pdo.php) for database connection,
[mysql_connect is officially depreciated as of PHP 5.5.0]
(http://php.net/manual/en/function.mysql-connect.php). This is a decent quick [PDO reference]
(http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/).

A JavaScript file for global info like rootpath (see `studentHistory-alt.js`). This variable allows
for relative paths and not a hard coded the URI.

### Database notes
There is a [DB Relationship diagram](https://github.com/CSPVAMU/PantherTracksMobile/tree/master/db_exports)
in the db_exports folder.

* Looking at the database from a student perspective.
** Users that are students have a reference table named StudentRecords. There can be any number of
   records per student.
** StudentRecords links completed courses to a student.

* Looking at the database from a degree plan perspective.
** For users that are students in the users table there is a column for chosen degree plan.
** The degreePlanData table has general information about each degree plan (title, description, etc).
** The degreePlanRequirements is a reference table that links a degree plan to courses via requirement.
** In most cases a requirement is met by a single course, but some requirements can be met by many
   courses (like an elective).

Degree plan progress can be tracked programmatically by the students chosen plan. For example, we
can show a list of courses a student has taken, which ones apply to the student's selected degree
plan, and which ones do not. The student can even change his degree plan to view "what if"
scenarios. We can then show them the difference in time (be it semesters, credit hours, or years)
to complete any degree.

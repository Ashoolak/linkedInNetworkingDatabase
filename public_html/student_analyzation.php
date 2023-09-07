<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Networking Database Management</title>
    <style>
        /* Add your styles here */
        @import url('https://fonts.googleapis.com/css2?family=Orbit&display=swap');
        body {
            background-image: radial-gradient(circle farthest-corner at 1.3% 2.8%, rgba(239, 249, 249, 1) 0%, rgba(182, 199, 226, 1) 100.2%);
            margin: 0;
            padding: 0;
            font-family: 'Orbit', Arial, sans-serif;
            min-height: 130vh;
        }

        header {
            padding: 10px;
            text-align: center;
            color: #fff;
        }

        h1 {
            padding-top: 60px;
            text-align: center;
            margin: 0;
            font-size: 40px;
            color: #1a005c;
            font-family: 'Orbit', Arial, sans-serif;
        }

        form {
            width: 100%;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 10px;
            justify-content: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #1a005c;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: #333333;
            padding-bottom: 20px;
        }

        .submit-button {
            text-align: center;
            padding-top: 20px;
        }

        .container {
            padding-bottom: 50px;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group-checkbox {
            display: inline-block;
            margin-right: 10px;
        }

        .form-group-checkbox input[type="checkbox"],
        .form-group-checkbox label {
            display: inline-block;
            vertical-align: middle;
            color: #555555;
        }

        input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            font-size: 15px;
            font-family: 'Orbit', Arial, sans-serif;
            background-color: #1a005c;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 500px;
        }

        input[type="submit"]:hover {
            background-color: #380073;
        }

        .search-results {
            margin-top: 30px;
            padding: 20px;
            background-color: #333333;
            border-radius: 4px;
            grid-column: 1 / -1;
        }

        .search-results h3 {
            margin-top: 0;
            color: #ffffff;
        }

        .search-results p {
            margin-bottom: 10px;
            color: #ffffff;
        }

        .section-divider {
            border-bottom: 1px solid #dddddd;
            margin-bottom: 30px;
            padding-bottom: 60px;
        }

        .section-title {
            color: #333333;
            margin: 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #dddddd;
        }

        .button-holder {
            display: grid;
            grid-template-rows: auto;
            grid-gap: 20px;
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }

        .home-button-container {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .home-button {
            display: inline-block;
            padding: 5px;
            width: 50px;
            height: 50px;
            line-height: 0;
            font-size: 0;
            text-align: center;
            text-decoration: none;
            color: #1a005c;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .home-button:hover {
            background-color: white;
            color: #e0c48b;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Header content omitted for brevity -->
    </div>

    <div class="container">
        <header class="project-title">
            <h1>Student and School Analysis</h1>
            <div class="home-button-container">
            <img src="back.png" alt="Back Button" class="home-button" onclick="history.back();" />
            <img src="home.png" alt="Home Button" class="home-button" onclick="window.location.href='initial.php';">
        </div>
        </header>

        <h2 style="text-align: center;">Select an Option:</h2>

        <div class="button-holder">
            <form method="POST" action="student_analyzation.php">
                <p>Nested Aggregation:</p>
                <input type="submit" value="Average GPA of Schools With at least 2 Programs" name="nestedAggregation">
            </form>
            <form method="POST" action="student_analyzation.php">
                <p>Having Clause:</p>
                <input type="submit" value="Average GPA of Schools With at least 2 Students" name="groupStudents">
            </form>
            <form method="POST" action="student_analyzation.php">
                <p>Group By:</p>
                <input type="submit" value="Student Population Of All Schools" name="studentsGpa">
            </form>
            <form method="POST" action="student_analyzation.php">
                <p>Division:</p>
                <input type="submit" value="Schools Offering All Programs" name="csBioSchools">
            </form>
            <form method="POST" action="student_analyzation.php">
                <p>Join:</p>
                <h2>Student Post Record</h2>
                <label for="postType">Post Type (Article, Photo, etc.):</label>
                <input type="text" id="postType" name="postType" placeholder="Enter post type" style="margin-bottom: 20px">
                <input type="submit" value="Submit" name="insertSubmit">
            </form>
        </div>
    </div>
</body>
</html>


    <?php
    $success = True; //keep track of errors so it redirects the page only if there are no errors
    $db_conn = NULL; // edit the login credentials in connectToDB()
    $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

    function debugAlertMessage($message) {
        global $show_debug_alert_messages;

        if ($show_debug_alert_messages) {
            echo "<script type='text/javascript'>alert('" . $message . "');</script>";
        }
    }

    function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
        //echo "<br>running ".$cmdstr."<br>";
        global $db_conn, $success;

        $statement = OCIParse($db_conn, $cmdstr);
        //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

        if (!$statement) {
            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
            echo htmlentities($e['message']);
            $success = False;
        }

        $r = OCIExecute($statement, OCI_DEFAULT);
        if (!$r) {
            echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
            $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
            echo htmlentities($e['message']);
            $success = False;
        }

        return $statement;
    }

    function executeBoundSQL($cmdstr, $list) {
        /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
    In this case you don't need to create the statement several times. Bound variables cause a statement to only be
    parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
    See the sample code below for how this function is used */

        global $db_conn, $success;
        $statement = OCIParse($db_conn, $cmdstr);

        if (!$statement) {
            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($db_conn);
            echo htmlentities($e['message']);
            $success = False;
        }

        foreach ($list as $tuple) {
            foreach ($tuple as $bind => $val) {
                //echo $val;
                //echo "<br>".$bind."<br>";
                OCIBindByName($statement, $bind, $val);
                unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                echo htmlentities($e['message']);
                echo "<br>";
                $success = False;
            }
        }
    }

    function printResult($result) { //prints results from a select statement
        echo "<br>Retrieved data from table demoTable:<br>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]"
        }

        echo "</table>";
    }

    function connectToDB() {
        global $db_conn;

        // Your username is ora_(CWL_ID) and the password is a(student number). For example,
        // ora_platypus is the username and a12345678 is the password.
        $db_conn = OCILogon("ora_abdel200", "a41166349", "dbhost.students.cs.ubc.ca:1522/stu");

        if ($db_conn) {
            debugAlertMessage("Database is Connected");
            return true;
        } else {
            debugAlertMessage("Cannot connect to Database");
            $e = OCI_Error(); // For OCILogon errors pass no handle
            echo htmlentities($e['message']);
            return false;
        }
    }

    function disconnectFromDB() {
        global $db_conn;

        debugAlertMessage("Disconnect from Database");
        OCILogoff($db_conn);
    }

    function handleNestedRequest() {
        // Select year, gpa, and student_accountid from the Students table
        $results = executePlainSQL("
            SELECT AVG(st.gpa) AS average_gpa, sc.schoolID, sc.school_name
            FROM School sc
            JOIN Attends a ON sc.schoolID = a.schoolID
            JOIN Student st ON a.student_accountID = st.student_accountID
            GROUP BY sc.schoolID, sc.school_name
            HAVING 1 < (
            SELECT COUNT(*)
            FROM Has_Program p
            WHERE p.schoolID = sc.schoolID
        )
        
        ");

         // Display the results as a table grid
         echo "<div style='display: grid; grid-gap: 10px; padding-bottom:30px;'>";
         echo "<table style='border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto;'>"; 
         echo "<thead>";
         echo "<tr>";
         // Fetch and print the column names as table headers
         $columnNames = oci_num_fields($results);
         for ($i = 1; $i <= $columnNames; $i++) {
             echo "<th style='border: 2px solid black; padding: 10px; background-color: #f9f9f9; color: #1a005c;'>".oci_field_name($results, $i)."</th>";
         }
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";

         // Fetch and print the rows
         while ($row = oci_fetch_assoc($results)) {
             echo "<tr>";
             foreach ($row as $value) {
                 echo "<td style='border: 2px solid black; color: black; padding: 10px;'>".$value."</td>";
             }
             echo "</tr>";
         }

         echo "</tbody>";
         echo "</table>";
         echo "</div>";
    }


    function handleGroupStudentsRequest() {
        // Select year, gpa, and student_accountid from the Students table
        $results = executePlainSQL("
            SELECT AVG(st.gpa) AS average_gpa, sc.schoolID, sc.school_name
            FROM School sc
            JOIN Attends a ON sc.schoolID = a.schoolID
            JOIN Student st ON a.student_accountID = st.student_accountID
            GROUP BY sc.schoolID, sc.school_name
            HAVING 1 < Count(*)
        
        ");

         // Display the results as a table grid
         echo "<div style='display: grid; grid-gap: 10px;'>";
         echo "<table style='border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto; margin-bottom: 30px;'>"; 
         echo "<thead>";
         echo "<tr>";
         // Fetch and print the column names as table headers
         $columnNames = oci_num_fields($results);
         for ($i = 1; $i <= $columnNames; $i++) {
             echo "<th style='border: 2px solid black; padding: 10px; background-color: #f9f9f9; color: #1a005c; width: 80%;'>".oci_field_name($results, $i)."</th>";
         }
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";

         // Fetch and print the rows
         while ($row = oci_fetch_assoc($results)) {
             echo "<tr>";
             foreach ($row as $value) {
                 echo "<td style='border: 2px solid black; color: black; padding: 10px;'>".$value."</td>";
             }
             echo "</tr>";
         }

         echo "</tbody>";
         echo "</table>";
         echo "</div>";
    }

    function handleStudentsGpaRequest() {
        // Select year, gpa, and student_accountid from the Students table
        $results = executePlainSQL("
        SELECT sc.schoolID, sc.school_name, COUNT(st.student_accountID) AS population
        FROM School sc
        LEFT OUTER JOIN Attends a ON a.schoolID = sc.schoolID
        LEFT OUTER JOIN Student st ON st.student_accountID = a.student_accountID
        GROUP BY sc.schoolID, sc.school_name
        
        
        ");

         // Display the results as a table grid
         echo "<div style='display: grid; grid-gap: 10px;'>";
         echo "<table style='border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto; margin-bottom: 30px;'>"; 
         echo "<thead>";
         echo "<tr>";
         // Fetch and print the column names as table headers
         $columnNames = oci_num_fields($results);
         for ($i = 1; $i <= $columnNames; $i++) {
             echo "<th style='border: 2px solid black; padding: 10px; background-color: #f9f9f9; color: #1a005c;'>".oci_field_name($results, $i)."</th>";
         }
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";

         // Fetch and print the rows
         while ($row = oci_fetch_assoc($results)) {
             echo "<tr>";
             foreach ($row as $value) {
                 echo "<td style='border: 2px solid black; color: black; padding: 10px;'>".$value."</td>";
             }
             echo "</tr>";
         }

         echo "</tbody>";
         echo "</table>";
         echo "</div>";
    }

    function handlePostTypeRequest() {

        $postType = $_POST["postType"];
        // Handle the "Schools Offering Both Computer Science and Biology Programs" request
        // Join the necessary tables and find schools offering both programs
        
        // Select the schools offering both Computer Science and Biology programs
        if (!empty($postType)){
        $results = executePlainSQL("
        SELECT postID, post_text, student_accountID
        FROM Student s, Create_Post p
        WHERE p.accountID = s.student_accountID
        AND p.post_type = '$postType'
        ");
        } else {
            $results = executePlainSQL("
            SELECT postID, post_text, student_accountID
            FROM Student s, Create_Post p
            WHERE p.accountID = s.student_accountID
            ");
        }
    
        // Display the results as a table grid
        echo "<div style='display: grid; grid-gap: 10px;'>";
        echo "<table style='border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto; margin-bottom: 30px;'>"; 
        echo "<thead>";
        echo "<tr>";
        // Fetch and print the column names as table headers
        $columnNames = oci_num_fields($results);
        for ($i = 1; $i <= $columnNames; $i++) {
            echo "<th style='border: 2px solid black; padding: 10px; background-color: #f9f9f9; color: #1a005c;'>".oci_field_name($results, $i)."</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    
        // Fetch and print the rows
        while ($row = oci_fetch_assoc($results)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td style='border: 2px solid black; color: black; padding: 10px;'>".$value."</td>";
            }
            echo "</tr>";
        }
    
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
        
    

    function handleCsBioSchoolsRequest() {
        // Handle the "Schools Offering Both Computer Science and Biology Programs" request
        // Join the necessary tables and find schools offering both programs
        
        // Select the schools offering both Computer Science and Biology programs
        $results = executePlainSQL("
        SELECT sc.schoolID, sc.school_name
        FROM School sc
        WHERE NOT EXISTS (
            SELECT h.program_name
            FROM Has_Program h
            WHERE NOT EXISTS (
                SELECT h2.schoolID
                FROM Has_Program h2
                WHERE h2.schoolID = sc.schoolID AND h2.program_name = h.program_name
            )
        )
        
        ");
    
        // Display the results as a table grid
        echo "<div style='display: grid; grid-gap: 10px;'>";
        echo "<table style='border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto; margin-bottom: 30px;'>"; 
        echo "<thead>";
        echo "<tr>";
        // Fetch and print the column names as table headers
        $columnNames = oci_num_fields($results);
        for ($i = 1; $i <= $columnNames; $i++) {
            echo "<th style='border: 2px solid black; padding: 10px; background-color: #f9f9f9; color: #1a005c;'>".oci_field_name($results, $i)."</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    
        // Fetch and print the rows
        while ($row = oci_fetch_assoc($results)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td style='border: 2px solid black; color: black; padding: 10px;'>".$value."</td>";
            }
            echo "</tr>";
        }
    
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
    

    function handlePOSTRequest() {
        if (connectToDB()) {
            if (isset($_POST['nestedAggregation'])) {
                handleNestedRequest();
            } else if (isset($_POST['groupStudents'])) {
                handleGroupStudentsRequest();
            } else if (isset($_POST['studentsGpa'])) {
                handleStudentsGpaRequest();
            } else if (isset($_POST['postType'])) {
                handlePostTypeRequest();
            } else if (isset($_POST['csBioSchools'])) {
                handleCsBioSchoolsRequest();
            }

            

            disconnectFromDB();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        handlePOSTRequest();
    }
?>

</body>
</html>


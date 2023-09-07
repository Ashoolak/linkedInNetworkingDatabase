<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Networking Database Management</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbit&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Orbit', Arial, sans-serif;
            background-image: radial-gradient(circle farthest-corner at 1.3% 2.8%, rgba(239, 249, 249, 1) 0%, rgba(182, 199, 226, 1) 100.2%);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: #1a005c;
        }

        .header-title,
        .header-text {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }

        .project-title {
            font-size: 32px;
            color: #1a005c;
        }

        .choose-user-text {
            font-size: 22px;
            margin-bottom: 1rem;
            font-weight: bold;
            color: #1a005c;
        }

        .button-holder {
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 50px;
            width: 300px;
            height: 150px;
            font-size: 24px;
            text-align: center;
            text-decoration: none;
            background-color: #f2fcff;
            color: #1a005c;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: white;
            color: #e0c48b;
        }

        .reset-button {
            margin-top: 2rem;
        }

        .reset-button input[type="submit"] {
            display: inline-block;
            padding: 10px 30px;
            font-family: 'Orbit', Arial, sans-serif;
            font-size: 20px;
            background-color: #1a005c;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .reset-button input[type="submit"]:hover {
            background-color: #380073;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-title">CPSC 304 Project</div>
        <div class="header-text">Kevin Hu - Ashkan Yazdi Zadeh - Abdelrahman Ahmed</div>
    </div>

    <div class="container">
        <header class="project-title">
            <h1>Social Media Networking Database</h1>
        </header>

        <p class="choose-user-text">Select user type:</p>

        <div class="button-holder">
            <a href="student.php" class="button">Student</a>
            <a href="professional.php" class="button">Professional</a>
        </div>

        <div class="reset-button">
            <form method="POST" action="initial.php">
                <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
                <input type="submit" value="Reset" name="reset">
            </form>
        </div>
    </div>
</body>
</html>



    <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

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
            $db_conn = OCILogon("", "", "");

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



        function handleResetRequest() {
            global $db_conn;

            // Read the initialization SQL script
            $initializationScript = file_get_contents("initialization.sql");


            // Split the initialization script into separate commands
            $commands = explode(';', $initializationScript);

            // Execute each command separately
            foreach ($commands as $command) {
                if (!empty(trim($command))) {
                    executePlainSQL($command);
                    
                }
            }
            echo "SUCCESS";
            OCICommit($db_conn);
        }


        

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                }

                disconnectFromDB();
            }
        }


		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
            handlePOSTRequest();
        } 
		?>

</body>
</html>
<!-- hello -->
</body>
</html>

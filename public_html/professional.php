<!DOCTYPE html>
<html>
<head>
    <title>Social Networking Database Management</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbit&display=swap');

        /* Add your styles here */
        body {
            background-image: radial-gradient(circle farthest-corner at 1.3% 2.8%, rgba(239, 249, 249, 1) 0%, rgba(182, 199, 226, 1) 100.2%);
            margin: 0;
            padding: 0;
            font-family: 'Orbit', Arial, sans-serif;
            min-height: 130vh; /* Add this line */
        }

        header {
            padding: 50px;
            text-align: center;
            color: #fff;
        }

        h1 {
            margin: 0;
            font-size: 40px;
            color: #1a005c;
            font-family: 'Orbit', Arial, sans-serif;
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
            height: 70vh;
            color: #1a005c;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-left: auto;
            margin-right: auto;
            width: 60%;
            margin-top: 40px;
        }

        .button {
            display: inline-block;
            padding: 10px 30px;
            width: 200px;
            height: 40px;
            line-height: 105px;  /* add this line */
            font-size: 24px;     /* add this line */
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #f2fcff;
            color: #1a005c;
            border-radius: 50px;  /* increased from 4px to 50px for rounder corners */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s; /* add this line for smooth transition on hover */
            display: flex;  /* Added display flex */
            justify-content: center;  /* Center horizontally */
            align-items: center;  /* Center vertically */
            white-space: nowrap;
            margin-right: 20px;
        }

        .button:hover {
            background-color: white;
            color: #e0c48b;
        }


        .section-container {
            display: flex;
            justify-content: center;
            margin-top: 150px;
        }

        .section {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 10px;
            width: 33%;
        }

        input[type="text"] {
            padding: 10px;
            margin-top: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        }

        input[type="submit"]:hover {
            background-color: #380073;
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
    <header>
        <h1>Professional Dashboard</h1>
        <div class="home-button-container">
            <img src="back.png" alt="Back Button" class="home-button" onclick="history.back();" />
            <img src="home.png" alt="Home Button" class="home-button" onclick="window.location.href='initial.php';">
        </div>
        <div class="button-container">
            <a href="manage-professional-profile.php" class="button">Manage Profile</a>
            <a href="search.php" class="button">Search</a>
            <a href="student_analyzation.php" class="button">Analytics</a>
            <a href="post.php" class="button">Create Post</a>
        </div>
    </header>
    <div class="container">
        <div class="section-container">
            <div class="section">
                <h2>Join Community</h2>
                <form method="POST" action="professional.php"> 
                    <input type="hidden" id="insertJoinCommunity" name="insertJoinCommunity">
                    Account ID: <input type="text" name="accountID"> <br /><br />
                    Community Name: <input type="text" name="community_name"> <br /><br />
                    Date: <input type="date" name="join_date"> <br /><br />
                    <input type="submit" value="Join" name="insertSubmit"></p>
                </form>
            </div>
            <div class="section">
                <h2>Get Certificate</h2>
                <form method="POST" action="professional.php"> 
                    <input type="hidden" id="insertGetCertificate" name="insertGetCertificate">
                    Account ID: <input type="text" name="accountID"> <br /><br />
                    Certificate Name: <input type="text" name="certificate_name"> <br /><br />
                    Certificate Number: <input type="text" name="courseNum"> <br /><br />
                    Completion Date: <input type="date" name="completion_date"> <br /><br />
                    <input type="submit" value="Verify" name="insertSubmit"></p>
                </form>
            </div>
            <div class="section">
                <h2>Join a Company</h2>
                <form method="POST" action="professional.php"> 
                    <input type="hidden" id="insertJoinCompany" name="insertJoinCompany">
                    Account ID: <input type="text" name="professional_accountID"> <br /><br />
                    Role ID: <input type="text" name="roleID"> <br /><br />
                    Company Name: <input type="text" name="company_name"> <br /><br />
                    Company City: <input type="text" name="company_city"> <br /><br />
                    Start Date: <input type="date" name="start_date"> <br /><br />
                    <input type="submit" value="Enroll" name="insertSubmit"></p>
                </form>
            </div>
        </div>
    </div>
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
                } else {
                    echo "SUCCESS";
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
            $db_conn = OCILogon();

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

        function handleInsertJoinCompany() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":professional_accountID" => $_POST['professional_accountID'],
                ":roleID" => $_POST['roleID'],
                ":company_name" => $_POST['company_name'],
                ":company_city" => $_POST['company_city'],
                ":start_date" => $_POST['start_date'],
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("
				INSERT INTO Works (
					professional_accountID, 
					roleID, 
                    company_name,
					company_city, 
					start_day
				) 
				VALUES (
					:professional_accountID, 
					:roleID, 
                    :company_name,
					:company_city,
					:start_date)
				", 
			$alltuples);
            
            OCICommit($db_conn);
        }

        function handleInsertGetCertificate() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":certificate_name" => $_POST['certificate_name'],
                ":courseNum" => $_POST['courseNum'],
                ":accountID" => $_POST['accountID'],
                ":completion_date" => $_POST['completion_date'],
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("
				INSERT INTO Completes (
					certificate_name, 
					courseNum, 
					accountID, 
					completion_date
				) 
				VALUES (
					:certificate_name, 
					:courseNum, 
					:accountID,
					:completion_date)
				", 
			$alltuples);
            
            OCICommit($db_conn);
            
        }

        function handleInsertJoinCommunity() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":accountID" => $_POST['accountID'],
                ":community_name" => $_POST['community_name'],
                ":join_date" => $_POST['join_date'],
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("
				INSERT INTO Joins (
					accountID, 
					community_name, 
					join_date
				) 
				VALUES (
					:accountID,
					:community_name, 
					:join_date)
				", 
			$alltuples);
            
            OCICommit($db_conn);
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
    function handlePOSTRequest() {
        if (connectToDB()) {
            if (array_key_exists('insertJoinCommunity', $_POST)) {
                handleInsertJoinCommunity();
            } else if (array_key_exists('insertGetCertificate', $_POST)) {
                handleInsertGetCertificate();
            } else if (array_key_exists('insertJoinCompany', $_POST)) {
                handleInsertJoinCompany();
            }

            disconnectFromDB();
        }
    }

    if (isset($_POST['insertSubmit'])) {
        handlePOSTRequest();
    }
    ?>
    <!-- hello -->
</body>
</html>

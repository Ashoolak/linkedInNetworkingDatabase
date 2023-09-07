<!DOCTYPE html>
<html>
<head>
    <title>User Posts</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbit&display=swap');

        /* Add your styles here */
        body {
            background-image: radial-gradient(circle farthest-corner at 1.3% 2.8%, rgba(239, 249, 249, 1) 0%, rgba(182, 199, 226, 1) 100.2%);
            margin: 0;
            padding: 0;
            font-family: 'Orbit', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: auto; /* Changed to auto to fit the content */
            color: #1a005c;
        }

        form {
            display: flex;
            padding-bottom: 100px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 400px; /* Set the width of the form */
            max-width: 100%; /* Added to ensure responsiveness */
        }

        label {
            margin-top: 10px;
        }

        input[type="text"],
        textarea {
            padding: 10px;
            margin-top: 10px;
            width: 100%; /* Set the width of the input fields to 100% */
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px; /* Added margin-top for spacing */
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
        <h1>User Posts</h1>
        <div class="home-button-container">
            <img src="back.png" alt="Back Button" class="home-button" onclick="history.back();" />
            <img src="home.png" alt="Home Button" class="home-button" onclick="window.location.href='initial.php';">
        </div>
    </header>

    <div class="container">
        <form method="POST" action="post.php"> 
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            <label for="accountID">Account ID:</label>
            <input type="text" name="accountID">
            <label for="postID">Post ID:</label>
            <input type="text" name="postID">
            <label for="type">Post Type:</label>
            <input type="text" name="type">
            <label for="date">Date:</label>
            <input type="date" name="date">
            <label for="text">Text:</label>
            <textarea name="text" rows="5" cols="50"></textarea>
            <input type="submit" value="Post" name="insertSubmit">
        </form>
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
            } else {
                echo "SUCCESS";
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


        // QUERY FUNCTIONS START HERE

        function handleInsertRequest() {
            global $db_conn;
        
            // Getting the values from the user and inserting data into the table
            $tuple = array(
                ":bind1" => $_POST['date'],
                ":bind2" => $_POST['postID'],
                ":bind3" => $_POST['type'],
                ":bind4" => $_POST['text'],
                ":bind5" => $_POST['accountID'],
                
            );
        
            $alltuples = array($tuple);
        
            executeBoundSQL("INSERT INTO Create_Post(post_date, postID, post_type, post_text, accountID)
                VALUES (:bind1, :bind2, :bind3, :bind4, :bind5)", $alltuples);
            OCICommit($db_conn);
        }
        
        

        function handleUpdateRequest() {
            
        }

        function handleDeleteRequest() {
            
        }

        function handleResetRequest() {
            
        }


        function handleCountRequest() {
            
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    handleDeleteRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES!
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['deleteSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }
		?>
    <!-- hello -->
</body>
</html>
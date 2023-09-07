<!DOCTYPE html>
<html>
<head>
    <title>Social Networking Database Management</title>
    <style>
        /* Add your styles here */
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
            width: 50%;
            margin-top: 30px;
        }

        .button {
            display: inline-block;
            padding: 5px;
            width: 50px;
            height: 50px;
            line-height: 0;  /* set line-height to 0 */
            font-size: 0;     /* set font-size to 0 */
            text-align: center;
            text-decoration: none;
            background-color: #f2fcff;
            color: #1a005c;
            border-radius: 50%;  /* increased from 4px to 50% for a round shape */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s; /* add this line for smooth transition on hover */
        }

        .button:hover {
            background-color: white;
            color: #e0c48b;
        }

        .section-container {
            display: flex;
            justify-content: center;
            margin-top: 230px;
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

        input[type="text"] {
            padding: 10px;
            margin-top: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-row {
            display: flex;
        }

        .input-column {
            flex: 1;
            margin-right: 10px;
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
        <h1>Manage Professional Profile</h1>
        <div class="home-button-container">
            <img src="back.png" alt="Back Button" class="home-button" onclick="history.back();" />
            <img src="home.png" alt="Home Button" class="home-button" onclick="window.location.href='initial.php';">
        </div>
    </header>
        <div class="container">
            <div class="section-container">
            <div class="section">

        <h2>Create Account</h2>
        <form method="POST" action="manage-professional-profile.php"> 
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Account ID: <input type="text" name="accountID"> <br /><br />
            Name: <input type="text" name="name"> <br /><br />
            Email: <input type="text" name="email"> <br /><br />
            Phone: <input type="text" name="phone"> <br /><br />
            <div class="input-row">
                <input type="text" name="city" class="input-column" placeholder="City"> 
                <input type="text" name="province" class="input-column" placeholder="Province"> 
            </div>
            <input type="text" name="expertise" class="input-column" placeholder="Expertise" style="width: 100%;">

            
        
            <br /><br />
            <input type="submit" value="Create" name="insertSubmit">
        </form>

            </div>
            <div class="section">
                <h2>Update Account</h2>
                <form method="POST" action="manage-professional-profile.php"> 
                    <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                    Account ID: <input type="text" name="accountID"> <br /><br />
                    Name: <input type="text" name="name"> <br /><br />
                    Email: <input type="text" name="email"> <br /><br />
                    Phone: <input type="text" name="phone"> <br /><br />
                    <div class="input-row">
                        <input type="text" name="city" class="input-column" placeholder="City"> 
                        <input type="text" name="province" class="input-column" placeholder="Province"> 
                    </div>
                    <input type="text" name="expertise" class="input-column" placeholder="Expertise" style="width: 100%;">
                    <br /><br />
                    <input type="submit" value="Update" name="updateSubmit">
                </form>
                    </div>
            <div class="section">
                <h2>Delete Account</h2> 
                <form method="POST" action="manage-professional-profile.php"> 
                    <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
                    Account ID: <input type="text" name="accountID"> <br /><br />
                    <input type="submit" value="Delete Account" name="deleteSubmit"></p>
                </form>
            </div>
        </div>
    </div>

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
                ":bind1" => $_POST['accountID'],
                ":bind2" => $_POST['name'],
                ":bind3" => $_POST['email'],
                ":bind4" => $_POST['phone'],
                ":bind5" => $_POST['city'],
                ":bind6" => $_POST['province'],
                ":bind7" => $_POST['expertise']
            );
        
            $alltuples = array($tuple);
        
            executeBoundSQL("INSERT INTO Users(accountID, name, email, phone, city, province)
                VALUES (:bind1, :bind2, :bind3, :bind4, :bind5, :bind6)", $alltuples);

            executeBoundSQL("INSERT INTO Professional(professional_accountID, expertise)
            VALUES (:bind1, :bind7)", $alltuples);

            OCICommit($db_conn);
            echo "Insert: SUCCESS<br/>";
        }

        function handleUpdateRequest() {
            global $db_conn;
        
            $accountID = $_POST['accountID'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $expertise = $_POST['expertise'];
        
            // Update the Users table based on the provided account ID
            $updateQueryUsers = "UPDATE Users SET
                name = '$name',
                email = '$email',
                phone = '$phone',
                city = '$city',
                province = '$province'
                WHERE accountID = '$accountID'";
        
            // Update the Professional table based on the provided account ID
            $updateQueryProfessional = "UPDATE Professional SET
                expertise = '$expertise'
                WHERE professional_accountID = '$accountID'";
        
            // Execute update for Users
            $stmt = oci_parse($db_conn, $updateQueryUsers);
            oci_execute($stmt);
        
            // Execute update for Professional
            $stmt = oci_parse($db_conn, $updateQueryProfessional);
            oci_execute($stmt);
        
            OCICommit($db_conn);
            echo "Update: SUCCESS<br/>";
        }
        

        function handleDeleteRequest() {
            global $db_conn;
        
            // Getting the value from the user and deleting the corresponding account
            $accountID = $_POST['accountID'];
        
            $deleteQuery = "DELETE FROM Users WHERE accountID = :accountID";
        
            $stmt = oci_parse($db_conn, $deleteQuery);
            oci_bind_by_name($stmt, ":accountID", $accountID);
            oci_execute($stmt);
        
            OCICommit($db_conn);
            echo "Delete: SUCCESS<br/>";
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    handleDeleteRequest();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['deleteSubmit'])) {
            handlePOSTRequest();
        }
		?>
	</body>
</html>

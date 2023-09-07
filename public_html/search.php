<!DOCTYPE html>
<html>
<head>
    <title>Table Search</title>
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
            margin-bottom: 20px;
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
        }
        
        .submit-button {
            text-align: center;
        }

        .container {
            padding-bottom: 80px;
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
        }

        input[type="submit"]:hover {
            background-color: #380073;
        }

        .search-results {
            margin-top: 30px;
            padding: 20px;
            background-color: #333333;
            border-radius: 4px;
            grid-column: 1 / -1; /* Span both columns */
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
            padding-bottom: 20px;
        }

        .section-title {
            color: #333333;
            margin: 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #dddddd;
        }

        .form-column {
            display: grid;
            grid-template-rows: auto;
            grid-gap: 20px;
            max-width: 140vh;
            margin-left: auto;
            margin-right: auto;
            text-align:
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
    
    <h1>Table Search</h1>
    <div class="home-button-container">
            <img src="back.png" alt="Back Button" class="home-button" onclick="history.back();" />
            <img src="home.png" alt="Home Button" class="home-button" onclick="window.location.href='initial.php';">
        </div>
    <div class="container">
        <div class="form-column">
            <form method="POST">
                <div class="form-group">
                    <label for="usertype">User Type:</label>
                    <select id="usertype" name="usertype" required onchange="this.form.submit()">
                        <option value="">Select a table</option>
                        <option value="Has_Program"<?php if ($_POST['usertype'] == 'Has_Program') echo ' selected'; ?>>Programs</option>
                        <option value="School"<?php if ($_POST['usertype'] == 'School') echo ' selected'; ?>>Schools</option>
                        <option value="Attends"<?php if ($_POST['usertype'] == 'Attends') echo ' selected'; ?>>School Attendances</option>
                        <option value="Student"<?php if ($_POST['usertype'] == 'Student') echo ' selected'; ?>>Students</option>
                        <option value="Professional"<?php if ($_POST['usertype'] == 'Professional') echo ' selected'; ?>>Professionals</option>
                        <option value="Users"<?php if ($_POST['usertype'] == 'Users') echo ' selected'; ?>>Users</option>
                        <option value="Create_Post"<?php if ($_POST['usertype'] == 'Create_Post') echo ' selected'; ?>>Created Posts</option>
                        <option value="Includes"<?php if ($_POST['usertype'] == 'Includes') echo ' selected'; ?>>Hashtags in Posts</option>
                        <option value="Hashtag"<?php if ($_POST['usertype'] == 'Hashtag') echo ' selected'; ?>>Hashtags</option>
                        <option value="Joins"<?php if ($_POST['usertype'] == 'Joins') echo ' selected'; ?>>Community Memberships</option>
                        <option value="Community"<?php if ($_POST['usertype'] == 'Community') echo ' selected'; ?>>Communities</option>
                        <option value="Connected_To"<?php if ($_POST['usertype'] == 'Connected_To') echo ' selected'; ?>>Connections</option>
                        <option value="Completes"<?php if ($_POST['usertype'] == 'Completes') echo ' selected'; ?>>Certification Completions</option>
                        <option value="Certification"<?php if ($_POST['usertype'] == 'Certification') echo ' selected'; ?>>Certifications</option>
                        <option value="Gives"<?php if ($_POST['usertype'] == 'Gives') echo ' selected'; ?>>Awarded Certifications</option>
                        <option value="Works"<?php if ($_POST['usertype'] == 'Works') echo ' selected'; ?>>Employment Record</option>
                        <option value="Has_Role"<?php if ($_POST['usertype'] == 'Has_Role') echo ' selected'; ?>>Roles</option>
                        <option value="Company"<?php if ($_POST['usertype'] == 'Company') echo ' selected'; ?>>Companies</option>
                        <option value="Location"<?php if ($_POST['usertype'] == 'Location') echo ' selected'; ?>>Locations</option>

                    </select>
                </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $table = $_POST['usertype'];

            $whereClause = '';
            switch ($table) {
                case 'Has_Program':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $whereClause = ''; // Initialize the $whereClause variable
                        

                    if (!empty($_POST['schoolID'])) {
                        $schoolID = $_POST['schoolID'];
                        $whereClause .= "schoolID = $schoolID AND ";
                    }

                    if (!empty($_POST['faculty'])) {
                        $faculty = $_POST['faculty'];
                        $whereClause .= "faculty = '$faculty' AND ";
                    }

                    if (!empty($_POST['program_name'])) {
                        $program_name = $_POST['program_name'];
                        $whereClause .= "program_name = '$program_name' AND ";
                    }

                    

                   

                    
                    $whereClause = rtrim($whereClause, ' AND ');

                
                }
                    ?>
                    <div id="hasprogram-fields" class="form-group">
                        <div class="form-group">
                            <label for="program_name">Program_Name:</label>
                            <input type="text" id="program_name" name="program_name" placeholder="Enter program_name">
                        </div>
                        <div class="form-group">
                            <label for="faculty">Faculty:</label>
                            <input type="text" id="faculty" name="faculty" placeholder="Enter faculty">
                        </div>
                        <div class="form-group">
                            <label for="schoolID">School ID:</label>
                            <input type="text" id="schoolID" name="schoolID" placeholder="Enter schoolID">
                        </div>
                    </div>
                    
                    <?php
                    break;                            
                case 'School':

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $whereClause = ''; // Initialize the $whereClause variable
                        

                    if (!empty($_POST['schoolID'])) {
                        $schoolID = $_POST['schoolID'];
                        $whereClause .= "schoolID = $schoolID AND ";
                    }

                    if (!empty($_POST['school_name'])) {
                        $school_name = $_POST['school_name'];
                        $whereClause .= "school_name = '$school_name' AND ";
                    }

                    if (!empty($_POST['school_city'])) {
                        $school_city = $_POST['school_city'];
                        $whereClause .= "school_city = '$school_city' AND ";
                    }

                    if (!empty($_POST['school_province'])) {
                        $school_province = $_POST['school_province'];
                        $whereClause .= "school_province = '$school_province' AND ";
                    }

                   

                    
                    $whereClause = rtrim($whereClause, ' AND ');

                
                }
                    ?>
                    <div id="school-fields" class="form-group">
                        <div class="form-group">
                            <label for="schoolID">School ID:</label>
                            <input type="text" id="schoolID" name="schoolID" placeholder="Enter schoolID">
                        </div>
                        <div class="form-group">
                            <label for="school_name">School Name:</label>
                            <input type="text" id="school_name" name="school_name" placeholder="Enter school_name">
                        </div>
                        <div class="form-group">
                            <label for="school_city">School City:</label>
                            <input type="text" id="school_city" name="school_city" placeholder="Enter school_city">
                        </div>
                        <div class="form-group">
                            <label for="school_province">School Province:</label>
                            <input type="text" id="school_province" name="school_province" placeholder="Enter school_province">
                        </div>
                        
                    </div>
                    
                    
                    <?php
                    break;
                    
                    case 'Attends':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $whereClause = ''; // Initialize the $whereClause variable
                            

                        if (!empty($_POST['schoolID'])) {
                            $schoolID = $_POST['schoolID'];
                            $whereClause .= "schoolID = $schoolID AND ";
                        }

                        if (!empty($_POST['faculty'])) {
                            $faculty = $_POST['faculty'];
                            $whereClause .= "faculty = '$faculty' AND ";
                        }

                        if (!empty($_POST['start_day'])) {
                            $start_day = $_POST['start_day'];
                            $whereClause .= "start_day = '$start_day' AND ";
                        }

                        if (!empty($_POST['program_name'])) {
                            $program_name = $_POST['program_name'];
                            $whereClause .= "program_name = '$program_name' AND ";
                        }

                        if (!empty($_POST['student_accountID'])) {
                            $student_accountID = $_POST['student_accountID'];
                            $whereClause .= "student_accountID = $student_accountID AND ";
                        }

                        
                        $whereClause = rtrim($whereClause, ' AND ');
                    
                    }
                        ?>
                        <div id="attends-fields" class="form-group">
                            <div class="form-group">
                                <label for="schoolID">School ID:</label>
                                <input type="text" id="schoolID" name="schoolID" placeholder="Enter schoolID">
                            </div>
                            <div class="form-group">
                                <label for="faculty">Faculty:</label>
                                <input type="text" id="faculty" name="faculty" placeholder="Enter faculty">
                            </div>
                            <div class="form-group">
                                <label for="start_day">Start_Day:</label>
                                <input type="text" id="start_day" name="start_day" placeholder="Enter start_day">
                            </div>
                            <div class="form-group">
                                <label for="program_name">Program Name:</label>
                                <input type="text" id="program_name" name="program_name" placeholder="Enter program_name">
                            </div>
                            <div class="form-group">
                                <label for="student_accountID">Student Account ID:</label>
                                <input type="text" id="student_accountID" name="student_accountID" placeholder="Enter student accountID">
                            </div>
                        </div>
                        
                        <?php
                        break;
                        case 'Student':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                

                            if (!empty($_POST['GPA'])) {
                                $GPA = $_POST['GPA'];
                                $whereClause .= "GPA = $GPA AND ";
                            }

                            if (!empty($_POST['year'])) {
                                $year = $_POST['year'];
                                $whereClause .= "year = $year AND ";
                            }

                            if (!empty($_POST['student_accountID'])) {
                                $student_accountID = $_POST['student_accountID'];
                                $whereClause .= "student_accountID = $student_accountID AND ";
                            }

                            
                            $whereClause = rtrim($whereClause, ' AND ');

                        
                        }

                            ?>
                            <div id="student-fields" class="form-group">
                                <div class="form-group">
                                    <label for="GPA">GPA:</label>
                                    <input type="text" id="GPA" name="GPA" placeholder="Enter GPA">
                                </div>
                                <div class="form-group">
                                    <label for="year">Year:</label>
                                    <input type="text" id="year" name="year" placeholder="Enter year">
                                </div>
                                <div class="form-group">
                                    <label for="student_accountID">Student Account ID:</label>
                                    <input type="text" id="student_accountID" name="student_accountID" placeholder="Enter student_accountID">
                                </div>

                                

                            </div>
                           
                            <?php
                            break;
                            
                
                        case 'Professional':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                

                            if (!empty($_POST['expertise'])) {
                                $expertise = $_POST['expertise'];
                                $whereClause .= "expertise = '$expertise' AND ";
                            }

                            if (!empty($_POST['professional_accountID'])) {
                                $professional_accountID = $_POST['professional_accountID'];
                                $whereClause .= "professional_accountID = $professional_accountID AND ";
                            }

                            
                            $whereClause = rtrim($whereClause, ' AND ');

                        
                        }
                            ?>
                            <div id="professional-fields" class="form-group">
                                <div class="form-group">
                                    <label for="expertise">Expertise:</label>
                                    <input type="text" id="expertise" name="expertise" placeholder="Enter expertise">
                                </div>
                                <div class="form-group">
                                    <label for="professional_accountID">Professional Account ID:</label>
                                    <input type="text" id="professional_accountID" name="professional_accountID" placeholder="Enter professional_accountID">
                                </div>
                            </div>
                        
                            
                            <?php
                            break;                
                        case 'Users':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                

                            if (!empty($_POST['name'])) {
                                $name = $_POST['name'];
                                $whereClause .= "name = '$name' AND ";
                            }

                            if (!empty($_POST['accountID'])) {
                                $accountID = $_POST['accountID'];
                                $whereClause .= "accountID = $accountID AND ";
                            }

                            if (!empty($_POST['email'])) {
                                $email = $_POST['email'];
                                $whereClause .= "email = '$email' AND ";
                            }

                            if (!empty($_POST['phone'])) {
                                $phone = $_POST['phone'];
                                $whereClause .= "phone = '$phone' AND ";
                            }

                            if (!empty($_POST['city'])) {
                                $city = $_POST['city'];
                                $whereClause .= "city = '$city' AND ";
                            }

                            if (!empty($_POST['province'])) {
                                $province = $_POST['province'];
                                $whereClause .= "province = '$province' AND ";
                            }

                            $whereClause = rtrim($whereClause, ' AND ');

                        
                        }
                            ?>
                            <div id="user-fields" class="form-group">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="accountID">Account ID:</label>
                                <input type="text" id="accountID" name="accountID" placeholder="Enter accountID">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" id="phone" name="phone" placeholder="Enter phone">
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" id="city" name="city" placeholder="Enter city">
                            </div>
                            <div class="form-group">
                                <label for="province">Province:</label>
                                <input type="text" id="province" name="province" placeholder="Enter province">
                            </div>
                            </div>

                            
                            <?php

                            break;
                        case 'Create_Post':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                

                            if (!empty($_POST['date'])) {
                                $date = $_POST['date'];
                                $whereClause .= "post_date = '$date' AND ";
                            }

                            if (!empty($_POST['postID'])) {
                                $postID = $_POST['postID'];
                                $whereClause .= "postID = $postID AND ";
                            }

                            if (!empty($_POST['type'])) {
                                $type = $_POST['type'];
                                $whereClause .= "post_type = '$type' AND ";
                            }

                            if (!empty($_POST['post_text'])) {
                                $post_text = $_POST['post_text'];
                                $whereClause .= "post_text = '$post_text' AND ";
                            }

                            if (!empty($_POST['accountID'])) {
                                $accountID = $_POST['accountID'];
                                $whereClause .= "accountID = $accountID AND ";
                            }

                            $whereClause = rtrim($whereClause, ' AND ');

                        
                        }
                            ?>
                            <div id="createpost-fields" class="form-group">
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="text" id="date" name="date" placeholder="Enter date (yyyy/mm/dd)">
                                </div>
                                <div class="form-group">
                                    <label for="postID">Post ID:</label>
                                    <input type="text" id="postID" name="postID" placeholder="Enter postID">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type:</label>
                                    <input type="text" id="type" name="type" placeholder="Enter type">
                                </div>
                                <div class="form-group">
                                    <label for="post_text">Text:</label>
                                    <input type="text" id="post_text" name="post_text" placeholder="Enter post_text">
                                </div>
                                <div class="form-group">
                                    <label for="accountID">Account ID:</label>
                                    <input type="text" id="accountID" name="accountID" placeholder="Enter accountID">
                                </div>
                                
                            </div>
                            
                            <?php
                            break;

                        
                        case 'Includes':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                

                            if (!empty($_POST['label'])) {
                                $label = $_POST['label'];
                                $whereClause .= "label = '$label' AND ";
                            }

                            if (!empty($_POST['postID'])) {
                                $postID = $_POST['postID'];
                                $whereClause .= "postID = $postID AND ";
                            }

                            $whereClause = rtrim($whereClause, ' AND ');

                        
                        }
                        
                    


                            ?>
                            <div id="includes-fields" class="form-group">
                                <div class="form-group">
                                    <label for="postID">Post ID:</label>
                                    <input type="text" id="postID" name="postID" placeholder="Enter postID">
                                </div>
                                <div class="form-group">
                                    <label for="label">Label:</label>
                                    <input type="text" id="label" name="label" placeholder="Enter label">
                                </div>
                            </div>

                           
                            <?php
                            break;

                        case 'Hashtag':

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                
        
                                if (!empty($_POST['label'])) {
                                    $label = $_POST['label'];
                                    $whereClause .= "label = '$label' AND ";
                                }

                                if (!empty($_POST['usageNum'])) {
                                    $usageNum = $_POST['usageNum'];
                                    $whereClause .= "usageNum = '$usageNum' AND ";
                                }

                        
                        
                                
                                $whereClause = rtrim($whereClause, ' AND ');

                        
                            }
                            ?>
                            <div id="hashtag-fields" class="form-group">
                                <div class="form-group">
                                    <label for="label">Label:</label>
                                    <input type="text" id="label" name="label" placeholder="Enter label">
                                </div>
                                <div class="form-group">
                                    <label for="usageNum">Usage Number:</label>
                                    <input type="text" id="usageNum" name="usageNum" placeholder="Enter usageNum">
                                </div>
                            </div>

                            
                            <?php
                            break;
    
                        case 'Joins':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                
        
                                if (!empty($_POST['accountID'])) {
                                    $accountID = $_POST['accountID'];
                                    $whereClause .= "accountID = '$accountID' AND ";
                                }

                                if (!empty($_POST['community_name'])) {
                                    $community_name = $_POST['community_name'];
                                    $whereClause .= "community_name = '$community_name' AND ";
                                }

                                if (!empty($_POST['date'])) {
                                    $date = $_POST['date'];
                                    $whereClause .= "join_date = '$date' AND ";
                                }
                        
                                
                                $whereClause = rtrim($whereClause, ' AND ');

                        
                            }
                            ?>
                            <div id="joins-fields" class="form-group">
                                <div class="form-group">
                                    <label for="community_name">Community Name:</label>
                                    <input type="text" id="community_name" name="community_name" placeholder="Enter community_name">
                                </div>
                                <div class="form-group">
                                    <label for="accountID">Account ID:</label>
                                    <input type="text" id="accountID" name="accountID" placeholder="Enter accountID">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="text" id="date" name="date" placeholder="Enter date (yyyy/mm/dd)">
                                </div>
                            </div>

                            
                            <?php
                            break;
        
                        case 'Community':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                
        
                                if (!empty($_POST['community_name'])) {
                                    $community_name = $_POST['community_name'];
                                    $whereClause .= "community_name = '$community_name' AND ";
                                }

                                if (!empty($_POST['date'])) {
                                    $dateCreated = $_POST['date'];
                                    $whereClause .= "dateCreated = '$dateCreated' AND ";
                                }
                        
                                
                                $whereClause = rtrim($whereClause, ' AND ');

                        
                            }
                            ?>
                            <div id="community-fields" class="form-group">
                                <div class="form-group">
                                    <label for="community_name">Community Name:</label>
                                    <input type="text" id="community_name" name="community_name" placeholder="Enter community_name">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="text" id="date" name="date" placeholder="Enter dateCreated (yyyy/mm/dd)">
                                </div>
                            </div>
                            
                            
                            <?php
                            break;
            
                        case 'Connected_To':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                
        
                                if (!empty($_POST['accountID1'])) {
                                    $accountID1 = $_POST['accountID1'];
                                    $whereClause .= "accountID1 = $accountID1 AND ";
                                }

                                if (!empty($_POST['accountID2'])) {
                                    $accountID2 = $_POST['accountID2'];
                                    $whereClause .= "accountID2 = $accountID2 AND ";
                                }
                        
                                
                                $whereClause = rtrim($whereClause, ' AND ');

                        
                            }
                            ?>
                            <div id="connectedto-fields" class="form-group">
                                <div class="form-group">
                                    <label for="accountID1">Account ID 1:</label>
                                    <input type="text" id="accountID1" name="accountID1" placeholder="Enter accountID1">
                                </div>
                                <div class="form-group">
                                    <label for="accountID2">Account ID 2:</label>
                                    <input type="text" id="accountID2" name="accountID2" placeholder="Enter accountID2">
                                </div>
                            </div>
                            
                            <?php
                            break;
                
                        case 'Completes':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                
                                if (!empty($_POST['course_number'])) {
                                    $Course_Num = $_POST['course_number'];
                        
                                    $whereClause .= "courseNum = $Course_Num AND ";
                                }
                        
                                if (!empty($_POST['date'])) {
                                    $date = $_POST['date'];
                                    $whereClause .= "completion_date = '$date' AND ";
                                }
                        
                                if (!empty($_POST['accountID'])) {
                                    $accountID = $_POST['accountID'];
                                    $whereClause .= "accountID = $accountID AND ";
                                }
                        
                                if (!empty($_POST['certification_name'])) {
                                    $certification_name = $_POST['certification_name'];
                                    $whereClause .= "certificate_name = '$certification_name' AND ";
                                }
                        
                                $whereClause = rtrim($whereClause, ' AND ');

                        
                            }
                            ?>
                            <div id="completes-fields" class="form-group">
                                <div class="form-group">
                                    <label for="certification_name">Certification Name:</label>
                                    <input type="text" id="certification_name" name="certification_name" placeholder="Enter certification_name">
                                </div>
                                <div class="form-group">
                                    <label for="accountID">Account ID:</label>
                                    <input type="text" id="accountID" name="accountID" placeholder="Enter accountID">
                                </div>
                                <div class="form-group">
                                    <label for="course_number">Course Number:</label>
                                    <input type="text" id="course_number" name="course_number" placeholder="Enter courseNum">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="text" id="date" name="date" placeholder="Enter completion_date">
                                </div>
                            </div>

                            
                            <?php
                            break;
                    
                        case 'Certification':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable

                                if (!empty($_POST['Course_Num'])) {
                                    $Course_Num = $_POST['Course_Num'];
                        
                                    $whereClause .= "courseNum = $Course_Num AND ";
                                }
                        
                                if (!empty($_POST['name'])) {
                                    $certification_name = $_POST['name'];
                                    $whereClause .= "certificate_name = '$certification_name' AND ";
                                }
                        
                                $whereClause = rtrim($whereClause, ' AND ');

                        
                            }
                            ?>
                            <div class="form-group">
                                        <label for="Course_Num">Course Number (course_Num):</label>
                                        <input type="text" id="Course_Num" name="Course_Num" placeholder="Enter Course_Num">
                                    </div>
                            <div id="certification-fields" class="form-group">
                                <div class="form-group">
                                    <label for="name">Name (certificate_name):</label>
                                    <input type="text" id="name" name="name" placeholder="Enter certificate_name">
                                </div>
                                
                            </div>
                            
                            <?php
                            break;
                            
                
                        case 'Gives':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $whereClause = ''; // Initialize the $whereClause variable
                                
                                if (!empty($_POST['Course_Num'])) {
                                    $Course_Num = $_POST['Course_Num'];
                        
                                    $whereClause .= "courseNum = $Course_Num AND ";
                                }
                        
                                if (!empty($_POST['city'])) {
                                    $city = $_POST['city'];
                                    $whereClause .= "company_city = '$city' AND ";
                                }
                        
                                if (!empty($_POST['company_name'])) {
                                    $company_name = $_POST['company_name'];
                                    $whereClause .= "company_name = '$company_name' AND ";
                                }
                        
                                if (!empty($_POST['certification_name'])) {
                                    $certification_name = $_POST['certification_name'];
                                    $whereClause .= "certificate_name = '$certification_name' AND ";
                                }
                        
                                $whereClause = rtrim($whereClause, ' AND ');

                        
                            }
                                ?>
                                <div id="gives-fields" class="form-group">
                                    
                                    <div class="form-group">
                                        <label for="Course_Num">Course Number (course_Num):</label>
                                        <input type="text" id="Course_Num" name="Course_Num" placeholder="Enter Course_Num">
                                    </div>
                                    <div class="form-group">
                                        <label for="certification_name">Certification Name (certificate_name):</label>
                                        <input type="text" id="certification_name" name="certification_name" placeholder="Enter certification_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_name">Company Name (company_name):</label>
                                        <input type="text" id="company_name" name="company_name" placeholder="Enter company_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City (company_city):</label>
                                        <input type="text" id="city" name="city" placeholder="Enter city">
                                    </div>
                                    
                                </div>
                                
                                <?php
                                break;

                                case 'Location':
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        $whereClause = ''; // Initialize the $whereClause variable
                                        
                                        if (!empty($_POST['City'])) {
                                            $City = $_POST['City'];
                                
                                            $whereClause .= "City = '$City' AND ";
                                        }
                                
                                        if (!empty($_POST['Province'])) {
                                            $Province = $_POST['Province'];
                                            $whereClause .= "Province = '$Province' AND ";
                                        }
                                
                                        if (!empty($_POST['Country'])) {
                                            $Country = $_POST['Country'];
                                            $whereClause .= "Country = '$Country' AND ";
                                        }
                                
                                        
                                
                                        $whereClause = rtrim($whereClause, ' AND ');
        
                            
                                    }
                                        ?>
                                        <div id="gives-fields" class="form-group">
                                            
                                            <div class="form-group">
                                                <label for="City">City:</label>
                                                <input type="text" id="City" name="City" placeholder="Enter City">
                                            </div>
                                            <div class="form-group">
                                                <label for="Province">Province:</label>
                                                <input type="text" id="Province" name="Province" placeholder="Enter Province">
                                            </div>
                                            <div class="form-group">
                                                <label for="Country">Country:</label>
                                                <input type="text" id="Country" name="Country" placeholder="Enter Country">
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        <?php
                                        break;
                                    
                                
                            
                        
                                case 'Works':
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        $whereClause = ''; // Initialize the $whereClause variable
                                        
                                        if (!empty($_POST['role_id'])) {
                                            $roleid = intval($_POST['role_id']);
                                            
                                            $whereClause .= "roleID = $roleid AND ";
                                        }
                                
                                        if (!empty($_POST['company_city'])) {
                                            $city = $_POST['company_city'];
                                            $whereClause .= "company_city = '$city' AND ";
                                        }
                                
                                        if (!empty($_POST['company_name'])) {
                                            $company_name = $_POST['company_name'];
                                            $whereClause .= "company_name = '$company_name' AND ";
                                        }
                                
                                        if (!empty($_POST['accountID'])) {
                                            $accountID = $_POST['accountID'];
                                            $whereClause .= "professional_accountID = $accountID AND ";
                                        }
                                
                                        $whereClause = rtrim($whereClause, ' AND ');

                                
                                    }
                                    ?>
                                    <div id="works-fields" class="form-group">
                                        <div class="form-group">
                                            <label for="company_name">Company Name:</label>
                                            <input type="text" id="company_name" name="company_name" placeholder="Enter company_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="role_id">Role ID:</label>
                                            <input type="text" id="role_id" name="role_id" placeholder="Enter roleID">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_city">Company City:</label>
                                            <input type="text" id="company_city" name="company_city" placeholder="Enter company_city">
                                        </div>
                                        <div class="form-group">
                                            <label for="accountID">Account ID:</label>
                                            <input type="text" id="accountID" name="accountID" placeholder="Enter accountID">
                                        </div>

                                    </div>
                                    
                                    <?php
                                    $attributes = 'company_name, role_id, company_city, accountID';
                                    break;
                                
                            
                                case 'Has_Role':
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        $whereClause = ''; // Initialize the $whereClause variable
                                        
                                        if (!empty($_POST['role_id'])) {
                                            $roleid = intval($_POST['role_id']);
                                            $whereClause .= "roleID = $roleid AND ";
                                        }
                                
                                        if (!empty($_POST['company_city'])) {
                                            $city = $_POST['company_city'];
                                            $whereClause .= "company_city = '$city' AND ";
                                        }
                                
                                        if (!empty($_POST['company_name'])) {
                                            $company_name = $_POST['company_name'];
                                            $whereClause .= "company_name = '$company_name' AND ";
                                        }
                                
                                        if (!empty($_POST['salary'])) {
                                            $salary = $_POST['salary'];
                                            $whereClause .= "salary = '$salary' AND ";
                                        }
                                
                                        if (!empty($_POST['title'])) {
                                            $title = $_POST['title'];
                                            $whereClause .= "title = '$title' AND ";
                                        }

                                        $whereClause = rtrim($whereClause, ' AND ');

                                
                                    }

                                    echo "$whereClause";
                                    ?>
                                    <div id="hasrole-fields" class="form-group">
                                        <div class="form-group">
                                            <label for="role_id">Role ID:</label>
                                            <input type="text" id="role_id" name="role_id" placeholder="Enter role ID">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_name">Company Name:</label>
                                            <input type="text" id="company_name" name="company_name" placeholder="Enter company name">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_city">Company City:</label>
                                            <input type="text" id="company_city" name="company_city" placeholder="Enter company city">
                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary:</label>
                                            <input type="text" id="salary" name="salary" placeholder="Enter salary">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" id="title" name="title" placeholder="Enter title">
                                        </div>
                                    </div>
                                    

                                            <?php
                                            
                                        break;
                                    
                                        
                                case 'Company':

                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                            if (!empty($_POST['name'])) {
                                                $name = $_POST['name'];
                                                $whereClause .= "company_name = '$name' AND";
                                            }

                                            if (!empty($_POST['city'])) {
                                                $city = $_POST['city'];
                                                $whereClause .= "company_city = '$city' AND";
                                            }
                                        }

                                        echo "$whereClause";


                                    ?>
                                    <div id="company-fields" class="form-group">
                                        <div class="form-group">
                                            <label for="name">name:</label>
                                            <input type="text" id="name" name="name" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City:</label>
                                            <input type="text" id="city" name="city" placeholder="Enter city">
                                        </div>
                                    
                                    <?php

                                    break;             
                                            }
                                        }
                                            ?>

                                        <form method="post">
                                        <div class="form-group">
                                            <label for="searchRequest">Enter Attributes:</label>
                                            <input type="text" id="searchRequest" name="searchRequest" placeholder="Enter attributes separated by commas">
                                        </div>
                                        <div class="submit-button">
                                            <input type="submit" value="Submit" name="insertSubmit">
                                        </div>
                                        </form>

                                            <?php
                                            $success = true; // Keep track of errors so it redirects the page only if there are no errors
                                            $db_conn = null; // Edit the login credentials in connectToDB()
                                            $show_debug_alert_messages = false; // Set to true if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())
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
                                                else {
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

                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                if (isset($_POST['searchRequest'])) {
                                                    $attributes = $_POST['searchRequest'];
                                                    $table = $_POST['usertype'];

                                            // Connect to the database
                                            connectToDB();

                                            // Run a query based on the table and attributes
                                            
                                            $whereClause = rtrim("$whereClause", 'AND');
                                            
                                            if (!empty($table)) {
                                                if (!empty($attributes)) {
                                                    $query = "SELECT $attributes FROM $table";
                                                
                                                    if (!empty($whereClause)) {
                                                        $query .= " WHERE $whereClause";
                                                    }
                                                } else {
                                                    $query = "SELECT * FROM $table";
                                                
                                                    if (!empty($whereClause)) {
                                                        $query .= " WHERE $whereClause";
                                                    }
                                                }
                                        }
                                            

                                            $results = executePlainSQL($query, $bindVars);

                                            // Display the results as a table grid
                                            echo "<div style='display: grid; grid-gap: 10px;'>";
                                            echo "<table style='border-collapse: collapse; width: 100%;'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                            // Fetch and print the column names as table headers
                                            $columnNames = oci_num_fields($results);
                                            for ($i = 1; $i <= $columnNames; $i++) {
                                                echo "<th style='border: 2px solid #1a005c; padding: 10px; background-color: #f9f9f9; color: #1a005c;'>".oci_field_name($results, $i)."</th>";
                                            }
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";

                                            // Fetch and print the rows
                                            while ($row = oci_fetch_assoc($results)) {
                                                echo "<tr>";
                                                foreach ($row as $value) {
                                                    echo "<td style='border: 2px solid #1a005c; color: black; padding: 10px;'>".$value."</td>";
                                                }
                                                echo "</tr>";
                                            }

                                            echo "</tbody>";
                                            echo "</table>";
                                            echo "</div>";


                                            // Disconnect from the database
                                            disconnectFromDB();    }
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
                         
                            ?>

                            </div>
                            </div>
                     
                        </body>
                        </html>
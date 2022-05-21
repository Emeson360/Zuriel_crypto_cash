<?php 

// Starting the session, necessary for using session variables.
session_start();

// Declaring and hosting the variables
$errors = array();

// DB connection
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "zuriel_db";

$con = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);

// check connection
if (!$con) {
    die("connection failed: " . mysqli_connect_error());
}

echo "connection successful";
echo "<br>";

// Registration validation
if (isset($_POST['reg_user'])) {
	// COLLECT VALUES OF THE INPUT FIELDS
	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname  = mysqli_real_escape_string($con, $_POST['lastname']);
	$username = mysqli_real_escape_string($con, $_POST['username']); 
	$email = mysqli_real_escape_string($con, $_POST['email']); 
	$phone = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$country = mysqli_real_escape_string($con, $_POST['country']);

    if(empty($firstname)) {
        array_push($errors, "Firstname is required");
    }
    if(empty($lastname)) {
        array_push($errors, "Lastname is required");
    }
    else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname) || !preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
            array_push($errors, "Only letters and white spaces are allowed in the name field");
        }
    }
    if(empty($username)) {
        array_push($errors, "Username is required");
    }
    if(empty($email)) {
        array_push($errors, "Email is required");
    }
    else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format");
        }
    }
    if(empty($phone)) {
        array_push($errors, "Phone-number is required");
    }
    if(empty($password)) {
        array_push($errors, "Password is required");
    }
    else {
        if (empty($cpassword)) {
            array_push($errors, "Confirm password is required");
        }
        else {
            if ($password != $cpassword) {
                array_push($errors, "Password not matched");
            }
            if (strlen($password) < 6 || strlen($password) > 21) {
                array_push($errors, "Password must be greater than 6 and less than 21!");
                echo "<br>";
                echo "pass not upto 6";
            }
            if (!preg_match('`[A-Z]`', $password)) {
                array_push($errors, "Password must contain atleast one uppercase!");
            }
            if (!preg_match('`[a-z]`', $password)) {
                array_push($errors, "Password must contain atleast one lowercase!");
            }
            if (!preg_match('`[0-9]`', $password)) {
                array_push($errors, "Password must contain atleast one number!");
            }
        }
        
    }
    if(empty($country)) {
        array_push($errors, "Country is required");
    }

    // if the form is error free
    if (count($errors) == 0) {
        // save to database
        $sql = "INSERT INTO registration (firstname, lastname, username, email, phone,  password, cpassword, country) values ('$firstname', '$lastname', '$username', '$email', '$phone', '$password', '$cpassword', '$country')";

        if (mysqli_query($con, $sql)) {

            // echo "New record created successfully";
            // echo "<br>";
            header('location: login.php');
        }
        else {
            echo "error: " . $query . "<br>" . mysqli_error($con);
            echo "<br>";
        }

    }
	
}

//  User login
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    // Error for empty input field
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // if form is free from errors
    if (count($errors) == 0) {
        // Read from the Database
        $sql = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($con, $sql);

        // check if user data is in the Database
        if (mysqli_num_rows($result) == 1) {
            // store username in the session variable
            $_SESSION['username'] = $username;

            // Message
            $_SESSION['success'] = "You have logged in successfully!!!";

            // Redirect to index
            header('location: Zuriel_Dashboard/dark/index.html');
        }
        else {
            // Username or password not matched
            array_push($errors, "incorrect username or password");
        }

    }
}


?>
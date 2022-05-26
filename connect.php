<?php 

// Starting the session, necessary for using session variables.
session_start();

// Declaring and hosting the variables
$errors = array();

// DB connection
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "zuriel_db";

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// check connection
if (!$con) {
    die("connection failed: " . mysqli_connect_error());
}

// echo "connection successful";
// echo "<br>";


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

        $checkemail = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $checkemail);

        if (mysqli_num_rows($result) > 0) {
            // Taken - thus unavailable
            array_push($errors, "Email already exist! please try another email");
        }
        else {

            // save to database
            $query = "INSERT INTO users (firstname, lastname, username, email, phone,  password, cpassword, country, usertype) values ('$firstname', '$lastname', '$username', '$email', '$phone', '$password', '$cpassword', '$country', 'user')";

            mysqli_query($con, $query);
            $_SESSION['status']  = "New user successfully created!!";
            header('location: login.php');

        }
	}
    
}


	


//  User login
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    // Error for empty input field
    if (empty($email)) {
        array_push($errors, "Email is required");
        // $_SESSION['status'] = "Email is required";
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
        // $_SESSION['status'] = "Password is required";
    }

    // if form is free from errors
    if (count($errors) == 0) {
        // Read from the Database
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

        $result = mysqli_query($con, $query);

        // check if user data is in the Database
        if (mysqli_num_rows($result) == 1) {
            // check if user is admin or user
           
            $logged_in_user = mysqli_fetch_assoc($result);

            foreach ($result as $row) {
                if ($logged_in_user['usertype'] == 'admin') {

                    $_SESSION['user'] = $logged_in_user;
    
                    // store username in the session variable
                    // $_SESSION['username'] = $username;
    
                    // Redirect to index
                    header('location: dashboard/admin/index.php');
    
                }
                else{
                    $_SESSION['user'] = $logged_in_user;
    
                    // store username in the session variable
                    // $_SESSION['username'] = $username;
    
                    header('location: dashboard/user/index.php');
                }

            }
            
        }
        else {
            // Username or password not matched
            array_push($errors, "incorrect username or password");
        }

    }  
}

// Registration by admin

if (isset($_POST['check_Emailbtn'])) {

    $email = $_POST['email'];

    $checkemail = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $checkemail);

    if (mysqli_num_rows($result) > 0) {
       echo "Email id already taken.!";
    }

    else {
        echo "Email is avaliable";
    }
}

if (isset($_POST['add_user'])) {
	// COLLECT VALUES OF THE INPUT FIELDS
	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname  = mysqli_real_escape_string($con, $_POST['lastname']);
	$username = mysqli_real_escape_string($con, $_POST['username']); 
	$email = mysqli_real_escape_string($con, $_POST['email']); 
	$phone = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
	$country = mysqli_real_escape_string($con, $_POST['country']);
    


    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($phone) || empty($password) || empty($cpassword) || empty($usertype) || empty($country)) {
        $_SESSION['status'] = "Fill in all empty field(s)";
        header("location: dashboard/admin/registered_users.php");
    }
    elseif ($password != $cpassword) {
        $_SESSION['status'] = "password not matched";
        header("location: dashboard/admin/registered_users.php");
    }
    else {
        if (isset($_POST['usertype'])) {
        

            $checkemail = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($con, $checkemail);

            if (mysqli_num_rows($result) > 0) {
                // Taken - thus unavailable
                $_SESSION['status'] = "Email already exist! please try another email";

                header('location: ./dashboard/admin/registered_users.php');
            }

            else {
                // save to database
                $query = "INSERT INTO users (firstname, lastname, username, email, phone,  password, cpassword, country, usertype) values ('$firstname', '$lastname', '$username', '$email', '$phone', '$password', '$cpassword', '$country', '$usertype')";

                $result = mysqli_query($con, $query);
        
                if ($result) {                           
                    $_SESSION['status'] = "New user successfully added.";
            
                    header('location: ./dashboard/admin/registered_users.php');
                }
                else {
                    $_SESSION['status'] = "User registration failed.";
                    header('location: ./dashboard/admin/registered_users.php');
                    
                }
            }
        }
        else {
            $checkemail = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($con, $checkemail);

            if (mysqli_num_rows($result) > 0) {
                // Taken - thus unavailable
                $_SESSION['status'] = "Email already exist! please try another email";

                header('location: ./dashboard/admin/registered_users.php');
            }
            else {
                $query = "INSERT INTO users (firstname, lastname, username, email, phone,  password, cpassword, country, usertype) values ('$firstname', '$lastname', '$username', '$email', '$phone', '$password', '$cpassword', '$country', 'user')";
        
                $result = mysqli_query($con, $query);
        
                if ($result) {
                    $_SESSION['status'] = "New user successfully added.";
            
                    header('location: ./dashboard/admin/registered_users.php');
                }
                else {
                    $_SESSION['status'] = "User registration failed.";
                    header('location: ./dashboard/admin/registered_users.php');
                    
                }
            }			
        }
    
    }
    

}

// Edit user
if (isset($_POST['update_user'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname  = mysqli_real_escape_string($con, $_POST['lastname']);
	$username = mysqli_real_escape_string($con, $_POST['username']); 
	$email = mysqli_real_escape_string($con, $_POST['email']); 
	$phone = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$usertype = mysqli_real_escape_string($con, $_POST['usertype']);
	$country = mysqli_real_escape_string($con, $_POST['country']);


    $checkemail = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $checkemail);

    if (mysqli_num_rows($result) > 0) {
        // Taken - thus unavailable
        $_SESSION['status'] = "Email already exist! please try another email";

        header('location: ./dashboard/admin/registered_users.php');
    }
    else {

        $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', phone = '$phone', password = '$password', cpassword = '$cpassword', usertype = '$usertype', country = '$country' WHERE id = $id";

        $result = mysqli_query($con, $query);

        if ($result) {

            $_SESSION['status'] = "User updated successfully";

            header('location: ./dashboard/admin/registered_users.php');
        }
        else {
            $_SESSION['status'] = "User update failed";
            header('location: ./dashboard/admin/registered_users.php');
            
        }

    }

}


// Delete user
if (isset($_POST['deleteUserBtn'])) {
    $userid = $_POST['deleteId'];

    $query = "DELETE FROM users WHERE id = '$userid'";
    $result = mysqli_query($con, $query);

    if ($result) {

        $_SESSION['status'] = "User deleted successfully";

        header('location: ./dashboard/admin/registered_users.php');
    }
    else {
        $_SESSION['status'] = "User delete failed";
        header('location: ./dashboard/admin/registered_users.php');
        
    }
}



// return user array from their id
// function getUserById($id){
// 	global $con;
// 	$query = "SELECT * FROM users WHERE id=" . $id;
// 	$result = mysqli_query($con, $query);

// 	$user = mysqli_fetch_assoc($result);
// 	return $user;
// }


// check if user is logged in
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// Destroy the session and logout user
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../../login.php");
}

// check if user is an admin
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


?>
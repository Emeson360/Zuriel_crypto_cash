<?php 

// Starting the session, necessary for using session variables.
session_start();

// Declaring and hosting the variables
$errors = array();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$username = mysqli_real_escape_string($con, $_POST['username']); 
	$email = mysqli_real_escape_string($con, $_POST['email']); 
	$phone = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$country = mysqli_real_escape_string($con, $_POST['country']);

 


    if(empty($name)) {
        array_push($errors, "Name is required");
    }
    else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name) ) {
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
            $query = "INSERT INTO users (name, username, email, phone,  password, cpassword, country, usertype) values ('$name', '$username', '$email', '$phone', '$password', '$cpassword', '$country', 'user')";

            mysqli_query($con, $query);
            $_SESSION['reg']  = "Registration successfull !!!";

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
        if (mysqli_num_rows($result)  > 0) {
            // check if user is admin or user
           
            $logged_in_user = mysqli_fetch_assoc($result);

            foreach ($result as $row) {
                if ($logged_in_user['usertype'] == 'admin') {

                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['login'] = "Welcome " . $_SESSION['user']['username'];
    
                    // Redirect to index
                    header('location: dashboard/admin/index.php');
    
                }
                else{
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['login'] = "Welcome " . $_SESSION['user']['username'];
    
                    header('location: dashboard/user/index.php');
                }

            }
            
        }
        else {
            // Username or password not matched
            array_push($errors, "incorrect email or password");
        }

    }  
}


// check if if email is available or not
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

// Registration by admin

if (isset($_POST['add_user'])) {
	// COLLECT VALUES OF THE INPUT FIELDS
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$username = mysqli_real_escape_string($con, $_POST['username']); 
	$email = mysqli_real_escape_string($con, $_POST['email']); 
	$phone = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
	$country = mysqli_real_escape_string($con, $_POST['country']);
    


    if(empty($name) || empty($username) || empty($email) || empty($phone) || empty($password) || empty($cpassword) || empty($usertype) || empty($country)) {
        $_SESSION['status'] = "Fill in all empty field(s)";
        header("location: dashboard/admin/manage_users.php");
    }
    elseif ($password != $cpassword) {
        $_SESSION['status'] = "password not matched";
        header("location: dashboard/admin/manage_users.php");
    }
    else {
        if (isset($_POST['usertype'])) {
        

            $checkemail = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($con, $checkemail);

            if (mysqli_num_rows($result) > 0) {
                // Taken - thus unavailable
                $_SESSION['status'] = "Email already exist! please try another email";

                header('location: ./dashboard/admin/manage_users.php');
            }

            else {
                // save to database
                $query = "INSERT INTO users (name, username, email, phone,  password, cpassword, country, usertype) values ('$name', '$username', '$email', '$phone', '$password', '$cpassword', '$country', '$usertype')";

                $result = mysqli_query($con, $query);
        
                if ($result) {                           
                    $_SESSION['status'] = "New user successfully added.";
            
                    header('location: ./dashboard/admin/manage_users.php');
                }
                else {
                    $_SESSION['status'] = "User registration failed.";
                    header('location: ./dashboard/admin/manage_users.php');
                    
                }
            }
        }
        else {
            $checkemail = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($con, $checkemail);

            if (mysqli_num_rows($result) > 0) {
                // Taken - thus unavailable
                $_SESSION['status'] = "Email already exist! please try another email";

                header('location: ./dashboard/admin/manage_users.php');
            }
            else {
                $query = "INSERT INTO users (name, username, email, phone,  password, cpassword, country, usertype) values ('$name', '$username', '$email', '$phone', '$password', '$cpassword', '$country', 'user')";
        
                $result = mysqli_query($con, $query);
        
                if ($result) {
                    $_SESSION['status'] = "New user successfully added.";
            
                    header('location: ./dashboard/admin/manage_users.php');
                }
                else {
                    $_SESSION['status'] = "User registration failed.";
                    header('location: ./dashboard/admin/manage_users.php');
                    
                }
            }			
        }
    
    }
    

}

// Edit user by Admin
if (isset($_POST['update_user'])) {
    $id = trim($_POST['id'], " ");
    $name = trim($_POST['name'], " ");
	$username = trim($_POST['username'], " "); 
	$email = trim($_POST['email'], " "); 
	$phone = trim($_POST['phonenumber'], " ");
	$password = trim($_POST['password'], " ");
	$cpassword = trim($_POST['cpassword'], " ");
    $address = trim($_POST['address'], " ");
	$country = trim($_POST['country'], " ");
    $usertype = trim($_POST['usertype'], " ");


    $query = "UPDATE users SET name = '$name', username = '$username', email = '$email', phone = '$phone', password = '$password', cpassword = '$cpassword', address = '$address', country = '$country', usertype = '$usertype' WHERE id = $id";

    $result = mysqli_query($con, $query);

    if ($result) {

        $_SESSION['status'] = "User updated successfully";

        header('location: ./dashboard/admin/manage_users.php');
    }
    else {
        $_SESSION['status'] = "User update failed";
        header('location: ./dashboard/admin/manage_users.php');
        
    }


}


// Delete user by admin
if (isset($_POST['deleteUserBtn'])) {
    $id = $_POST['deleteId'];

    $query = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {

        $_SESSION['status'] = "User deleted successfully";

        header('location: ./dashboard/admin/manage_users.php');
    }
    else {
        $_SESSION['status'] = "User delete failed";
        header('location: ./dashboard/admin/manage_users.php');
        
    }
}



// Update User Account by user
if (isset($_POST['update_profile'])) {
    $id = trim($_POST['id'], " ");
    $name = trim($_POST['name'], " ");
	$username = trim($_POST['username'], " "); 
	$email = trim($_POST['email'], " "); 
	$phone = trim($_POST['phonenumber'], " ");
	$password = trim($_POST['password'], " ");
	$cpassword = trim($_POST['cpassword'], " ");
    $address = trim($_POST['address'], " ");
	$country = trim($_POST['country'], " ");

    // check if image is selected
    if (isset($_FILES['profile_pics']['name'])) {
        // To upload, we need image name, source path and destination path
        $profile_pics_name = $_FILES['profile_pics']['name'];

        // Auto rename image
        $ext = end(explode('.', $profile_pics_name));

        $profile_pics_name = "pic_" . rand(0000, 9999) . '.' . $ext;
        $source_path = $_FILES['profile_pics']['tmp_name'];
        $destination_path = "dashboard/assets/images/users/".$profile_pics_name;

        // upload the image
        $upload = move_uploaded_file($source_path, $destination_path);

        // check if image is uploaded
        if ($upload == false) {
            $profile_pics_name = "";
           
        }
    }
    else {
        $profile_pics_name = "";
    }



    $query = "UPDATE users SET name = '$name', username = '$username', email = '$email', phone = '$phone', password = '$password', cpassword = '$cpassword', profile_pics = '$profile_pics_name', address = '$address', country = '$country' WHERE id = $id";

    $result = mysqli_query($con, $query);

    if ($result) {

        $_SESSION['status'] = "Account updated successfully";

        header('location: ./dashboard/user/update_account.php');
    }
    else {
        $_SESSION['status'] = "Account update failed";
        header('location: ./dashboard/user/update_account.php');
        
    }

}



// Add btc wallet
if (isset($_POST['add_btc_wallet'])) {
    $id = $_SESSION['user']['id'];
    $btc_wallet_address = trim($_POST['btc_wallet_address']);
      

    $query = "INSERT INTO btc_wallet (id, btc_wallet_address) values ('$id','$btc_wallet_address')";

    $result = mysqli_query($con, $query);
        
    if ($result) {                           
        $_SESSION['status'] = "BTC wallet successfully added.";

        header('location: ./dashboard/user/add_wallet.php');
    }
    else {
        $_SESSION['status'] = "Addition of BTC wallet failed.";
        header('location: ./dashboard/user/add_wallet.php');
        
    }
}

// Add Eth wallet

if (isset($_POST['add_eth_wallet'])) {
    $id = $_SESSION['user']['id'];
    $eth_wallet_address = trim($_POST['eth_wallet_address']);

    $query = "INSERT INTO eth_wallet (id, eth_wallet_address) values ('$id','$eth_wallet_address')";

    $result = mysqli_query($con, $query);
        
    if ($result) {                           
        $_SESSION['status'] = "ETH wallet successfully added.";

        header('location: ./dashboard/user/add_wallet.php');
    }
    else {
        $_SESSION['status'] = "Addition of ETH wallet failed.";
        header('location: ./dashboard/user/add_wallet.php');
        
    }
}


// Add Usdt wallet

if (isset($_POST['add_usdt_wallet'])) {
    $id = $_SESSION['user']['id'];
    $usdt_wallet_address = trim($_POST['usdt_wallet_address']);

    $query = "INSERT INTO usdt_wallet (id, usdt_wallet_address) values ('$id','$usdt_wallet_address')";

    $result = mysqli_query($con, $query);
        
    if ($result) {                           
        $_SESSION['status'] = "USDT wallet successfully added.";

        header('location: ./dashboard/user/add_wallet.php');
    }
    else {
        $_SESSION['status'] = "Addition of USDT wallet failed.";
        header('location: ./dashboard/user/add_wallet.php');
        
    }
}


// Add Busd wallet

if (isset($_POST['add_busd_wallet'])) {
    $id = $_SESSION['user']['id'];
    $busd_wallet_address = trim($_POST['busd_wallet_address']);
    // $usdt_wallet = trim($_POST['usdt_wallet']);
    // $busd_wallet = trim($_POST['busd_wallet']);
   

    $query = "INSERT INTO busd_wallet (id, busd_wallet_address) values ('$id','$busd_wallet_address')";

    $result = mysqli_query($con, $query);
        
    if ($result) {                           
        $_SESSION['status'] = "BUSD wallet successfully added.";

        header('location: ./dashboard/user/add_wallet.php');
    }
    else {
        $_SESSION['status'] = "Addition of BUSD wallet failed.";
        header('location: ./dashboard/user/add_wallet.php');
        
    }
}









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
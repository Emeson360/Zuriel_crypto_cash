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
$dbname = "zuriel";

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
            // $_SESSION['reg']  = "Registration successfull !!!";

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
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
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
    $userid = trim($_POST['userid'], " ");
    $name = trim($_POST['name'], " ");
	$username = trim($_POST['username'], " "); 
	$email = trim($_POST['email'], " "); 
	$phone = trim($_POST['phonenumber'], " ");
	$password = trim($_POST['password'], " ");
	$cpassword = trim($_POST['cpassword'], " ");
    $address = trim($_POST['address'], " ");
	$country = trim($_POST['country'], " ");
    $usertype = trim($_POST['usertype'], " ");


    $query = "UPDATE users SET name = '$name', username = '$username', email = '$email', phone = '$phone', password = '$password', cpassword = '$cpassword', address = '$address', country = '$country', usertype = '$usertype' WHERE userid = $userid";

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
    $userid = $_POST['userid'];

    $query = "DELETE FROM users WHERE userid = '$userid'";
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

// Add admin btc wallet
if (isset($_POST['add_admin_btc_wallet'])) {
    $admin_btc_wallet_address = trim($_POST['admin_btc_wallet_address']);

    
    if (!empty($admin_btc_wallet_address)) {
        $query = "UPDATE admin_btc_wallet SET admin_btc_wallet_address = '$admin_btc_wallet_address'";

        $result = mysqli_query($con, $query);
            
        if ($result) {                           
            $_SESSION['status'] = "BTC wallet successfully updated.";

            header('location: ./dashboard/admin/add_wallet.php');
        }
        else {
            $_SESSION['status'] = "Update of BTC wallet failed.";
            header('location: ./dashboard/admin/add_wallet.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
    }

    
}

// Add admin eth wallet
if (isset($_POST['add_admin_eth_wallet'])) {
    $admin_eth_wallet_address = trim($_POST['admin_eth_wallet_address']);
    
    if (!empty($admin_eth_wallet_address)) {
        $query = "UPDATE admin_eth_wallet SET admin_eth_wallet_address = '$admin_eth_wallet_address'";
        
        $result = mysqli_query($con, $query);
            
        if ($result) {                           
            $_SESSION['status'] = "ETH wallet successfully updated.";

            header('location: ./dashboard/admin/add_wallet.php');
        }
        else {
            $_SESSION['status'] = "Update of ETH wallet failed.";
            header('location: ./dashboard/admin/add_wallet.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
    }

    
}

// Add admin usdt wallet
if (isset($_POST['add_admin_usdt_wallet'])) {
    $admin_usdt_wallet_address = trim($_POST['admin_usdt_wallet_address']);
    
    if (!empty($admin_usdt_wallet_address)) {
        $query = "UPDATE admin_usdt_wallet SET admin_usdt_wallet_address = '$admin_usdt_wallet_address'";
        
        $result = mysqli_query($con, $query);
            
        if ($result) {                           
            $_SESSION['status'] = "USDT wallet successfully updated.";

            header('location: ./dashboard/admin/add_wallet.php');
        }
        else {
            $_SESSION['status'] = "Update of USDT wallet failed.";
            header('location: ./dashboard/admin/add_wallet.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
    }

    
}

// Add admin busd wallet
if (isset($_POST['add_admin_busd_wallet'])) {
    $admin_busd_wallet_address = trim($_POST['admin_busd_wallet_address']);
    
    if (!empty($admin_busd_wallet_address)) {
        $query = "UPDATE admin_busd_wallet SET admin_busd_wallet_address = '$admin_busd_wallet_address'";
        
        $result = mysqli_query($con, $query);
            
        if ($result) {                           
            $_SESSION['status'] = "BUSD wallet successfully updated.";

            header('location: ./dashboard/admin/add_wallet.php');
        }
        else {
            $_SESSION['status'] = "Update of BUSD wallet failed.";
            header('location: ./dashboard/admin/add_wallet.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
    }

    
}

// Approve deposite by admin
if (isset($_POST['approve'])) {
    
    $userid = $_POST['userid'];

    $query_deposit = "SELECT * FROM deposit WHERE userid = $userid ORDER BY deposit_id ASC";

    $result = mysqli_query($con, $query_deposit);
    if (mysqli_num_rows($result) > 0) {
        foreach($result as $row) {
           
        }
        $amt_deposited = $row['amt_deposited'];

        $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            foreach($result as $row) {
           
            }
            $new_balance = $row['total_balance'] + $amt_deposited;
            $query = "UPDATE wallet_balance SET total_balance = '$new_balance' WHERE userid = $userid";

            $result = mysqli_query($con, $query);
            if ($result) {
                $query = "UPDATE deposit SET status = 'confirmed' WHERE userid = $userid";
                $result = mysqli_query($con, $query);
                
                $_SESSION['status'] = "Approval of $$amt_deposited successful";
                header('location: ./dashboard/admin/users_deposit.php');
    
            }
            else {
                $_SESSION['status'] = "Approval failed";
                header('location: ./dashboard/admin/users_deposit.php');
            }
           
        }
        else {
            $query = "INSERT INTO wallet_balance (userid, total_balance) VALUE ('$userid', '$amt_deposited')";

            $result = mysqli_query($con, $query);
            if ($result) {
                $query = "UPDATE deposit SET status = 'confirmed' WHERE userid = $userid";
                $result = mysqli_query($con, $query);

                $_SESSION['status'] = "Approval of $$amt_deposited successful";
                header('location: ./dashboard/admin/users_deposit.php');

            }
            else {
                $_SESSION['status'] = "Approval failed";
                header('location: ./dashboard/admin/users_deposit.php');
            }
        }

        
    }
    
}







// Update User Account by user
if (isset($_POST['update_profile'])) {

    $userid = trim($_POST['userid'], " ");
    $name = trim($_POST['name'], " ");
	$username = trim($_POST['username'], " "); 
	$email = trim($_POST['email'], " "); 
	$phone = trim($_POST['phone'], " ");
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



    $query = "UPDATE users SET name = '$name', username = '$username', email = '$email', phone = '$phone', password = '$password', cpassword = '$cpassword', profile_pics = '$profile_pics_name', address = '$address', country = '$country' WHERE userid = $userid";

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
    $userid = $_SESSION['user']['userid'];
    $btc_wallet_address = trim($_POST['btc_wallet_address']);
    
    if (!empty($btc_wallet_address)) {
        $check_wallet = "SELECT btc_wallet_address FROM btc_wallet WHERE userid = '$userid'";
        $result = mysqli_query($con, $check_wallet);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "BTC wallet already added, instead update your wallet address.";

            header('location: ./dashboard/user/wallet_details.php');
        }

        else {
            $query = "INSERT INTO btc_wallet (userid, btc_wallet_address) values ('$userid','$btc_wallet_address')";

            $result = mysqli_query($con, $query);
                
            if ($result) {                           
                $_SESSION['status'] = "BTC wallet successfully added.";

                header('location: ./dashboard/user/add_wallet.php');
            }
            else {
                $_SESSION['status'] = "Addition of BTC wallet failed. Note: you can't add btc wallet twice, rather go and update it From your profile";
                header('location: ./dashboard/user/add_wallet.php');
                
            }
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
        header('location: ./dashboard/user/add_wallet.php');
    }

    
}

// Add Eth wallet
if (isset($_POST['add_eth_wallet'])) {
    $userid = $_SESSION['user']['userid'];
    $eth_wallet_address = trim($_POST['eth_wallet_address']);

    if (!empty($eth_wallet_address)) {
        $check_wallet = "SELECT eth_wallet_address FROM eth_wallet WHERE userid = '$userid'";
        $result = mysqli_query($con, $check_wallet);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "ETH wallet already added, instead update your wallet address.";
            header('location: ./dashboard/user/wallet_details.php');
        }
        else {
            $query = "INSERT INTO eth_wallet (userid, eth_wallet_address) values ('$userid','$eth_wallet_address')";

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

    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
        header('location: ./dashboard/user/add_wallet.php');
    }
}

// Add Usdt wallet
if (isset($_POST['add_usdt_wallet'])) {
    $userid = $_SESSION['user']['userid'];
    $usdt_wallet_address = trim($_POST['usdt_wallet_address']);

    if (!empty($usdt_wallet_address)) {
        $check_wallet = "SELECT usdt_wallet_address FROM usdt_wallet WHERE userid = '$userid'";
        $result = mysqli_query($con, $check_wallet);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "USDT wallet already added, instead update your wallet address.";
            header('location: ./dashboard/user/wallet_details.php');
        }
        else {
            $query = "INSERT INTO usdt_wallet (userid, usdt_wallet_address) values ('$userid','$usdt_wallet_address')";

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
    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
        header('location: ./dashboard/user/add_wallet.php');
    }
    
}

// Add Busd wallet
if (isset($_POST['add_busd_wallet'])) {
    $userid = $_SESSION['user']['userid'];
    $busd_wallet_address = trim($_POST['busd_wallet_address']);
   
    if (!empty($busd_wallet_address)) {
        $check_wallet = "SELECT busd_wallet_address FROM busd_wallet WHERE userid = '$userid'";
        $result = mysqli_query($con, $check_wallet);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "BUSD wallet already added, instead update your wallet address.";
            header('location: ./dashboard/user/wallet_details.php');
        }
        else {
            $query = "INSERT INTO busd_wallet (userid, busd_wallet_address) values ('$userid','$busd_wallet_address')";

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
    }
    else {
        $_SESSION['status'] = "Please Enter your wallet address";
        header('location: ./dashboard/user/add_wallet.php');
    }
}


// Edit btc wallet address
if (isset($_POST['edit_btc_wallet'])) {
    $userid = $_SESSION['user']['userid'];
    $btc_wallet_address = mysqli_real_escape_string($con, $_POST['btc_wallet_address']);

    if (!empty($btc_wallet_address)) {
        $query = "UPDATE btc_wallet SET btc_wallet_address = '$btc_wallet_address' WHERE userid = $userid";

        $result = mysqli_query($con, $query);
    
        if ($result) {
    
            $_SESSION['status'] = "Btc wallet updated successfully";
    
            header('location: ./dashboard/user/wallet_details.php');
        }
        else {
            $_SESSION['status'] = "Btc wallet update failed";
            header('location: ./dashboard/user/wallet_details.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your address";
        header('location: ./dashboard/user/wallet_details.php');
    }


}

// Edit eth wallet address
if (isset($_POST['edit_eth_wallet'])) {
    $userid = $_SESSION['user']['userid'];
    $eth_wallet_address = mysqli_real_escape_string($con, $_POST['eth_wallet_address']);

    if (!empty($eth_wallet_address)) {
        $query = "UPDATE eth_wallet SET eth_wallet_address = '$eth_wallet_address' WHERE userid = $userid";

        $result = mysqli_query($con, $query);
    
        if ($result) {
    
            $_SESSION['status'] = "Eth wallet updated successfully";
    
            header('location: ./dashboard/user/wallet_details.php');
        }
        else {
            $_SESSION['status'] = "Eth wallet update failed";
            header('location: ./dashboard/user/wallet_details.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your address";
        header('location: ./dashboard/user/wallet_details.php');
    }


}

// Edit usdt wallet address
if (isset($_POST['edit_usdt_wallet'])) {
    $userid = $_SESSION['user']['userid'];
    $usdt_wallet_address = mysqli_real_escape_string($con, $_POST['usdt_wallet_address']);

    if (!empty($usdt_wallet_address)) {
        $query = "UPDATE usdt_wallet SET usdt_wallet_address = '$usdt_wallet_address' WHERE userid = $userid";

        $result = mysqli_query($con, $query);
    
        if ($result) {
    
            $_SESSION['status'] = "Usdt wallet updated successfully";
    
            header('location: ./dashboard/user/wallet_details.php');
        }
        else {
            $_SESSION['status'] = "Usdt wallet update failed";
            header('location: ./dashboard/user/wallet_details.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your address";
        header('location: ./dashboard/user/wallet_details.php');
    }


}

// Edit busd wallet address
if (isset($_POST['edit_busd_wallet'])) {
    $userid = $_SESSION['user']['userid'];
    $busd_wallet_address = mysqli_real_escape_string($con, $_POST['busd_wallet_address']);

    if (!empty($busd_wallet_address)) {
        $query = "UPDATE busd_wallet SET busd_wallet_address = '$busd_wallet_address' WHERE userid = $userid";

        $result = mysqli_query($con, $query);
    
        if ($result) {
    
            $_SESSION['status'] = "Busd wallet updated successfully";
    
            header('location: ./dashboard/user/wallet_details.php');
        }
        else {
            $_SESSION['status'] = "Busd wallet update failed";
            header('location: ./dashboard/user/wallet_details.php');
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter your address";
        header('location: ./dashboard/user/wallet_details.php');
    }


}



// get amt deposited
if (isset($_POST['next'])) {
    $userid = $_SESSION['user']['userid'];
    $amt_deposited = mysqli_real_escape_string($con, $_POST['amt_deposited']);
    if(empty($amt_deposited)) {
        $_SESSION['status'] = "Enter deposit amount";
        header('location: dashboard/user/make_deposit.php');
    }
    else {
        $_SESSION['amt_deposited'] = $amt_deposited;
        $transaction_reference = uniqid();
        $_SESSION['transaction_reference'] = $transaction_reference;
        header('location: dashboard/user/copy_wallet_address.php');
    }
    
}
// ACTUAL DEPOSIT
if (isset($_POST['paid'])) {
    $userid = $_SESSION['user']['userid'];
    $amt_deposited = $_SESSION['amt_deposited'];
    $transaction_reference = $_SESSION['transaction_reference'];
    if (!empty($_POST['certify'])) {
        $check_deposit = "SELECT * FROM deposit WHERE userid = $userid ORDER BY deposit_id ASC";
        $result = mysqli_query($con, $check_deposit);
        if (mysqli_num_rows($result) > 0) {
            foreach($result as $row) {
                
            }
            if ($row['status'] == 'pending') {
                $prev_amt_deposited = $row['amt_deposited'];
                $new_amt_deposited = $prev_amt_deposited + $amt_deposited;
                $update_deposit = "UPDATE deposit SET amt_deposited = '$new_amt_deposited', transaction_reference = '$transaction_reference' WHERE userid = $userid";
                $result = mysqli_query($con, $update_deposit);
                if ($result) {
                    $_SESSION['status'] = "Deposit of $$amt_deposited successful";
                    header('location: ./dashboard/user/index.php');
                }
                else {
                    $_SESSION['status'] = "Deposit failed";
                    header('location: ./dashboard/user/index.php');
                }
            }
            else {
                $query_for_confirmed = "INSERT INTO deposit (userid, amt_deposited, transaction_reference) VALUE ('$userid', '$amt_deposited', '$transaction_reference')";
    
                $result = mysqli_query($con, $query_for_confirmed);
                if ($result) {
                    $_SESSION['status'] = "Deposit of $$amt_deposited successful";
                    header('location: ./dashboard/user/index.php');
                }
                else {
                    $_SESSION['status'] = "Deposit failed";
                    header('location: ./dashboard/user/index.php');
                }
            }
        }
        else {
            $query = "INSERT INTO deposit (userid, amt_deposited, transaction_reference) VALUE ('$userid', '$amt_deposited', '$transaction_reference')";

            $result = mysqli_query($con, $query);
            if ($result) {
                $_SESSION['status'] = "Deposit of $$amt_deposited successful";
                header('location: ./dashboard/user/index.php');
            }
            else {
                $_SESSION['status'] = "Deposit failed";
                header('location: ./dashboard/user/index.php');
            }
        }

                
    }
    else {
        $_SESSION['status'] = "You must certify that you have made the payment";
        header('location: ./dashboard/user/copy_wallet_address.php');
    }
   
}


// Invest in basic plan
if (isset($_POST['basic_plan'])) {
    $amt_invested = $_POST['amt_invested'];
    $userid = $_POST['userid'];

    if ($amt_invested < 500) {
        $_SESSION['status'] = "Minimum deposit for this investment plan is $ 500";
        header('location: ./dashboard/user/investment_plan.php');
    }
    elseif ($amt_invested > $_SESSION['balance']) {
        $_SESSION['status'] = "Amount invested must be less than or equal to your wallet balance";
        header('location: ./dashboard/user/investment_plan.php');
    }
    else {
        $d = strtotime("-50 mins");
        $end_date = date("y-m-d h:i:sa", $d);
        $basic_earning = ($amt_invested * 1 * 10)/(100);
        
        $query = "INSERT INTO investment (userid, amt_invested, earning, plan, end_date) VALUE ('$userid', '$amt_invested', '$basic_earning', 'basic_plan', '$end_date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    
                }
                $wallet_balance = $row['total_balance'];
                $new_wallet_balance = $wallet_balance - $amt_invested;
                $query = "UPDATE wallet_balance SET total_balance = $new_wallet_balance WHERE userid = $userid";
                $result = mysqli_query($con, $query);
                $_SESSION['status'] = "$ $amt_invested invested in basic plan";
                header('location: ./dashboard/user/index.php');
            }
        }
    }

}

// Invest in standard plan
if (isset($_POST['standard_plan'])) {
    $amt_invested = $_POST['amt_invested'];
    $userid = $_POST['userid'];

    if ($amt_invested < 10000) {
        $_SESSION['status'] = "Minimum deposit for this investment plan is $ 10,000";
        header('location: ./dashboard/user/investment_plan.php');
    }
    elseif ($amt_invested > $_SESSION['balance']) {
        $_SESSION['status'] = "Amount invested must be less than or equal to your wallet balance";
        header('location: ./dashboard/user/investment_plan.php');
    }
    else {
        $d = strtotime("+1 week");
        $end_date = date("y-m-d", $d);
        $standard_earning = ($amt_invested * 1 * 12)/(100);

        $query = "INSERT INTO investment (userid, amt_invested, earning, plan, end_date) VALUE ('$userid', '$amt_invested', '$standard_earning', 'standard_plan', '$end_date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    
                }
                $wallet_balance = $row['total_balance'];
                $new_wallet_balance = $wallet_balance - $amt_invested;
                $query = "UPDATE wallet_balance SET total_balance = $new_wallet_balance WHERE userid = $userid";
                $result = mysqli_query($con, $query);
                $_SESSION['status'] = "$ $amt_invested invested in standard plan";
                header('location: ./dashboard/user/index.php');
            }
        }
    }

}

// Invest in diamond plan
if (isset($_POST['diamond_plan'])) {
    $amt_invested = $_POST['amt_invested'];
    $userid = $_POST['userid'];

    if ($amt_invested < 25000) {
        $_SESSION['status'] = "Minimum deposit for this investment plan is $ 25,000";
        header('location: ./dashboard/user/investment_plan.php');
    }
    elseif ($amt_invested > $_SESSION['balance']) {
        $_SESSION['status'] = "Amount invested must be less than or equal to your wallet balance";
        header('location: ./dashboard/user/investment_plan.php');
    }
    else {
        $d = strtotime("+1 week");
        $end_date = date("y-m-d", $d);
        $diamond_earning = ($amt_invested * 1 * 15)/(100);

        $query = "INSERT INTO investment (userid, amt_invested, earning, plan, end_date) VALUE ('$userid', '$amt_invested', '$diamond_earning', 'diamond_plan', '$end_date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    
                }
                $wallet_balance = $row['total_balance'];
                $new_wallet_balance = $wallet_balance - $amt_invested;
                $query = "UPDATE wallet_balance SET total_balance = $new_wallet_balance WHERE userid = $userid";
                $result = mysqli_query($con, $query);
                $_SESSION['status'] = "$ $amt_invested invested in standard plan";
                header('location: ./dashboard/user/index.php');
            }
        }
    }

}

// Invest in premium plan
if (isset($_POST['premium_plan'])) {
    $amt_invested = $_POST['amt_invested'];
    $userid = $_POST['userid'];

    if ($amt_invested < 50000) {
        $_SESSION['status'] = "Minimum deposit for this investment plan is $ 50,000";
        header('location: ./dashboard/user/investment_plan.php');
    }
    elseif ($amt_invested > $_SESSION['balance']) {
        $_SESSION['status'] = "Amount invested must be less than or equal to your wallet balance";
        header('location: ./dashboard/user/investment_plan.php');
    }
    else {
        $d = strtotime("+1 week");
        $end_date = date("y-m-d", $d);
        $premium_earning += ($amt_invested * 1 * 17)/(100);

        $query = "INSERT INTO investment (userid, amt_invested, earning, plan, end_date) VALUE ('$userid', '$amt_invested', '$premium_earning', 'diamond_plan', '$end_date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    
                }
                $wallet_balance = $row['total_balance'];
                $new_wallet_balance = $wallet_balance - $amt_invested;
                $query = "UPDATE wallet_balance SET total_balance = $new_wallet_balance WHERE userid = $userid";
                $result = mysqli_query($con, $query);
                $_SESSION['status'] = "$ $amt_invested invested in standard plan";
                header('location: ./dashboard/user/index.php');
            }
        }
    }

}


// Withdraw with btc
if(isset($_POST['req_btc'])) {
    $amt_withdrawn = $_POST['amt_withdrawn'];
    $userid = $_SESSION['user']['userid'];
    $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)) {
        foreach ($result as $row) {

        }
        $total_balance = $row['total_balance'];
    }

    $query = "SELECT * FROM btc_wallet WHERE userid = $userid";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {

        }
        $btc_wallet_address = $row['btc_wallet_address'];
    }

    if (empty($amt_withdrawn)) {
        $_SESSION['status'] = "Enter withdrawal amount";
        header('location: ./dashboard/user/request_withdrawal.php');
    }
    elseif($amt_withdrawn > $total_balance) {
        $_SESSION['status'] = "You can not withdraw more than your withdrawable balance";
        header('location: ./dashboard/user/request_withdrawal.php');
    }
    else {
        $query = "INSERT INTO withdrawal (userid, amt_withdrawn, status, wallet_type, wallet_address) VALUE ('$userid', '$amt_withdrawn', 'pending', 'btc', '$btc_wallet_address')";
        $result = mysqli_query($con, $query);

        $_SESSION['status'] = "Withdrawal request of $ $amt_withdrawn sucessfull";
        header('location: ./dashboard/user/index.php');
    }

}






// check if user is logged in
function isLoggedIn() {
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
function isAdmin() {
	if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


?>
<?php
//My db credentials are contained within this file both locally (hidden with gitignore) and on the server (but it is hidden from gitlab)
include 'config.inc.php';

function addErrNum(){
    $_SESSION['errNum'] = 0;
}

//Need to start the session so we can use session variables.
session_start();

if (isset($_SESSION['user']) && $_SESSION['user'] != ""){
    header("Location: home.php");
    exit;
}

//This is the variable used to hold the error message in case the db connection or user credentials cause an error.
$error = "";

//Used to test the db connection, if it fails, return to the login page with an error message, else continue authenticating user details.
try
{
    $database_conn = new PDO("mysql:host=$database_host;dbname=$group_dbnames[2]", $database_user, $database_pass);
    $_SESSION['error'] = "";
    $_SESSION['det_err'] = "";
}
catch (PDOException $pe)
{
    //If connection fails, we need to generate an error message and return to the login page.
    $error = "Database connection unsuccessful, please try again later.";
    //This stores both the friendly, and technical error messages into the session array, so that they can be accessed on other pages.
    $_SESSION['error'] = $error;
    $_SESSION['det_err'] = $pe;
    addErrNum();
    //Redirect
    header("Location: login.php");
    exit;
}
//POST is used because it is sensitive information and is likely long, raw inputs need to be sanitised to prevent sql injection.
$raw_email = $_POST['email'];
$raw_pass = $_POST['password'];
try{
    $sql_statement = $database_conn->prepare("SELECT salt, hashed_pass, first_name, religion FROM USER WHERE email = :email");
    $sql_statement->bindParam(':email', $raw_email, PDO::PARAM_STR);
    $sql_statement->execute();
    $_SESSION['error'] = "";
    $_SESSION['det_err'] = "";
    $checkSuccess = $sql_statement->rowCount();
    if ($checkSuccess == 1){
        $data = $sql_statement->fetch(PDO::FETCH_ASSOC);
        $salt = $data['salt'];
        $raw_salt = hex2bin($salt);
        $hashed_pass = $data['hashed_pass'];
        if (password_verify($raw_pass.$raw_salt, $hashed_pass)){
            $_SESSION['user'] = $raw_email;
            $_SESSION['name'] = $data['first_name'];
            $_SESSION['error'] = "";
            $_SESSION['det_err'] = "";
            $religion = $data['religion'];
            if ($religion == null){
                header("Location: route.php");
            }else{
                $_SESSION['religion'] = $religion;
                header("Location: finder.php");
            }
        }else{
            addErrNum();
            $error = "Password is incorrect! Please try again.";
            $_SESSION['error'] = $error;
            header("Location: login.php");
        }
    }else{
        addErrNum();
        $error = "An error occured while retrieving data from the database! Please try again later.";
        $_SESSION['error'] = $error;
        header("Location: login.php");
    }
    
}
catch (PDOException $err){
    $error = "The account associated with this email does not exist! Please create an account.";
    $_SESSION['error'] = $error;
    $_SESSION['det_err'] = $err;
    addErrNum();
    header("Location: login.php");
    exit;
}
?>
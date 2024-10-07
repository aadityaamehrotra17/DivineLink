<?php
//My db credentials are contained within this file both locally (hidden with gitignore) and on the server (but it is hidden from gitlab)
include 'config.inc.php';

//Resetting error session values when we succeed, in case an error was generated at that point before that has not been cleared.
function clearSessionErr(){
    $_SESSION['error'] = "";
    $_SESSION['det_err'] = "";
}

function addErrNum(){
    $_SESSION['errNum'] = 0;
}

//Need to start the session so we can use session variables.
session_start();

//Check if user is already signed in.
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
    $database_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    clearSessionErr();
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
    header("Location: signup.php");
    exit;
}
//POST is used because it is sensitive information and is likely long, raw inputs need to be sanitised to prevent sql injection.
$raw_email = $_POST['email'];
$raw_first_name = $_POST['firstName'];
$raw_surname = $_POST['surname'];
$raw_pass = $_POST['password'];
//Generate a random salt which is then stored on the server for use when authenticating a user.
$salt = random_bytes(16);
$hashed_pass = password_hash($raw_pass . $salt, PASSWORD_BCRYPT);
//Salt was acting weird so I'm encoding it in hex before storing in the db.
$encoded_salt = bin2hex($salt);
try{
    $sql_statement = $database_conn->prepare("INSERT INTO USER (email,salt,hashed_pass,first_name,surname) VALUES (:email,:salt,:hashed_pass,:first_name,:surname)");
    //Sanitising the inputs to prevent SQL injection.
    $sql_statement->bindParam(':email', $raw_email, PDO::PARAM_STR);
    $sql_statement->bindParam(':salt', $encoded_salt, PDO::PARAM_STR);
    $sql_statement->bindParam(':hashed_pass', $hashed_pass, PDO::PARAM_STR);
    $sql_statement->bindParam(':first_name', $raw_first_name, PDO::PARAM_STR);
    $sql_statement->bindParam(':surname', $raw_surname, PDO::PARAM_STR);
    $sql_statement->execute();
    clearSessionErr();
    $checkSuccess = $sql_statement->rowCount();
    if($checkSuccess == 1){
        clearSessionErr();
        $_SESSION['user'] = $raw_email;
        $_SESSION['name'] = $raw_first_name;
        header("Location: route.php");
    }else{
        $error = "Failed to create account! Please try again later.";
        $_SESSION['error'] = $error;
        addErrNum();
        header("Location: signup.php");
    exit;
    }
} catch (PDOException $pe){
    $error = "An account associated with this email already exists! Please login instead.";
    $_SESSION['error'] = $error;
    $_SESSION['det_err'] = $pe;
    addErrNum();
    header("Location: signup.php");
    exit;
}
?>
<?php
include 'config.inc.php';
session_start();

if (!(isset($_SESSION['user'])) || $_SESSION['user'] == ""){
    header("Location: signup.php");
    exit;
}

//Resetting error session values when we succeed, in case an error was generated at that point before that has not been cleared.
function clearSessionErr(){
    $_SESSION['error'] = "";
    $_SESSION['det_err'] = "";
}

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
    //Redirect
    header("Location: signup.php");
    exit;
}
$choice = $_GET['choice'];
try{
    $sql_statement = $database_conn->prepare("UPDATE USER SET religion = :choice WHERE email = :email");
    $sql_statement->bindParam(':choice', $choice, PDO::PARAM_STR);
    $sql_statement->bindParam(':email', $_SESSION['user'], PDO::PARAM_STR);
    $sql_statement->execute();
    clearSessionErr();
    $checkSuccess = $sql_statement->rowCount();
    if ($checkSuccess == 1){
        $_SESSION['religion'] = $choice;
        header("Location: finder.php");
    }else{
        $error = "An error occured while saving your choice! Please try again later.";
        $_SESSION['error'] = $error;
        header("Location: route.php");
    exit;
    }
}
catch (PDOException $err){
    $error = "An error occured while saving your choice! Please try again later.";
    $_SESSION['error'] = $error;
    $_SESSION['det_err'] = $err;
    header("Location: route.php");
    exit;
}
?>
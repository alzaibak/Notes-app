<?php
//<!--Start session-->
session_start();
include('connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            h1{
                color:purple;   
            }
            .contactForm{
                border:1px solid #7c73f6;
                margin-top: 50px;
                border-radius: 15px;
            }
        </style> 

    </head>
        <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Reset Password:</h1>
            <div id="resultmessage"></div>

        <?php
//<!--Check user inputs-->
//    <!--Define error messages-->
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
//    <!--Get username, email, password, password2-->
//Get username
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);   
}
//Get email
if(empty($_POST["email"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}
//Get passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword; 
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//no errors

//Prepare variables for the queries
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
//$password = md5($password);
//$password = hash('sha256', $password);
//128 bits -> 32 characters
//256 bits -> 64 characters
//If username exists in the users table print error
$sql = "SELECT username FROM `Users` WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
   echo '<div class="alert alert-danger">Error running the query1</div>';
   echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
   exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  exit;
}
//If email exists in the users table print error
$sql = "SELECT email FROM Users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query2</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results > 1){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;
}
//Create a unique  activation code
//$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
    //byte: unit of data = 8 bits
    //bit: 0 or 1
    //16 bytes = 16*8 = 128 bits
    //(2*2*2*2)*2*2*2*2*...*2
    //16*16*...*16
    //32 characters

//Insert user details and activation code in the users table

$sql = "INSERT INTO Users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
$result = mysqli_query($link, $sql);
if($result){
    header("Location: thankyou.php");
    die();
    //echo '<div class="alert alert-danger">Thank for your registring!</div>';
    //exit;
}

//Send the user an email with a link to activate.php with their email and activation code
//$message = "Please click on this link to activate your account:\n\n";
//$message .= "http://diphant.com/notes/activate.php?email=" . urlencode($email) . "&key=$activationKey";
//if(mail($email, 'Confirm your Registration', $message, 'From:'.'alzaibak.abdalaziz@gmail.com')){
   //    echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
//}
        
?>
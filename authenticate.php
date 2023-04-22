<?php

//connect to database
require("connect.php");
$conn=dbo();


//sql statement
$sql="SELECT * from users where email=:email";

//prepare the sql

$stmt=$conn->prepare($sql);

//bind the values
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$email = strtolower($email);


$stmt->bindParam(":email",$email,PDO::PARAM_STR);

//execute the sql

$stmt->execute();
//check if the user exist or not
$user=$stmt->fetch(PDO::FETCH_ASSOC);

//start session

session_start();

//if the username is not correct
$auth=false;

if(!$user) $auth =false;
else $auth=password_verify($password,$user['password']);

//if user name is fine but the password does not match



//when the authorization fails 
//it shows the error message 
if(!$auth){
$_SESSION['errors'][]="Your email/password is not correct";
$_SESSION['form_values']=$_POST;

//get back to login page
header("Location:login.php");
exit();
}
//user variable is assigned to user session

$_SESSION['user']=$user;
//if everything is fine then it will show a success message along with a welcome page
$_SESSION['successes'][]="You are logged in!!!!!!";

header("Location: profile.php");
exit();
?>
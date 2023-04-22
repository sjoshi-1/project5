<?php

//VERIFICATION FOR NEW USER AND LOGIN PAGE
include_once("config.php");
 
  session_start();
  function error_handler ($errors) {
    if (count($errors) > 0) {
      $_SESSION['errors'] = $errors;
      $_SESSION['form_values'] = $_POST;

      header("Location: user.php");
      exit;
  }
}


$errors = [];

  // Validate the recaptcha
  if (!empty($_POST['recaptcha_response'])) {
    $secret = SECRETKEY;
    $verify_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$_POST['recaptcha_response']}");
    
    $response_data = json_decode($verify_response);
    if (!$response_data->success) {
      $errors[] = "Google reCaptcha failed: " . ($response_data->{'error-codes'})[0];
      error_handler($errors);
    }
  }

  // 1--> Validation

$fname=filter_input(INPUT_POST,'fname');
$lname=filter_input(INPUT_POST,'lname');
$country=filter_input(INPUT_POST,'country');
$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$password=filter_input(INPUT_POST,'password');
$password_confirmation=filter_input(INPUT_POST,'password_confirmation');
$dob=filter_input(INPUT_POST,'dob');


 // Validate the necessary fields are not empty
 $required_fields = ['fname','lname','country','email','password',            
                       'password_confirmation','dob'];
 
foreach ($required_fields as $field) {
   if (empty($$field)) {
    $human_field = str_replace("_", " ", $field);
     $errors[] = "You cannot leave the {$human_field} blank.";
       } else
        {
  if ($field === "password" || $field === "password_confirmation") continue;
   $$field = filter_var($$field, FILTER_SANITIZE_STRING);
       }
      }

  //VALIDATION

  if(!$email){
    $errors[]="Email is not in a valid format";
  }

  if($password!== $password_confirmation){
    $errors[]="password does not match with the password-confirmation";
  }

  error_handler($errors);

//lowercase

$email=strtolower($email);

//hash code
//b crypt algorithm is used to hash the password

$password=password_hash($password,PASSWORD_DEFAULT);

require_once('connect.php');

$conn = dbo();

$sql = "INSERT INTO users (fname,lname,country,email,password,dob)

VALUES (:fname,:lname,:country,:email,:password,:dob)";

$stmt = $conn->prepare($sql);

// Sanitize using the binding
$stmt->bindParam(':fname', $fname, PDO::PARAM_STR); // Casts it to a string
$stmt->bindParam(':lname', $lname, PDO::PARAM_STR); // Casts it to a string
$stmt->bindParam(':country',$country,PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':dob',$dob,PDO::PARAM_STR);
/* END SANITIZATION */


try{
$stmt->execute();
$_SESSION['successes'][]="You have been registered successfully!!!";
header("Location:login.php");

}
catch(Exception $error){
  $errors[]=$error->getMessage();
  error_handler($errors);
}



?>
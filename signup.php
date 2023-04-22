<?php

require('headerA.php');

session_start();
if (isset($_SESSION['user'])) {
  header("Location: home.php");
  exit();

}

$form_values = $_SESSION['form_values'] ?? null;

// Clear the form values
unset($_SESSION['form_values']);

?>

<h3>Enjoy shopping by exploring more !!!!</h3>
<form class="form" action="verify.php" method="post" novalidate>

<!--name-->
<label for="name"> Name: </label><br>
<input type="text" name="name" id="name" placeholder="Enter your name here" value= "<?= $form_values['name'] ?? null ?>" required> <br>



<!--Email-->
<label for="Email"> Email: </label><br>
<input type="email" name="email" id="email" placeholder="Enter your email here" required  value="<?= $form_values['email'] ?? null ?>"><br> 
  
<!--password-->  
<label for="password">Password : </label><br>
<input type="password" name="password"  id="password" placeholder="Your password" required><br>

<!--Email-->
<label for="rpass"> Retype Password: </label><br>
<input type="password"  placeholder="Retype your password " name="password-confirmation"  id="password-confirmation" required><br> 

<!--Log in page-->
<a  class="btn"> Register</a>
</form>
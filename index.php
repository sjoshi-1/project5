<?php
 require('headerA.php');
 session_start();
  if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit();
  }

  // Before we render the form let's check for form values
  $form_values = $_SESSION['form_values'] ?? null;

  // Clear the form values
  unset($_SESSION['form_values']);
  
?>

<section class="form">
<h4>For best experience please log in </h4>
<p>Don't have an account .Create a new one here!!!</p>
<h4><a href="signup.php">Sign up Here :)</a></h4>

<form method="post" action="./authenticate.php">

<!--Email-->
<label for="Email"> Email: </label><br>
<input type="email" id="email" name="email" placeholder="Enter your email here" required value="<?=$form_values['email'] ?? null ?>"> <br>
  
<!--password-->  
<label for="password">Password : </label><br>
<p><input type="password" id="password" name="password" placeholder="Your password" required><br>
<!--Log in page-->
<a href="#" class="btn"> Log IN</a>



</form>


</section>

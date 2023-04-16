<?php
 require('headerA.php');
?>

<section class="form">
<h4>For best experience please log in </h4>
<p>Don't have an account .Create a new one here!!!</p>
<h4><a href="signup.php">Sign up Here :)</a></h4>

<form method="post" action="poem-generator.php">

<!--Email-->
<label for="Email"> Email: </label>
  <p> <input type="email" id="email" name="email" placeholder="Enter your email here"> </p>
  
<!--password-->  
<label for="password">Password : </label>
<p><input type="password" id="password" name="password" placeholder="Your password"></p>
<!--Log in page-->
<a href="#" class="btn"> Log IN</a>



</form>


</section>

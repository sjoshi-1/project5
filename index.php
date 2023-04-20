<?php
 require('headerA.php');
?>

<section class="form">
<h4>For best experience please log in </h4>
<p>Don't have an account .Create a new one here!!!</p>
<h4><a href="signup.php">Sign up Here :)</a></h4>

<form method="post" action="poem-generator.php">

<!--Email-->
<label for="Email"> Email: </label><br>
<input type="email" id="email" name="email" placeholder="Enter your email here"> <br>
  
<!--password-->  
<label for="password">Password : </label><br>
<p><input type="password" id="password" name="password" placeholder="Your password"><br>
<!--Log in page-->
<a href="#" class="btn"> Log IN</a>



</form>


</section>

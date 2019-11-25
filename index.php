<?php
include "header.php";
?>

<h2 class="title text-center">Log In</h2>
						
    <form class= "login-form"  action="includes/login.inc.php" method="POST">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">Log In</button>
        <p class="text-center"> Or </p>
        <button class="signup" ><a href="signup.php">SignUp</a></button>
        <!--<h3 align="center" ><a href="signup.php">SignUp</a></h3> -->
        </form>
        
    
 
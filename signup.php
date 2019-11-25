<?php
include "header.php";
?>

<h2 class="title text-center" >Sign Up</h2>
						
					<form class= "signup-form" action="includes/signup.inc.php" method="POST">
                        <input type="text" name="first" placeholder="Firstname">
                        <input type="text" name="last" placeholder="Lastname">
                        <input type="text" name="email" placeholder="Email">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">SignUp</button>
                        <h3> <a href="index.php">Back</a></h3>
                    </form>

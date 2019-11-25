<?php
session_start();

if(isset($_POST['submit'])){
    include 'dbh.inc.php';
        
    $pi_hight=mysqli_real_escape_string($con, $_POST['pi_hight']);
    $pi_age=mysqli_real_escape_string($con, $_POST['pi_age']);
    $pi_gender=mysqli_real_escape_string($con, $_POST['pi_gender']);
    $sql = "INSERT INTO personal_information (user_id, pi_hight, pi_age, pi_gender) VALUES ('$_SESSION[u_id]', '$pi_hight', '$pi_age','$pi_gender');";
    mysqli_query($con, $sql);
    header("Location: ../personal_information.php?updates=success"); 
    exit();


}else{
    header("Location: ../personal_information.php?updates=unsuccessful");  
    exit();
}
 
?>
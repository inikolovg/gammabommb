<?php
session_start();

if(isset($_POST['submit'])){
    include 'dbh.inc.php';
        
    $up_weight=mysqli_real_escape_string($con, $_POST['up_weight']);
    $up_water=mysqli_real_escape_string($con, $_POST['up_water']);
    $up_bones=mysqli_real_escape_string($con, $_POST['up_bones']);
    $up_muscules=mysqli_real_escape_string($con, $_POST['up_muscules']);
    $up_fat=mysqli_real_escape_string($con, $_POST['up_fat']);
    $sql = "INSERT INTO updates (user_id, up_weight, up_water, up_bones, up_muscules, up_fat) VALUES ('$_SESSION[u_id]', '$up_weight', '$up_water','$up_bones', '$up_muscules', '$up_fat');";
    mysqli_query($con, $sql);
    header("Location: ../updates.php?updates=success"); 
    exit();


}else{
    header("Location: ../updates.php?update=unsuccessful");  
    exit();
}
 
?>
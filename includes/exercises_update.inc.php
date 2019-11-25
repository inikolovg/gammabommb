<?php
session_start();

if(isset($_POST['submit'])){
    include 'dbh.inc.php';
    //include 'daily_plan.php';
    //include 'personal_information.php';
   
    $sql= "select sum(series) as total_series from exercises where ex_day=$_SESSION[day]";  
    $result = mysqli_query($con, $sql);
    $row1 = mysqli_fetch_assoc($result);
    $total_series=$row1['total_series'];

    $total_minutes=mysqli_real_escape_string($con, $_POST['total_minutes']);
    $rest_seconds=mysqli_real_escape_string($con, $_POST['rest_seconds']);
    $ex_up_duration=($total_minutes-(($rest_seconds/60)*$total_series))/60;
      
    $current_weight=$_SESSION["curent_weight"];

    $MET=5;
    //burned calories= (MET*current weigth)*(((total time of the session-(average time of rest)*total series))/60)
    $burned_calories=($MET*$current_weight)*$ex_up_duration;    

    $sql = "INSERT INTO exercises_update (ex_day, user_id , ex_up_duration, ex_up_cal) VALUES ('$_SESSION[day]','$_SESSION[u_id]', '$ex_up_duration', '$burned_calories');";
    mysqli_query($con, $sql);
    header("Location: ../daily_plan.php?day=$_SESSION[day]&successful"); 
    exit();

}else{
    header("Location: ../daily_plan.php?day=$_SESSION[day]=unsuccessful"); 
    exit();
}
    ?>
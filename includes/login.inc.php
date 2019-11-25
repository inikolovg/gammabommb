<?php
session_start();

if(isset($_POST['submit'])){

    include 'dbh.inc.php';

    $uid=mysqli_real_escape_string($con, $_POST['uid']);
    $pwd=mysqli_real_escape_string($con, $_POST['pwd']);

    //error handlers
    //check if inputs are empty 

    if(empty($uid) || empty($pwd)) {
        header("Location: ../index.php?login=empty"); 
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            header("Location: ../index.php?login=incorrect_username_or_password "); 
            exit();
        }else{
            // get the information from the dtabase for the curent "uid" and fetch it in array $row
           if($row=mysqli_fetch_assoc($result)){
               // dehashing the password
               $hashedPwdCheck= password_verify($pwd,$row['user_pwd']);
               if($hashedPwdCheck == false){
                header("Location: ../index.php?login=wrong_password"); 
                exit();
               }elseif($hashedPwdCheck == true){
                   //log in the user here
                   $_SESSION['u_id'] = $row ['user_id'];
                   $_SESSION['u_first'] = $row ['user_first'];
                   $_SESSION['u_last'] = $row ['user_last'];
                   $_SESSION['u_email'] = $row ['user_emial'];
                   $_SESSION['u_uid'] = $row ['user_uid'];
                   header("Location: ../personal_information.php?login=success"); 
                   exit();
                }
            } 
        }
    }

}else{
    header("Location: ../index.php?login=unknown"); 
    exit();
}

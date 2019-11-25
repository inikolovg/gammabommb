<?php
include "header.php";
include "includes/dbh.inc.php";
$user=$_SESSION['u_id'];


$sql_pi="select * from personal_information where pi_date=(select max(pi_date) from personal_information) and user_id=$user";
$result_pi=mysqli_query($con, $sql_pi);
$row_pi=mysqli_fetch_array($result_pi);
$sql_weight="select * from updates where up_date=(select max(up_date) from updates) and user_id=$user"; 
$result_weight=mysqli_query($con, $sql_weight);	
$row_weight=mysqli_fetch_array($result_weight);

$_SESSION['curent_weight']=$row_weight["up_weight"];

$users_gender=$row_pi["pi_gender"];

$sql_user= "select * from users where user_id=$user";  
$result_user = mysqli_query($con, $sql_user);


$BMIm=(66+(13.7*$row_weight["up_weight"])+(5*$row_pi["pi_hight"])-(6.8*$row_pi["pi_age"]))*1.4;
$BMIf=(655+(9.6*$row_weight["up_weight"])+(1.8*$row_pi["pi_hight"])-(4.7*$row_pi["pi_age"]))*1.4;


?>

<div class="wrapper">
    <?php
    include "side_bar.php";
    include "pages.php";
    ?>
    <h2 class="title text-center"> Personal information </h2>
        <div class="line"></div>


    <?php

    while($row_user=mysqli_fetch_array($result_user))
	{
	?>
    <p><?php echo "First name : " .$row_user["user_first"]; ?></p>
    <p><?php echo "Last name : " .$row_user["user_last"]; ?></p>
    <p><?php echo "Email address: " .$row_user["user_email"]; ?></p>
    <p><?php echo "Hight: ". $row_pi["pi_hight"];?></p>
    <p><?php echo "Age: ". $row_pi["pi_age"];?></p>
    <p><?php echo "Gender: ". $row_pi["pi_gender"];?></p>
    <p><?php echo "Current weight: ". $row_weight["up_weight"];?></p>

<?php
}
?>				
    <p> <?php 
        switch($users_gender){
            case 'Male':
            echo "Required daily income:  ".$BMIm. " kCal" .'</br>';
            break;
            case 'Female';
            echo "Required daily income:  ".$BMIf. " kCal" .'</br>';
            break;
            default:
            echo 'Please insert a valid gnder Male or Female';
        } ?>
    </p>

                 <form class= "signup-form" action="includes/personal_information.inc.php" method="POST">
                 <input type="text" name="pi_hight" placeholder="Hight">
                 <input type="text" name="pi_age" placeholder="Age">
                 <input type="text" name="pi_gender" placeholder="Gender">
                        <button type="submit" name="submit">Update</button>
                    </form>
        


    
    
                    <div class="line"></div>
</div>

<?php include "footer.php";?>
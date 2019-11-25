<?php
include "header.php";
include "includes/dbh.inc.php";

$day=$_GET["day"];
$_SESSION['day']= $day;
?>
   
<div class="wrapper">
    <?php
    
    include "side_bar.php";
    include "pages.php";

?>

<h2><?php echo "Day". $day;?></h2>
<div class="line"></div>

<?php
$sql= "select * from exercises where ex_day=$day";  
$result = mysqli_query($con, $sql);

$day_off_check= mysqli_num_rows($result);
if($day_off_check==1){
?>
<h3>Day OFF</h3>
<div class="line"></div>
<?php
}else{

while($row=mysqli_fetch_array($result)){
?>
            <h3><?php echo $row["name"]; ?> <br> </h3>
            <?php echo "Series:". $row["series"]; ?><br>
            <?php echo "Reps:". $row["reps"]; ?> <br>
            <a target="_blank" rel="noopener noreferrer" href="<?php echo $row["yt_link"];?>">You Tube</a><br>  
<?php
}
?>	

<?php

$sql= "select sum(series) as total_series from exercises where ex_day=$_SESSION[day]";
$result = mysqli_query($con, $sql);
$row1 = mysqli_fetch_assoc($result);
$total_series=$row1['total_series'];
$current_weight=$_SESSION["curent_weight"];


?>
<div class="line"></div>
<?php
$sql_check = "select * from exercises_update where ex_day=$_SESSION[day] and user_id=$_SESSION[u_id]";
        $result = mysqli_query($con, $sql_check);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            $row=mysqli_fetch_assoc($result);
            echo 'Burned calories : '. $row['ex_up_cal'];
        }else{
        echo '<form class= "ex_updates" action="includes/exercises_update.inc.php" method="POST">
        <p>Total duration of the gym session in minutes</p><input type="text" name="total_minutes" placeholder="Enter minutes">
        <p>Average duration of the pause between the reps in seconds</p><input type="text" name="rest_seconds" placeholder="Enter seconds">
        <button type="submit" name="submit">UPDATE</button>
                            </form>		';
        }   
?>

    <div class="line"></div>
    <?php    
    }    
?>
</div>

<?php include "footer.php";?>
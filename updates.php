<?php
include "header.php";
?>
   
<div class="wrapper">
    <?php
 include "side_bar.php";
 include "pages.php";
 include "includes/dbh.inc.php";
 $user=$_SESSION['u_id'];
   ?>


  

<?php

$query_update="SELECT * FROM updates WHERE user_id=$user";
$result_update=mysqli_query($con, $query_update);
$update_data='';
while($row=mysqli_fetch_array($result_update))
{
 $update_data .= "{ date:'".$row["up_date"]."', water:".$row["up_water"].", bones:".$row["up_bones"].", muscules:".$row["up_muscules"].", fat:".$row["up_fat"].", weight:".$row["up_weight"]."}, ";
}
$update_data = substr($update_data, 0, -2 );

$query_calories="SELECT * FROM updates WHERE user_id=$user";
$result_calories=mysqli_query($con, $query_calories);
$calories_data='';
while($row=mysqli_fetch_array($result_calories))
{
 $calories_data .= "{ date:'".$row["up_date"]."', water:".$row["up_water"].", bones:".$row["up_bones"].", muscules:".$row["up_muscules"].", fat:".$row["up_fat"].", weight:".$row["up_weight"]."}, ";
}
$calories_data = substr($calories_data, 0, -2 );

?>


 
 <div class="line"></div>
 <h2 align="center">Progress</h2>
   <div class="line"></div> 

<?php
$sql_updates_check= "select * from updates where user_id=$user";  
$result_updates_check = mysqli_query($con, $sql_updates_check);

$updates_check= mysqli_num_rows($result_updates_check);
if($updates_check==0){
?>
<h3 align="center"> Please submit your updates <h3>

<div class="line"></div>
<?php
}else{
    echo'

  <div class="container" style="width:900px;">
 
   <br /><br />
   <div id="chart"></div>
  </div>';


}
?>


    <div class="line"></div>
    <h2 class="title text-center"> Updates </h2>
    <div class="line"></div>
        <form class="signup-form" action="includes/updates.inc.php" method="POST">
                        <input type="text" name="up_weight" placeholder="Weight">
                        <input type="text" name="up_water" placeholder="Water">
                        <input type="text" name="up_bones" placeholder="Bones">
                        <input type="text" name="up_muscules" placeholder="Muscules">
                        <input type="text" name="up_fat" placeholder="Fat">
                        <button type="submit" name="submit">Update</button>
                    </form>
                    
       
    <div class="line"></div>
</div>

<?php include "footer.php";?>
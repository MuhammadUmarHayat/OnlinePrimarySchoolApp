
<?php
include '../config.php';
$message="";


session_start();
$userid=  $_SESSION['userid'] ;


if(!isset($userid))
{
    header('Location:http://localhost/opffinal/logout.php');
}
else
{
     $userid;
}
if(isset($_POST['submit']))
{
   //closing_date,opeining_date,message,schoolid
    $closing_date=$_POST['closing_date'];
$opeining_date=$_POST['opeining_date'];
$schoolid=$_POST['schoolid'];
$message=$_POST['message'];
$status="ok";

$d=date("y/m/d");



$query="INSERT INTO `admission_notifications`( `school_id`, `Message`, `opeining_date`, `closing_date`, `date_of_notification`, `status`) VALUES ('$schoolid','$message','$opeining_date','$closing_date','$d','$status')";
$query = mysqli_query($con,$query);

$message="Information is added successfully ";

}
?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Add Notifications</h2>

<form action="addNotifications.php" method="post">
    <table>
    <tr><td>Select School: </td>
    <td>
<select name="schoolid">
    <option disabled selected>-- Select Category--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT * FROM `schools`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>
    <td>*</td>
</tr>
<tr>
           
           <td>Message</td>
           <td><input type="text" name="message" Required/></td>
           <td>*</td>
       </tr>

       
        <tr>
           
           <td>Start Date</td>
           <td><input type="date" name="opeining_date" Required/></td>
           <td>*</td>
       </tr>
        <tr>
           
           <td>Closing Date</td>
           <td><input type="date" name="closing_date" Required/></td>
           <td>*</td>
       </tr>
       
       <tr>
            <td></td>
            <td><input class="btn btn-success btn-lg btn-block mt-3" type="submit" name="submit" value="submit"/></td>
            <td><?php echo $message?></td>
        </tr> 
</table>




</main>

<?php
include("../footer.php");
?>
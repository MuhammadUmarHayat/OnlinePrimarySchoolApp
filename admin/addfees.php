
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
   //INSERT INTO `school_fees`( `title`, `description`, `level`, `fee`, `revision_date`, `school_id`) VALUES ('','','','','','','') 
    $title=$_POST['title'];
$description=$_POST['description'];
$level=$_POST['level'];
$fee=$_POST['fee'];
$school_id=$_POST['school_id'];
$status="ok";
$revision_date=date("y/m/d");



$query="INSERT INTO `school_fees`( `title`, `description`, `level`, `fee`, `revision_date`, `school_id`) VALUES ('$title','$description','$level','$fee','$revision_date','$school_id')";
$query = mysqli_query($con,$query);

$message="Information is added successfully ";

}
?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Add School Fee</h2>

<form action="addfees.php" method="post">
    <table>
    <tr><td>Select School: </td>
    <td>
<select name="school_id">
    <option disabled selected>-- Select School--</option>
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
   
           <td>Enter Fee Title</td>
           <td><input type="text" name="title" Required/></td>
           <td>*</td>
       </tr>
<tr>
<td>Enter Description</td>
           <td><input type="text" name="description" Required/></td>
           <td>*</td>
       </tr>
        
       <tr>
<td>Enter Level(Elementary or High)</td>
           <td><input type="text" name="level" Required/></td>
           <td>*</td>
       </tr>

       <tr>
<td>Fee amount</td>
           <td><input type="number" name="fee" Required/></td>
           <td>*</td>
       </tr>

        <tr>
           
           
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
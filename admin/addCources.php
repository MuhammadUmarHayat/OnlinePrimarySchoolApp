
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
    ////schoolid,name,medium,level,publisher,author
    $name=$_POST['name'];
$medium=$_POST['medium'];
$schoolid=$_POST['schoolid'];
$level=$_POST['level'];
$publisher=$_POST['publisher'];
$author=$_POST['author'];
$d=date("y/m/d");



$query="INSERT INTO `school_cources`( `school_id`, `course_name`, `medium`, `level`, `publisher`, `status`, `revision_date`) VALUES ('$schoolid','$name','$medium','$level','$publisher','$author','$d')";
$query = mysqli_query($con,$query);

$message="Information is added successfully ";

}
?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Add cource information</h2>

<form action="addCources.php" method="post">
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
           
           <td>Course Name</td>
           <td><input type="text" name="name" Required/></td>
           <td>*</td>
       </tr>
<tr>
            <td><label for="medium">Choose Medium</label></td>
            <td>
            <select name="medium" id="medium">
  <option value="english">English</option>
  <option value="urdu">Urdu</option>
  <option value="cambridge">Others</option>
  </select>
        </td>
            <td>*</td>
        
        </tr>
       
        <tr>
           
           <td>Class</td>
           <td><input type="text" name="level" Required/></td>
           <td>*</td>
       </tr>
        <tr>
           
           <td>publisher Name</td>
           <td><input type="text" name="publisher" Required/></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Author Name</td>
           <td><input type="text" name="author" Required/></td>
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
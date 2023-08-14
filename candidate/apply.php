
<?php
include '../config.php';
$message="";


session_start();
$userid=  $_SESSION['userid'] ;
$schoolName=$_GET['id'];
 $_SESSION['schoolName'] =$schoolName;

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
    

    $email=$userid;
   $school_id=$_POST['schoolid'];
   $student_name=$_POST['student_name'];
$level=$_POST['level'];
$class=$_POST['class'];

$gender=$_POST['gender'];

//$childPhoto;
$status="requested";
$doe=date("d/m/y");
$remaks="";



$query="INSERT INTO `admission_requests`( `school_id`, `student_id`,`gaurdianid`, `level`, `class`, `gender`, `status`, `addmission_date`, `remarks`) VALUES ('$school_id','$student_name','$userid','$level','$class','$gender','$status','$doe','$remaks')";
$query = mysqli_query($con,$query);

$message=" Your application is requested successfully ";
//header('Location:'.'childDet.php');
        
}
       

?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Apply School Information</h2>

<form action="apply.php" method="post">
    <table>
    <tr>
           
           <td>Gaurdian ID </td>
           <td><?php echo $userid?></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>School ID </td>
           <td><?php echo $schoolName?></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Shool Name</td>
           <td>
           <select name="student_name">
    <option disabled selected>-- Select  Child Name--</option>
    <?php
	
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT `name` FROM `users_childern` where `email`= '$userid'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
        </td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Gender</td>
           <td>
           <select name="gender" id="gender">
  <option value="boy">Boy</option>
  <option value="girl">Girl</option>
  
  </select>
        </td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Class name </td>
           <td><input type="text" name="class" Required/></td>
           <td>*</td>
       </tr>
       
       <tr>
           
           <td>Class Level </td>
           <td><input type="text" name="level" Required/></td>
           <td>*</td>
       </tr>
       
  
       <input type="hidden" id="schoolid" name="schoolid" value="<?php echo $schoolName?>">

        <tr>
            <td></td>
            <td><input class="btn btn-success btn-lg btn-block mt-3" type="submit" name="submit" value="submit"/></td>
            <td><?php echo $message?></td>
        </tr> 
</table>




</main>


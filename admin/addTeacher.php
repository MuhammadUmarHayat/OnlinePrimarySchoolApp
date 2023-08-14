
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
    if(!empty($_FILES["image"]["name"])) 
	{ 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
    //schoolid,course_id,name,fname,qualification,doe,gender,
    //INSERT INTO `school_teachers`( `name`, `father_name`, `photo`, `gender`, `course`, `school_id`, `course_id`, `qualification`, `doe`) VALUES ('','','','','','','','','')
   
    $name=$_POST['name'];
    $fname=$_POST['fname'];
$gender=$_POST['gender'];
$schoolid=$_POST['schoolid'];

$courseId=$_POST['course_id'];
$course=$_POST['course_id'];
$qualification=$_POST['qualification'];
$doe=$_POST['doe'];
$d=date("y/m/d");



$query="INSERT INTO `school_teachers`( `name`, `father_name`, `photo`, `gender`, `course`, `school_id`, `course_id`, `qualification`, `doe`) VALUES ('$name','$fname','$imgContent','$gender','$course','$schoolid','$courseId','$qualification','$doe')";
$query = mysqli_query($con,$query);

$message="Information is added successfully ";
        }
    }

}
?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Add Teacher Information</h2>

<form action="addTeacher.php" method="post" enctype="multipart/form-data">
    <table>
    <tr>
           
           <td>Teacher Name</td>
           <td><input type="text" name="name" Required/></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Fater Name</td>
           <td><input type="text" name="fname" Required/></td>
           <td>*</td>
       </tr>
       
        <tr>
           
           <td>Qualification</td>
           <td><input type="text" name="qualification" Required/></td>
           <td>*</td>
       </tr>
    <tr><td>Select School: </td>
    <td>
<select name="schoolid">
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
<tr><td>Select Course: </td>
    <td>
<select name="course_id">
    <option disabled selected>-- Select Course--</option>
    <?php
	
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT * FROM `school_cources`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['course_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>
    <td>*</td>
</tr>

        <tr>
           
           <td>Date of Enrollment</td>
           <td><input type="date" name="doe" Required/></td>
           <td>*</td>
       </tr>
       <tr>
            <td><label for="gender">Choose Gender</label></td>
            <td>
            <select name="gender" id="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="undefined">Others</option>
  </select>
        </td>
            <td>*</td>
        </tr>
        <tr><td><label>Select Image File:</label></td><td><input type="file" name="image"></td><td>*</td></tr>
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
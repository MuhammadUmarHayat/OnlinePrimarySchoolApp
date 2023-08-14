
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
    if(!empty($_FILES["image1"]["name"])) 
	{ 
        try{
        // Get file info 
        $fileName = basename($_FILES["image1"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image1 = $_FILES['image1']['tmp_name']; 
            $childPhoto = addslashes(file_get_contents($image1)); 
           

            $image2 = $_FILES['image2']['tmp_name']; 
            $fCNICPhoto = addslashes(file_get_contents($image2)); 

            $image3 = $_FILES['image3']['tmp_name']; 
            $MCNICPhoto = addslashes(file_get_contents($image3)); 

            $image4 = $_FILES['image4']['tmp_name']; 
            $DomicilePhoto = addslashes(file_get_contents($image4)); 
            $image5 = $_FILES['image5']['tmp_name']; 
            $BFormPhoto = addslashes(file_get_contents($image5)); 

            
    

    $email=$userid;
   $name=$_POST['name'];
$dob=$_POST['dob'];
$father_name=$_POST['father_name'];

$mother_name=$_POST['mother_name'];
$cnic=$_POST['cnic'];
//$childPhoto;
$remarks="ok";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////INSERT INTO `users_childern`(`email`, `name`, `dob`, `father_name`, `mother_name`, `cnic`, `photo`, `remakrs`, `father_cnic`, `mother_cnic`, `Bform`, `domicile`) VALUES ('','','','','','','','','','','','')

$query="INSERT INTO `users_childern`(`email`, `name`, `dob`, `father_name`, `mother_name`, `cnic`, `photo`, `remakrs`, `father_cnic`, `mother_cnic`, `Bform`, `domicile`) VALUES ('$email','$name','$dob','$father_name','$mother_name','$cnic','$childPhoto','$remarks','$fCNICPhoto','$MCNICPhoto','$BFormPhoto','$DomicilePhoto')";
$query = mysqli_query($con,$query);

$message="Information is add successfully ";
header('Location:'.'childDetails.php');
        
}
        }
catch(Exception $e) 
        {
            $message= 'Error: ' .$e->getMessage();
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

<form action="addChildInfo.php" method="post" enctype="multipart/form-data">
    <table>
    <tr>
           
           <td>User ID</td>
           <td><?php echo $userid?></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Child Name</td>
           <td><input type="text" name="name" Required/></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Date of Birth</td>
           <td><input type="date" name="dob" Required/></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Fater Name</td>
           <td><input type="text" name="father_name" Required/></td>
           <td>*</td>
       </tr>
       <tr>
           
           <td>Mother Name</td>
           <td><input type="text" name="mother_name" Required/></td>
           <td>*</td>
       </tr>
       
        <tr>
           
           <td>B.C No or CNIC</td>
           <td><input type="text" name="cnic" Required/></td>
           <td>*</td>
       </tr>
    

  
 

        <tr><td><label>Select child Photo File:</label></td><td><input type="file" name="image1"></td><td>*</td></tr>
        <tr><td><label>Select Father/Guardian CNIC Photo File:</label></td><td><input type="file" name="image2"></td><td>*</td></tr>
        <tr><td><label>Select Mother CNIC Photo File:</label></td><td><input type="file" name="image3"></td><td>*</td></tr>
        <tr><td><label>Select Domicile File:</label></td><td><input type="file" name="image4"></td><td>*</td></tr>
        <tr><td><label>Select child BForm /CNIC File:</label></td><td><input type="file" name="image5"></td><td>*</td></tr>
        <tr>
            <td></td>
            <td><input class="btn btn-success btn-lg btn-block mt-3" type="submit" name="submit" value="submit"/></td>
            <td><?php echo $message?></td>
        </tr> 
</table>




</main>


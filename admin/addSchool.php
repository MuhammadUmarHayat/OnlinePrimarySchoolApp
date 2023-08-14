
<?php
include '../config.php';
$message="";

if(isset($_POST['submit']))
{
    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) 
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
 //name,medium,gender,level,address,area,city,phone,principal,

$name=$_POST['name'];
$medium=$_POST['medium'];
$gender=$_POST['gender'];
$level=$_POST['level'];
$address=$_POST['address'];
$area=$_POST['area'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$principal=$_POST['principal'];

$remarks="ok";
$status="active";////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////`schools`( `name`, `medium`, `gender`, `photo`, `level`, `principal`, `address`, `city`, `area`, `status`, `phone`, `remarks`)


    $query="INSERT INTO `schools`( `name`, `medium`, `gender`, `photo`, `level`, `principal`, `address`, `city`, `area`, `status`, `phone`, `remarks`) VALUES ('$name','$medium','$gender','$imgContent','$level','$principal','$address','$city','$area','$status','$phone','$remarks')";
    $query = mysqli_query($con,$query);
    
    $message="Information is added successfully ";

   // header('Location:http://localhost/opffinal/cources');
}
}
else
{
    $message="Fields should not empty ";
}


}
?>




<?php
include("header.php");

include("nav.php");

?>
<main style="margin-top:80px;">
<section>
    <h2>Add School Information Form</h2>
    <form action="addSchool.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
           
            <td>School Name</td>
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
            <td><label for="gender">Choose Gender</label></td>
            <td>
            <select name="gender" id="gender">
  <option value="boys">For Boys</option>
  <option value="girls">For Girls only</option>
  <option value="both">Both</option>
  </select>
        </td>
            <td>*</td>
        </tr>
        <tr>
            <td><label for="level">Choose Level</label></td>
            <td>
            <select name="level" id="level">
  <option value="elementery">Elementery</option>
  <option value="secondary">Secondary</option>
  <option value="high">High</option>
  </select>
        </td>
            <td>*</td>
        </tr>
        <tr>
                                <td>
                                    <label>Select Image File:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
                                <td>*</td>
        </tr>
        <tr>
            <td>Enter Principal Name</td>
            <td><input type="text" name="principal" Required/></td>
            <td>*</td>
        </tr> 
        <tr>
            <td>Enter phone Number</td>
            <td><input type="text" name="phone" Required/></td>
            <td>*</td>
        </tr> 
        <tr>
            <td>Enter city</td>
            <td><input type="text" name="city" Required/></td>
            <td>*</td>
        </tr> 
        <tr>
            <td>Enter area</td>
            <td><input type="text" name="area" Required/></td>
            <td>*</td>
        </tr> 
        <tr>
            <td>Enter your complete address</td>
            <td><input type="text" name="address" Required/></td>
            <td>*</td>
        </tr> 
        <tr>
            <td></td>
            <td><input class="btn btn-success btn-lg btn-block mt-3" type="submit" name="submit" value="submit"/></td>
            <td><?php echo $message?></td>
        </tr> 
    </table>
</form>
</section>
</main>
<?php
include("../footer.php");
?>
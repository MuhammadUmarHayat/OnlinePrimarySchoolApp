

<?php
include 'config.php';
$message="";

if(isset($_POST['submit']))
{
 //name,fname,cnic,email,password,rpassword,gender,city,area,address

$name=$_POST['name'];
$fname=$_POST['fname'];
$cnic=$_POST['cnic'];
$email=$_POST['email'];
$password=$_POST['password'];
$rpassword=$_POST['rpassword'];
$gender=$_POST['gender'];
$city=$_POST['city'];
$area=$_POST['area'];
$address=$_POST['address'];
$role="user";

if($password==$rpassword)
{
    $query="INSERT INTO `users`(`name`, `fathername`, `cnic`, `email`, `password`, `gender`, `role`, `address`, `city`, `area`) VALUES ('$name','$fname','$cnic','$email','$password','$gender','$role','$address','$city','$area')";
    $query = mysqli_query($con,$query);
    
    $message="You are registered successfully ";
}
else
{
    $message="password must match ";
}


}
?>




<?php
include("header.php");
include("nav.php");

?>
<main>
<section>
    <h2>Guardian / Candidate Registration Form</h2>
    <form action="signup.php" method="post">
    <table>
        <tr>
           
            <td>Name</td>
            <td><input type="text" name="name" Required/></td>
            <td>*</td>
        </tr>
        <tr>
            <td>Father Name</td>
            <td><input type="text" name="fname" Required/></td>
            <td>*</td>
        </tr>
        <tr>
            <td>B Form/ CNIC</td>
            <td><input type="text" name="cnic" Required/></td>
            <td>*</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" Required/></td>
            <td>*</td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" Required/></td>
            <td>*</td>
        </tr>
        <tr>
            <td>Retype Password </td>
            <td><input type="password" name="rpassword" Required/></td>
            <td>*</td>
        </tr>
        <tr>
            <td><label for="gender">Choose your gender</label></td>
            <td>
            <select name="gender" id="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="undefined">Others</option>
  </select>
        </td>
            <td>*</td>
        </tr>
        <tr>
            <td>Enter your city</td>
            <td><input type="text" name="city" Required/></td>
            <td>*</td>
        </tr> 
        <tr>
            <td>Enter your area in the city</td>
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
include("footer.php");
?>
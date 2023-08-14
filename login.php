<?php
include 'config.php';
$message="";

if(isset($_POST['submit']))
{
   
$userid=$_POST['email'];
$password=$_POST['password'];
if($userid=="admin@gmail.com" && $password=="admin")
{
    session_start();// start the session
    $_SESSION['userid'] = $userid;
    header('Location:http://localhost/opffinal/admin/index.php');
}
else
{
    //candidate 
    $result = $con->query("SELECT * FROM `users` WHERE `email`='$userid' and `password`='$password'");

    if ($result->num_rows > 0)
    {
        //id password is correct
        session_start();// start the session
        $_SESSION['userid'] = $userid;
        header('Location:http://localhost/opffinal/candidate/index.php');
    }
    else
    {
        $message="Enter correct email and password ";
    }

}



}
?>

<?php
include("header.php");
include("nav.php");
?>
<main>
<section>
    <h2>Login</h2>
    <form action="login.php" method="post">
    <table>
        <tr>
           
            <td>Enter your email</td>
            <td><input type="email" name="email" Required/></td>
            <td>*</td>
        </tr>
        <tr>
            <td>Enter your Password</td>
            <td><input type="password" name="password" Required/></td>
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

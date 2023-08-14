
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
    ////INSERT INTO `school_uniforms`( `school_id`, `winter_uniform_boys`, `winter_uniform_girls`,
    // `summer_uniform_boys`, `summr_uniform_girls`, `revision_date`, `status`) VALUES ('','','','','','','','')
    $winter_uniform_boys=$_POST['winter_uniform_boys'];
$winter_uniform_girls=$_POST['winter_uniform_girls'];
$schoolid=$_POST['schoolid'];
$summer_uniform_boys=$_POST['summer_uniform_boys'];
$summr_uniform_girls=$_POST['summr_uniform_girls'];
$status="ok";
$revision_date=date("y/m/d");



$query="INSERT INTO `school_uniforms`( `school_id`, `winter_uniform_boys`, `winter_uniform_girls`, `summer_uniform_boys`, `summr_uniform_girls`, `revision_date`, `status`) VALUES ('$schoolid','$winter_uniform_boys','$winter_uniform_girls','$summer_uniform_boys','$summr_uniform_girls','$revision_date','$status')";
$query = mysqli_query($con,$query);

$message="Information is added successfully ";

}
?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Add Uniform information</h2>

<form action="adduniforms.php" method="post">
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
          
           <td>Enter uniform for winter for boys</td>
           <td><input type="text" name="winter_uniform_boys" Required/></td>
           <td>*</td>
       </tr>
<tr>
<td>Enter uniform for winter for girls</td>
           <td><input type="text" name="winter_uniform_girls" Required/></td>
           <td>*</td>
       </tr>
        
       <tr>
<td>Enter uniform for summer for boys</td>
           <td><input type="text" name="summer_uniform_boys" Required/></td>
           <td>*</td>
       </tr>

       <tr>
<td>Enter uniform for summer for girls</td>
           <td><input type="text" name="summr_uniform_girls" Required/></td>
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
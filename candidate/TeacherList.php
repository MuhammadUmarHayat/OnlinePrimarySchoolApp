
<?php
include '../config.php';
session_start();
$userid=  $_SESSION['userid'] ;
$result;
$id= $_GET['id'];
if(!isset($userid))
{
    header('Location:http://localhost/opffinal/logout.php');
}
else
{
    // Get image data from database 
$result = $con->query("SELECT * FROM `school_teachers` where school_id ='$id'");



}

?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<?php  echo " Welcome ". $userid;?>
<table border=2>
<tr>
                        <th>#</th>
                        <th>Name</th>  
                        <th>Father Name</th>
                        <th> </th>                 
                        
                        <th>Qualification</th>
                        <th>Course</th>
                        <th>Date of Joining </th>
                        
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php if ($result->num_rows > 0) { ?>



<?php while ($row = $result->fetch_assoc()) { ?>

    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['father_name'] ?></td>
    <td> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px height=50px /> </td>             
     
     <td><?php echo $row['qualification'] ?></td>
     <td><?php echo $row['course'] ?></td>
                        <td><?php echo $row['doe'] ?></td>
                        <td></td>
                        <td></td>
                        
                    </tr>

                    <td>
<?php
 }
}?></td>
</table>
</main>

<?php
include("../footer.php");
?>
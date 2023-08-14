
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
$result = $con->query("SELECT * FROM `school_fees` where `school_id` ='$id'");



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
                        <th>Title</th>  
                        <th>Description</th>
                        <th>Level </th>                 
                        
                        <th>Fee</th>
                        <th>Revision Date</th>
                        <th> </th>
                        
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php if ($result->num_rows > 0) { ?>



<?php while ($row = $result->fetch_assoc()) { ?>
    
    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['title'] ?></td>
    <td><?php echo $row['description'] ?></td>
    
     
     <td><?php echo $row['level'] ?></td>
     <td><?php echo $row['fee'] ?></td>
                        <td><?php echo $row['revision_date'] ?></td>
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
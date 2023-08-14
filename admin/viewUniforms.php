
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
$result = $con->query("SELECT * FROM `school_uniforms` where school_id ='$id'");



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
                        <th>Winter Uniform For Boys</th>  
                        <th>Winter Uniform For Girls</th>
                        <th>Summer Uniform for Bor </th>                 
                        
                        <th>Summer Uniform For Girls</th>
                        <th>Revision Date</th>
                        <th> </th>
                        
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php if ($result->num_rows > 0) { ?>



<?php while ($row = $result->fetch_assoc()) { ?>
    
    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['winter_uniform_boys'] ?></td>
    <td><?php echo $row['winter_uniform_girls'] ?></td>
    
     
     <td><?php echo $row['summer_uniform_boys'] ?></td>
     <td><?php echo $row['summr_uniform_girls'] ?></td>
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

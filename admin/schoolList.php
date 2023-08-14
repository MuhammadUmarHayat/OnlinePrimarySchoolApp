
<?php
include '../config.php';
session_start();
$userid=  $_SESSION['userid'] ;
$result;
if(!isset($userid))
{
    header('Location:http://localhost/opffinal/logout.php');
}
else
{
    // Get image data from database 
$result = $con->query("SELECT * FROM `schools`");



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
                        <th> </th>                 
                        <th>Medium</th>
                        <th>For</th>
                        <th>Level</th>
                        <th>Principal </th>
                        <th>Phone No </th>
                       
                        <th> City</th>
                        <th>Address </th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php if ($result->num_rows > 0) { ?>



<?php while ($row = $result->fetch_assoc()) { ?>

    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px height=50px /> </td>             
     <td><?php echo $row['medium'] ?></td>
     <td><?php echo $row['gender'] ?></td>
     <td><?php echo $row['level'] ?></td>
                        <td><?php echo $row['principal'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                       
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo '<a style="color: #1BA098; text-decoration: none;"  href="editSchool.php?id=' . $row['id'] . '">Edit School</a>';?></td>
                        <td><?php echo '<a style="color: #1BA098; text-decoration: none;"  href="deleteSchool.php?id=' . $row['id'] . '">Delete School</a>';?></td>
                        <td><?php echo '<a style="color: #1BA098; text-decoration: none;"  href="TeacherList.php?id=' . $row['id'] . '">View Teachers</a>';?></td>
                        <td><?php echo '<a style="color: #1BA098; text-decoration: none;"  href="CourcesList.php?id=' . $row['id'] . '">View Cources</a>';?></td>
                        <td><?php echo '<a style="color: #1BA098; text-decoration: none;"  href="viewUniforms.php?id=' . $row['id'] . '">View Uniforms</a>';?></td>
                        <td><?php echo '<a style="color: #1BA098; text-decoration: none;"  href="viewFees.php?id=' . $row['id'] . '">View Fees</a>';?></td>
                    
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
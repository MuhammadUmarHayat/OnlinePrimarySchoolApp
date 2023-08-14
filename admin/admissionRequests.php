
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
$result = $con->query("SELECT * FROM `admission_requests` where `status` ='requested'");



}

?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Admission Requests </h2>
<table border=2>
<tr>
                       
                        <th>School Name</th>  
                        <th>Student Name</th>
                        <th>Level</th>                 
                        
                        <th>Class</th>
                        <th>Gender</th>
                        
                        
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php if ($result->num_rows > 0) { ?>



<?php while ($row = $result->fetch_assoc()) { ?>

    <tr>
    <!-- <td><?php echo $row['id'] ?></td> -->

    <td><?php echo $row['school_id'] ?></td>
    <td><?php echo $row['student_id'] ?></td>
    
     
     <td><?php echo $row['level'] ?></td>
     <td><?php echo $row['class'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td>  <a class="btn btn-warning btn-lg btn-block" href="candidateDetails.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">View Details</a> </td>
                        <td></td>
                        
                    </tr>

                    <td>
<?php
 }
}?></td>
</table>

</main>


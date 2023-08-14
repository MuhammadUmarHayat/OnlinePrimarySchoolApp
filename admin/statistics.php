
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
$result = $con->query("SELECT * FROM `school_cources` where school_id ='$id'");



}

?>

<?php
include("header.php");
include("nav.php");

?>

<main>

<h2>Courses </h2>
<table border=2>
<tr>
                        <th>#</th>
                        <th>CourseName</th>  
                        <th>Medium</th>
                        <th>Class</th>                 
                        
                        <th>Publisher</th>
                        <th>Author</th>
                        
                        
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php if ($result->num_rows > 0) { ?>



<?php while ($row = $result->fetch_assoc()) { ?>

    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['course_name'] ?></td>
    <td><?php echo $row['medium'] ?></td>
    
     
     <td><?php echo $row['level'] ?></td>
     <td><?php echo $row['publisher'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td></td>
                        <td></td>
                        
                    </tr>

                    <td>
<?php
 }
}?></td>
</tabl>
<?php
include("../footer.php");
?>
</main>


<?php include '../config.php';
 
$id= $_GET['id'];


 $con->query("DELETE FROM `users_childern` WHERE `id`='$id'"); 
             
               
 header('Location:'.'index.php');

             

?>
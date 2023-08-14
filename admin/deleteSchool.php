<?php include '../config.php';
 
$id= $_GET['id'];


 $con->query("DELETE FROM `schools` WHERE `id`='$id'"); 
             
               
 header('Location:'.'schoollist.php');

             

?>
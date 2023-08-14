<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
//$id;
$result;
$query ="";
$msg ="";

$id= $_GET['id'];
$query = "SELECT * FROM `users_childern` where `id`= '$id'"; 
$result = $con->query($query);
if ($result->num_rows > 0) 
            {
               $row = $result->fetch_assoc();
$gaurdianid=  $row['email'];

             $student_id=  $row['name'];
$staus="approved";
             $query="UPDATE `admission_requests` set `status`='$staus' where `gaurdianid`='$gaurdianid' and `student_id`='$student_id'";
             $con->query($query);
             header('Location:'.'admissionRequests.php');
            }
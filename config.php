<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'opsfafinaldb');
if(mysqli_connect_error())
{
    die("DB Connection Failed");
}
?>
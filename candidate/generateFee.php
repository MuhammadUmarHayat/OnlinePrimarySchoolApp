<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
//$id;
$result;
$query ="";
$message ="";
$student_id="";
$school_id= "";
$level="";
$fee= "";
if(isset($_POST['submit']))
{
    $student_id=$_POST['student_id'];
$query="select * from `admission_requests` where  `student_id`='$student_id' and `gaurdianid`='$userid' and status='approved'";
  $result = $con->query($query);

  if ($result->num_rows > 0) 
            {
               $row = $result->fetch_assoc();
                
                   $level= $row['level'];
                  $school_id=  $row['school_id'];

                  $query="select * from `school_fees` where  `level`='$level' and `school_id`='$school_id'";
                $result = $con->query($query);

if ($result->num_rows > 0) 
            {
            $row = $result->fetch_assoc();
          $fee=  $row['fee'];
                
            }

                }
            
            }






include("header.php");
include("nav.php");

?>

   <main>
   
   <h1>Wellcome <?php echo $userid;?></h1>
   <form action="generateFee.php" method="post">
   <table>
   <tr>
            <td>
   <select class="form-control" name="student_id">
    <option disabled selected>-- Select  Student Name--</option>
    <?php
	
    include 'config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT name From `users_childern` where email='$userid'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>
            
            <td><input class="class=form-control btn btn-success btn-lg btn-block" type="submit" name="submit" value="submit"/></td>
            <td><?php echo $message?></td>
        </tr> 
</table>
<button type="submit" name="print" onclick="doPrint()" >Download Vouchar</button>


<?php
$query="select * from `schools` where  `id`='$school_id'";
$SchoolName="";
$result = $con->query($query);
if ($result->num_rows > 0) 
            {
            $row = $result->fetch_assoc();
         $SchoolName=  $row['name'];
                
            }
            
 $student_id;

 $level;
$fee;?>


<div id="div1">
    <Table border=1>
        <tr><td>Schoo Fee Vouchar</td><td>Date <?php $currentDate = date('Y-m-d');
echo $currentDate;?></td><td></td></tr>
        <tr><td>School name</td><td><?php echo $SchoolName ?></td><td></td></tr>
        <tr><td>Student Name</td><td><?php echo $student_id?></td><td></td></tr>
        <tr><td>Fee </td><td><?php echo $fee?></td><td></td></tr>
        </table>
</div>

<script>
    function doPrint() {
        var prtContent = document.getElementById('div1');
        prtContent.border = 0; //set no border here
        var WinPrint = window.open('', '', 'left=100,top=100,width=1000,height=1000,toolbar=0,scrollbars=1,status=0,resizable=1');
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
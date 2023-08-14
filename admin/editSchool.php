<?php
include '../config.php'; 
session_start();// start the session
$result ;
$sum ;


$message="";

$id= $_GET['id'];

$name="";
$principal="";
$medium="";
$level="";
$address="";
$area="";

$result = $con->query("SELECT * FROM `schools`  where  `id`='$id'"); 
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
          
       $id=	$row['id'];

        $name=$row['name'];
        $principal=$row['principal'];
        $medium=$row['medium'];
        $level=$row['level'];
        $address=$row['address'];
        $area=$row['area'];
       
        
}
           

}  





if(isset($_POST['save']))
{

	$id= $_GET['id'];
	 $data = $_POST;
	
	

 
   
      

       $name=$_POST['name'];
       $principal=$_POST['principal'];
       $medium=$_POST['medium'];
       $level=$_POST['level'];
       $address=$_POST['address'];
       $area=$_POST['area'];
      

         $query="update `schools` set `name`='$name',  `principal`='$principal',`medium`='$medium',`level`='$level',`address`='$address',`area`='$area' where `id`='$id'";
        $insert = mysqli_query($con,$query);
        
     
        $message="Record is updated successfully";
        header('Location:'.'schoolList.php');
    
        }
    
        
    
    
    
    



        include("header.php");
        include("nav.php");

?>


<main>
     
            <div id="right">
            
            <form action="editSchool.php?id=<?php echo $id; ?>" method="post">
    <div class="center">
<table>
 
<tr><td>ID</td><td><?php echo $id; ?></td></tr>  

<tr> <td>Name </td> <td><input type="text" name="name" value="<?php echo $name; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Principal Name </td> <td><input type="text" name="principal" value="<?php echo $principal; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Medium </td> <td><input type="text" name="medium" value="<?php echo $medium; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Level </td> <td><input type="text" name="level" value="<?php echo $level; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Address </td> <td><input type="text" name="address" value="<?php echo $address; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Area </td> <td><input type="text" name="area" value="<?php echo $area; ?>" >  <span class="error" >*</span > </td>   </tr>

<tr> <td> </td>
 <td> <button type="submit" name="save"> Save changes </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>


            
    </main>
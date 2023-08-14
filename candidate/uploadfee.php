
<?php
include '../config.php';

$message="";

if(isset($_POST['submit']))
{
    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) 
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
 //INSERT INTO `student_fees`( `title`, `school_id`, `student_id`, `amount`, `submit_date`, `voucher`, `status`) VALUES ('','','','','','','','')

$title=$_POST['title'];
$school_id=$_POST['school_id'];
$student_id=$_POST['student_id'];
$amount=$_POST['amount'];
$submit_date=date('d/m/y');
$status="submitted";


//////////////////////////////////////////////////////////////////////INSERT INTO `student_fees`( `title`, `school_id`, `student_id`, `amount`, `submit_date`, `voucher`, `status`) VALUES ('','','','','','','','')


    $query="INSERT INTO `student_fees`( `title`, `school_id`, `student_id`, `amount`, `submit_date`, `voucher`, `status`) VALUES ('$title','$school_id','$student_id','$amount','$submit_date','$imgContent','$status')";
    $query = mysqli_query($con,$query);
    
    $message="Vouchar is uploaded successfully ";

  
}
}
else
{
    $message="Fields should not empty ";
}


}
?>




<?php
include("header.php");

include("nav.php");

?>
<main style="margin-top:80px;">
<section>
    <h2>Upload School Fee Vouchar</h2>
    <form action="uploadfee.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
          
            <td>School Name</td>
            <td><input type="text" name="school_id" Required/></td>
            <td>*</td>
        </tr>
        
        <tr>
            <td>Enter Student name</td>
            <td><input type="text" name="student_id" Required/></td>
            <td>*</td>
        </tr> 
        
                                <td>
                                    <label>Select Image File:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
                                <td>*</td>
        </tr>
        
        <tr>
            <td>Amount</td>
            <td><input type="text" name="amount" Required/></td>
            <td>*</td>
        </tr> 
       
        <tr>
            <td></td>
            <td><input class="btn btn-success btn-lg btn-block mt-3" type="submit" name="submit" value="submit"/></td>
            <td><?php echo $message?></td>
        </tr> 
    </table>
</form>
</section>
</main>


<?php
include "..\config.php";
session_start();
$userid=  $_SESSION['userid'] ;
if(!isset($userid))
{
    header('Location:http://localhost/opffinal/logout.php');
}
else
{
     $userid;
}

?>

<?php
include("header.php");
include("nav.php");

?>

<main>


<main>
<h1>Wellcome <?php echo $userid;?></h1>
   <section id="portfolio" class="portfolio section-padding ">
          <div class="container">
            
            <div class="row">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Registered Schools</h3>
                    <p class="lead">
                    <?php $countUsers="SELECT count(`id`) AS total_users FROM `schools`";
$result = mysqli_query($con, $countUsers); 
$row = mysqli_fetch_assoc($result); 
echo $total_users = $row['total_users'];?>
                       </p>
                    
                  </div>
                </div>
              </div>

              
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Admissions</h3>
                    <p class="lead">
                    <?php $countUsers="SELECT count(`id`) AS total_users FROM `admission_requests`";
$result = mysqli_query($con, $countUsers); 
$row = mysqli_fetch_assoc($result); 
echo $total_users = $row['total_users'];?>
                       </p>
                    
                  </div>
                </div>
              </div>




              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Fee</h3>
                    <p class="lead">
                    <?php $countUsers="SELECT sum(`fee`) AS total_users FROM `school_fees`";
$result = mysqli_query($con, $countUsers); 
$row = mysqli_fetch_assoc($result); 
echo $total_users = $row['total_users'];?>
                       </p>
                    
                  </div>
                </div>
              </div>
              <div class="row mt-3">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Views</h3>
                    <p class="lead">
                    2K
                       </p>
                    
                  </div>
                </div>
              </div>


</main>
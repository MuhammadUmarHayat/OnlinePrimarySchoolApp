<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
//$id;
$result;
$query ="";
$msg ="";
session_start();
$userid=  $_SESSION['userid'] ;

$query = "SELECT * FROM `admission_requests` where `gaurdianid`= '$userid'"; 
$result = $con->query($query);


//$query = "SELECT * FROM `admission_requests` where `email`= '$userid'"; 



include("header.php");
include("nav.php");

?>

   <main>
   
   <h1>User ID <?php echo $userid;?></h1>
   
   
        <section id="portfolio" class="portfolio section-padding ">
          <div class="container">
          
            <div class="row">
              <div class="col-md-12">
                <div class="section-header text-center pb-5">
                
                  
                </div>
              </div>
            </div>
            <div class="row">
              
            <?php
            if ($result->num_rows > 0) 
            {
               while ($row = $result->fetch_assoc())
                {//`class`, `gender`
                    ?>
                    
           <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">  <?php echo $row['student_id'] ?></h3>
                    <p class="lead"> School<?php echo $row['school_id'] ?></p>
                   
                    <p class="lead">Class  <?php echo $row['class'] ?></p>
                    <p class="lead">Gender <?php echo $row['gender'] ?></p>

                    <p class="lead btn-success">Request is <?php echo $row['status'] ?></p>
                   
               
                </div>
                </div>
              <?php
                    }
                }
                else{
                  echo "No Product is found";
                }
                
            ?>

              
             

              

            </div>

            </div>
          </div>
          
        </section>

        




</main>




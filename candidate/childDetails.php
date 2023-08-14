<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
//$id;
$result;
$query ="";
$msg ="";

$query = "SELECT * FROM `users_childern` where `email`= '$userid'"; 
if(isset($_POST['submit']))
{
    
}

  $result = $con->query($query);



include("header.php");
include("nav.php");

?>

   <main>
   
   <h1>Father /Guardian ID <?php echo $userid;?></h1>
   
   
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
                {
                    ?>
                    
           <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" alt="" class="img-fluid">
                   
                    </div>
                    <h3 class="card-title">  <?php echo $row['name'] ?></h3>
                    <p class="lead"> B Form/CNIC No<?php echo $row['cnic'] ?></p>
                    <p class="lead">Date of Birth <?php echo $row['dob'] ?></p>
                    <p class="lead">Father Name  <?php echo $row['father_name'] ?></p>
                    <p class="lead">Mother Name <?php echo $row['mother_name'] ?></p>
                    <div class="img-area mb-4">
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['father_cnic']); ?>" alt="" class="img-fluid">
                </div>
                <div class="img-area mb-4">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['mother_cnic']); ?>" alt="" class="img-fluid">
                    </div>
                <div class="img-area mb-4">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Bform']); ?>" alt="" class="img-fluid">
                </div>
                <div class="img-area mb-4">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['domicile']); ?>" alt="" class="img-fluid">
                    </div>
                    
            <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">

                   
                    <a class="btn btn-danger btn-lg btn-block mt-3" href="deleteChild.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">Delete Information</a> 
               
              </div>
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




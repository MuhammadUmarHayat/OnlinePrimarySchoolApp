<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
//$id;
$result;
$query ="";
$msg ="";

if(isset($_POST['submit']))
{
    $city = $_POST['city'];
    $name =  $_POST['name'];
    $medium = $_POST['medium'];
    $gender = $_POST['gender'];
  
    if(isset($_POST['city']) )
{
    $query = "SELECT * FROM `schools` where `city`= '$city'"; 
}
else if(isset($_POST['city']) && isset($_POST['name']))
{
        $query = "SELECT * FROM `schools` where `city`= '$city' and  `name`='$name'"; 
}
else if(isset($_POST['city']) &&  isset($_POST['medium']))
{
       $query = "SELECT * FROM `schools` where `city`= '$city' and  `medium`='$name'"; 
}
else if(isset($_POST['city']) && isset($_POST['gender']))
{
      $query = "SELECT * FROM `schools` where `city`= '$city' and  `gender`='$gender'"; 
}
else
{
 //city,medium,gender
  

  	//$query = "SELECT * FROM `schools`"; 
	
}
}
else
{
 echo $query = "SELECT * FROM `schools` "; 
}

  $result = $con->query($query);



include("header.php");
include("nav.php");

?>

   <main>
   
   <h1>Wellcome <?php echo $userid;?></h1>
   
   <div class="row">
    <div class="col-md-12">
    <div class="section-header text-center pb-2">
            <form action="index.php" method="post">
                <table>
                <tr>
              <td>          
                <select class="form-control" name="city" Required>
    <option disabled selected>-- Select  City--</option>
    <?php
	
    include 'config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT city From schools");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['city'] ."'>" .$data['city'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>   
    </td>
    <td>
    <select class="form-control" name="medium" id="medium">
  <option value="english">English</option>
  <option value="urdu">Urdu</option>
  <option value="cambridge">Others</option>
  </select>
    </td>
    <td><label for="gender"></label></td>
            <td>
            <select class="form-control" name="gender" id="gender">
  <option value="boys">For Boys</option>
  <option value="girls">For Girls</option>
  <option value="both">Both</option>
  </select>
  <?php echo $msg ;?>
        </td>
                        
                   
                        <td><input class="form-control" type="text" name="name" placeholder="Enter School Name " ></td>
                       
                        <td><input class="form-control btn btn-success"  type="submit" name="submit" id="submit" value="search"></td><td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
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
                    <p class="lead"> Medium <?php echo $row['medium'] ?></p>
                    <p class="lead">Address <?php echo $row['address'] ?></p>
                    <p class="lead">Area  <?php echo $row['area'] ?></p>
                    <p class="lead">Level  <?php echo $row['level'] ?></p>
                    <p class="lead">For <?php echo $row['gender'] ?></p>
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">

                   
                    <a class="btn btn-success btn-lg btn-block mt-3" href="apply.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">Apply Now</a> 
                    <a class="btn btn-success btn-lg btn-block mt-3" href="schoolList.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">View Details</a> 
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




<?php

    session_start();

    include 'config.php';

    if(isset($_POST['submit']))
    {
      $cname =$_POST['cname'];
      $cindustry =$_POST['cindustry'];
      $cfounded =$_POST['cfounded'];
      $cceo =$_POST['cceo'];
      $clocation =$_POST['clocation'];
      $cemail =$_POST['cemail'];
      $ccontact =$_POST['ccontact'];
      $cdescription =$_POST['cdescription'];
      $cprofilepic=$_FILES['cprofilepic'];
      $filename=$cprofilepic['name'];
      $filepath=$cprofilepic['tmp_name'];
      $fileerror=$cprofilepic['error'];
      if($fileerror==0 && $_SESSION['email']==$cemail)
      {
            $destfile='upload/'.$filename;
            move_uploaded_file($filepath,$destfile);
            $sql= "INSERT INTO `company` (`cname`, `cindustry`, `cfounded`, `cceo`, `clocation`, `cemail`, `ccontact`, `cprofilepic`, `cdescription`) VALUES ('$cname', '$cindustry', '$cfounded', '$cceo', '$clocation', '$cemail', '$ccontact', '$destfile', '$cdescription')";
            $res1=mysqli_query($conn,$sql);
            if($res1)
            {
                ?>
                <script>
                    alert("Data is inserted!!!")
                </script>
                <?php
                    header ('location: employee_home.php');
            }
      }
      else{
        ?>
        <script>
            alert("Please, Enter Your Registered Mailid!!")
        </script>
        <?php
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1">

    <title>Placemento</title>

    <link href="./img/Favicon.png" rel="icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="style.css">    
</head>
<body>
<div>
<!-- 
nav  ma style="background-color:#fff; box-shadow:0 0 5px 0 rgba(0, 0, 0, 0.3);"
 divclass toplogo  style="padding-left:42%; padding-bottom:0.7%;" -->

</div>
<nav >
<div class="toplogo" >
 <img src="Images/Placemento.png" style="width:28%; height:auto;">
 </div>
</nav>
<div class="container" id="company">
  <form action="" method="post" class="company-create" enctype="multipart/form-data">
  <div class="heading">
    Company Profile
  </div>
      <div class="row" >
        <div class="col-sm-12">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="cname"  required>   <br>   
          
            <label for="cindustry" class="form-label">Industry</label>
            <input type="text" class="form-control" name="cindustry" required><br> 
          
            <label for="cfounded" class="form-label">Founded on (Year)</label>
            <input type="text" class="form-control" name="cfounded" required> <br>   
         
            <label for="cceo" class="form-label">CEO Name</label>
            <input type="text" class="form-control" name="cceo"> <br> 
     
            <label for="clocation" class="form-label">Location</label>
            <input type="text" class="form-control" name="clocation"><br> 
 
            <label for="cemail" class="form-label">Email name</label>
            <input type="text" class="form-control" name="cemail" required><br> 
  
            <label for="ccontact" class="form-label" >Contanct No.</label>
            <input type="text" class="form-control" name="ccontact" required><br> 
            <label for="cprofilepic">Company Logo: &nbsp; &nbsp;</label>
            <input type="file" name="cprofilepic">
           <br> 
            <label for="cdescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" rows="10"  name="cdescription"></textarea>
            <br>
           <input class="btn btn-success" type="submit"  name="submit" value="Create Profile">              
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>














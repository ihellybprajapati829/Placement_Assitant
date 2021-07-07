<?php

session_start();

include 'config.php';

if(isset($_POST['submit']))
{
    $ename=$_POST['ename'];
    $city=$_POST['city'];
    $contactno=$_POST['contactno'];
    $emailid=$_POST['emailid'];
    $dob=$_POST['dob'];
    $interest1=$_POST['interest1'];
    $interest2=$_POST['interest2'];
    $interest3=$_POST['interest3'];
    $experience=$_POST['experience'];
    $about=$_POST['about'];
    $education=$_POST['education'];
    $profilepic=$_FILES['profilepic'];
    $filename=$profilepic['name'];
    $filepath=$profilepic['tmp_name'];
    $fileerror=$profilepic['error'];
    if($fileerror==0 && $_SESSION['email']==$emailid)
    {
        $destfile='upload/'.$filename;
        move_uploaded_file($filepath,$destfile);
        $insertquery3="INSERT INTO `employee`(`ename`, `city`, `contactno`, `eemail`, `dob`, `interest1`, `interest2`, `interest3`, `experience`, `about`, `education`, `profilepic`)
        VALUES ('$ename','$city','$contactno','$emailid','$dob','$interest1','$interest2','$interest3','$experience','$about','$education','$destfile')";
        
        $res1=mysqli_query($conn,$insertquery3);
        
        if($res1)
        {
            ?>
            <script>
                alert("Data is inserted!!!")
            </script>
            <?php
            header ('location: employee_home.php');
        }
        else{
            ?>
            <script>
                alert("Data is not inserted!!")
            </script> 
            <?php 
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Placemento</title>

    <link href="./img/Favicon.png" rel="icon">
</head>
<body>
    <div class="container">
        <div class="title">create your profile</div>
        <form action="" method="POST" enctype="multipart/form-data" id="employee">
              <label for="ename" >employee-name:</label>
              <input type="text" id="ename" name="ename" placeholder="enter your name" required>
              <label for="city">city</label>
              <input type="text" id="city" name="city" placeholder="enter your city" required>
              <label for="contactno">contact-no:</label>
              <input type="text" id="contactno" name="contactno" placeholder="enter your city" required>
              <label for="emailid">email:</label>
              <input type="email" id="emailid" name="emailid" placeholder="email address" required>
              <label for="dob">Date of Birth:</label>
              <input type="date" id="dob" name="dob" value="mm/dd/yyyy" required>
              <label for="interest1">area of interest</label>
              <input type="text" id="interest1" name="interest1" placeholder="enter your area of interest" required>
              <label for="interest2">another are of inerest want to add?</label>
              <input type="text" id="interest2" name="interest2" placeholder="enter your area of inerest">
              <label for="interest3">another are of inerest want to add?</label>
              <input type="text" id="interest3" name="interest3" placeholder="enter your area of inerest">
              <label for="experience">work-experience:</label>
              <input type="text" id="experience" name="experience" placeholder="years of experience" >
              <label for="about">about yourself</label>
              <textarea id="about" name="about" placeholder="describe yourself" style="height:200px"></textarea>
              <label for="education">educational-info</label>
              <textarea id="education" name="education" placeholder="educational details" style="height:200px"></textarea>
              <label for="profilepic">profilepic</label>
              <input type="file" name="profilepic">
              <br/>
              <input type="submit" name="submit" value="Register">
        </form>
        </div>
    </div>
    
</body>
</html>

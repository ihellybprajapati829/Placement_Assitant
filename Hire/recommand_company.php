<?php include('include/head.php')?>

<?php 
        session_start();
        include 'config.php';
        if($_SESSION['email'])
        {
            $email = $_SESSION['email'];
            $query = "SELECT * FROM `company` WHERE cemail='$email'";
            $query_run = mysqli_query($conn,$query);
            $result = mysqli_fetch_array($query_run);
        }
        else{
            header("location:index.php");
        }
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background:transparent;">
        <div class="container-fluid" style="">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="margin-left:50px;">
                    <img src="./img/Placemento.png" alt="Logo" class="logo"/>
                    <a class="nav-link" aria-current="page" href="company_home.php">Home</a>
                    <a class="nav-link" href="company_dashboard.php">Dashboard</a>
                    <a class="nav-link active" href="recommand_company.php">Recommendations</a>
                    <a class="nav-link" href="company_profile.php" id="icon"><i class="fa fa-user"></i></a>
                    <a href="logout.php"><input class="logout" type="submit" name="submit" value="Log Out"
                            style="background-color: black;color: #defff1;border-radius: 8px;line-height: 1.5;position: absolute;margin-top: 0.3%;padding: 0.4%;"></a>
                </div>
            </div>
        </div>
    </nav>

    <?php

            include 'config.php';
            
            $cemail =$_SESSION['email'];
            $sql = "SELECT * FROM `job` WHERE cemail='$cemail'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result))
                { 
                    $jfield = $row['jfield'];

                    $query = "SELECT * FROM `employee` WHERE interest1 like '%$jfield%' || interest2 like '%$jfield%' || interest3 like '%$jfield%' ";
                    $query_run = mysqli_query($conn,$query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row1 = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                            <div class="card-group row">
                                <div class="card" style="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row1['ename'];?></h5>
                                        <a href="./view_profile.php?id=<?php echo $row1['emp_id'];?>" class="btn btn-primary side">View Profile</a>
                                        <h6 class="card-title2"><?php echo $row1['city'];?></h6>
                                        <h6 class="card-title2"><?php echo $row1['eemail'];?></h6>
                                        <p class="card-text">Area Of Interest : <?php echo $row1['interest1'];?>, <?php echo $row1['interest2'];?>, <?php echo $row1['interest3'];?></p>
                                    </div>
                                </div>
                            </div> 
                            <br/> 
                            <?php              
                        }
                    }


                }
  
            }             
    ?>

    <br/>
    <br/>    

    <div class="footer">
        <div class="footer-content">
            Placemento
            <br>
            For contact <br>
            +912134567889 <br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Placemento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">

    <link href="./img/Favicon.png" rel="icon">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="   background-color: rgb(88, 189, 88);">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Profile</a>
                    <a class="nav-link" href="#">Jobs</a>
                    <a class="nav-link" href="#">Recommendations</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="bac">
        <br><br><br><br>
        <div class="middle">
            <nav class="navbar navbar-light bg-white">
                <div class="container-fluid">
                    <form class="d-flex" action="" method="POST">
                        <input class="form-control me-4" type="search" name="area" placeholder="search by area" aria-label="Search" />
                        <input class="form-control me-4" type="search"  name="job" placeholder="search by job-title " aria-label="Search" />
                        <input type="submit" name="submit" value="Submit" style="  color: white; background-color: rgb(69, 204, 69); border:none;">
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <?php 
        include 'config.php';

        if(isset($_POST['submit']))
        {
            $jtitle=$_POST['job'];
            $jloc=$_POST['area'];

            $query = "SELECT * FROM `job` WHERE jtitle like '%$jtitle%' && jloc like '%$jloc%' ";
            
            $query_run = mysqli_query($conn,$query);
            // $check_name = mysqli_num_rows($query_run) > 0;

            if(mysqli_num_rows($query_run) > 0)
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    ?>
                    <div class="card-body">
                         <h4> <?php echo $row['cname'];?> </h4>
                         <p class="card-text"></p>
                         <h5> <?php echo $row['jtitle'];?> </h5>
                         <h6> <?php echo $row['jdesc'];?> </h6>
                         <a href="#" class="btn btn-primary side" style="background-color:  rgb(69, 204, 69); border-color: white;">APPLY NOW</a>
                    </div> 
                <?php              
                }
            }
        }    
            // $jtitle = 'Junior Web Developer';
            // $jloc = 'Ahmedabad';
             
    ?>


<!-- 
    <div class="card-body">
        <h4> Company : TATA </h4>
        <p class="card-text"></p>
        <h5> Job Title : Web Development</h5>
        <h6>Job Description : <br> This job is open for Junier level web development.In this job you need to have a good
            gip in technology in HTML , CSS , JavaScript , Node.js react </h6>
        <a href="#" class="btn btn-primary side" style="background-color:  rgb(69, 204, 69); border-color: white;">APPLY
            NOW</a>

    </div> -->

    <br/>
    <br/>    

    <div class="footer">
        <div class="footer-content">
            Placemento
            <br>
            For contact <br>
            +912134567889 <br>
            hire_here@gmail.com
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
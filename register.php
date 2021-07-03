<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$selector = $_POST['selector'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM `users` WHERE `email`='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {

			$sql = "INSERT INTO `users` (`email`, `password`, `selector`) VALUES ('$email', '$password', '$selector')";

			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                header("Location: welcome.php");
			} 
			else 
			{
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} 
		else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}		
	} 
	else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Hire Here</title>

    <link href="./img/Favicon.png" rel="icon">
</head>

<body>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 28px; font-weight: 700;">Register</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>"
                    required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword"
                    value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <br />
            <div align="center">
                <div class="check">
                    <input type="radio" id="Job_seeker" name="selector" value="Job_Seeker" required>
                    <label for="Job_seeker">Job Seeker</label>
                </div>
                <div class="check">
                    <input type="radio" id="Company" name="selector" value="Company" required>
                    <label for="Company">Company</label>
                </div>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
        </form>
    </div>
</body>

</html>
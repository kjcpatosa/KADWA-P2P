<?php
	session_start();
    
	include("connection.php");

	//check if userid exists redirect to main page
	if(isset($_SESSION["userID"]) && !is_null($_SESSION["userID"]))
	{
    	echo "<script>window.location.href='main.php';</script>";
    	exit();
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!preg_match("/[_a-z0-9]+(\.[_a-z0-9]+)*@plm\.edu\.ph/i", $_POST['email']))
		{
			echo "Invalid Credentials.";
		}
		else 
		{
			$n = strlen($_POST["pword"]);
			if($n < 8 || $n > 20 || !preg_match("/[a-z0-9]/i", $_POST['pword']))
			{
				echo "Invalid Credentials.";
			}
			else
			{
				$email = substr($_POST['email'],0,-11);
				$sql = "SELECT * FROM user_information WHERE email = '$email'";
				$query = $con->query($sql); 
			
				if (!$con -> query($sql))
				{
				  echo("Error description: " . $con -> error);
				}
			
				if($query->num_rows > 0)
				{
					$row = $query->fetch_assoc();
					if(password_verify($_POST["pword"], $row["password"]))
					{
						$_SESSION['userID'] = $row['user_ID'];
						echo "<script>window.location.href=\"main.php\";</script>";
					}
					else
					{
						echo "<script>alert(\"Invalid username or password\");window.location.href=\"index.php\";</script>";
					}
				}
				else
				{
					echo "<script>alert(\"Invalid username or password\");window.location.href=\"index.php\";</script>";
				}
			}
		}
	}
    
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>KADWÁ</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  <link rel="stylesheet" href="./Style.css" />
  <link rel="stylesheet" href="./mobile-style.css">
</head>

<body>
 <header>
    <div class="container-fluid p-0" id = "myHeader">
      <nav class="navbar navbar-expand-lg" style = "background-color: #b71c1c; border-top: 5px solid #7f0000; border-bottom: 10px solid #ffb81d">
       <span class="navbar-brand mb-0 h1" style = "color: white; font-size: 30px"><span class="material-icons">sports_kabaddi</span> KADW<span style = "color: #ffb81d">Á</span></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-align-right text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mr-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item active">
				<a class="nav-link" href="#" STYLE = "font-size: 18px;">HOME<span class="sr-only">(current)</span></a>
            </li>
			<li class="nav-item">
				<a class="nav-link" href="#" STYLE = "font-size: 18px;">FAQs</a>
            </li>
			<li class="nav-item">
				<a href="signup.php" class="btn btn-primary mb-3" id = "navsignup_btn">SIGN UP</a>
			</li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
 
  <main>
  <section class = "section-1">
	<div class="container text-center">
      <div class="row">
		<div class="col-sm-6">
			<div class="card">
			  <div class="card-body">
			    <center>
					<img src="assets/kadwa_logo.png" style = "margin: 8px; width: 200px;" class="img-fluid" alt="Responsive image"/> <br>
					<h4> Kadwá: Peer-to-Peer Mentoring Platform </h4>
				</center>
				<form method = "POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<span class="material-icons">email</span> 
							</span>
						</div>
						<input class="form-control form-control-lg" type = "email" id = "email" name = "email" placeholder = "email address" required></input>
					</div>
					<div class="input-group mb-3">
						
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<span class="material-icons">vpn_key</span> 
							</span>
						</div>
						<input class="form-control form-control-lg" type = "password" id = "pword" name = "pword" placeholder = "password" required></input>
					</div>
					<input class="btn btn-primary mb-3" id = "signin_btn" type = "submit" value = "Sign In"></input>
					
					<!--<a href="main.php" class="btn btn-primary mb-3" id = "signin_btn">SIGN IN</a>-->
				</form>
				<div class = "row">	
					<div class = "col-sm-12">
						<center><p> don't have an account yet? <a href = "signup.php"> <span class = "signUp">Create an Account</span></a></p></center>
					</div>
				</div>
				
			  </div>
			</div>
		</div>	
		<div class="col-sm-6">
			<img src="assets/Brainstorming_TwoColor.svg" width = "1000" class="img-fluid" alt="Responsive image"/>
		</div>
	  </div>
    </div>
  </section>
  </main>
  <footer style = "padding: 1vmin 1vmin; background-color: black; color: gray; position: fixed; bottom: 0; width: 100%">
	<p> Copyright ©2021 All rights reserved </p>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="./main.js"></script>
</body>

</html>

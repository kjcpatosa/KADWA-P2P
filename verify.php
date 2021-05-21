<?php
	session_start();
	include("connection.php")

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>
			KADWÁ
		</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  		<link rel="stylesheet" href="./Style.css" />
  		<link rel="stylesheet" href="./mobile-style.css">
	</head>
	<body>
 		<header>
    		<div class="container-fluid p-0" id = "myHeader">
      			<nav class="navbar navbar-expand-lg" style = "background-color: #b71c1c; border-top: 5px solid #7f0000; border-bottom: 10px solid #ffb81d">
       			<span class="navbar-brand mb-0 h1" style = "color: white; font-size: 30px"><span class="material-icons">sports_kabaddi</span> KADW<span style = "color: #ffb81d">Á</span></span>
        		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          		<i class="fas fa-align-right text-light"></i>
        		</button>
        		<div class="collapse navbar-collapse" id="navbarNav">
          			<div class="mr-auto"></div>
          			<ul class="navbar-nav">
            			<li class="nav-item active">
              				<a class="nav-link" href="#" STYLE = "font-size: 18px;">FAQs
                				<span class="sr-only">(current)</span>
              				</a>
           				</li>
            			<li class="nav-item">
							<a href="index.php" class="btn btn-primary mb-3" id = "navsignin_btn">SIGN IN</a>
						</li>
          			</ul>
        		</div>
      			</nav>
    		</div>
  		</header>

 		<main>
  			<section class = "section-1">
				<div class="container text-center">
					<div class="card" id = "card1">
						<div class="card-body">
                            <center>
                               <?php
									if(!isset($_GET["email"]) || is_null($_GET["email"]) || !isset($_GET["val"]) || is_null($_GET["val"]))
									{
										echo "Invalid Operation.";
									}
									else
									{
										$email = $_GET["email"];
										$val = $_GET["val"];
										$result = $con->query("SELECT email, pass, val FROM unvalidated WHERE email='".$email."' AND val='".$val."'");
										if ($result->num_rows > 0)
										{
											$con->query("DELETE FROM unvalidated WHERE email='".$email."'");
											$data = $result->fetch_assoc();
											$em = $data['email'];
											$pa = $data['pass'];
	
											echo $em;
											echo $pa;
	
											if($con->query("INSERT INTO user_information (email, pass, firstlogin) VALUES ('".$em."','".$pa."','YES')"))
											{
												echo "<br>SUCCESSFUL!<br>";
											}
	
	
											echo "Account has been verified!";
										}
										else
										{
											echo "Invalid Operation.";
										}
									}
                                ?>
                                <br> <a href = "index.php"> <span class = "signUp">Sign in</span></a>   
                            </center>
						</div>
					</div>
				</div>
  			</section>
  		</main>

  		<footer style = "padding: 1vmin 1vmin; background-color: black; color: gray; position: fixed; bottom: 0; width: 100%">
			<p> Copyright ©2021 All rights reserved </p>
  		</footer>
	</body>
</html>
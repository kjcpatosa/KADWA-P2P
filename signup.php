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
							<div class="row">
								<div class="col-sm-4">
									<img src="assets/Personaldata_TwoColor.svg" class="img-fluid" alt="Responsive image"/>
								</div>
							<div class="col-sm-8">
							<form class = "needs-validation" method = "POST">
								<h3> Kadwá: Peer-to-Peer Mentoring Platform </h3>
								<h5> Help a fellow PLMayer in need</h5>
								<br>
								<div class = "container">
									<div class = "row">
										<div id="result"></div>
										<div class="input-group mb-3">
											<input class="form-control form-control-lg" type = "email" name = "email" placeholder = "Email address" aria-describedby="basic-addon2" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"required>
										</div>
										<small id="passwordHelpBlock" class="form-text text-muted" style = "text-align: left; font-size:70%!important;">
											Your password must be 8-20 characters long, contain letters and numbers only.
										</small>
										<input class="form-control form-control-lg" type = "password" name = "pword" placeholder = "Password"  value="<?php if(isset($_POST['pword'])) echo $_POST['pword'];?>" required></input>
										<input class="form-control form-control-lg" type = "password" name = "cpword" placeholder = "Confirm password"   value="<?php if(isset($_POST['cpword'])) echo $_POST['cpword'];?>" required></input>
									</div>
								</div>
								<div style="overflow:auto;">
									<div style="float: right;">
										<input type = "submit" name="submit" class="btn btn-primary btn-lg" value = "Submit"></input>
									</div>
								</div>
							</form>
							<center>
							<?php
								use PHPMailer\PHPMailer\PHPMailer;
								use PHPMailer\PHPMailer\SMTP;
								use PHPMailer\PHPMailer\Exception;
								if(isset($_POST["submit"]))
								{
									if($_POST["email"] == "" || $_POST["pword"] == "" || $_POST["cpword"] == "")
									{
										echo "There is an empty field.";
									}
									else if(!preg_match("/[_a-z0-9]+(\.[_a-z0-9]+)*@plm\.edu\.ph/i", $_POST['email']))
									{
										echo "Invalid PLM outlook account.";
									}
									else 
									{
										$n = strlen($_POST["pword"]);
										if($n < 8 || $n > 20 || !preg_match("/[a-z0-9]/i", $_POST['pword']))
										{
											echo "Invalid Password.";
										}
										else if($_POST["pword"] != $_POST["cpword"])
										{
											echo "Password and confirm password is not identical.";
										}
										else
										{
											$email = substr($_POST["email"],0,-11);
											$pass = password_hash($_POST["pword"], PASSWORD_BCRYPT);
											$val = password_hash(strval(rand(0, 999999999)), PASSWORD_BCRYPT);
											if ($con->query("SELECT email FROM unvalidated WHERE email='".$email."'")->num_rows > 0 || $con->query("SELECT email FROM user_information WHERE email='".$email."'")->num_rows > 0) 
											{
												echo "This email has already been used.";
											}
											else 
											{
												if($con->query("INSERT INTO unvalidated (email, pass, val) VALUES ('".$email."', '".$pass."', '".$val."')") === TRUE)
												{
													

													require 'phpmailer/vendor/autoload.php';

													$mail = new PHPMailer(true);

													try
													{
														$link = "localhost/kadwa/verify.php";
														$p = $_POST['pword'];
    													$mail->isSMTP();
    													$mail->Host = 'smtp.gmail.com';
    													$mail->SMTPAuth = true;
    													$mail->Username = 'kadwa.plm@gmail.com';
   														$mail->Password   = 'cpcpnptjsebo';
    													$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    													$mail->Port = 587;
    													$mail->setFrom('kadwa.plm@gmail.com', 'KADWA');
    													$mail->addAddress($_POST['email']);
    													$mail->addReplyTo('kadwa.plm@gmail.com', 'KADWA');
    													$mail->isHTML(true);
														$mail->Subject = '[KADWA] Email Verification';
    													$mail->Body    = 'Thank you for signing up to KADWA!<br><br>Your account credentials:<br>Email: '.$email.'@plm.edu.ph <br> Password: '.$p.'<br><br> Click the button below to verify your KADWA account.<br><br>'.$link.'?email='.$email.'&val='.$val;
    													$mail->AltBody = $mail->Body;
    													$mail->send();
														echo "Account made. An email has been sent for verification.";
													}
													catch (Exception $e)
													{
														$con->query("DELETE FROM unvalidated WHERE email='".$email."'");
    													echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
													}
												}
												else
												{
													echo "Error: " . $sql . "<br>" . $con->error;
												}
											}
										}
									}
								}
							?>
							<p> Already have an account? <a href = "index.php"> <span class = "signUp">Sign in</span></a></p>
							</center>
						</div>
					</div>
				</div>
				
  			</section>
		
  		</main>
		
  		<footer style = "padding: 1vmin 1vmin; background-color: black; color: gray; position: fixed; bottom: 0; width: 100%">
			<p> Copyright ©2021 All rights reserved </p>
  		</footer>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
		
	</body>
</html>


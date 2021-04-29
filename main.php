<?php
	session_start();
	
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'kadwa';
 
	if (!isset($connection)) {
 
		$connection = new mysqli($host, $username, $password, $database);
 
		if (!$connection) {
			echo 'Cannot connect to database server';
			exit;
		}     
	}    

	if ($connection -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $connection -> connect_error;
	  exit();
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
          <div class="navbar-nav mr-auto"></div>
		  <ul class="navbar-nav">
            <li class="nav-item active">
				<a class="nav-link" href="main.php" STYLE = "font-size: 18px;">HOME<span class="sr-only">(current)</span></a>
            </li>
			<li class="nav-item">
				<a class="nav-link" href="#" STYLE = "font-size: 18px;">FAQs</a>
            </li>
			<li class="nav-item dropdown">
				<div class="dropdown mb-2" id = "notifDiv">
					<a href="#" class="nav-link d-flex flex-row"  STYLE = "font-size: 18px;"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
						  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
						</svg>
						<span class="badge badge-warning">6</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
						<li role="presentation">
							<p class="dropdown-menu-header"> Notifications</p>
						</li>
						<ul class="timeline timeline-icons timeline-sm" id = "notifDrop" style="margin:10px;width:210px">
							<li>
								<p>
									Your “Volume Trendline” PDF is ready <a href="">here</a>
									<span class="timeline-icon"><i class="fa fa-file-pdf-o" style="color:red"></i></span>
									<span class="timeline-date">Dec 10, 22:00</span>
								</p>
							</li>
							<li>
								<p>
									Your “Marketplace Report” PDF is ready <a href="">here</a>
									<span class="timeline-icon"><i class="fa fa-file-pdf-o"  style="color:red"></i></span>
									<span class="timeline-date">Dec 6, 10:17</span>
								</p>
							</li>
							<li>
								<p>
									Your “Top Words” spreadsheet is ready <a href="">here</a>
									<span class="timeline-icon"><i class="fa fa-file-excel-o"  style="color:green"></i></span>
									<span class="timeline-date">Dec 5, 04:36</span>
								</p>
							</li>
						</ul>
						<li role="presentation">
							<a href="#" class="dropdown-menu-header"></a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link d-flex flex-row"  STYLE = "font-size: 18px;"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img class="mr-2" src="assets/avatar-icon-40x40.png" width="40" height="40" alt="avatar">
					<div class="media-body">
						<?php
							$sql = "SELECT lastname, firstname FROM user_information WHERE user_ID = '".$_SESSION['userID']."'"; 
							$query = $connection->query($sql);
							
							$row = $query->fetch_array(MYSQLI_ASSOC);
							echo ucwords(strtolower($row["lastname"])),", ", ucwords(strtolower($row["firstname"]));
						?>
					</div>
					<span class="material-icons">expand_more</span>
				</a>
				<ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" style = "width: inherit">
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#settings">Settings</a>
					<a class="dropdown-item" href="index.php">Logout</a>
				</ul>
			</li> 
          </ul>
        </div>
      </nav>
    </div>
	<div class="container">
		<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">SETTINGS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
					<div class = "row">
						<div class="col-sm-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<center>
												<img src="assets/avatar_girl.jpg" width = "500" style = "border-radius: 50%;" class="img-fluid" alt="Responsive image"/>
												<h3 style = "color: #09054f"> 
													<?php 
														$sql = "SELECT user_information.lastname, user_information.firstname, user_information.crs_ID, user_information.email, user_information.studnum, user_information.joined, courses.* FROM user_information CROSS JOIN courses WHERE user_ID = '".$_SESSION['userID']."' AND user_information.crs_ID = courses.crs_ID"; 
														$query = $connection->query($sql);
														
														$row = $query->fetch_array(MYSQLI_ASSOC);
														echo ucwords(strtolower($row["lastname"])),", ", ucwords(strtolower($row["firstname"]));
													?> 
												</h3>
												<h6 style = "color: #09054f"> 
													<?php
														echo strtolower($row["email"]);
													?>
												</h6>
												<h6 style = "color: #09054f">
													<?php
														echo strtolower($row["studnum"]);
													?>
												</h6>
												<h6> 
													<?php
														echo $row["crsName"];
													?>
												</h6>
												<h6> Joined 
													<?php
														$date = $row["joined"];
														echo date('F Y', strtotime($date));
													?>
												</h6>
											</center>
										</div>
									</div>
								</div>
							</div>
							<!-- List group -->
							<div class="list-group" id="myList" role="tablist">
							  <a class="list-group-item list-group-item-action active" data-toggle="list" href="#profSet" role="tab">Profile Settings</a>
							  <a class="list-group-item list-group-item-action" data-toggle="list" href="#mentSet" role="tab">Mentor Account Settings</a>
							</div>
						</div>
						<div class="col-sm-8">
							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane active" id="profSet" role="tabpanel">
								<form class="row" id = "profSet">
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-fn">First Name</label>
											<input class="form-control" type="text" id="account-fn" value="<?php echo ucwords(strtolower($row["lastname"]))?>" required="" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-ln">Last Name</label>
											<input class="form-control" type="text" id="account-ln" value="<?php echo ucwords(strtolower($row["firstname"]))?>" required="" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-email">E-mail Address</label>
											<input class="form-control" type="email" id="account-email" value="<?php echo $row["email"]?>" disabled="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-pass">New Password</label>
											<input class="form-control" type="password" id="account-pass">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-confirm-pass">Confirm Password</label>
											<input class="form-control" type="password" id="account-confirm-pass">
										</div>
									</div>
									<div class="col-12">
										<hr class="mt-2 mb-3">
										<div class="d-flex flex-wrap justify-content-between align-items-center">
											<div class="custom-control custom-checkbox d-block">
												<input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
												<label class="custom-control-label" for="subscribe_me">Be a mentor</label>
											</div>
											<button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
										</div>
									</div>
								</form>
							  </div>
							  <div class="tab-pane" id="mentSet" role="tabpanel">
								<p id = "mentSet"> helo </p>
							  </div>
							</div>
							
						</div>
					</div>	
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
			</div>
		  </div>
		</div>
    </div>
	<div class="container">
		<div class = "row">
			<div class="col-sm-12">
				<img src = "assets/lineart_help_v2.png" class = "img-fluid" alt = "Responsive image">
			</div>
		</div>
		
    </div>
  </header>
  <main>
  <section class = "section-1">
  <div class="container">
  <H1 style = "text-align: center!important;"> Kadwá: Peer-to-Peer Mentoring Platform </H1>
	<div class="row">
			
			<div class="col-sm-6">
				<div class="card mb-2">
				  <img class="card-img-top" src="assets/Conversation_TwoColor.svg" alt="Card image cap" STYLE = "background-image: url(assets/concrete-texture.png)">
				  <div class="card-body">
					<h5 class="card-title">BOOK A SESSION</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="bookSession.php" class="btn btn-primary btn-lg mb-2">Book Session</a>
				  </div>
				</div>
			</div>	
			<div class="col-sm-6">
				<div class="card mb-4">
				  <img class="card-img-top" src="assets/Consulting_Two%20Color.svg" alt="Card image cap" STYLE = "background-image: url(assets/concrete-texture.png)">
				  <div class="card-body">
					<h5 class="card-title">MANAGE SESSIONS</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="mngAsMentee.php" class="btn btn-primary btn-lg mb-2">Session as a Mentee</a>
					<a href="mngAsMentor.php" class="btn btn-primary btn-lg mb-2">Session as a Mentor</a>
				  </div>
				</div>
			</div>
		</div>
	</div>
	</section>
  </main>
  <footer style = "padding: 1vmin 1vmin; background-color: black; color: gray; bottom: 0; width: 100%">
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
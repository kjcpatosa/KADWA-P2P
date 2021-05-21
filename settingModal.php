<?php
	session_start();
	
	include("connection.php");
	include("check_login.php");
	$sql = "SELECT lastname, firstname FROM user_information WHERE user_ID = '".$_SESSION['userID']."'"; 
	$query = $con->query($sql);
	
	$row = $query->fetch_array(MYSQLI_ASSOC);
?>

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
									<?php
										$sql = "SELECT profile_pic FROM user_information WHERE user_ID = '".$_SESSION['userID']."'"; 
										$query = $con->query($sql);
										$row = $query->fetch_array(MYSQLI_ASSOC);
										$fullPath = 'profpic/'.$row["profile_pic"];
										//echo "<script>$('#profpic').attr('src', '".$fullPath."');</script>"; 
								
										$htmlString = '<img src="assets/avatar_girl.jpg" width = "500" style = "border-radius: 50%;" class="img-fluid rounded-circle" alt="Responsive image"/>';
										  
										$doc = new DOMDocument();
										$doc->loadHTML($htmlString);
										$tags = $doc->getElementsByTagName('img');
										   
										foreach ($tags as $tag) {
										   $oldSrc = $tag->getAttribute('src');
										   $newScrURL = $fullPath;
										   $tag->setAttribute('src', $newScrURL);
										   $tag->setAttribute('data-src', $oldSrc);
										} 
										  
										$htmlString = $doc->saveHTML();
										  
										print($htmlString);
									?>
									<!--<img src="assets/avatar_girl.jpg" width = "500" style = "border-radius: 50%;" class="img-fluid" alt="Responsive image"/>-->
									<h3 style = "color: #09054f"> 
										<?php 
											$sql = "SELECT user_information.lastname, user_information.firstname, user_information.middlename, user_information.crs_ID, user_information.email, user_information.studnum, user_information.joined, courses.* FROM user_information CROSS JOIN courses WHERE user_ID = '".$_SESSION['userID']."' AND user_information.crs_ID = courses.crs_ID"; 
											$query = $con->query($sql);
											
											$row = $query->fetch_array(MYSQLI_ASSOC);
											echo ucwords(strtolower($row["lastname"])),", ", ucwords(strtolower($row["firstname"]));
										?> 
									</h3>
									<h6 style = "color: #09054f">
										<?php
											echo strtolower($row["studnum"]);
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
				  <a class="list-group-item list-group-item-action" data-toggle="list" href="#mySched" role="tab">My Schedule</a>
				  <a class="list-group-item list-group-item-action" data-toggle="list" href="#mentSet" role="tab">Mentor Account Settings</a>
				</div>
			</div>
			<div class="col-sm-8">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="profSet" role="tabpanel">
						<form class="row" id = "profSet">
							<div class="col-md-4">
								<div class="form-group">
									<label for="account-fn">First Name</label>
									<input class="form-control" type="text" id="account-fn" value="<?php echo ucwords(strtolower($row["firstname"]))?>" required="" disabled>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="account-mn">Middle Name</label>
									<input class="form-control" type="text" id="account-mn" value="<?php echo ucwords(strtolower($row["middlename"]))?>" required="" disabled>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="account-ln">Last Name</label>
									<input class="form-control" type="text" id="account-ln" value="<?php echo ucwords(strtolower($row["lastname"]))?>" required="" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-course">Course</label>
									<input class="form-control" type="email" id="account-course" value="<?php echo $row["crsName"]?>" disabled="">
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
									<button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="mySched" role="tabpanel">
						load mo dito schedule galing database
					</div>
					<div class="tab-pane" id="mentSet" role="tabpanel">
						<div class="custom-control custom-checkbox d-block">
							<input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
							<label class="custom-control-label" for="subscribe_me">Be a mentor</label>
						</div>
					</div>
				</div>
				
			</div>	
		</div>	
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>

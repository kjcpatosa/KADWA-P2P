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
 <header style = "background-image: url(assets/bg_whitepattern.jpg)">
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
						GABRIELA
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
												<h3 style = "color: #09054f"> Gabriela Dela Cruz </h3>
												<h6> Bachelor of Science in Computer Science </h6>
												<h6 style = "color: #09054f"> gcdc1234@plm.edu.ph </h6>
												<h6> Joined Feb 2018 </h6>
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
											<input class="form-control" type="text" id="account-fn" value="Daniel" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-ln">Last Name</label>
											<input class="form-control" type="text" id="account-ln" value="Adams" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-email">E-mail Address</label>
											<input class="form-control" type="email" id="account-email" value="daniel.adams@example.com" disabled="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="account-phone">Phone Number</label>
											<input class="form-control" type="text" id="account-phone" value="+7 (805) 348 95 72" required="">
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
		
		<div class = "row">
			<div class="col-sm-12">
				<img src = "assets/banner.png" class = "img-fluid" alt = "Responsive image">
			</div>
		</div>
    </div>
	
	<section class = "section-1" style = "background-image: url(assets/cream_pixels.png)">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<center><img src="assets/Brainstorming_TwoColor.svg" width = "500" class="img-fluid" alt="Responsive image"/>
					<H1 style = "text-align: center!important; font-weight: bold; color: #24285b;"> MANAGE SESSION </H1>
					<H2 style = "text-align: center!important; font-weight: bold;"> AS A <span style =  "color: #7f0000"> MENTEE </span></H2>
					</center>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<select class="form-control form-control-lg"id="dayofWeek">
								  <option value="" selected>All</option>
								  <option>Monday</option>
								  <option>Tuesday</option>
								  <option>Wednesday</option>
								  <option>Thursday</option>
								  <option>Friday</option>
								  <option>Saturday</option>
								  <option>Sunday</option>
								</select>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
  </section>
  <section class = "section-1" style = "background-image: url(assets/cream_pixels.png)">
	<div class="container">
		<H3> SESSIONS </H3>
		<div class="row">
			<a href = "#" class = "btn" style = "width: 100%;">
				<div class="card">
				  <div class="card-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="row"><p class = "mentorSes"> MONDAY</p></div>
							<div class="row"><p class = "mentorSes"> 8:00am to 9:30am </p></div>
						</div>
						<div class="col-sm-5">
							<div class="row"><p class = "mentorSes"> Software Engineering </p></div>
							<div class="row"><p class = "mentorSes"> TOPIC:&nbsp</p> <P class = "mentorSes"> System Development Life Cycle </P></div>
						</div>
						<div class="col-sm-4">
							<span class="badge bg-success" id = "sesConfirmed">Session Booked</span>
						</div>
					</div>
				  </div>
				</div>
			</a>
		</div>
		<div class="row">
			<a href = "#" class = "btn" style = "width: 100%;">
				<div class="card">
				  <div class="card-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="row"><p class = "mentorSes"> MONDAY</p></div>
							<div class="row"><p class = "mentorSes"> 8:00am to 9:30am </p></div>
						</div>
						<div class="col-sm-5">
							<div class="row"><p class = "mentorSes"> Software Engineering </p></div>
							<div class="row"><p class = "mentorSes"> TOPIC:&nbsp</p> <P class = "mentorSes"> System Development Life Cycle </P></div>
						</div>
						<div class="col-sm-4">
							<span class="badge bg-danger" id = "sesCancelled">Session Cancelled</span>
						</div>
					</div>
				  </div>
				</div>
			</a>
		</div>
		<div class="row">
			<a href = "#" class = "btn" style = "width: 100%;">
				<div class="card">
				  <div class="card-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="row"><p class = "mentorSes"> MONDAY</p></div>
							<div class="row"><p class = "mentorSes"> 8:00am to 9:30am </p></div>
						</div>
						<div class="col-sm-5">
							<div class="row"><p class = "mentorSes"> Software Engineering </p></div>
							<div class="row"><p class = "mentorSes"> TOPIC:&nbsp</p> <P class = "mentorSes"> System Development Life Cycle </P></div>
						</div>
						<div class="col-sm-4">
							<span class="badge bg-warning" id = "sesPending">Session Pending</span>
						</div>
					</div>
				  </div>
				</div>
			</a>
		</div>
		<div class="row">
			<a href = "#" class = "btn" style = "width: 100%;">
				<div class="card">
				  <div class="card-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="row"><p class = "mentorSes"> MONDAY</p></div>
							<div class="row"><p class = "mentorSes"> 8:00am to 9:30am </p></div>
						</div>
						<div class="col-sm-5">
							<div class="row"><p class = "mentorSes"> Software Engineering </p></div>
							<div class="row"><p class = "mentorSes"> TOPIC:&nbsp</p> <P class = "mentorSes"> System Development Life Cycle </P></div>
						</div>
						<div class="col-sm-4">
							<span class="badge bg-secondary" id = "sesDisabled">Session Disabled</span>
						</div>
					</div>
				  </div>
				</div>
			</a>
		</div>
		<div id = "newSRow"></div>
		<div class="row">
			<div class="col-6">
				<a href="main.php" class="btn btn-lg mb-3" id = "delAll" style = "width: 100%; border: 2px solid gray"> 
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
						<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
					</svg>
					DELETE ALL SESSION</a>
			</div>	
			<div class="col-6">
				<a href="main.php" class="btn btn-lg mb-3" id = "disAll" style = "width: 100%; color: white; background-color: gray"> 
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
					  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
					</svg>
					CANCEL ALL SESSION</a>
			</div>
		</div>
	</div>
  </section>
  </header>
  
  <footer style = "padding: 1vmin 1vmin; background-color: black; color: gray; bottom: 0; width: 100%">
	<p> Copyright ©2021 All rights reserved </p>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="./main.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script>
      const button = document.querySelector('#button');
      const tooltip = document.querySelector('#tooltip');

      const popperInstance = Popper.createPopper(button, tooltip, {
        modifiers: [
          {
            name: 'offset',
            options: {
              offset: [0, 8],
            },
          },
        ],
      });

      function show() {
        // Make the tooltip visible
        tooltip.setAttribute('data-show', '');

        // Enable the event listeners
        popperInstance.setOptions({
          modifiers: [{ name: 'eventListeners', enabled: true }],
        });

        // Update its position
        popperInstance.update();
      }

      function hide() {
        // Hide the tooltip
        tooltip.removeAttribute('data-show');

        // Disable the event listeners
        popperInstance.setOptions({
          modifiers: [{ name: 'eventListeners', enabled: false }],
        });
      }

      const showEvents = ['mouseover', 'focus'];
      const hideEvents = ['mouseout', 'blur'];

      showEvents.forEach(event => {
        button.addEventListener(event, show);
      });

      hideEvents.forEach(event => {
        button.addEventListener(event, hide);
      });
    </script>
</body>

</html>
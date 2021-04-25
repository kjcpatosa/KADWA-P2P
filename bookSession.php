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
					<a class="dropdown-item" href="#">Settings</a>
					<a class="dropdown-item" href="index.php">Logout</a>
				</ul>
			</li> 
          </ul>
        </div>
      </nav>
    </div>
	<div class="container">
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
					<center><img src="assets/Conversation_TwoColor.svg" width = "500" class="img-fluid" alt="Responsive image"/>
					<H1 style = "text-align: center!important; font-weight: bold; color: #007bff"> BOOK A SESSION </H1>
					</center>
					<div class="card-body">
						<label> Subject Name: </label><input class="form-control form-control-lg" type = "text" placeholder = "Subject name">
						<div class="row">
							<div class="col-sm-6"><label> Day of the Week:: </label>
								<select class="form-control form-control-lg"id="dayofWeek">
								  <option value="" disabled selected>Day</option>
								  <option>Monday</option>
								  <option>Tuesday</option>
								  <option>Wednesday</option>
								  <option>Thursday</option>
								  <option>Friday</option>
								  <option>Saturday</option>
								  <option>Sunday</option>
								</select>
							</div>
							<div class="col-sm-3"><label> From: </label>
								<input class="form-control form-control-lg" type = "time" placeholder = "Start Time" id = "sTime" required></input>
							</div>
							<div class="col-sm-3"><label> To: </label>
								<input class="form-control form-control-lg" type = "time" placeholder = "End Time" id = "eTime" required></input>
							</div>
						</div>
						<a href="main.php" class="btn btn-primary btn-lg mb-3" Style = "width: 100%;">FIND SESSIONS</a>
				</div>
			</div>
		</div>
	</div>
  </section>
  <section class = "section-1" style = "background-image: url(assets/cream_pixels.png)">
	<div class="container">
		<H3> SESSIONS </H3>
		<div class="card">
		  <div class="card-body">
			<div class="row">
				<div class="col-sm-1 mb-1">
					<img class="mr-2" src="assets/avatar-icon-40x40.png" width="40" height="40" alt="avatar">
				</div>
				<div class="col-sm-3 mb-0">
					<div class="row" style = "font-weight: bold; color: #007bff"><p class = "sessInfo"> Juan Dela Cruz</p></div>
					<div class="row"><p class = "sessInfo"> 201812345 </p></div>
				</div>
				<div class="col-sm-3 mb-1">
					<div class="row"><p class = "sessInfo"> MONDAY</p></div>
					<div class="row"><p class = "sessInfo"> 8:00am to 9:30am </p></div>
				</div>
				<div class="col-sm-4 mb-0">
					<div class="row"><p class = "sessInfo"> Software Engineering </p></div>
					<div class="row"><p class = "sessInfo"> TOPIC:&nbsp </p> <P class = "sessInfo"> System Development Life Cycle </P></div>
				</div>
				<div class="col-sm-1 mb-1">
					<button class = "btn" id="button" aria-describedby="tooltip">
						<img src = "assets/book_icon.png" class = "img-fluid" id = "bookBtn">
					</button>
					<div id="tooltip" role="tooltip">
						Book this session
						<div id="arrow" data-popper-arrow></div>
					</div>
				</div>
			</div>
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
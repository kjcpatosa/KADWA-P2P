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
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$email = $connection->real_escape_string($_POST['email']);
		$pword = $connection->real_escape_string($_POST['pword']);
		$studnum = $connection->real_escape_string($_POST['studnum']);
		$fname = $connection->real_escape_string($_POST['fname']);
		$mname = $connection->real_escape_string($_POST['mname']);
		$lname = $connection->real_escape_string($_POST['lname']);
		$college = $connection->real_escape_string($_POST['college']);
		$course = $connection->real_escape_string($_POST['course']);
		$year = $connection->real_escape_string($_POST['year']);
		date_default_timezone_set('Asia/Manila');
		$date = date('Y-m-d');
		
		$sql = "INSERT INTO `user_information` (`email`, `password`, `studnum`, `lastname`, `firstname`, `middlename`, `college_ID`, `crs_ID`, `yearlvl`, `joined`, `firstLogIn`,`accesslvl`) VALUES ('$email', '$pword', '$studnum', '$lname', '$fname', '$mname', '$college', '$course', '$year', '$date', 'YES', '1')";
		
		if (!$connection -> query($sql)) {
		  echo("Error description: " . $connection -> error);
		}else{
			echo "<script>alert(\"Sign up successful!\");window.location.href=\"index.php\";</script>";
		}
		
	}
	$option = "";
	$sql2 = "SELECT * FROM college";
	if($query2 = $connection->query($sql2)){
		if($query2->num_rows > 0){
			while($row2 = $query2->fetch_array()){
				$option = $option."<option value = ".$row2['college_ID']."> ".$row2['collegeName']."</option>";
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
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
						<form class = "needs-validation" method = "POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<h3> Kadwá: Peer-to-Peer Mentoring Platform </h3>
							<h5> Help a fellow PLMayer in need</h5>
							<br>
							<div class="tab">
								<div class = "container">
									<div class = "row">
									<div id="result"></div>
									<div class="input-group mb-3">
									  <input class="form-control form-control-lg" type = "email" id = "email" name = "email" placeholder = "email address" aria-describedby="basic-addon2" oninput="this.className = 'form-control form-control-lg'">
									  <div class="input-group-append">
										<input type = "button" name = "sendOTP"  class="btn btn-secondary btn-lg" id="sendBtn" value = "Send OTP"></input>
									  </div>
									</div>
									<small class="form-text text-muted" style = "right: 0; font-size:70%!important;">
										An OTP has been sent to your email. Didn't receive an email? <a href = "#"> Send again (30s) </a>
									</small>
									<div class="input-group mb-2">
									  <input class="form-control form-control-lg" type = "text" id = "OTPCode" name = "OTPCode" placeholder = "OTP Code" aria-describedby="basic-addon2" oninput="this.className = 'form-control form-control-lg'">
									  <div class="input-group-append">
										<input type = "button" name = "verifyOTP"  class="btn btn-secondary btn-lg" id="verifyBtn" value = "Verify"></input>
									  </div>
									</div>
									<input class="form-control form-control-lg" type = "password" id="pword" name = "pword" placeholder = "Password" oninput="this.className = 'form-control form-control-lg'"></input>
									<small id="passwordHelpBlock" class="form-text text-muted" style = "text-align: left; font-size:70%!important;">
									  Your password must be 8-20 characters long, contain letters and numbers only.
									</small>
									<input class="form-control form-control-lg" type = "password" id="cpword" name = "cpword" placeholder = "Confirm password" onchange='check_pass();' oninput="this.className = 'form-control form-control-lg'"></input>
									</div>
								</div>
							</div>
							<div class="tab">
								<div class="row">
									<div id="result2"></div>
									<div class="col-md-12">
										<label> Student Number: </label>
										<input class="form-control form-control-lg" type = "text" id = "studnum" name = "studnum" placeholder = "ex. 201812345" oninput="this.className = 'form-control form-control-lg'"></input>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<label> First Name: </label>
										<input class="form-control form-control-lg" type = "text" id = "fname" name = "fname" placeholder = "ex. Juan" oninput="this.className = 'form-control form-control-lg'"></input>
									</div>
									<div class="col-md-4">
										<label> Middle Name: </label>
										<input class="form-control form-control-lg" type = "text" id = "mname" name = "mname" placeholder = "ex. Agap" oninput="this.className = 'form-control form-control-lg'"></input>
									</div>
									<div class="col-md-4">
										<label> Last Name: </label>
										<input class="form-control form-control-lg" type = "text" id = "lname" name = "lname" placeholder = "ex. Dela Cruz" oninput="this.className = 'form-control form-control-lg'"></input>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<select class="form-control form-control-lg" id="college" name = "college" onchange = "try()" required>
										  <option value="" disabled selected value>College</option>
										  <?php
												echo $option;
										  ?>
										  <!--<option value = "<?php echo $row2["college_ID"]; ?>"><?php echo $row2["collegeName"];?></option>-->
										</select>
									</div>
								</div>
								<div class = "row">
									<div class="col-md-9">	
										<div id = "courses"> </div>
										<select class="form-control form-control-lg" id="course" name = "course" required>
										  <option value="" disabled selected value>Course</option>
										</select>
									</div>
									<div class="col-md-3">
										<select class="form-control form-control-lg"id="year" name = "year" required>
												  <option value="" disabled selected value>Year Level</option>
												  <option value = "1">1st</option>
												  <option value = "2">2nd</option>
												  <option value = "3">3rd</option>
												  <option value = "4">4th</option>
												  <option value = "5">5th</option>
										</select>
									</div>
								</div>
							</div>
							
							
							<div style="overflow:auto;">
								<div style="float: right;">
								  <input type = "button" class="btn btn-primary btn-lg" id="prevBtn" onclick="nextPrev(-1)" value = "Previous" readonly></input>
								  <input type = "button" class="btn btn-primary btn-lg" id="nextBtn" onclick="nextPrev(1)" value = "Next" readonly></input>
								  <input type = "submit" name = "submit" class="btn btn-primary btn-lg" id="submitBtn" value = "Submit"></input>
								</div>
							</div>
							
							
							<div style="text-align:center;margin-top:40px;">
							  <span class="step"></span>
							  <span class="step"></span>
							</div>
							<center><p> Already have an account? <a href = "index.php"> <span class = "signUp">Sign in</span></a></p></center>
							
						</form>
						
					</div>
				</div>
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
<script src="./main.js"></script>
<script>
$(document).ready(function(){
	$('#college').on('change', function() {
	   var selectValue = $(this).val();
	   alert(selectValue);
	   $.ajax({
			url:'coursesSelect.php',
			method:'post',
			data:{college:selectValue},
			dataType: 'json',
			success:function(data)
			{
				var len = data.length;
				alert(len);
				$('#course').empty();
				for (i = 0; i < len; i++) {
					var id = data[i]['id'];
					var name = data[i]['name'];
					$('#course').append("<option value='" + id + "'>" + name + "</option>");
				}
			}
		});
	});
});

$("#addRow").click(function () {
	var html = '';
	html += '<div id="inputFormRow" style = "background-color: #fffaed; border: 2px solid #dedede; padding-top: 15px; margin :4px">';
	html += '<div class="input-group mb-3">';
	html += '<div class="col-md-2">';
	html += '<input class="form-control form-control-md" type = "text" placeholder = "Subject Code" id = "childsubjectCode" name = "subjectCode[]" oninput="this.className = "form-control form-control-md""></input>';
	html += '</div>';
	html += '<div class="col-md-3">';
	html += '<input class="form-control form-control-md" type = "text" placeholder = "Subject Name" id = "childsubjectName" name = "subjectName[]" oninput="this.className = "form-control form-control-md""></input>';
	html += '</div>';
	html += '<div class="col-md-2">';
	html += '<select class="form-control form-control-md" id="childdayofWeek" name = "dayofWeek[]">';
	html += '<option value="" disabled selected>Day</option>';
	html += '<option value = "MON">Monday</option>';
	html += '<option value = "TUE">Tuesday</option>';
	html += '<option value = "WED">Wednesday</option>';
	html += '<option value = "THU">Thursday</option>';
	html += '<option value = "FRI">Friday</option>';
	html += '<option value = "SAT">Saturday</option>';
	html += '<option value = "SUN">Sunday</option>';
	html += '</select>';
	html += '</div>';
	html += '<div class="col-md-2">';
	html += '<input class="form-control form-control-md" type = "time" placeholder = "Start Time" id = "childsTime" name = "sTime[]" oninput="this.className = "form-control form-control-md""></input>';
	html += '</div>';
	html += '<div class="col-md-2">';
	html += '<input class="form-control form-control-md" type = "time" placeholder = "End Time" id = "childeTime" name = "eTime[]" oninput="this.className = "form-control form-control-md""></input>';
	html += '</div>';
	html += '<div class="col-md-1">';
	html += '<button id="removeRow" type="button" class="btn btn-danger btn-md">-</button>';
	html += '</div>';
	html += '</div>';

	$('#newRow').append(html);
});

$(document).on('click', '#removeRow', function () {
	$(this).closest('#inputFormRow').remove();
});


$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"emailCheck.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				existing = data;
				if(existing == "1"){
					$('#result').html("<small style = \"color: red; font-size: 18px; padding: 0\">Email already associated with an existing account.</small>");
					document.getElementById('nextBtn').disabled = true;
				}
				else{
					$('#result').html("");
					document.getElementById('nextBtn').disabled = false;
				}
				
			}
		});
	}
	
	$('#email').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
	
});

$(document).ready(function(){
	load_data();
	function load_data(query)
	{
	
		$.ajax({
			url:"studnumCheck.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				existing = data;
				if(existing == "1"){
					$('#result2').html("<small style = \"color: red; font-size: 18px; padding: 0\">This student number is already associated with an existing account.</small>");
					document.getElementById('nextBtn').disabled = true;
				}
				else{
					$('#result2').html("");
					document.getElementById('nextBtn').disabled = false;
				}
				
			}
		});
	}
	$('#studnum').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
	
});

</script>

</body>

</html>



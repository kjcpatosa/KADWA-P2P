<?php
    session_start();

    include("connection.php");

    if(!isset($_SESSION["userID"]) || is_null($_SESSION["userID"]))
    {
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }
	
	$option = "";
	$sql2 = "SELECT * FROM college";
	if($query2 = $con->query($sql2)){
		if($query2->num_rows > 0){
			while($row2 = $query2->fetch_array()){
				$option = $option."<option value = ".$row2['college_ID']."> ".$row2['collegeName']."</option>";
			}
		}
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$profpic = $_SESSION['imgname'];
		echo "<script>alert('".$profpic."');</script>";
		$studnum = $con->real_escape_string($_POST['studnum']);
		$fname = $con->real_escape_string($_POST['fname']);
		$mname = $con->real_escape_string($_POST['mname']);
		$lname = $con->real_escape_string($_POST['lname']);
		$college = $con->real_escape_string($_POST['college']);
		$course = $con->real_escape_string($_POST['course']);
		$year = $con->real_escape_string($_POST['year']);
		$userID = $_SESSION['userID'];
		$subcode = $_POST['subjectCode'];
		$subname = $_POST['subjectName'];
		$stime = $_POST['sTime'];
		$etime = $_POST['eTime'];
		$day = $_POST['dayofWeek'];
		foreach ($subcode AS $key => $value){
			 $query = "SELECT subj_ID FROM subject_schedule WHERE user_ID = '".$userID."' AND subj_ID = '".$value."'";
			$resultSet = $con->query($query);
			
			if($resultSet->num_rows == 0){
			
				$sql3 = "INSERT INTO `subject_schedule` (`subj_ID`, `user_ID`, `subj_Name`, `sTime`, `eTime`, `day`) VALUES ('".
				$con->real_escape_string($value)
				."','".
				$userID
				."','".
				$con->real_escape_string($subname[$key])
				."','".
				$con->real_escape_string($stime[$key])
				."','".
				$con->real_escape_string($etime[$key])
				."','".
				$con->real_escape_string($day[$key])
				."')";
				
				
				$insert = $con -> query($sql3);
				
				if (!$insert) {
					echo("Error description: " . $con -> error);
				}
				
			}else{
				echo "Record already exist!";
			}
		}

		$sql = "UPDATE user_information SET profile_pic = '$profpic', studnum = '$studnum', lastname = '$lname', firstname = '$fname', middlename = '$mname', college_ID = '$college', crs_ID = '$course', yearlvl = '$year', firstLogIn = 'NO', accesslvl = '1' WHERE user_ID = '$userID'";
		
		if (!$con -> query($sql)) {
		  echo("Error description: " . $con -> error);
		}else{
			echo "<script>alert(\"Sign up successful!\");window.location.href='Main.php';</script>";
		}
		
	}
	
	$con -> close();
?>

<html>
    <head>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>KADWÁ</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" href="./Style.css" />
		<link rel="stylesheet" href="./mobile-style.css">
		<style> 
		.tab{
			width: 100%;
		} 
		
		.image_area {
		  position: relative;
		}

		img {
			display: block;
			max-width: 50%;
		}

		.preview {
			overflow: hidden;
			width: 160px; 
			height: 160px;
			margin: 10px;
			border: 1px solid red;
		}

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}

		
		</style>
    </head>
    <body style = "background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ),url(./assets/banner-facade.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;">
		<main>
			<section class="section-1">
				<div class="card" style = "position: absolute; top: 20%; width: 70%; margin-left: 15%; margin-right: 15%;">
					<div class="card-header">
						<h3> FINISH ACCOUNT SETUP </h3>
					</div>
					<div class="card-body">
						<form method = "POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
							
							<div class = "tab">	
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
							</div>
							<div class = "tab">	
								<div class="row">
									<div class="col-md-12">
										<select class="form-control form-control-lg" id="college" name = "college" required>
										  <option value="" disabled selected value>College</option>
										  <?php
												echo $option;
										  ?>
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
								<!--<input type="submit" value="SIGNOUT"> </input>-->
							</div>
							<div class= "tab">
							<center>
								
								<div class = "col-7 form-div">
									<div class = "image_area">
										<label for = "upload_image">
											<img src = "./assets/uploadPic.jpg" id = "uploaded_image" class = "img-fluid rounded-circle" alt = "Responsive image" width = "50%"/>
											<div class = "overlay">
												<div class = "text"> Upload Profile Picture </div>
											</div>
											<input type = "file" name = "image" id = "upload_image" class = "image" accept="image/*" style = "display: none">
										</label>
										
									</div>
								</div>
								<div class="modal fade bd-example-modal-xl" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Crop Image Before Upload</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="img-container">
													<div class="row">
														<div class="col-md-8">
															<img src="" id="sample_image" />
														</div>
														<div class="col-md-4">
															<div class="preview"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" id="crop" class="btn btn-primary">Crop</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</center>
							</div>
							<div class= "tab">
								<div class = "row">
									<button type = "button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#schedule">+ INPUT SCHEDULE</button>
								</div>
								
								<div class="modal fade bd-example-modal-xl" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
								  <div class="modal-dialog modal-xl" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle">SCHEDULE</h5>
											<button type="button" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="form-row">
												<div class="col-lg-12">
													<div id="inputFormRow" style = "background-color: #fffaed; border: 2px solid #dedede; padding-top: 15px; margin :4px">
														<div class="input-group mb-3">
															<div class="col-md-2">
																<input class="form-control form-control-md" type = "text" placeholder = "Subject Code" id = "subjectCode" name = "subjectCode[]" oninput="this.className = 'form-control form-control-md'"></input>
															</div>
															<div class="col-md-3">
																<input class="form-control form-control-md" type = "text" placeholder = "Subject Name" id = "subjectName" name = "subjectName[]" oninput="this.className = 'form-control form-control-md'"></input>
															</div>
															<div class="col-md-2">
																<select class="form-control form-control-md" id="dayofWeek" name = "dayofWeek[]">
																  <option value="" disabled selected>Day</option>
																  <option value = "MON">Monday</option>
																  <option value = "TUE">Tuesday</option>
																  <option value = "WED">Wednesday</option>
																  <option value = "THU">Thursday</option>
																  <option value = "FRI">Friday</option>
																  <option value = "SAT">Saturday</option>
																  <option value = "SUN">Sunday</option>
																</select>
															</div>
															<div class="col-md-2">
																<input class="form-control form-control-md" type = "time" placeholder = "Start Time" id = "sTime" name = "sTime[]" oninput="this.className = 'form-control form-control-md'"></input>
															</div>
															<div class="col-md-2">
																<input class="form-control form-control-md" type = "time" placeholder = "End Time" id = "eTime" name = "eTime[]" oninput="this.className = 'form-control form-control-md'"></input>
															</div>
															<div class="col-md-1">
																<button id = "addRow" type="button" class="btn btn-secondary btn-md" >Add</button>
															</div>
														</div>
													</div>
													<div id = "newRow"></div>
												</div>	
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary back" data-dismiss="modal"> Close </button>
										</div>
									</div>
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
							  <span class="step"></span>
							  <span class="step"></span>
							</div>
						</form>
					</div>
				</div>
			</section>
        </main>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
		<script src="./main.js"></script>
		<script>
			/*add row schedule*/
			$(document).on('click', '#addRow', function () {
				var html = '';
				html += '<div id="inputFormRow" style = "background-color: #fffaed; border: 2px solid #dedede; padding-top: 15px; margin :4px">';
				html += '<div class="input-group mb-3">';
				html += '<div class="col-md-2">';
				html += '<input class="form-control form-control-md" type = "text" placeholder = "Subject Code" id = "subjectCode" name = "subjectCode[]" required></input>';
				html += '</div>';
				html += '<div class="col-md-3">';
				html += '<input class="form-control form-control-md" type = "text" placeholder = "Subject Name" id = "subjectName" name = "subjectName[]"required></input>';
				html += '</div>';
				html += '<div class="col-md-2">';
				html += '<select class="form-control form-control-md" id="dayofWeek" name = "dayofWeek[]">';
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
				html += '<input class="form-control form-control-md" type = "time" placeholder = "Start Time" id = "sTime" name = "sTime[]"required></input>';
				html += '</div>';
				html += '<div class="col-md-2">';
				html += '<input class="form-control form-control-md" type = "time" placeholder = "End Time" id = "eTime" name = "eTime[]"required></input>';
				html += '</div>';
				html += '<div class="col-md-1">';
				html += '<button id="removeRow" type="button" class="btn btn-danger btn-md">-</button>';
				html += '</div>';
				html += '</div>';
				$('#newRow').append(html);
			});

			/*remove row*/
			$(document).on('click', '#removeRow', function () {
				$(this).closest('#inputFormRow').remove();
			});
			$(document).ready(function(){
				$('#college').on('change', function() {
				   var selectValue = $(this).val();
				   $.ajax({
						url:'coursesSelect.php',
						method:'post',
						data:{college:selectValue},
						dataType: 'json',
						success:function(data)
						{
							var len = data.length;
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
			
			
			$(document).ready(function(){

				var $modal = $('#modal');

				var image = document.getElementById('sample_image');

				var cropper;

				$('#upload_image').change(function(event){
					var files = event.target.files;

					var done = function(url){
						image.src = url;
						$modal.modal('show');
					};

					if(files && files.length > 0)
					{
						reader = new FileReader();
						reader.onload = function(event)
						{
							done(reader.result);
						};
						reader.readAsDataURL(files[0]);
					}
				});

				$modal.on('shown.bs.modal', function() {
					cropper = new Cropper(image, {
						aspectRatio: 1,
						viewMode: 3,
						preview:'.preview'
					});
				}).on('hidden.bs.modal', function(){
					cropper.destroy();
					cropper = null;
				});

				$('#crop').click(function(){
					canvas = cropper.getCroppedCanvas({
						width:400,
						height:400
					});

					/* function saveProfPic(imgName){
						$.ajax({
							url:'savePicToDB.php',
							method:'POST',
							data:{imgName:imgName},
							success:function(data)
							{
								alert(data);
							}
						});
					} */
					
					canvas.toBlob(function(blob){
						url = URL.createObjectURL(blob);
						var reader = new FileReader();
						reader.readAsDataURL(blob);
						reader.onloadend = function(){
							var base64data = reader.result;
							$.ajax({
								url:'upload.php',
								method:'POST',
								data:{image:base64data},
								success:function(data)
								{
									$modal.modal('hide');
									$('#uploaded_image').attr('src', data);
									
									
								}
							});
						};
					});
				});
				
			});
			
			/* $('#sched_btn').on('click',function(){
				$('.modal-content').load('scheduleModal.php',function(){
					$('#schedule').modal({show:true});
				});
			}); */

		</script>
		

    </body>
</html>
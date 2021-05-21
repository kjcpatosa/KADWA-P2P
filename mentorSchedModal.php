

<form method = "POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">SCHEDULE</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-row">
			<div class="col-lg-12">
				<div id="inputFormRow" style = "background-color: #fffaed; border: 2px solid #dedede; padding-top: 15px; margin :4px">
					<div class="input-group mb-3">
						<div class="col-md-2">
							<input class="form-control form-control-md" type = "text" placeholder = "Subject Code" id = "SESH_subjectCode"></input>
						</div>
						<div class="col-md-3">
							<input class="form-control form-control-md" type = "text" placeholder = "Subject Name" id = "SESH_subjectName"></input>
						</div>
						<div class="col-md-2">
							<select class="form-control form-control-md"id="SESH_dayofWeek">
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
							<input class="form-control form-control-md" type = "time" placeholder = "Start Time" id = "SESH_sTime"></input>
						</div>
						<div class="col-md-2">
							<input class="form-control form-control-md" type = "time" placeholder = "End Time" id = "SESH_eTime"></input>
						</div>
						<br>
						<div class="col-md-11">
							<input class="form-control form-control-md" type = "text" placeholder = "Topic" id = "Topic"></input>
						</div>
						<div class="col-md-1">
							<button id="SESH_removeRow" type="button" class="btn btn-danger btn-md">-</button>
						</div>
					</div>
				</div>
				<div id = "SESH_newRow"></div>
				<div class="row"  style = "padding-left: 15px">
					<button id = "SESH_addRow" type="button" class="btn btn-secondary btn-md" onclick = "add()">+ Add Subject</button>
				</div>
			</div>	
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary">Save changes</button>
	</div>
</form>

<script>

/*add row schedule*/
    function add() {
        var html = '';
        html += '<div id="inputFormRow" style = "background-color: #fffaed; border: 2px solid #dedede; padding-top: 15px; margin :4px">';
		html += '<div class="input-group mb-3">';
		html += '<div class="col-md-2">';
		html += '<input class="form-control form-control-md" type = "text" placeholder = "Subject Code" id = "SESH_subjectCode"></input>';
		html += '</div>';
		html += '<div class="col-md-3">';
		html += '<input class="form-control form-control-md" type = "text" placeholder = "Subject Name" id = "SESH_subjectName"></input>';
		html += '</div>';
		html += '<div class="col-md-2">';
		html += '<select class="form-control form-control-md"id="SESH_dayofWeek">';
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
		html += '<input class="form-control form-control-md" type = "time" placeholder = "Start Time" id = "SESH_sTime"></input>';
		html += '</div>';
		html += '<div class="col-md-2">';
		html += '<input class="form-control form-control-md" type = "time" placeholder = "End Time" id = "SESH_eTime"></input>';
		html += '</div>';
		html += '<br>';
		html += '<div class="col-md-11">';
		html += '<input class="form-control form-control-md" type = "text" placeholder = "Topic" id = "Topic"></input>';
		html += '</div>';
		html += '<div class="col-md-1">';
		html += '<button id="SESH_removeRow" type="button" class="btn btn-danger btn-md">-</button>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		alert(html);
        $('#SESH_newRow').append(html);
    }

 /*remove row*/
    $(document).on('click', '#SESH_removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>
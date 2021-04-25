/**
 *
 *  sticky navigation
 *
 */

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}


/**
	FOR SELECT ELEMENTS
**/

// Map your choices to your option value
var lookup = { //palitan yuing list pag goods na di ko kabisado ahhaha
   'CET': ['BSCS', 'BSIT', 'BSCpE'],
   'College of Medicine': ['BSMT?', 'Nursing idk'],
   'Option 3': ['Option 3 - Choice 1'],
};

// When an option is changed, search the above for matching choices
$('#college').on('change', function() {
   // Set selected option as variable
   var selectValue = $(this).val();

   // Empty the target field
   $('#course').empty();
   
   // For each chocie in the selected option
   for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
      $('#course').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
   }
});

/** Form **/

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "inline-block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
	document.getElementById("prevBtn").style.display = "none";
  } else {
	document.getElementById("prevBtn").style.display = "inline";
  }
  
  if (n == (x.length - 1)) {
	document.getElementById("nextBtn").style.display = "none";
    document.getElementById("submitBtn").style.display = "inline";
  } else {
	document.getElementById("nextBtn").style.display = "inline";
    document.getElementById("submitBtn").style.display = "none";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  
  // Exit the function if any field in the current tab is invalid:
  //if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  
  // if you have reached the end of the form... :
  if (currentTab <= x.length - 1) {
	  showTab(currentTab);
  }else{
	  alert("end");
  }
}


function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
	
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
	x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}


	


	
function check_pass() {
    if (document.getElementById('pword').value ==
            document.getElementById('cpword').value) {
        document.getElementById('nextBtn').disabled = false;
    } else {
        document.getElementById('nextBtn').disabled = true;
		alert("Password did not match.");
    }
}



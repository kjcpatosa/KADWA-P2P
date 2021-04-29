

/** Form **/

var currentTab = 0; 
showTab(currentTab); 

function showTab(n) {
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "inline-block";
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
  fixStepIndicator(n)
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab");
  
  if (n == 1 && !validateForm()) return false;
  x[currentTab].style.display = "none";
  currentTab = currentTab + n;

  if (currentTab <= x.length - 1) {
	  showTab(currentTab);
  }else{
	  alert("end");
  }
}


function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
  for (i = 0; i < y.length; i++) {
    
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }
  for (i = 0; i < z.length; i++) {
    if (z[i].value == "") {
      z[i].className += " invalid";
      valid = false;
    }
	
  }
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
	x[i].className = x[i].className.replace(" active", "");
  }
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



CREATE TABLE `kadwa`.`user_information` ( `user_ID` INT(12) NOT NULL , `email` VARCHAR(65) NOT NULL , `password` VARCHAR(30) NOT NULL , `studnum` VARCHAR(9) NOT NULL , `lastname` VARCHAR(40) NOT NULL , `firstname` VARCHAR(40) NOT NULL , `middlename` VARCHAR(40) NOT NULL , `college_ID` VARCHAR(10) NOT NULL , `crs_ID` VARCHAR(10) NOT NULL , `yearlvl` VARCHAR(1) NOT NULL , `accesslvl` VARCHAR(1) NOT NULL , PRIMARY KEY (`user_ID`(12))) ENGINE = InnoDB;


let nCount = selector => {
  $(selector).each(function () {
    $(this)
      .animate({
        Counter: $(this).text()
      }, {
        // A string or number determining how long the animation will run.
        duration: 4000,
        // A string indicating which easing function to use for the transition.
        easing: "swing",
        /**
         * A function to be called for each animated property of each animated element. 
         * This function provides an opportunity to
         *  modify the Tween object to change the value of the property before it is set.
         */
        step: function (value) {
          $(this).text(Math.ceil(value));
        }
      });
  });
};

let a = 0;
$(window).scroll(function () {
  // The .offset() method allows us to retrieve the current position of an element  relative to the document
  let oTop = $(".numbers").offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() >= oTop) {
    a++;
    nCount(".rect > h1");
  }
});


var a = document.getElementById("email");
	alert(a.value);
	window.location.href="index.php";
	
	
	<div class="tab">
		<div class = "row">
			<div class="checkbox">
				<label class="checkbox-bootstrap checkbox-lg" style= "font-size: 20px">                           
					<input type="checkbox"  name = "name_mentorOrNot" id = "mentorOrNotCB">             
					<span class="checkbox-placeholder"></span>           
					Want to be a mentor?
				</label>
			</div>
		</div>
	</div>
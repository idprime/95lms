
$(document).ready(function(){
  $('body').scrollspy({target: "#myScrollspy", offset:10});
  $("#myScrollspy a").on('click', function(event) { 
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 300, function(){ 
        window.location.hash = hash;
      });
    } 
  });
});




function validateModuleForm(){
	
	if(createModules.mcode.value.length==0 || createModules.mname.value.length==0 || createModules.uploadImg.value.length==0){
		
	swal("Attention!", "Module Code/Module Name and attachment required");
	
		return false;
		
	}
	
	
	
}

function validateRegisterForm(){
	
		
	if(createUsers.nic.value.length==0 || createUsers.email.value.length==0 || createUsers.fName.value.length==0 || createUsers.lName.value.length==0 || createUsers.contact.value.length==0 || createUsers.pwd.value.length==0){
		swal("Attention!", "Data require for all Fields");	
		
		return false;
		
	}
	
	
	if(!createUsers.term.checked){
		swal("Attention!", "You must agree with our terms and conditions.");
	
		return false;
	}}

function validateLoginForm(){
	if(logForm.email.value.length==0 || logForm.pwd.value.length==0){
		
		swal("Attention!", "username and password cannot leave blank");
		
		
		
		return false;
	}
	
	
}

function validateHallForm(){
	
	if(createHall.batch.value.length==0 || createHall.mName.value.length==0 || createHall.hallNumber.value.length==0 || createHall.date.value.length==0 || createHall.sTime.value.length==0 || createHall.eTime.value.length==0  ){
		swal("Attention!", "Data require for all Fields");
	
		return false;
	}

}

function validateLabForm(){
	
	if(createLab.groupNumber.value.length==0 || createLab.mName.value.length==0 || createLab.date.value.length==0 || createLab.sTime.value.length==0 || createLab.eTime.value.length==0 ){
		swal("Attention!", "Data require for all Fields");
	
		return false;
	}
}


function validateExamForm(){
	
	if(createExam.date.value.length==0 || createExam.sTime.value.length==0 || createExam.eTime.value.length==0 ){
		swal("Attention!", "Data require for all Fields");
	
		return false;
	}
	
}


function validateEventForm(){
	
	if(reserveEvent.venue.value.length==0 || reserveEvent.subTitle.value.length==0 || reserveEvent.contact.value.length==0){
		
		
		swal("Attention!", "sub-title/venue and contact number is required");
		return false;
	}
	
	if(reserveEvent.time.value.length==0 || reserveEvent.date.value.length==0){
		swal("Attention!", "date/time frame is required");
		
		
		return false;
	}
	if(reserveEvent.fileToUpload.value.length==0){
		swal("Attention!", "Include Image 1920x590 in Resolution");
		
		
		return false;
	}
	
	
}

function validateCEventForm(){
	
	if(createEvent.name.value.length==0 || createEvent.description.value.length==0){
			swal("Attention!", "Please Include Evant name and description");

		
		return false;
	}
	
}









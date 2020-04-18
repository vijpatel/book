$('document').ready(function(){
 var username_state = false;

 $('#username').on('blur', function(){
  var username = $('#username').val();
  if (username == '') {
  	username_state = false;
  	return;
  }
  $.ajax({
    url: 'reg_process.php',
    type: 'post',
    data: {
    	'username_check' : 1,
    	'username' : username,
    },
    success: function(response){
      if (response == 'taken' ) {
      	username_state = false;
      	$('#username').parent().removeClass();
      	$('#username').parent().addClass("form_error");
      	$('#username').siblings("span").text('Sorry... Username already taken');
      }else if (response == 'not_taken') {
      	username_state = true;
      
      	$('#username').parent().removeClass();
      	$('#username').parent().addClass("form_success");
      	$('#username').siblings("span").text('Username available');
      }
    }
  });
 });	


 $('#reg_btn').on('click', function(){
 	var username = $('#username').val();
 	var password = $('#password').val();
  var cpassword = $('#cpassword').val();
  var name = $('#name').val();
  var gen = $('#gender').val();
 	if (username_state == false) {
	  $('#error_msg').text('Fix the errors in the form first');
	}else if(password != cpassword) {
    $('#error_msg').text('Passwords do not match');
  }

  else{
      // proceed with form submission
      $.ajax({
      	url: 'reguser_process.php',
      	type: 'post',
      	data: {
      		'save' : 1,
      		'username' : username,
          'name' : name,
          'gender' : gen,
      		'password' : password,
      	},
      	success: function(response){
      		alert('user saved');
      		$('#username').val('');

      		$('#password').val('');

      	}

     });
 	}
 });
});	
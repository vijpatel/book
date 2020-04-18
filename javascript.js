function validate(){
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;

	if(password.len<8){
		alert("password must have atleast 8 characters");
	}
}


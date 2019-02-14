
  function validate(){
	var uname=document.getElementById("uname").value;
	var fname=document.getElementById("fname").value;
	var lname=document.getElementById("lname").value;
	var email=document.getElementById("email").value;
	var pass=document.getElementById("pass").value;
	var mobile=document.getElementById("tel").value;
	var im=document.getElementById("image").value;
	console.log(im);
	
		
	var ucheck=/^[a-zA-Z][a-zA-Z0-9]{3,30}$/;
	var ncheck=/^[a-zA-Z]{3,}$/;	
	var pcheck=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$!#%*?&]{8,}$/;
	var echeck=/^[a-zA-Z_.]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z.]{2,5}$/;
	var mcheck=/^[6789][0-9]{9}$/;
	
	if(ucheck.test(uname)){
		document.getElementById("uerror").innerHTML="";
	}else{
		document.getElementById("uerror").innerHTML="** Enter valid user name(Can contain only starting with alphabet then digits) !";
		return false;
	}
	
	if(ncheck.test(fname)){
		document.getElementById("ferror").innerHTML="";
	}else{
		document.getElementById("ferror").innerHTML="** Enter valid first name !";
		return false;
	}
	
	if(ncheck.test(lname)){
		document.getElementById("lerror").innerHTML="";
	}else{
		document.getElementById("lerror").innerHTML="** Enter valid last name !";
		return false;
	}
	
	if(echeck.test(email)){
		document.getElementById("eerror").innerHTML="";
	}else{
		document.getElementById("eerror").innerHTML="** Enter valid Email !";
		return false;
	}
	
	
	if(pcheck.test(pass)){
		document.getElementById("perror").innerHTML="";
	}else{
		document.getElementById("perror").innerHTML="** Password has to be 1-Capital, 1-small alphabet, 1-Digit and special character atleast !";
		return false;
	}
	
	if(mcheck.test(mobile)){
		document.getElementById("merror").innerHTML="";
	}else{
		document.getElementById("merror").innerHTML="** Enter valid Mobile Number(10 Digits allowed only must start with 6,7,8 or 9)!";
		return false;
	}
	
	if(im==""){
		document.getElementById("ierror").innerHTML="** Image has to be in .jpeg, .jpg or .png format only !";
			return false;
	}
	var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        document.getElementById("ierror").innerHTML="** Enter correct Image format";
        fileInput.value = '';
        return false;
    }
	
	return true;
}


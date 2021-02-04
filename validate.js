function checkMe(){
	 var arr = document.getElementsByTagName("input");
     var name = arr[0];
     var email = arr[1];
     var mobile = arr[2];
     var password = arr[3];
     var branch = document.getElementsByTagName("select")[0];
     var year = document.getElementsByTagName("select")[1];
     if(name.value == ""){
     	document.getElementById("warning").style.display = "block";
     	name.style.border = "3px solid red";
     }
     if(email.value == ""){
     	document.getElementById("warning").style.display = "block";
     	email.style.border = "3px solid red";
     }
     if(mobile.value == ""){
     	document.getElementById("warning").style.display = "block";
     	mobile.style.border = "3px solid red";
     }
     if(password.value == ""){
     	document.getElementById("warning").style.display = "block";
     	password.style.border = "3px solid red";
     }
     if(branch.value == "Enter your Branch"){
     	document.getElementById("warning").style.display = "block";
     	branch.style.border = "3px solid red";
     }
     if(year.value == "Enter your Year"){
     	document.getElementById("warning").style.display = "block";
     	year.style.border = "3px solid red";
     }
}

function hideWarning(obj){
	document.getElementById("warning").style.display = "none";
	obj.style.border = "none";
}
function isValid(){
	 var arr = document.getElementsByTagName("input");
     var name = arr[0];
     var email = arr[1];
     var mobile = arr[2];
     var password = arr[3];
     var branch = document.getElementsByTagName("select")[0];
     var year = document.getElementsByTagName("select")[1];
     if(name.value == "" || email.value == "" || mobile.value == "" || password.value == "" || branch.value == "Enter your Branch" || year.value == "Enter your Year"){
     	return false;
     }
     else
     	return true;
}

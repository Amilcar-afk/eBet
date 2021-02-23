/*function Inputs(){
	const email = document.getElementById('email');
	const pwd = document.getElementById('pwd');
	if(email.value.length == 0){
		document.getElementById('email').style.border = '1px solid yellow';
		document.getElementById('pwd').style.border = '1px solid yellow';
	}
}*/

	function Ascii(str, from, to){
		let count = 0;
		for(let i=0; i<str.length; i++){
			let ascii = str.charCodeAt(i);
			if(ascii >= from && ascii <= to){
				count++;
				return count;
			}
		}
	}

	function maj_ascii(maj){
		return Ascii(maj, 65, 90);
	}

	function min_ascii(min){
		return Ascii(min, 97, 122);
	}
	function num_ascii(num){
		return Ascii(num, 48, 57);
	}



	function verif_pwd(pwd){
		let res=0;
		if(pwd.length >= 6){
			res++;
		}
		if(maj_ascii(pwd) == 1){
			res++;
		}
		if(min_ascii(pwd) == 1){
			res++;
		}
		if(num_ascii(pwd) == 1){
			res++;
		}

		if(res == 4){
			return res;
		}
	}

function verif_mail(mail) {
	let result = 0;
  if(mail.length >= 4 && mail.indexOf('@') != -1) {
  		result++;
      return result;
  }
}
function Input_phone(){
	let phone = document.getElementById('mobile').value;
	if(!verif_phone(document.getElementById('mobile').value)){
		document.getElementById('mobile').style.border = '1.5px solid red ';
	}else{
		document.getElementById('mobile').style.border = '2px solid green ';
	}
}

function Input_pwd(){
	let error = 0;
	if(!verif_pwd(document.getElementById('pwd').value)){
			document.getElementById('pwd').style.border = '1.5px solid red ';
		}else{
			document.getElementById('pwd').style.border = '2px solid green ';
		}
}

function Input_email(){
	if(!verif_mail(document.getElementById('email').value)){
			document.getElementById('email').style.border = '1.5px solid red ';
		}else{
			document.getElementById('email').style.border = '2px solid green ';
		}
}

function Inputs(){
	let error = 0;
	if(!verif_mail(document.getElementById('email').value)){
			error++;
		}
		if(!verif_pwd(document.getElementById('pwd').value)){
			error++;
		}
		if(error > 0) return false;
		else return true;
}






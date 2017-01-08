

function formValidate()
{
		var company_name = document.registration.companyname;
		var pwd = document.registration.passwd;
		var repwd = document.registration.repasswd;
		var country = document.registration.cntry;
		var phn = document.registration.phn;
		var modal=document.getElementById("id01");
		
		if(company_name_allLetter(company_name))
		{		
			if(passwdValid(pwd))
			{
				if(repasswdValid(repwd))
				{
					if(validCounry(country))
					{
						if(validPhn(phn))
						{
							alert("Registration Sucessfull !");
							return true;
						}
					}
				}
			}
		}
		return false;
		
		function company_name_allLetter(company_name)
		{
			var letters=/^[A-Za-z\s]+$/;
			if(company_name.value.match(letters))
			{
				document.getElementById("lbl_company_name").innerHTML="";
				return true;
			}
			else
			{
				document.getElementById("lbl_company_name").innerHTML="Name should contain only Alphabets !";
				company_name.focus();
				return false;
			}
		}
		
		function passwdValid(pwd)
		{
			var pwd_len=pwd.value.length;
			if(pwd_len < 7)
			{
				document.getElementById("lbl_passwd").innerHTML="Password Should be of Atleast 8 characters";
				pwd.focus();
				return false;
			}
			document.getElementById("lbl_passwd").innerHTML="";
			return true;
		}
		
		function repasswdValid(repwd)
		{
			if(pwd.value != repwd.value)
			{
				document.getElementById("lbl_repasswd").innerHTML="Passwords donot match !";
				repwd.focus();
				return false;
			}
			document.getElementById("lbl_repasswd").innerHTML="";
			return true;
		}
		
		function validCounry(country)
		{
			var letters=/^[A-Za-z]+$/;
			if(country.value.match(letters))
			{
				document.getElementById("lbl_country").innerHTML="";
				return true;
			}
			else
			{
				document.getElementById("lbl_country").innerHTML="Please enter a valid a country !";
				country.focus();
				return false;		
			}
		}
		
		function validPhn(phn)
		{
			var num=/^[0-9]+$/;
			if(phn.value.match(num))
			{
				document.getElementById("lbl_phone").innerHTML="";
				return true;
			}
			else
			{
				document.getElementById("lbl_phone").innerHTML="Phone number should contain only numeric digits !";
				phn.focus();
				return false;
			}
		}
}
function validateUser()
{
	var email		=document.getElementById("email").value;
	var altemail	=document.getElementById("altemail").value;
	var password	=document.getElementById("password").value;
	var conpassword	=document.getElementById("conpassword").value;
	var firstName	=document.getElementById("firstName").value;
	var lastName	=document.getElementById("lastName").value;
	var phone		=document.getElementById("phone").value;
	var state		=document.getElementById("state").value;
	var address		=document.getElementById("address").value;
	var zip			=document.getElementById("zip").value;
	var fax			=document.getElementById("fax").value;
	var filter		=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    //var valid        =/^[a-z][a-z0-9]{0,49}i 
	
	if (email == null || email == "")
	{
		alert("Please enter your email address!");
		document.getElementById("email").focus();
		return false;
	}
	if (!filter.test(email))
	{
		alert("Email address Is not Valid!");
		document.getElementById("email").focus();
		return false;
	}
	if(password == null || password == "")
	{
		alert("Please enter password");
		document.getElementById("password").focus();
		return false;
	}
	if(conpassword == null || conpassword == "")
	{
		alert(" confirm password cannot be empty");
		document.getElementById("conpassword").focus();
		return false;
	}
	if(password!='')
	{
		if(conpassword!='')
		{
			if(password!=conpassword)
			{
				alert(" confirm password  and password are not same");
				document.getElementById("conpassword").focus();
				return false;
			}
		}
	}
	if(firstName == null || firstName == "")
	{
		alert("First name can not be Empty");
		document.getElementById("firstName").focus();
		return false;
	}
	/*if(!valid.test(firstName))
	{
		alert("plz enter a valid  Name");
		document.getElementById("firstName").focus();
		return false;
	}*/
	if(lastName == null || lastName == "")
	{
		alert("Last name can not be Empty");
		document.getElementById("lastName").focus();
		return false;
	}
	if(phone == null || phone == "")
		{
			alert("Phone Number can not be Empty");
			document.getElementById("phone").focus();
			return false;

        }
        else
        {
               if(isNaN(phone)==true)
				{
				  alert("Please enter phone number in Numeric Digits only");
				  document.getElementById("phone").focus();
				  return false;

				}

        }
    if (address == null || address == "")
	{
		alert("Please enter your address!");
		document.getElementById("address").focus();
		return false;
	}
    if(altemail !="")
    {
		if (!filter.test(altemail))
		{
		alert("Please input a valid email address!");
		document.getElementById("altemail").focus();
		return false;
		}
	}
    if(fax!="")
    	{
			if(isNaN(fax)==true)
			{
				  alert("Please enter fax number in Numeric Digits");
				  document.getElementById("fax").focus();
				  return false;

			}
		}
    if(zip!="")
    	{
			if(isNaN(zip)==true)
			{
				  alert("Please enter zip code in Numeric Digits");
				  document.getElementById("zip").focus();
				  return false;

			}
		}
}

function validproperty(){

    //var desc 	= document.getElementById("desc").value;
	var address	= document.getElementById("address").value;
	var city	= document.getElementById("city").value;
	var prov	= document.getElementById("province").value;
	var postal	= document.getElementById("postal").value;
	var price	= document.getElementById("price").value;
	//var fee		= document.getElementById("fees").value;

	
	if(address == "" || address == null)
	{
		alert("Please enter address");
		document.getElementById("address").focus();
		return false;
	}
	/*if(city == "" || city == null)
	{
		alert("Please enter city");
		document.getElementById("city").focus();
		return false;
	}*/
	if(prov == "" || prov == null)
	{
		alert("Please enter  your State");
		document.getElementById("prov").focus();
		return false;
	}
	if(postal !="")
	{
		if(isNaN(postal)==true)
		{
			alert("Please enter postal code in numeric digits");
			document.getElementById("postal").focus();
			return false;
		}

	}
	if(price !="")
	{
		if(isNaN(price)==true)
		{
			alert("Please enter price in numeric digits");
			document.getElementById("price").focus();
			return false;
		}

	}
/*	if(fee !="")
	{
		if(isNaN(fee)==true)
		{
			alert("Please enter agency fees in numeric digits");
			document.getElementById("fees").focus();
			return false;
		}

	}

	if(desc == "" || desc == null)
	{
		alert("Please enter property's description");
		document.getElementById("desc").focus();
		return false;
	}*/
	document.property.addproperty.value = 1;
	document.property.submit();
}
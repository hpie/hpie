function setFormAction(formId, actionURL)
{
	//document.getElementById(formId).action="proposed-yield-blazes.php";
	document.getElementById(formId).action=actionURL;
}


//Ajax calls
function loadSubGroup(thisObj)
{
	if(thisObj.value!="")
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		   {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		   }
		else
		   {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		   }
		  xmlhttp.onreadystatechange=function()
		   {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax-call.php?get=subGroupCode&groupCode='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE").innerHTML="<option value=''>Select subgroup</option>";
	}
	
}

function loadCertificates(thisObj)
{
	if(thisObj.value!="")
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		   {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		   }
		else
		   {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		   }
		  xmlhttp.onreadystatechange=function()
		   {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("EDUCATION_CERTIFICATE_CODE").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax-call.php?get=certificateCode&educationCode='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("EDUCATION_CERTIFICATE_CODE").innerHTML="<option value=''>Select</option>";
	}
	
}

function loadBranch(thisObj)
{
	if(thisObj.value!="")
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		   {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		   }
		else
		   {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		   }
		  xmlhttp.onreadystatechange=function()
		   {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("EDUCATION_COURSE_BRANCH_CODE").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax-call.php?get=branchCode&educationCode='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("EDUCATION_COURSE_BRANCH_CODE").innerHTML="<option value=''>Select</option>";
	}
	
}


function yesnoCheck(thisObj) 
{
  	if (thisObj.value=="Y") 
  	{
  		document.getElementById('FAMILY_ID_TYPE_ROW').style.display = 'block';
  		document.getElementById('FAMILY_ID_NUMBER_ROW').style.display = 'block';
	} else {
		document.getElementById('FAMILY_ID_TYPE_ROW').style.display = 'none';
	    document.getElementById('FAMILY_ID_NUMBER_ROW').style.display = 'none';
	    
	    document.getElementById('FAMILY_ID_TYPE').value="";
	    document.getElementById('FAMILY_ID_NUMBER').value="";
	    
	} 
}


function actionHistoryOthers(thisObj) 
{
  	if (thisObj.value=="HISTORY") 
  	{
  		document.getElementById('ACTION_POSITION_ROW').style.display = 'none';
  		document.getElementById('ACTION_PAYROLL_AREA_ROW').style.display = 'none';
  		document.getElementById('ACTION_BASIC_PAY_ROW').style.display = 'block';
  		document.getElementById('ACTION_REMARKS_ROW').style.display = 'block';
  		
  		document.getElementById('ACTION_BASIC_PAY_ROW')..value="";
  		document.getElementById('ACTION_REMARKS_ROW')..value="";
	} else {
		document.getElementById('ACTION_POSITION_ROW').style.display = 'block';
	    document.getElementById('ACTION_PAYROLL_AREA_ROW').style.display = 'block';
	    document.getElementById('ACTION_BASIC_PAY_ROW').style.display = 'none';
	    document.getElementById('ACTION_REMARKS_ROW').style.display = 'none';
	    
	    document.getElementById('ACTION_POSITION').value="";
	    document.getElementById('ACTION_PAYROLL_AREA').value="";
	    
	} 
}

function loadActionReasons(thisObj)
{
	if(thisObj.value!="")
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		   {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		   }
		else
		   {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		   }
		  xmlhttp.onreadystatechange=function()
		   {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("ACTION_REASON_CODE").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax-call.php?get=reasonCode&actionCode='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("ACTION_REASON_CODE").innerHTML="<option value=''>Select</option>";
	}
	
}


function loadSubArea(thisObj)
{
	if(thisObj.value!="")
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		   {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		   }
		else
		   {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		   }
		  xmlhttp.onreadystatechange=function()
		   {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("ACTION_RESULT_SUBGROUP_CODE").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax-call.php?get=subGroupCode&groupCode='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("ACTION_RESULT_SUBGROUP_CODE").innerHTML="<option value=''>Select</option>";
	}
	
}

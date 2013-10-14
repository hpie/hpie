
function confirmDelete(thisObj)
{
	
}

function loadLotForests(thisObj)
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
		    document.getElementById("forest_code").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax_call.php?get=lotForests&lotNo='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("forest_code").innerHTML="<option value=''>Select</option>";
	}
	
}


function loadForestRangeAndDfo(thisObj)
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
		    document.getElementById("forest_range_dfo_div").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax_call.php?get=forestRangeAndDfo&forestCode='+thisObj.value;
	
		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}
	else
	{
		document.getElementById("forest_range_dfo_div").innerHTML="<label for='dfo_code'>DFO:</label> --- <label for='range_code'>Range:</label> ---";
	}	  

}
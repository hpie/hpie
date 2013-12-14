//Set passed in form to a passed in action 
function setFormAction(formId, actionURL)
{
	//document.getElementById(formId).action="proposed-yield-blazes.php";
	document.getElementById(formId).action=actionURL;
}


function confirmDelete(thisObj)
{
	
}

function calculateAmount(thisObj, rateFld, amountFld)
{
	if(thisObj.value!="")
	{
		if(!isNaN(thisObj.value))
		{
			amountFld.value = (thisObj.value*rateFld.value);
		}else
		{
			thisObj.value="0";
			amountFld.value="0";
		}
			
	}else
	{
		thisObj.value="0";
	}
}

//common function to make readonly field editable and give a mesage.
function makeTextEditable(thisObj, msg)
{
	thisObj.className="textbox";
	thisObj.readOnly=false;
	if(msg.trim()!="")
	{
		alert(msg);
	}
}

//common function to make editable field readonly and give a mesage.
function makeTextReadonly(thisObj, msg)
{
	thisObj.className="lblText";
	thisObj.readOnly=true;
	if(msg.trim()!="")
	{
		alert(msg);
	}
}

//common function to make readonly field editable and give a mesage.
function makeSmallTextEditable(thisObj, msg)
{
	thisObj.className="textboxSmall";
	thisObj.readOnly=false;
	if(msg.trim()!="")
	{
		alert(msg);
	}
}

//common function to make editable field readonly and give a mesage.
function makeSmallTextReadonly(thisObj, msg)
{
	thisObj.className="lblTextSmall";
	thisObj.readOnly=true;
	if(msg.trim()!="")
	{
		alert(msg);
	}
}


//common function called from ajax_call.php to validate carriage distance.
function validateCarriageDistance(thisObj)
{
	var distbox = thisObj.name;
	var carriageType = distbox.slice(5);
	//alert(carriageType);
	var isValid=false;
	if(isNaN(thisObj.value))
	{
		alert("Not a valid value for distance.");
		thisObj.value=0;
	}else
	{
		var distance_to_rsd = document.getElementById("distance_to_rsd").value;
		var dist_carriage_mule_rsd = document.getElementById("dist_carriage_mule_rsd").value;
		var dist_carriage_manual_rsd = document.getElementById("dist_carriage_manual_rsd").value;
		var dist_carriage_tractor_rsd = document.getElementById("dist_carriage_tractor_rsd").value;
		var dist_carriage_other_rsd = document.getElementById("dist_carriage_other_rsd").value;
		var dist_total_entered = parseFloat(dist_carriage_mule_rsd)+parseFloat(dist_carriage_manual_rsd)+parseFloat(dist_carriage_tractor_rsd)+parseFloat(dist_carriage_other_rsd); 
		if(distance_to_rsd<dist_total_entered)
		{
			isValid=true; // always true they dont need validation
			//alert("Total of all carriage distance is "+dist_total_entered+" and cannot be grater than "+ distance_to_rsd);
			
		}else
		{
			isValid=true;
		}
	}
	//alert(isValid);
	if(!isValid)
	{
		document.getElementById("apply_"+carriageType).checked=false;
		document.getElementById("exp_"+carriageType).value=0;
	}
	
	return isValid;
}

//common function called from ajax_call.php to calculate carriage.
function calculateCarriageExp(thisObj)
{
	//turnout_carriage_mule_rsd
	//dist_carriage_mule_rsd
	//cost_carriage_mule_rsd
	//apply_carriage_mule_rsd
	//exp_carriage_mule_rsd
	
	var chkbox = thisObj.name;
	var carriageType = chkbox.slice(6);
	//alert(carriageType);
	
	if(thisObj.checked)
	{
		if(validateCarriageDistance(document.getElementById("dist_"+carriageType)))
		{
			var dist = document.getElementById("dist_"+carriageType).value;
			var cost = document.getElementById("cost_"+carriageType).value;
			//var turnout = document.getElementById("turnout").value;
			var turnout = document.getElementById("turnout_"+carriageType).value;
			document.getElementById("exp_"+carriageType).value=(turnout*cost*dist).toFixed(2)
		}else
		{
			document.getElementById("dist_"+carriageType).value=0;
		}
		
	}else
	{
		document.getElementById("dist_"+carriageType).value=0;
		document.getElementById("exp_"+carriageType).value=0;
	}
	
}

// function called from rate-calculation-lot.php
function calculateScheduleRate(exp_eow, exp_com, total_turnout, total_eow, total_com, total_expenditure, rate_calculated)
{
	try{
		var eowVal=0;
		for(var i = 0; i < exp_eow.length; i++) 
		{
			eowVal=(parseFloat(eowVal)+parseFloat(exp_eow[i].value));
		}
		
		var comVal=0;
		for(var i = 0; i < exp_com.length; i++) 
		{
			comVal=(parseFloat(comVal)+parseFloat(exp_com[i].value));
		}
		
		total_eow.value=eowVal.toFixed(2);
		total_com.value=comVal.toFixed(2);
		total_expenditure.value=(parseFloat(total_eow.value)+parseFloat(total_com.value)).toFixed(2);
		rate_calculated.value=(parseFloat(total_expenditure.value)/parseFloat(total_turnout.value)).toFixed(2);
		
	}catch(err)
	{
		alert(err);
		return false;
	}
	
}

//function called from rate-calculation-lot.php
function validateMazdoor(thisObj)
{
	if(document.getElementById("number_of_mazdoors").value=="")
	{
		alert("Please enter Mazdoors for the Lot.");
	}else
	{
		if(isNaN(document.getElementById("number_of_mazdoors").value))
		{
			alert("Number of Mazdoors is not a valid number.");
		}
	}
	
}


// Ajax calls
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


//Ajax calls
function calculateExpenditureDetails(thisObj)
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
				  document.getElementById("tblExpenditureDetail").innerHTML=xmlhttp.responseText;
			    }
			}
		  
		  totalBlazes=document.getElementById("blazes_received").value;
		  yieldFixed=document.getElementById("yield_fixed").value; 
		  turnout=document.getElementById("turnout").value;
		  totalTurnout=document.getElementById("total_turnout").value;
		  distanceToRsd=document.getElementById("distance_to_rsd").value;
		  seasonYear=document.getElementById("season_year").value;
		  
		  rowId=document.getElementById("rowid").value;
		  rcalId=document.getElementById("rate_calculation_for_lot_id").value;
		  forestCode=document.getElementById("forest_code").value;
		  eowCode=document.getElementById("eow_code").value;
		  
		  var fileCall='ajax_call.php?get=calExpenditureDetails&zoneCode='+thisObj.value+'&totalBlazes='+totalBlazes+'&yieldFixed='+yieldFixed+'&turnout='+turnout+'&totalTurnout='+totalTurnout+'&distanceToRsd='+distanceToRsd+'&seasonYear='+seasonYear+'&rowId='+rowId+'&rcalId='+rcalId+'&forestCode='+forestCode+'&eowCode='+eowCode;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("tblExpenditureDetail").innerHTML="<tr> <td>No details captured. Please select the correct Zone.</td> </tr>";
	}
	
}


//Ajax calls
function calculateCostOfMaterialDetails(thisObj)
{
	//alert(window.parent.document.getElementById("number_of_mazdoors").value);
	//alert(window.parent.document.getElementById("number_of_forests").value);
	thisObj.value = window.parent.document.getElementById("number_of_mazdoors").value;
	enteredMazdoors = window.parent.document.getElementById("number_of_mazdoors").value;
	avgMazdoor = (window.parent.document.getElementById("number_of_mazdoors").value)/(window.parent.document.getElementById("number_of_forests").value);
	//alert(thisObj.value);
	
	if(avgMazdoor!="")
	{
		if(!isNaN(avgMazdoor))
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
					  document.getElementById("tblCostDetail").innerHTML=xmlhttp.responseText;
				    }
				}
			  
			  totalBlazes=document.getElementById("blazes_received").value;
			  seasonYear=document.getElementById("season_year").value;
			  
			  rowId=document.getElementById("rowid").value;
			  rcalId=document.getElementById("rate_calculation_for_lot_id").value;
			  forestCode=document.getElementById("forest_code").value;
			  comCode=document.getElementById("com_code").value;
			  
			  var fileCall='ajax_call.php?get=calCostOfMaterialDetails&enteredMazdoors='+enteredMazdoors+'&numberOfMazdoor='+avgMazdoor+'&totalBlazes='+totalBlazes+'&seasonYear='+seasonYear+'&rowId='+rowId+'&rcalId='+rcalId+'&forestCode='+forestCode+'&comCode='+comCode;

			  xmlhttp.open("GET",fileCall,true);
			  xmlhttp.send();
		}else
		{
			alert("Not a valid Value for the feild");
		}
		
	}else
	{
		document.getElementById("tblCostDetail").innerHTML="<tr> <td>No details captured. Please select the correct Zone.</td> </tr>";
	}
	
}
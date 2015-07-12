//Set passed in form to a passed in action 
function setFormAction(formId, actionURL)
{
	//document.getElementById(formId).action="proposed-yield-blazes.php";
	document.getElementById(formId).action=actionURL;
}

function setFormActionAndSubmit(formId, actionURL)
{
	//document.getElementById(formId).action="proposed-yield-blazes.php";
	document.getElementById(formId).action=actionURL;
	document.getElementById(formId).submit();
}

function confirmDelete(thisObj)
{
	
}

function validateBlazesTapped(thisObj,untappedBlazesFld)
{
	if(thisObj.value!="")
	{
		if(!isNaN(thisObj.value))
		{
			if(thisObj.value>parseInt(untappedBlazesFld.value))
			{
				alert("Number Blazes Tapped exceeds the Number of Blazes avaliable for Tapping");
				thisObj.value="";
			}
		}else
		{
			thisObj.value="";
		}
			
	}else
	{
		thisObj.value="";
	}
}

function calculateResinCollected(thisObj,quantityFld)
{
	if(thisObj.value!="")
	{
		if(!isNaN(thisObj.value))
		{
			quantityFld.value = (thisObj.value*17);
		}else
		{
			thisObj.value="";
			quantityFld.value="0";
		}
			
	}else
	{
		thisObj.value="";
	}
}

function validateTinsCarriaged(thisObj,avaliableTinsFld)
{
	if(thisObj.value!="")
	{
		if(!isNaN(thisObj.value))
		{
			if(thisObj.value>parseInt(avaliableTinsFld.value))
			{
				alert("Number of Tins Carriaged exceeds the Number of Tins avaliable for Carraige");
				thisObj.value="";
			}
		}else
		{
			thisObj.value="";
		}
			
	}else
	{
		thisObj.value="";
	}
}

function validateTinsTransported(thisObj,avaliableTinsFld)
{
	if(thisObj.value!="")
	{
		if(!isNaN(thisObj.value))
		{
			if(thisObj.value>parseInt(avaliableTinsFld.value))
			{
				alert("Number of Tins Transported exceeds the Number of Tins avaliable for Tranpsortation");
				thisObj.value="";
			}
		}else
		{
			thisObj.value="";
		}
			
	}else
	{
		thisObj.value="";
	}
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
			document.getElementById("exp_"+carriageType).value=(turnout*cost*dist).toFixed(2);
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

function calculateTransportExp(thisObj)
{
	//turnout_carriage_mule_rsd
	//dist_carriage_mule_rsd
	//cost_carriage_mule_rsd
	//apply_carriage_mule_rsd
	//exp_carriage_mule_rsd
	
	var chkbox = thisObj.name;
	var carriageType = chkbox.slice(6);
	//alert(carriageType);
	
	//if(thisObj.checked)
	//{
		var dist = document.getElementById("dist_transportation").value;
		var cost25 = parseFloat(document.getElementById("cost_transportation_initial_25").value);
		var costperkm = parseFloat(document.getElementById("cost_transportation_per_km").value);
		var turnout = parseFloat(document.getElementById("total_turnout").value);
		if(!isNaN(dist))
		{
			if(dist>25)
			{
				document.getElementById("exp_transportation").value=((((dist-25)*costperkm)+cost25)*turnout).toFixed(2);
			}else
			{
				document.getElementById("exp_transportation").value=(cost25*turnout).toFixed(2);
				if(dist<=0)
				{
					document.getElementById("exp_transportation").value=0;
				}
			}
			
		}else
		{
			document.getElementById("dist_transportation").value=0;
			document.getElementById("exp_transportation").value=0;	
		}
		
	//}else
	//{
	//	document.getElementById("dist_transportation").value=0;
	//	document.getElementById("exp_transportation").value=0;
	//}
	
}



//common function called from ajax_call.php to calculate loading unloading.
function calculateLoadingUnloading(thisObj)
{
	var filled_tins = thisObj.name;
	var loadUnloadType = filled_tins.slice(5);
	//alert(loadUnloadType);
	
	if(!isNaN(thisObj.value))
	{
		var tins = document.getElementById("tins_"+loadUnloadType).value;
		var cost = document.getElementById("cost_"+loadUnloadType).value;
		document.getElementById("exp_"+loadUnloadType).value=(tins*cost/100).toFixed(2);
	}else
	{
		document.getElementById("tins_"+loadUnloadType).value=0;
		document.getElementById("exp_"+loadUnloadType).value=0;
	}
	
}



// function called from tender-form-details to validate Payment by Draft and make Draft No mandatory 
function setEmDesc(thisObj)
{
	if(thisObj.value!="")
	{
		if(thisObj.value=="Cash")
		{
			document.getElementById("em_desc").value="N/A";
			document.getElementById("em_desc").readOnly=true;
		}else
		{
			document.getElementById("em_desc").readOnly=false;
			document.getElementById("em_desc").value="";
		}
			
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

// Function to 
function getSelectedMessage(thisObj)
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
		    	document.getElementById("frmMessage").innerHTML=xmlhttp.responseText;
		    }
		  }
		  var fileCall='ajax_call.php?get=selectedMessage&messageId='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("frmMessage").innerHTML="";
	}
	
}


// Fuunction to show / populate Group or Contact on selection 
function fetchAndShowGroupContact(thisObj)
{
	if(thisObj.value!="")
	{
		//show hide respective row  and check if already populated
		if(thisObj.value=="group")
	 	{
			$("#groupRow").show();
			$("#contactRow").hide();
			if($("#frmGroup option").size()>0)
			{
				return;
			}
			//$("#groupRow")
			//$("#contactRow")
		} else if(thisObj.value=="contact")
		{
			$("#groupRow").hide();
			$("#contactRow").show();
			if($("#frmContact option").size()>0)
			{
				return;
			}
			//$("#contactRow")
			//$("#groupRow")
		} 
				
		
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
				//fill appropriate control
				if(thisObj.value=="group")
				{
					document.getElementById("frmGroup").innerHTML=xmlhttp.responseText;
				} else if(thisObj.value=="contact")
				{
					document.getElementById("frmContact").innerHTML=xmlhttp.responseText;
				} 
		    	
		    }
		  }
		
		  var fileCall='ajax_call.php?get=getGroupContactList&selectionType='+thisObj.value;

		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}else
	{
		document.getElementById("message").innerHTML="";
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

//rate-calculation-lot-bylot.php
function calculateRateByLot(thisObj)
{
	var mazdoors = document.getElementById("number_of_mazdoors").value;
	
	if(mazdoors !="")
	{
		if(isNaN(mazdoors))
		{
			alert("Value for Number of Mazdoors is not Valid");
		}else
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
						  document.getElementById("tblExpenditureCostDetail").innerHTML=xmlhttp.responseText;
					    }
					}
				  
				  numberOfForest=document.getElementById("number_of_forests").value;
				  numberOfMazdoor=window.parent.document.getElementById("number_of_mazdoors").value;
				  totalBlazes=document.getElementById("total_blazes").value;
				  yieldFixed=document.getElementById("avg_yield_fixed").value; 
				  totalTurnout=document.getElementById("total_turnout").value;
				  distanceToRsd=document.getElementById("distance_to_rsd").value;
				  seasonYear=document.getElementById("season_year").value;
				  
				  rcalId=document.getElementById("rate_calculation_for_lot_id").value;
				  eowCode=document.getElementById("eow_code").value;
				  comCode=document.getElementById("com_code").value;
				  
				  var fileCall='ajax_call.php?get=calExpenditureAndCostDetails&zoneCode='+thisObj.value+'&numberOfForest='+numberOfForest+'&numberOfMazdoor='+numberOfMazdoor+'&totalBlazes='+totalBlazes+'&yieldFixed='+yieldFixed+'&totalTurnout='+totalTurnout+'&distanceToRsd='+distanceToRsd+'&seasonYear='+seasonYear+'&rcalId='+rcalId+'&eowCode='+eowCode+'&comCode='+comCode;

				  xmlhttp.open("GET",fileCall,true);
				  xmlhttp.send();
			}else
			{
				document.getElementById("tblExpenditureCostDetail").innerHTML="<tr> <td>No details captured. Please select the correct Zone.</td> </tr>";
			}
		}
		
	}else
	{
		alert("Number of Mazdoors is Required");
	}
	
	
}

// Tender
function loadLotDetailsForTender(thisObj)
{
	seasonYear=document.getElementById("season_year").value;
	if(seasonYear=="")
	{
		alert("Season Year for Tender is required."); 
		thisObj.selectedIndex="0";
		return false;
	}
	
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
				  document.getElementById("tender_lot_info_div").innerHTML=xmlhttp.responseText;
			  }
		  }
		  var fileCall='ajax_call.php?get=getLotDetailsForTender&lotNo='+thisObj.value+'&seasonYear='+seasonYear;
	
		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}
	else
	{
		document.getElementById("tender_lot_info_div").innerHTML="<label for='dfo_code'>Failed to get Data. Please try again</label>";
	}	  

}
//Tender
function loadRateDetailsForTender(thisObj)
{
	seasonYear=document.getElementById("season_year").value;
	totalTurnout="";
	if(seasonYear=="")
	{
		alert("Season Year for Tender is required."); 
		thisObj.selectedIndex="0";
		return false;
	}else if(document.getElementById("lot_no").value=="")
	{
		alert("Lot for Tender is required.");
		thisObj.selectedIndex="0";
		return false;
	}else
	{
		totalTurnout=document.getElementById("total_turnout").value;
	}
		
	if(totalTurnout=="")
	{
		alert("Turnout for Tender from Lot is required."); 
		thisObj.selectedIndex="0";
		return false;
	}
	
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
				  document.getElementById("tender_exp_zone_div").innerHTML=xmlhttp.responseText;
			  }
		  }
		  var fileCall='ajax_call.php?get=getRateDetailsForTender&zoneCode='+thisObj.value+'&seasonYear='+seasonYear+'&totalTurnout='+totalTurnout;
	
		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}
	else
	{
		document.getElementById("tender_exp_zone_div").innerHTML="<label for='dfo_code'>Failed to get Data. Please try again</label>";
	}	  

}
//Tender
function loadDetailsForContractor(thisObj)
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
				  document.getElementById("tender_contractor_info_div").innerHTML=xmlhttp.responseText;
			  }
		  }
		  var fileCall='ajax_call.php?get=getDetailsForContractor&contractorCode='+thisObj.value;
	
		  xmlhttp.open("GET",fileCall,true);
		  xmlhttp.send();
	}
	else
	{
		document.getElementById("tender_contractor_info_div").innerHTML="<label for='dfo_code'>Failed to get Data. Please try again</label>";
	}	  

}

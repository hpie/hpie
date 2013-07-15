<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>

<link rel="stylesheet" type="text/css" media="all"
	href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all"
	href="css/jqstyle.css" />
<style>
#form input,#form textarea {
	width: 100%
}

#form input[type=submit] {
	margin: 0 75px 0 0;
}
</style>
<!-- <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
 -->
<script type="text/javascript" src="js/calendarDateInput.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>



<script>

function loadSelectForest()
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
    document.getElementById("fl").innerHTML=xmlhttp.responseText;
    }
  }
  var dfoId=document.getElementById("nameOfDepartMent").value;
  var fileCall='ajax_call.php?get=fs&depid='+dfoId;

  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}

function loadSelectTable(){
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
    document.getElementById("vt").innerHTML=xmlhttp.responseText;
    }
  }
  var fId=document.getElementById("nameofforest_id").value;
  var fileCall='ajax_call.php?get=vt&fid='+fId;

  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();


}

 
//script for validation	
 
  $(document).ready(function(){
    $("form").validate();
   });
	
	//Function for calender
	
	/*window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"fromdate",
			dateFormat:"%d/%m/%Y"
			
		});
		new JsDatePick({
			useMode:2,
			target:"todate",
			dateFormat:"%d/%m/%Y"
			
		});
	 };*/
     

		
</script>
</head>
<body>
<form method="post" action="" name="form" id="form" />
<table align="center" width="80%" border="0" cellspacing=""
	cellpadding="" height="">
	<tr>
		<td colspan='2' align="center"><b>Forest</b></td>
	</tr>

	<tr>
		<td colspan='2' align="center"><label class="error"><?php echo $errorMsg;?></label>
		</td>
	</tr>
	<input type='hidden' name='page' value='sc1'>

	<tr>
		<td class="fill"><em>*</em>Lot-No</td>
		<td><span style="position: relative;">
		  <input value='<?php echo $lotno;?>' type='text' name='lotno' class="required" style='width:120px;'/>
		</span></td>
	</tr>

	<tr>
		<td class="fill"><em>*</em><?php echo $cnameDivision;?></td>
		<td><span style="position: relative;"> <?php echo $_SESSION['currentDivisionDetail']['vc_name']?>
		</span>
		<input type='hidden' value='<?php echo $_SESSION['centerKey'] ?>' name='i_division_id' id='i_division_id'/>
		</td>
	</tr>

	<tr>
		<td class="fill"><em>*</em><?php echo $cnameDFO;?></td>
		<td><span style="position: relative;"> <?php echo makeSelectOptions($dfoList,"nameOfDepartMent",$nameOfDepartMent,"loadSelectForest",0,"class='required'");?>
		</span></td>
	</tr>


	<tr>
		<td class="fill"><em>*</em><?php echo $cnameofforest;?></td>
		<td>
		<div id="fl"><?php echo makeForestlist($flist,"nameofforest_id",$nameofforest_id,"loadSelectTable",0,"class='required'");?>
		</div>
		</td>
	</tr>

	<tr>
		<td class="fill"><em>*</em> Volume Table</td>
		<td>
		<div id="vt"><?php echo makeSelectOptions($arrVolumeTables,"i_table_id",$i_table_id,"",0,"class='required'");?>
		</div>
		</td>
	</tr>
	
	<tr>
		<td class="fill"><em>*</em><?php echo $cfordate; ?></td>
		<td><?if(isset($fromdate) && $fromdate!=''){?> <script>DateInput('fromdate', true, 'DD-MM-YYYY','<?php echo $fromdate;?>')</script>
		<?}else{?> <script>DateInput('fromdate', true, 'DD-MM-YYYY')</script>
		<?}?></td>
	</tr>
	<tr>
		<td class="fill"><em>*</em><?php echo $ctodate;?></td>
		<td>
		<? if(isset($todate) && $todate!=''){?> <script>DateInput('todate', true, 'DD-MM-YYYY','<?php echo $todate;?>')</script>
		<?}else{?> <script>DateInput('todate', true, 'DD-MM-YYYY')</script> <?}?>
		</td>
	</tr>
	<tr>
		<td class="fill"><em>*</em> Date Of Completion</td>
		<td>
		
		<? if(isset($completionDate) && $completionDate!=''){?> <script>DateInput('completionDate', true, 'DD-MM-YYYY','<?php echo $completionDate;?>')</script>
		<?}else{?> <script>DateInput('completionDate', true, 'DD-MM-YYYY')</script> <?}?>
		</td>
	</tr>
	
	
	<tr>
		<td class="fill"><em>*</em><?php echo $carea;?></td>
		<td>
		<table>
			<tr>
				<td><input name="area" id="area" type="text" class="required number"
					value="<?php echo $area;?>" /></td>
				<td><?php echo makeSelectOptions($arrUnits,"i_unit_id",$i_unit_id,"","100","class='required'");?>
				</td>
			</tr>
		</table>
		</td>
	</tr>

	<tr>
		<td colspan="2" align="right"><input type="submit" name="submit"
			id="submit" value="Next" /></td>
	</tr>
</table>

</form>

<script>


</script>
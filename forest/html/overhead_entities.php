<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>

<link rel="stylesheet" type="text/css" media="all"
	href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all"
	href="css/jqstyle.css" />
<style>
#form input,#form select {
	width: 100px;
}
</style>
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>



<script>

 
//script for validation	
  $(document).ready(function(){
    $("form").validate();
   });


   
function setClassName(idname){
	var alotName= idname+"[i_applicable]";
	//var soeName = idname+"[i_stateOfExpence]";
	//var ttidName= idname+"[i_treeType_id]";
    var frName  = idname+"[f_rate]";
	//var sName  = idname+"[i_status]"; 
	var source = idname+"[vc_source]"; 
	var destination = idname+"[vc_destination]"; 
    var alotvalue=document.getElementById(alotName).value;

	if(alotvalue==1){
      //  document.getElementById(soeName).className='required';	
		//document.getElementById(ttidName).className='required';	
		document.getElementById(frName).className='required number';	
	//	document.getElementById(sName).className='required';
          try 
          {
      		document.getElementById(destination).className='required';
              
          }
          catch(error)
          {

          }

          try 
          {
      		document.getElementById(source).className='required';
              
          }
          catch(error)
          {

          }
        
        
			
	} else if(alotvalue==0){
         document.getElementById(soeName).className='';	
		document.getElementById(ttidName).className='';	
		document.getElementById(frName).className='';	
		document.getElementById(sName).className='';	



	}

}
</script>
</head>
<div id='show_data'>
<form id="form" name='managePages' method='POST' action=''>
<table width='100%' align='center' cellpadding='2' cellspacing='2'
	border='0'>

	<tr class='titleBg'>
		<td align='center' colspan='8' class='title'><b>Overhead Entity
		Management&nbsp;&nbsp;</b></td>
	</tr>
	<?
	if(isset($_SESSION['userMsg']) && $_SESSION['userMsg'] != ""){?>
	<tr bgcolor='#CDCDCD'>
		<td align='center' colspan='8' class='success'><?
		echo $_SESSION['userMsg'];
		unset($_SESSION['userMsg']);
		?></td>
	</tr>
	<?}
	if(isset($_SESSION['recordDeleted']) && $_SESSION['recordDeleted'] != ""){?>
	<tr bgcolor='#CDCDCD'>
		<td align='center' colspan='8' class='error'><?
		echo $_SESSION['recordDeleted'];
		unset($_SESSION['recordDeleted']);
		?></td>
	</tr>
	<?}?>
	<tr class='title1Bg'>
		<td class='title1' align='center' width="60">Sr No.</td>
		<td class='title1' align='left'>Overhead Name</td>
		<td class='title1'>Applied to this Lot?</td>
		<td class='title1' align='center'>Rate applicable</td>
		<td class='title1' align='center'>Tree Type</td>
		
		<td>Source</td>
                <td>Destination</td>
		</td>
		
	</tr>
	<?
	if(!empty($arrRecords)){
		$srNo = $page+1;
		 /*echo '<pre>';
		 print_r($arrRecords);
		 echo '</pre>';*/
		foreach($arrRecords as $key=>$records){

			$id				    = $key;
			$vc_name		    = $records['vc_name'];
			$f_rate             = $records['vc_value'];
			$arroverheadentitydetail=$common->getOverHeadInfo('c_overhead_detail',$id,$markId);

            if(!empty($arroverheadentitydetail)){ 			
			$i_applicable       = $arroverheadentitydetail[0]['i_applicable'];
			 $i_stateOfExpenceC="";
             $i_statusC ="";
             $f_rateC ="";
             $i_treeType_idC="";
			if($i_applicable==1){
             $i_stateOfExpenceC="required";
             $i_statusC ="required";
             $f_rateC ="required number";
           
			}
			
			$i_stateOfExpence   = $arroverheadentitydetail[0]['i_stateOfExpence'];
			$i_status           = $arroverheadentitydetail[0]['i_status'];
			$f_rate             = $arroverheadentitydetail[0]['f_rate'];
			$i_treeType_id      = $arroverheadentitydetail[0]['i_treeType_id'];
			$vc_destination		= $arroverheadentitydetail[0]['vc_destination'];
			$vc_source			= $arroverheadentitydetail[0]['vc_source'];
            }
	
			?>
	<input type="hidden" name="<?=$id.'[i_overhead_id]';?>"
		id="i_overhead_id" value="<?=$id?>">
	<tr class='normal' onmouseover="this.className='active'"
		onmouseout="this.className='normal'">
		<td align='center' class='gridText'>&nbsp;<?=$srNo;?></td>
		<td align='left' class='gridText'>&nbsp;<?=$vc_name;?></td>

		<td align='center'><?php echo makeSelectOptions($appliedToLot,$id."[i_applicable]",$i_applicable,"setClassName($id)","10px","class='$i_applicableC'");
		?></td>
		<td align='center'><input name="<?=$id.'[f_rate]';?>" id="<?=$id.'[f_rate]';?>"
			value="<?=$f_rate?>" class="<?php echo $f_rateC;?>" /></td>
		<td align='center'><?php echo makeSelectOptions($arrTreeType,$id."[i_treeType_id]",$i_treeType_id,"","","class='$i_treeType_idC'");?>
		</td>
		<?php 
		if($records['i_overhead_type'] ==1)
		{
          ?>
		<td><input type='text' value="<?php echo $vc_source;?>" name="<?=$id.'[vc_source]';?>" id="<?=$id.'[vc_source]';?>" style="width: 100px;"  /></td>
		<td><input type='text' value="<?php echo $vc_destination;?>" name="<?=$id.'[vc_destination]';?>" id="<?=$id.'[vc_destination]';?>" style="width: 100px;"  /></td>

		<?php 
		}
		else
		{
		  ?>
		<td>N.A.</td>
		<td>N.A.</td>

		<?php 
		}
		?>

	</tr>
	<?
	$srNo++;
		}
		?>
	<tr>
		<td colspan="8" align="center">
		<table  style="width:20%">
			<tr>
				<td><input type='button' class='btnStatus'
					name='submit' value='Cancel' onclick="javascript:parent.location='index.php?page=markCompleteDetail&markId=<?php echo $markId;?>'"></td>
				<td><input type='submit' class='btnStatus'
					name='submit' value='Update'></td>
			    
			</tr>
		</table>

		</td>
	</tr>
	<?
	?>
</table>
</form><?
	}
	?>
</div>
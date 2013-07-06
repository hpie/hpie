<?php 

$markDetailId=$_GET['markId'];


if(isset($_GET['submit'])){


	extract($_GET);
	
	$arFieldValues['i_mark_id']=$markDetailId;
	$arFieldValues['from_vc_year']=$vc_from_year;
	$arFieldValues['to_vc_year']=$vc_to_year;
	$list=$common->selectCondition('marking_master_detail', $arFieldValues);
	$existingDetail=count($list);
	if($existingDetail == 0)
	{	
	$arMarkedPrice['i_mark_id']=$markDetailId;
	$arMarkedPrice['from_vc_month']=$from_i_month_id;
	$arMarkedPrice['from_vc_year']=$vc_from_year;
	$arMarkedPrice['to_vc_month']=$i_month_id;
	$arMarkedPrice['to_vc_year']=$vc_to_year;
	$arMarkedPrice['from_vc_month']=$i_month_id;
	
	$progressConversionId = $db->insert('marking_master_detail',$arMarkedPrice);
	}
	
}

$markTressDetails=$common->getTreeMarked($_GET['markId']);	

$markDetail =  new MarkDetailDO();
$markList=$markDetail->getMarkDetailMasterDetail($markDetailId);

$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
$markIdDetail['0']['id'];
$arrVolumeTables   = $common->getAllVolumeTables();

$forestDetail=$common->getInfo('m_forest',$markIdDetail['0']['i_forest_id']);
$forestName=$forestDetail['0']['vc_name']."/".$arrVolumeTables[$markIdDetail['0']['i_table_id']];
$forestDFO=$dfoList[$forestDetail['0']['i_department_id']];

$markIdDetailHTML=$markDetail->getMarkIdDetailHTML($markDetailId,$forestDFO.'/'.$forestName);

?>
<a onclick="displayMarking()">
  Add marking
</a>
<form id="form">

<input type='hidden'  value="<?php echo $markDetailId;?>" name='markId' id='markId' />
<input type='hidden'  value="markCompleteDetailStep1" name='page' id='page' />

<div id='addMarking' style='display:none;'>
    <table style='width: 300px;'>
        <tr> 
           <td>From Year</td>
           <td> 
               <select name='vc_from_year' onclick="form.submit" >
					<option value='2011'>Select Year</option>
					<option value='2000'>2000</option>
					<option value='2001'>2001</option>
					<option value='2002'>2002</option>
					<option value='2003'>2003</option>
					<option value='2004'>2004</option>
					<option value='2005'>2005</option>
					<option value='2006'>2006</option>
					<option value='2007'>2007</option>
					<option value='2008'>2008</option>
					<option value='2009'>2009</option>
					<option value='2010'>2010</option>
					<option value='2011'>2011</option>
					<option value='2012'>2012</option>
					<option value='2013'>2013</option>
					<option value='2014'>2014</option>
					<option value='2015'>2015</option>
					<option value='2016'>2016</option>
			        <option value='2017'>2017</option>
			
			</select></td>
         </tr>
         <tr> 
           <td>From Month</td>
          	<td width="30%"><?php echo makeSelectOptions($arrMonths,"from_i_month_id",$i_month_id,"",150,"class='required'");?></td>
			
         </tr>
        <tr> 
           <td>To Year</td>
         <td> 
               <select name='vc_to_year' onclick="form.submit" >
					<option value='2011'>Select Year</option>
					<option value='2000'>2000</option>
					<option value='2001'>2001</option>
					<option value='2002'>2002</option>
					<option value='2003'>2003</option>
					<option value='2004'>2004</option>
					<option value='2005'>2005</option>
					<option value='2006'>2006</option>
					<option value='2007'>2007</option>
					<option value='2008'>2008</option>
					<option value='2009'>2009</option>
					<option value='2010'>2010</option>
					<option value='2011'>2011</option>
					<option value='2012'>2012</option>
					<option value='2013'>2013</option>
			        <option value='2014'>2014</option>
					<option value='2015'>2015</option>
					<option value='2016'>2016</option>
			        <option value='2017'>2017</option>
			
			</select></td>
         
         </tr>
         <tr> 
           <td>To Month</td>
         
               	<td width="30%"><?php echo makeSelectOptions($arrMonths,"i_month_id",$i_month_id,"",150,"class='required'");?></td>
		 
         </tr>
			<tr>
				<td style="text-align: right;"><input type='button' value='Cancel' onclick="HideMarking()" />
				</td>
		       <td  style="text-align: right;"><input type='submit' value='Save' name='submit' />
				</td>
		
			</tr>
		</table>
</div>
</form>
<div id='displayMarking'>
<table style="width: 300px;">
	<tr>
		<td>From</td>
		<td>To</td>
	</tr>
<?php 
    foreach ($markList as $id=>$object)
    {
   ?>
   	<tr>
		<td><?php 
		  echo $object['from_vc_year'];
		?></td>
		<td><?php 
		echo $object['to_vc_year'];
		?></td>
		<td>
		  <a href='index.php?page=markCompleteDetail&markId=<?=$markDetailId;?>&yearDetailId=<?php echo $id;?>'>Add/Edit Details</a>
		 </td>
	</tr>
   
   <?php 
    }

?>
</table>
</div>

<script>
   function displayMarking()
   {
	    document.getElementById("displayMarking").style.display="none";
	    document.getElementById("addMarking").style.display="block";
   }
   function HideMarking()
   {
	    document.getElementById("addMarking").style.display="none";
	    document.getElementById("displayMarking").style.display="block";
   }
   
</script>

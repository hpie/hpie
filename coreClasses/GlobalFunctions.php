<?php

/**
 Added  For Getting The Country  Pick List Module

 function getCountryPickList($status,$controlName)
 {

 $pickList_return="<select name='m_country_id'  id='m_country_id'";

 if($controlName != '')
 {
 $pickList_return=$pickList_return."  onChange=\"getStatePickList('".url_appender()."','".getStatePickList."',this.value,'".$controlName."');\"";
 }
 $pickList_return=$pickList_return."><option value='0'>Select A Value</option>";
 $country =  new country();
 $listOfCountry=$country->listAllCountry($status);

 for($i=0; $i<count($listOfCountry);$i++)
 {
 $country_Data =$listOfCountry[$i];
 $pickList_return=$pickList_return."<option  value='".$country_Data->m_country_id."'>".$country_Data->vc_country."</option>";
 }
 $pickList_return=$pickList_return."</select>" ;
 return $pickList_return  ;
 }
 */
/**
 Module  For Getting Country Pick List Ends
 */


/**
 Added  For Getting The State Pick List Module

 function getStatePickList($state_object)
 {
 $pickList_return="<select name='i_m_state_id'  id='i_m_state_id' ><option value=''>Select A Value</option>";
 $State_operation =  new StateDO();
 $state_Data = new StateVO();
 $listOfState=$State_operation->getState($state_object);
 for($i=0; $i<count($listOfState);$i++)
 {
 $state_Data =$listOfState[$i];
 $pickList_return=$pickList_return."<option  value='".$state_Data->i_m_state_id."'>".$state_Data->vc_state."</option>";
 }
 $pickList_return=$pickList_return."</select>" ;

 }
 */

//Module  For Getting State Pick List Ends




function include_from($dir, $ext='php'){
	$opened_dir = opendir($dir);

	while ($element=readdir($opened_dir)){
		$fext=substr($element,strlen($ext)*-1);
		if(($element!='.') && ($element!='..') && ($fext==$ext)){
			include($dir.$element);
		}
	}
	closedir($opened_dir);
}

function url_appender()
{
	$appender="";
	$stringValue=$_SERVER['PHP_SELF'];
	$pathString=split('/',$stringValue);
	for($i=3; $i<count($pathString) ;$i++)
	{
		$appender=$appender."../";
	}
	return $appender;
}


/**
 Added for checking the  particular column  value in the particular table.
 */

function isExists($tableName,$columnName,$value,$id_Column,$id_ColumnValue)
{
	$query="select * from ".$tableName ." where LOWER(trim(".$columnName .")) = LOWER(trim('".$value."')) and $id_Column != $id_ColumnValue";
	$result=mysql_query($query) or die("Exception During Fetching Data From  Country Table");
	while($row = mysql_fetch_array($result))
	{
		return 1;
	}
	return 0;
} //End of function for checking is exists value.


function isUpdate($tableName,$columnName,$value,$id_Column,$id_ColumnValue)
{
	$query="update  ".$tableName ."   set ".$columnName ." = '".$value."' where  $id_Column = $id_ColumnValue";
	$result=mysql_query($query) or die("Exception During Update OPeration");
	while($row = mysql_fetch_array($result))
	{
		return 1;
	}
	return 0;
} //End of function for checking is exists value.

function getArrayFromSession($code)
{
	$markTressDetails=unserialize($_SESSION[$code]);
	if(isset($markTressDetails) && ! empty($markTressDetails))
	{
		return $markTressDetails=(array)$markTressDetails;
	}
}
function getKeyObjectFromSession($code)
{
	$object=unserialize($_SESSION[$code]);
	return $object;
}
function removeFromSession($code)
{
	$_SESSION[$code]='';
}
function getUserPendingDetails($id)
{
	$markDetailDo =  new MarkDetailDO();
	$list= $markDetailDo->getMarkDetailUser($id);
	
	$coonversionPending=0;
	$overheadePending=0;
	
	$statusString='';
	foreach ($list as $detail)
	{    $coonversionPendingHTML = "Pending"; 
	     $overheadePendingHTML   = "Pending";
		if($detail->i_conversion_status ==1)
		{
			$coonversionPending=0;
			$coonversionPendingHTML="Done";
		}
		if($detail->i_overhead_status ==1)
		{
			$overheadePending=0;
			$overheadePendingHTML="Done";
		}
		if($coonversionPending==0 && $overheadePending==0 )
		{
			//both Pending
				
			$statusString.='<tr><td><a href="index.php?page=markCompleteDetail&markId='.$detail->id.'">Lot-'.$detail->id.'</a></td><td><a href="index.php?page=addConversion&markId='.$detail->id.'">'.$coonversionPendingHTML.'</a></td><td><a href="index.php?page=addOverhead&markId='.$detail->id.'">'.$overheadePendingHTML.'</a></td></tr>';
				
		}
		else if ($coonversionPending ==0)
		{
			//conversion pending
			$statusString.='<tr><td>Lot-'.$detail->id.'</td><td>Pending</td><td>Done</td></tr>';
	
		}
		else if ($overheadePending ==0)
		{
			//conversion pending
			$statusString.='<tr><td>Lot-'.$detail->id.'</td><td>Done</td><td>Pending</td></tr>';
		}
	}
	
	if($statusString != '')
	{
	$statusString="<table><tr><td>Lot-No</td><td>Filling/Con Entry</td><td>Over Head Entry</td></tr>".$statusString.'</table>';	
	}
	return $statusString;
}

function display_float($number,$decimalPlace=2)
{
   return number_format($number,$decimalPlace, '.', '');
}


function pageUrl($pageId,$currentPage)
{
   
	if($pageId==$currentPage)
	{
		return "selectedItem";
	}
}


function printButton($left,$url,$top='')
{  ?>

<span style='position: absolute;left:<?php echo $left;?>px;
<?php 
  echo ($top=='' ? '' : " top:".$top.";"); 
?>'
>
  <a href="<?php echo $url?>"><img src="img/print.png" alt="No Found" title="Print View"></a>
</span>
   <?php
}

?>

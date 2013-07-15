<?php
$markDetailId=$_GET['markId'];
 if(!isset($_GET['f'])){
  removeFromSession('treeFillingArray');
  removeFromSession('treeConversionArray');
}
 /*echo '<pre>';
 print_r($_SESSION);
 echo '</pre>';
*/

$treeFillingArray=getArrayFromSession('treeFillingArray');
       
/* start code update by priyanka 9/2/2011*/
if(!isset($treeFillingArray)){
	$treeDetail =  new TreeDO();
	$treeFillingArray=$treeDetail->getfillingDetail($markDetailId);
	$_SESSION['treeFillingArray']=serialize($treeFillingArray);
}


$treeConversionArray=getArrayFromSession('treeConversionArray');

if(empty($treeConversionArray)){
foreach ($treeFillingArray as $treeFilling)
{
  if($treeFilling->treetype_id> 0)
   {
   $timberDetail =  new TimberDO();
   $timberDetailArray=$timberDetail->getTimberDetail($treeFilling->treetype_id,$markDetailId);
   $treeConversionArray[$treeFilling->treetype_id]=$timberDetailArray;
  }

  $_SESSION['treeConversionArray']=serialize($treeConversionArray);
 }
}
/*echo '<pre>';
		print_r(serialize($treeFillingArray));
		echo '</pre>';*/

/* end code update by priyanka 9/2/2011*/

$errorMsg  ='';
if(isset($_POST['save_detail'])){

	if(isset($treeFillingArray) && isset($treeConversionArray) && ! empty($treeFillingArray) && ! empty($treeConversionArray) )
	{
		foreach ($treeFillingArray as $treeFilling)
		{
			if($treeFilling->treetype_id> 0)
			{
                
	           $db->deleteConversion($treeFilling->treetype_id,$markDetailId); 

				$c_tree_filling['i_prev_count']=$treeFilling->previousCount;
				$c_tree_filling['i_current_count']=$treeFilling->currentCount;
				$c_tree_filling['i_prev_volume']=$treeFilling->previousVolume;
				$c_tree_filling['i_current_volume']=$treeFilling->currentVolume;
				$c_tree_filling['i_tree_id']=$treeFilling->treetype_id;
				$c_tree_filling['i_status']=1;
				$c_tree_filling['i_mark_id']=$_REQUEST['markId'];
				echo $id = $db->insert('c_tree_filling',$c_tree_filling);
				echo '<br>';
				//$c_tree_filling_detail['id']=0;
				$timberDetailArray=$treeConversionArray[$treeFilling->treetype_id];
				if(isset($timberDetailArray))
				{
					foreach($timberDetailArray as $timberDetail)
					{
                         /*echo '<pre>';
						 print_r($timberDetail);
						 echo '</pre>';*/
                          
                         
 
						$c_tree_filling_detail['i_timber_id']=$timberDetail->timberType;
						$c_tree_filling_detail['i_previous_count']= $timberDetail->previousCount;
						$c_tree_filling_detail['i_previous_volume']=$timberDetail->previousVolume;
						$c_tree_filling_detail['i_current_count']=$timberDetail->currentCount ;
						$c_tree_filling_detail['i_current_volume']=$timberDetail->currentVolume;
						$c_tree_filling_detail['i_status']=1;
						$c_tree_filling_detail['i_tree_id']=$treeFilling->treetype_id;
						$c_tree_filling_detail['i_filling_id']=$id;

						
						echo $id = $db->insert('c_filling_detail',$c_tree_filling_detail);
                        
					}
				}


			}

		}
		
		$arCondition = array('id'=>$markDetailId);
		$arFieldValues =array('i_conversion_status'=>'1');
		$id = $db->update('c_mark_detail',$arFieldValues,$arCondition);
		//die();
		removeFromSession('treeFillingArray');
		removeFromSession('treeConversionArray');
	    header("Location:".BASE_URL."index.php?page=markCompleteDetail&markId=".$_REQUEST['markId']);

	}
	else
	{

		$errorMsg="Enter Conversion Details";
	}
}
$markDetailId=$_GET['markId'];

?>
<script>

  function  displayTimber(id)
  {
   document.getElementById(id).style.display="block";
   document.getElementById(id+"Display").style.display="none";
   document.getElementById(id+"Hide").style.display="block";
   }
  function  hideTimber(id)
  {
   document.getElementById(id).style.display="none";
   document.getElementById(id+"Display").style.display="block";
   document.getElementById(id+"Hide").style.display="none";
  }
</script>

<table align="center" width="100%" border="0" cellspacing="0"
	cellpadding="">
	<tr>
		<td colspan='2'><label class="error"><?php echo $errorMsg;?></label></td>
	</tr>
	<tr>
		<td colspan="2">
		 Lot No.<?php echo $markDetailId; ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<hr style="border: 1px solid black">
		</td>
	</tr>

	<tr>
		<td colspan=2 align="center"><?php if(!isset($treeFillingArray) || empty($treeFillingArray) || count($treeFillingArray)==0){

			echo "No Record Entered";

		}
		else{?>
		<table cellpadding="5px" cellspacing="5px">
			<tr>
				<td class="timber">Tree</td>
				<td class="timber">Previous Count</td>
				<td class="timber">Previous Volume</td>
				<td class="timber">Current Count</td>
				<td class="timber">Current Volume</td>
			</tr>
			<?php
			foreach ($treeFillingArray as $treeFilling)
			{


				if($treeFilling->treetype_id> 0)
				{

					?>
			<tr>
				<td><?php echo $treeList[$treeFilling->treetype_id]->vc_name?></td>
				<td><?php echo $treeFilling->previousCount ; ?></td>
				<td><?php echo $treeFilling->previousVolume ; ?></td>
				<td><?php echo $treeFilling->currentCount ; ?></td>
				<td><?php echo $treeFilling->currentVolume ; ?></td>
				<td><a
					href="index.php?page=addtreeConversion&treeId=<?php echo $treeFilling->treetype_id?>&markId=	<?php echo $markDetailId; ?>">Add
				Conversion Detail</a></td>
				<td>
				<div id='<?php echo $treeFilling->treetype_id?>Display'><a
					href="javascript:displayTimber('<?php echo $treeFilling->treetype_id?>')"
					onclick="displayTimber('<?php echo $treeFilling->treetype_id?>')">Timber
				Detail</a></div>
				<div style="display: none"
					id='<?php echo $treeFilling->treetype_id?>Hide'><a
					href="javascript:hideTimber('<?php echo $treeFilling->treetype_id?>')"
					onclick="displayTimber('<?php echo $treeFilling->treetype_id?>')">Hide
				Detail</a></div>

				</td>


			</tr>
			<tr>
				<td colspan=6 align="right">
				<div style="display: none"
					id="<?php echo $treeFilling->treetype_id;?>"><?php
					$timberDetailArray=$treeConversionArray[$treeFilling->treetype_id];
                       
					//start Code by priyanka  02-09-2011
					if(!isset($timberDetailArray)){

						$timberDetail =  new TimberDO();
						$timberDetailArray=$timberDetail->getTimberDetail($treeFilling->treetype_id,$markDetailId);

					}
                     

					//end Code by priyanka  02-09-2011



					if(isset($timberDetailArray))
					{
						?>

				<table>
					<tr>
						<td class="timber">Timber</td>
						<td class="timber">Previous Count</td>
						<td class="timber">Previous Volume</td>
						<td class="timber">Current Count</td>
						<td class="timber">Current Volume</td>
					</tr>

					<?php
					foreach($timberDetailArray as $timberDetail){
						?>
					<tr>
					
					
					<tr>
						<td><?php echo $timberDetail->timberName;?></td>
						<td><?php echo $timberDetail->previousCount;?></td>
						<td><?php echo $timberDetail->previousVolume;?></td>
						<td><?php echo $timberDetail->currentCount;?></td>
						<td><?php echo $timberDetail->currentVolume;?></td>
					</tr>
					<?php
					}

					?>

				</table>

				<?php
					}

					?></div>
				</td>
			</tr>
			<?php


				}
			}
			?>
		</table>
		<?php
		}?></td>
	</tr>

	<tr>
		<td colspan="2">
		<hr style="border: 1px solid black">
		</td>
	</tr>

	</td>
	</tr>

</table>


<table>
	<tr>
		<td align='right'>
		<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
			<tr>
				<td align='right'>
				<form id="form" method='post'><input type="hidden"
					value='<?php echo $markDetailId;?>' name='markId' id='markId' /> <input
					type="submit" name="save_detail" id="save_detail"
					VALUE="Save Filling Info" /></FORM>
				</td>
				<td align='left'>
				<form id="form" action='index.php' method='get'><input type="hidden"
					value='<?php echo $markDetailId;?>' name='markId' id='markId' /> <input
					type="hidden" value='addFillingDetail' name='page' id='page' /> <input
					type="submit" name="marktrees" id="marktrees"
					value="Add Filling Details" /></form>
				</td>
			</tr>
		</table>


		</td>
	</tr>
</table>








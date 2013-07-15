<style>
.treetotal
{
	background-color:#999999;
	color:white;
}

.classtotal
{
	background-color:#666666;
	color:white;
}

.overalltotal
{
	background-color:#333333;
	color:red; 
}

.evenrow
{
	background-color:#cccccc;
}

.oddrow
{
	background-color:#eeeeee;
}
</style>
<?php

printButton('800','javascript:window.print()','90px');
echo '<center><h2>Marking Summary Report</h2></center>';
$markDetailId=$_GET['markId'];
$markTressDetails=$common->getTreeMarked($_GET['markId']);
$markDetail =  new MarkDetailDO();
$markList=$markDetail->getMarkDetailSummarry($markDetailId);
$volumneList=$markDetail->getMarkIdVolumeDetail($markDetailId);

$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
$markIdDetail['0']['id'];
$forestDetail=$common->getInfo('m_forest',$markIdDetail['0']['i_forest_id']);
$forestName=$forestDetail['0']['vc_name'];
$forestDFO=$dfoList[$forestDetail['0']['i_department_id']];

$markIdDetailHTML=$markDetail->getMarkIdDetailHTML($markDetailId,$forestDFO.'/'.$forestName);

echo $markIdDetailHTML;

$oddrowcolor = "class='oddrow'";
$evenrowcolor = "class='evenrow'";
$colorcount=0;

if(!isset($markList) || empty($markList)){
	echo "<tr><td colspan=2 align='center'>No Record Entered";
} else{
	?>
<table border="1">
	<tr>
		<td align='center'><b>Classes</b></td>
		<?php
		$totaCount=0;
		$catTotal = array();
		foreach($markList as $tree=>$detail)
		{
		?>
		<td <?php echo( $colorcount%2==0? $evenrowcolor : $oddrowcolor) ?> colspan="2" align='center'><b><?php echo $treeList[$tree]->vc_name;?></b></td>
		<?php
		 $colorcount++;
		}
		?>
	<td class="classtotal" colspan="2" align='center'><b>Total</b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<?php
		$colorcount=0;
		foreach($markList as $tree=>$detail){
			?>
		<td <?php echo( $colorcount%2==0? $evenrowcolor : $oddrowcolor) ?> align='center'><b>No.</b></td>
		<td <?php echo( $colorcount%2==0? $evenrowcolor : $oddrowcolor) ?> align='center' ><b>Vol.</b></td>
		<?php
		$colorcount++;
		}
		?>
		<td class="classtotal" align='center'><b>No.</b></td>
		<td class="classtotal" align='center'><b>Vol.</b></td>
		
	</tr>
	
<?php
$catValueCount=array();
$catVolumeCount=array();;
$totalCount;
$totalVolumne;
$colorcount=0;
foreach($catList as $cat)

{
	$totalCount=0;
    $totalVolumne=0;
	
	?>
	<tr <?php echo( $colorcount%2==0? $evenrowcolor : $oddrowcolor) ?>>
		<td align='center'><b><?php echo $cat->vc_name; ?></b></td>
		
		<?php
			$colorcount++;	
		foreach($markList as $tree=>$detail){
			$totalCount+=$detail[$cat->id]->i_value;
	        $totalVolumne+=$volumneList[$cat->id][$tree]->i_tree_volume;
	
			?>
				<td align='right'><b><?php $catValueCount[$tree]=$catValueCount[$tree]+($detail[$cat->id]->i_value); echo ($detail[$cat->id]->i_value=='' ? '0' : $detail[$cat->id]->i_value); ?></b></td>
				<td align='right'><b><?php $catVolumeCount[$tree]+= ($volumneList[$cat->id][$tree]->i_tree_volume);echo ($volumneList[$cat->id][$tree]->i_tree_volume=='' ? '0' : $volumneList[$cat->id][$tree]->i_tree_volume); ?></b></td>
		<?php
		}
		?>
		<td class="classtotal" align='right'><b><?php  echo $totalCount;?></b></td>
		<td class="classtotal" align='right'><b><?php  echo $totalVolumne;?></b></td>
		
	</tr>
	<?php
	}
	?>
	
<tr class="treetotal">
<td align='center'><b>Total</b></td>
<?php
$totalCount=0;;
	$totalVolumne=0;
foreach($markList as $tree=>$detail){
	$totalCount+=$catValueCount[$tree];
	$totalVolumne+=$catVolumeCount[$tree];
	
			?>
				<td align='right'><b><?php echo ($catValueCount[$tree]); ?></b></td>
				<td align='center'><b><?php echo ($catVolumeCount[$tree]); ?></b></td>
		<?php
		}
		?>
	<td class="overalltotal" align='right'><b><?php  echo $totalCount;?></b></td>
	<td class="overalltotal"  align='right'><b><?php  echo $totalVolumne;?></b></td>		
</tr>	
</table>
<?php
}//End of else ?>



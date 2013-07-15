
<script>

  function  displayTimber(id)
  {
   document.getElementById('fillingDetail'+id).style.display="block";
   document.getElementById(id+"Display").style.display="none";
   document.getElementById(id+"Hide").style.display="block";
   }
  function  hideTimber(id)
  {
   document.getElementById('fillingDetail'+id).style.display="none";
   document.getElementById(id+"Display").style.display="block";
   document.getElementById(id+"Hide").style.display="none";
  }
</script>

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

.headrow
{
	background-color:#aaaaaa;
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
//Timber detail aarray start
if(!isset($_GET['f'])){
	removeFromSession('treeConversionArray');
}



/* start code update by priyanka 9/2/2011*/

if($_GET['page']=='markCompleteDetail'){
	//timber detail access start
	foreach ($markTressDetails as $key=>$value)
	{
		if($key> 0)
		{
			$timberDetail =  new TimberDO();
			$timberDetailArray=$timberDetail->getTimberDetail($key,$markDetailId);
			$treeConversionArray[$key]=$timberDetailArray;
		}
		$_SESSION['treeConversionArray']=serialize($treeConversionArray);
	}
	//timber detail access end
}




//Timber detail array ends

?>

<?php 
if(!isset($markList) || empty($markList)){

	echo "<tr><td colspan=2 align='center'>No Record Entered</tr>";

}
else{
	?>

<table border="1px">
<tr>
	<td><b>Location</b></td>
	<td><b>Inventory-In</b></td>
	<td><b>Inventory-Out</b></td>
	

</tr>


<?php 
foreach($allForestPoints as $pointId=>$pointName){
	 $treeDetail=$allTransportationDetail[$pointId];
	    if($treeDetail =='')
	      continue;
       
	?>
	<tr>
	<td><b><?php echo  $pointName.'<br>'.$pointId; ?></b></td>
	<td valign="top">	<?php 
	    if(isset($treeDetail) && $treeDetail != null)
        {
          ?>
          <table style="width:300px;">
           <tr>
             <td>
               Tree Name
              </td>
            <td>
               Volume
              </td>
            <td>
               Available For Sale
              </td>
            </tr>

            <?php
            foreach($treeDetail as $pointIdM=>$transPortDetail){
            	?>
			<tr>
				<td><?php
                  echo  $treeList[$transPortDetail['i_tree_id']]->vc_name;
				?></td>
				<td><?php
 				  echo  $transPortDetail['i_volume'];
				?></td>
				<td><?php 
				   if($transPortDetail['i_exit'] ==1)
				   {
				   	 echo  "Yes";
				   }
				   else
				   {
				   	 echo  "No";
				   }
				?></td>
			</tr>
			<?php
            }
            ?>



		</table>
          
          
          <?php 
        }
    ?> </td>
	<td valign="top">	<?php 
	    $treeDetailInventory=$allTransportationInventoryDetail[$pointId];
	    if(isset($treeDetailInventory) && $treeDetailInventory != null)
        {
          ?>
          <table style="width:300px;">
           <tr>
             <td>
               Tree Name
              </td>
            <td>
              Count
            </td>
            <td>
               Volume
              </td>
            <td>
               Exit Reason
              </td>
            </tr>

            <?php
            foreach($treeDetailInventory as $pointIdM=>$transPortDetail){
            	if($transPortDetail['i_current_volume'] == 0)
            	   continue;
            	?>
			<tr>
				<td><?php
                  echo  $treeList[$transPortDetail['i_tree_id']]->vc_name;
				?></td>
				<td><?php
 				  echo  $transPortDetail['i_current_volume'];
				?></td>
				
				<td><?php
 				  echo  $transPortDetail['i_current_volume'];
				?></td>
				
				<td><?php 
				   echo $exitType[$transPortDetail['i_exit_id']];
				?></td>
			</tr>
			<?php
            }
            ?>



		</table>
          
          
          <?php 
        }
    ?> </td>
	</tr>
 <?php         
}
	?>
<tr>
<td>
&nbsp;
</td>
</tr>	
	
	<?php 
	}
	?>
</table>
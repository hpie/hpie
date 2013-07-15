<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>

<link rel="stylesheet" type="text/css" media="all"
	href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all"
	href="css/jqstyle.css" />
<style>
#form input,#form textarea {
	width: 58%
}

#form input[type=submit] {
	margin: 0 75px 0 0;
}

#form input[type="submit"] {
	margin: 0px;
}

.showDiv {
	display: block;
}

.hideDiv {
	display: none;
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
 
  function addNextDiv(divId){
   document.getElementById('typeDiv_'+divId).className="showDiv"
 
   var x=2;
   for(x==2;x<=divId;x++){
   document.getElementById('typeSpan_'+x).innerHTML="<a href='javascript:hideDiv("+x+")'>Delete</a>";
   }

  }
  function hideDiv(divId){
   document.getElementById('typeDiv_'+divId).className="hideDiv";
   var total_cat=document.getElementById('total_cat').value;
   var x=1;
   var catIds=document.getElementById('categoryids').value;
   var catArray=catIds.split(",");
   for(x=0;x<catArray.length;x++){
            document.getElementById("catvalue["+divId+"]["+catArray[x]+"]").value=0;
   }
   calculateVolumne();
  }

 function calculateVolumne()
 {
	
	 var treesid=document.getElementById('treeTypeHidden').value;
	 var treesArray=treesid.split(",");
	 var catIds=document.getElementById('categoryids').value;
	 var catArray=catIds.split(",");
	    for(x=0;x<catArray.length;x++)
	    	{
	    		document.getElementById('catVolume['+catArray[x]+']').value='0';
		    }
    
	for(y=0;y<treesArray.length;y++){
	    for(x=0;x<catArray.length;x++){
           var catValue=document.getElementById("catvalue["+treesArray[y]+"]["+catArray[x]+"]").value;
		   
           var catVolume=0;
             try 
             {
            	 
                  
             	 catVolume=document.getElementById(catArray[x]+"_"+document.getElementById('treetype_id').value).value;
                
                  }
             catch(error)
             {
                
                 }
            var exisVolume=document.getElementById('catVolume['+catArray[x]+']').value;;
           exisVolume=parseFloat(exisVolume)+parseFloat(catVolume)* parseFloat(catValue);
       	   document.getElementById('catVolume['+catArray[x]+']').value=roundNumber(exisVolume,3);
      }
    }
	   
 } 

	//Function for calender

	function addVolume(value)
	{
   		document.getElementById("defaultValue").innerHTML="("+document.getElementById("tree_price_"+value).value+")";
	}
	
</script>
</head>
<body>
<form id="form" method="post" action=""><input type='hidden'
	value='<?php echo $markDetailId?>' id='markid' name='markid' /> 
<table align="center" width="90%" border="0" cellspacing="0"
	cellpadding="">
	<tr>
		<td colspan="2" align="center"><b><u>Mark Trees</u></b> <br></br>
		</td>
	</tr>
	<tr>
		<td align="left" colspan="2">
		<table style="width: 50%" cellspacing="0" cellpadding="0">
			<tr>
				<td><b>&nbsp;&nbsp;&nbsp;&nbsp;Tree&nbsp;Name:</b></td>
				<td style="text-align: left;"><?php 
				if(isset($treeId))
				{
					echo "<b>".$list[$treeId]->vc_name."</b>";
					?>
					<input type='hidden' value='<?php echo $treeId?>' id='treetype_id'
					name='treetype_id' />
					<?php 
				}
				else
				{
					$listTemp = array();
					foreach($list as $k)
					{

						if($treeEntryList[$k->id] == '')
						{
							$listTemp[$k->id]= $k;
						}
						// continue
					}
					echo makeTreelist($listTemp,"treetype_id",$treetype_id,"addVolume",0,"class='required'");
				}
				?></td>
			
			
			<tr>
			
				<span  style='display:none'  id="defaultValue"></span>
				<input type='hidden' value='<?php echo $unitPriceValue?>' id='unitPrice'
					name='unitPrice'  style='width:40px;'/>
				
		<tr>
				<td><b>Royalty per cum:</b></td>
				<td style="text-align: left;"> 
				<input type='text' value='<?php echo $currentPrice[0]['i_royality_price']?>' id='royalityPrice'
					name='royalityPrice'  style='width:40px;'/>
				</td>
				<td>
				</td>
				</tr>
	
		</table>
	
	</tr>

	<tr>
		<td colspan="2">
		<table width="100%" border=0 cellspacing=0 cellpadding=0>

			<tr>
				<td align="left" class="fill">&nbsp;&nbsp; <?php echo $ctreetype;?>/<?php echo $ccategory;?>&nbsp;&nbsp;
				</td>
			</tr>
			<tr>

				<td align="left">
				<table>
					<tr>
						<td style="width: 20px">&nbsp;&nbsp;&nbsp;&nbsp;<input
							type="hidden" name="total_cat" id="total_cat"
							value="<?=count($catList); ?>" /></td>
							<?php
							$cathidden='';
							foreach($catList as $key=>$category){

									
								if($cathidden =='')
								{
									$cathidden=$category->id;
								}
								else
								{
									$cathidden.=','.$category->id;
								}
								?>

						<td style="width: 20px"><?php echo $category->vc_name;?></td>

						<?php
							}
							?>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td align="left"><?php
				$count=0;
				$treeTypeHidden='';
				
				foreach($arrTreeTypes as $k=>$v){
					$count++;
					if($count==1){
						$display="showDiv";
					}else{
						$display="hideDiv";
					}
					
					if($treeTypeHidden =='')
					{
						$treeTypeHidden=$k;
					}
					else
					{
						$treeTypeHidden.=','.$k;
					}
					/*echo '<pre>';
						print_R($treeEntryDetail[$k]);
						echo '</pre>';*/
					echo '<div id="typeDiv_'.$count.'" class="'.$display.'"><table><tr><td style="width:20%" valign="midle">'.$v['vc_name'].'</td>';
					$addCount=0;
					$categoryCount=0;
					foreach($catList as $key=>$category){
						$addMore="";
						$categoryCount++;
						if($categoryCount	==count($catList) && $count<count($arrTreeTypes)){
							$addMore="Add More";
						}
						?>
				
				
				<td style="width: 20%"><input
					onblur="outFocus(this,'<?php echo $volumeTableDetail[$category->id]['volume']?>','<?php echo $category->id;?>')"
					onfocus="getFocus(this);" class="required number"
					name="catvalue[<?php echo $k;?>][<?php echo $category->id;?>]"
					id="catvalue[<?php echo $k;?>][<?php echo  $category->id;?>]"
					value="<?php echo ($treeEntryDetail[$k][$category->id]->i_value =='' ? '0' :$treeEntryDetail[$k][$category->id]->i_value );?>"
					style="width: 50px;" title="Enter Number of trees under this category" /><span id="typeSpan_<?=$k;?>"><a
					href="javascript:addNextDiv(<?=$newDiv=$count+1;?>)"><?=$addMore;?></a></span></td>
					<?
				  if($treeEntryDetail[$k][$category->id]->i_value >0)
				  {
				    $addCount++;
				  }
					}
					
					echo '</tr></table></div>';
				  if($addCount > 0)
				  {
				  	?>
				  	<script>
				  	document.getElementById('typeDiv_<?php echo $k; ?>').style.display="block";
				  	</script>
				  	<?php 
				  }
				}
				?>
				</td>
			</tr>
			<tr>
				<td align="left">
				<table>
					<tr>
						<td style="width: 20%">Volume</td>
						<?php
						foreach($catList as $key=>$category)
						{
							?>
						<td style="width: 20%"><input class="required number"
							name="catVolume[<?php echo $category->id;?>]"
							id="catVolume[<?php echo  $category->id;?>]"
							value="<?php   echo($voulmeDetail[$category->id]->i_tree_volume == '' ? '0': $voulmeDetail[$category->id]->i_tree_volume); ?>"
							style="width: 50px;" readonly /></td>
							<?
						}
						?>
					</tr>
				</table>
				</td>
			</tr>

		</table>
		</td>
	</tr>
</table>
</td>
</tr>
<tr>
	<td align="left">
	<table>
		<tr>
			<td colspan='2' align="right">
			<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
				<tr>
					<td><input type='submit' class='btnStatus' name='cancel'
						value='Cancel' /></td>

					<td><input type="submit" name="update" id="upadte" value="Update" /></td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
	</td>
</tr>
<tr>
	<td colspan=2><br></br>

	</td>
</tr>
</table>
<input type='hidden' value='<?php echo $cathidden?>' id='categoryids' /> 
<input type='hidden' value='<?php echo $treeTypeHidden?>' id='treeTypeHidden' /> 
<?php 
foreach($volumeTableDetail as $key=>$volumeTable){
	
	foreach($volumeTable as $category=>$detail)
	{
	?> 
	 <input type='hidden' id='<?php echo $category ;?>_<?php echo $key ;?>' value='<?php echo $detail['volume'] ;?>' />
	<?php
	}
}
?></form>
<script>
function outFocus(control,volume,category)
{
	

	if(volume=='')
	{
    volume=0;
		}
	if(control.value=='')
	{
		control.value='0';
	}
  calculateVolumne();
	
}
function getFocus(control)
{
	if(control.value=='0')
	{
		control.value='';
		
	}
}

function roundNumber(num, dec) {
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}
</script>
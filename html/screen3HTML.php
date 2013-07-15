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
</style>
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>

//script for validation	
  $(document).ready(function(){
    $("form").validate();
  });

  

	//Function for calender
	
	
</script>
</head>
<body>
<form id="form" method="post" action="">
<table align="center" width="90%" border="0" cellspacing="0"
	cellpadding="">
	<tr>
		<td colspan="2" align="center"><b>Mark Trees</b> <br></br>
		</td>
	</tr>
	<tr>
		<td class="fill">Select Tree</td>
		<td><?php echo makeTreelist($list,"treetype_id",$treetype_id,"",0,"class='required'");?>

		</td>
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
						<td>&nbsp;</td>
						<?php
							
						foreach($catList as $key=>$category){

							?>

						<td><?php echo $category->vc_name;?></td>

						<?php
						}
	     ?>
					</tr>


					<?php
					foreach($arrTreeTypes as $k=>$v){
						echo '<span id="typeDiv_'.$k.'"><tr><td valign="midle">'.$v['vc_name'].'</td>';
						foreach($catList as $key=>$category){
							?>
					<td>
					<input class="required number"
						name="catvalue[<?php echo $k;?>][<?php echo $category->id;?>]"
						id="catvalue[<?php echo $k;?>][<?php echo  $category->id;?>]"
						value="0" style="width: 50px;" /></td>
						<?}
						echo '</tr></span>';
					}
                      ?>
                      <tr>
                      <td>Volume</td>
                      <?php 
					foreach($catList as $key=>$category)
						{
							?>
					<td><input class="required number"
						name="catVolume[<?php echo $category->id;?>]"
						id="catVolume[<?php echo  $category->id;?>]"
						value="0" style="width: 50px;" /></td>
						<?}
						?>

						</table>
						</td>
						</tr>

						</table>
						</td>
						</tr>


						<tr>
						<td colspan="2">
						<hr style="border:1px solid black">
						</td >
						</tr>

						<tr>
						<td colspan=2>
						<br></br>

						</td>
						</tr>
						<tr>
						<td colspan="2" align="right">
						<input type="submit" name="update" id="upadte" value="Update"/>
						</td>
						</tr>
						<tr>
						<td colspan=2>
						<br></br>

						</td>
						</tr>
						</table>
						</form>
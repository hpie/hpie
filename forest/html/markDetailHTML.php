<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>

<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/jqstyle.css" />

<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
</head>
<body>

<form  method="post" action="" name="screen1" id="form"/>
<table align="center" width="80%" border="0" cellspacing="" cellpadding="" height="">
 <tr>
  <td colspan='2' align="center">
   <b>Choose Forest</b>
  </td>
 </tr>
 <tr>
  <td colspan='2'>
  <br>
  </td>
 </tr>
 <tr>
  <td>
   <em>*</em><?php echo $cnameofforest;?>
  </td>
  <td>
   <?php echo makeForestlist($flist,"nameofforest_id",$nameofforest_id,"",0,"class='required'");?>
  </td>
  </tr>
 <tr>
  <td colspan="2" align="right">
   <input type="submit" name="submit" id="submit" value="Next"/>
  </td>
 </tr>
</table>

 <table align="center" width="80%" border="0" cellspacing=""
	cellpadding="" height="">
   <?php
   if(isset($markList))
   {
    if(!empty($markList)){

   	?>

	<tr>
		<td colspan='2' align="left"><b>Choose Forest</b></td>
	</tr>
	<tr>
		<td colspan='1' align="center"><b>Lot-no</b></td>
		<td colspan='1' align="center"><b>Marked From</b></td>
		<td colspan='1' align="center"><b>Marked To</b></td>

	</tr>
	<?php
	foreach ($markList as $markDetail)
	{
		?>
	<tr>
		<td colspan='1' align="center"><b><a href='index.php?page=markCompleteDetail&markId=<?php echo $markDetail->id;?>'><?php echo $markDetail->id;?></a></b></td>
		<td colspan='1' align="center"><b><?php echo $markDetail->dt_fromDate;?></b>
		</td>
		<td colspan='1' align="center"><b><?php echo $markDetail->dt_toDate;?></b>
		</td>

	</tr>
	 <?php }
		 }else{?>
       	<tr>
		<td colspan='2' align="center"><b>There is no record in this forest</b></td>
		
	</tr> 
  
	 <?php
	}
   }
   ?>
</table>
	</form>



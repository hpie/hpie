<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>
<link rel="stylesheet" type="text/css" media="all"
	href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all"
	href="css/jqstyle.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>
  $(document).ready(function(){
    $("form").validate();

  });
</script>
</head>
<body>
<form name="screen2" method="post" action="" id="form">
<table align="center" width="100%" border="0" cellspacing="0"
	cellpadding="">
	<tr>
		<td align="center" colspan="2"><b>Forest Detail</b></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td><label class="error" id="errorMark"><?php echo$errorMsg;?></label></td>
	</tr>
	<tr>
		<td><?php  $kid=$_SESSION['screen1']['nameofforest_id']?> &nbsp;<?php  echo "<b>".$cnameofforest."</b>      : ".$dfoList[$flist[$kid]->i_department_id] .'/'.$flist[$kid]->vc_name;$list;?>
		</td>
        
		<td><?php echo "<b>".$carea."</b> : ".$_SESSION['screen1']['area'] ;?>
		</td>
	 </tr>
	<tr>
		<td colspan="2"><br>
		</td>
	</tr>

	<tr>
		<td><?php echo "<b>".$cfordate."</b> : ".$_SESSION['screen1']['fromdate'];?>
		</td>
	  
	    <td>&nbsp;<?php echo "<b>".$ctodate."</b> : ".$_SESSION['screen1']['todate'];?>
		</td>
	</tr>
	<tr>
	    <td colspan='2' align="right">
		  <input type="submit" name="editsc1" id="editsc1" value="Edit Forest">
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<hr style="border: 1px solid black">
		</td>
	</tr>
      <? include('html/marked_trees.php');?>
   
	<tr>
		<td colspan="2">
		<hr style="border: 1px solid black">
		</td>
	</tr>

	<tr>
		<td align='right' colspan='2'>
		<TABLE>
		<TR>
			<TD>&nbsp;&nbsp;&nbsp;<!-- <input type="Submit" name="cancel" id="cancel"
			value="Cancel" onclick="if(confirm('Cancel will delete your selected record.Are you sure you want to cancel?')){return true;}else{return false;}"> &nbsp;  --></TD>
			
			<td align="right"><input
			type="Submit" name="delete" id="delete" value="Delete Entry" /></td> 
			<TD align="left"><input type="submit" name="marktrees" id="marktrees" value="Mark Trees"></TD>
			<td align="right"><input
			type="Submit" name="save_detail" id="save_detail" value="Next" /></td> 
		</TR>
		</TABLE>
		</td>
	</tr>
	
</table>

</form>
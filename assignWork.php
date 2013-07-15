<?php
$arrAllcontractors=$common->getAllcontractors();
$arrgetAllLots=$common->getAllLots();
if(isset($_POST['submit'])){
	
	print_r($_POST);
	extract($_POST);
	
	$arrCondition = array('i_mark_id'=>$_POST['i_lot_no'],'i_contractor_id'=>$i_contractor_id);
	print_r($arrCondition);
	$db->delete('m_contractor_work',$arrCondition);
	
	
	$arFieldValues['i_mark_id']=$_POST['i_lot_no'];
	$arFieldValues['i_contractor_id']=$i_contractor_id;
	$arFieldValues['i_felling']=$felling;
	$arFieldValues['i_conversion']=$conversion;
	$arFieldValues['i_carriage']=$carriage;
	$arFieldValues['i_transportation']=$transportation;
	$arFieldValues['i_status']=1;
	$id = $db->insert('m_contractor_work',$arFieldValues);
	
	ob_end_clean();
	header("location:index.php?page=assignWorkList");
	

}
	?>
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

</head>
<body>
	<form id="form" method="post" action="">
		<input type='hidden' value='<?php echo $markDetailId?>' id='markid'
			name='markid' />
		<table align="center" width="90%" border="0" cellspacing="0"
			cellpadding="">
			<tr>
				<td colspan="2" align="center"><b><u>Assign Work To Contractor</u> </b>
					<br></br>
				</td>
			</tr>
		</table>

		<table style="width: 400px">  
			<tr>
				<td>Choose Contractor</td>
				<td>
				<?php echo makeSelectOptions($arrAllcontractors,"i_contractor_id",$i_contractor_id,"",0,"");?>
				</td>
			</tr>
			<tr>
				<td>Choose Lot</td>
				<td>
				<?php echo makeSelectOptions($arrgetAllLots,"i_lot_no",$i_contractor_id,"",0,"");?>
				</td>
			</tr>
			<tr>
				<td>Felling</td>
				<td>
				 <input type='checkbox'  value='1' name='felling'/>
				</td>
			</tr>
			<tr>
				<td>Conversion</td>
				<td>
				<input type='checkbox'  value='1' name='conversion'/>
				</td>
			</tr>
			<tr>
				<td>Carriage</td>
				<td>
				<input type='checkbox'  value='1' name='carriage'/>
				</td>
			</tr>
			<tr>
				<td>Tranportation</td>
				<td>
				<input type='checkbox'  value='1' name='transportation'/>
				</td>
			</tr>
			<tr>
				<td colspan="2" align ='right'><input type='submit' name='submit'  value ='AssignWork'/>
				</td>
			</tr>
		</table>
	</form>
</body>

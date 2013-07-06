<?php
$arrAllcontractors=$common->getAllcontractors();
$allWork=$common->getAllContractorsWork();


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
	<a href='index.php?page=assignWork' >Assign Work</a>
	<table style='width: 500px'>
		<tr>
			<td>&nbsp;</td>
			
			<td>Contractor</td>
			<td>Lot-No</td>
			<td>Felling</td>
			<td>Conversion</td>
			<td>Carriage</td>
			<td>Transportion</td>

		</tr>

<?php 
   foreach ($allWork as $work)
   {
   	?>
   			<tr>
   			<td>&nbsp;</td>
			<td><?php echo $arrAllcontractors[$work['i_contractor_id']];?></td>
			<td><?php echo $work['vc_lotno']?></td>
			
			<td><?php echo ($work['i_felling']==1 ? '&#8730;': 'X')?></td>
			<td><?php echo ($work['i_conversion']==1 ? '&#8730;': 'X')?></td>
			<td><?php echo ($work['i_carriage']==1 ? '&#8730;': 'X')?></td>
			<td><?php echo ($work['i_transportation']==1 ? '&#8730;': 'X')?></td>

		</tr>
   	
   	<?php 
   	
   }

?>		
		
	</table>
</body>

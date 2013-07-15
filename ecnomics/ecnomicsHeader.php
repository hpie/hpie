<style type="text/css">
	@import url(css/menu_style.css); 
</style>
<ul id="menu">
	<li><a id="<?php echo pageUrl("home",$currentPage)?>"
		href="javascript:self.parent.tb_remove();" title="Goto Home Page">Home</a></li>
	<li><a id="<?php echo pageUrl("conversion",$currentPage)?>"
		href="indexThickBox.php?page=ecnomics&markId=<?php echo $markDetailId ;?>" title="Add %age of Conversion applicable for each Category ">Conversion
	%</a></li>
	
	<li>

<a id="<?php echo pageUrl("product",$currentPage)?>"
		href="indexThickBox.php?page=addProduct&markId=<?php echo $markDetailId ;?>" title="Add %age of Timber Produced in each Category from Converted Trees">Product</a>
	</li>
	
	<li>
	
	<a id="<?php echo pageUrl("charges",$currentPage)?>"
		href="indexThickBox.php?page=addfelling&markId=<?php echo $markDetailId ;?>"  title="Add Felling Charges Applicable for each Category of Trees">Felling
	Charges </a>
	</li>
	
	<li>
	
	<a id="<?php echo pageUrl("productDetail",$currentPage)?>"
		href="indexThickBox.php?page=addProductDetial&markId=<?php echo $markDetailId ;?>"  title="Add Details of Timber ( Type of Timber to be Produced from Converted Volume)">
		Product Detail</a>
	</li>

	<li>
	<a id="<?php echo pageUrl("scheduleRate",$currentPage)?>"
		href="indexThickBox.php?page=addScheduleRate&markId=<?php echo $markDetailId ;?>" title="Add Charges Applicable to Produce Timber for each Species" >Schedule Rates</a>
	</li>
	<!-- 
	<li>
	<a id="<?php echo pageUrl("overhead",$currentPage)?>"
		href="indexThickBox.php?page=addEcnomicsOverHead&markId=<?php echo $markDetailId ;?>"  title="Add Transportation Charges Applicable">Transportation</a>
	</li>
	-->
	
	<li>
	<a id="<?php echo pageUrl("overheadEco",$currentPage)?>"
		href="indexThickBox.php?page=transportationEntryEcnomics&markId=<?php echo $markDetailId ;?>"  title="Add Transportation Charges Applicable">Carriage </a>
	</li>
	
	<li>
	<a id="<?php echo pageUrl("overheadEcoRSD",$currentPage)?>"
		href="indexThickBox.php?page=transportationEntryEcnomicsRSD&markId=<?php echo $markDetailId ;?>"  title="Add Transportation Charges Applicable">Transportation </a>
	</li>
	
	
	<a id="<?php echo pageUrl("ecnomicexpensis",$currentPage)?>"
		href="indexThickBox.php?page=addEcnomicsExpenses&markId=<?php echo $markDetailId ;?>"  title="Add Other Overhead Charges Applicable">Other Expences</a>
	</li>
	
	<li>
	
	<a id="<?php echo pageUrl("sellingPrice",$currentPage)?>"
		href="indexThickBox.php?page=addSellingPrice&markId=<?php echo $markDetailId ;?>"  title="Add Proposed Sale Price for  each Species">Selling Price</a>
	</li>
	</ul>

<?php 
$markDetailId=$_REQUEST['markId'];
$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
echo "Working on Lot-No ".$markIdDetail[0]['vc_lotno'];
?>
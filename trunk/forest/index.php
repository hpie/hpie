<?php
ob_start(); session_start();

include('html/header.php');
include 'include_files.php';

?>

<div id='contractorDetail'
	style="z-index: 130; position: absolute; background-color: gray; top: 200px; left: 100px">
</div>

<?php

if($_GET['changeDiv']=="yes")
{
	session_destroy();	
	header("location:".BASE_URL."index.php");
}
	
	
if($_POST)
{
	if($_POST['butDivSubmit']!="")
	{
		if($_POST['division']!="")
		{
			$_SESSION['centerKey']=$_POST['division'];
		}else
		{
			header("location:".BASE_URL."index.php");
		}
			
	}else{
		header("location:".BASE_URL."index.php");
	}
}

if(!$_SESSION['centerKey'])
{
	?>
<form name="divSelectForm" method="post">
<center>
<table style="width: 400px;">
	<tr>
		<td>
		<h5>Choose a Division to Login</h5>
		</td>
		<td><?php
		echo(makeSelectOptions($divionLoginList, "division", "0", "", "", ""));
		?></td>
		<tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" id="Subdiv" name="butDivSubmit"
					value="Choose Division"</td>
				<tr>

</table>
</center>
</form>

<?php
}else{


	$currentPage="home";




	if(isset($_REQUEST['search']))
	{
		$_SESSION['search']=$_REQUEST['search'];
	}

	?>

<!-- Some HTML here -->


	<?php
	if(! isset($_GET['page']))
	{
		if(isset($_SESSION['userId']))
		{
			//include('profile_header.php');
			//include('profile.php');

		}
	}
	if(isset($_GET['page'])){
		if($_GET['page']=='register'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('register.php');
		}

		if($_GET['page']=='profile'){
			//include('html/left_nevi.php');
			$currentPage='myprofile';
			echo '<div id="content">';
			include('profile_header.php');
			include('profile.php');
		}
		if($_GET['page']=='reportmain'){
			//include('html/left_nevi.php');
			$currentPage='ecnomicreports';
			echo '<div id="content">';
			include('profile_header.php');
			include('reportMain.php');
		}

		if($_GET['page']=='markdetail'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('profile_header.php');
			include('listMarkDetail.php');
		}


		if($_GET['page']=='openingHome'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('opening/openingHome.php');
		}

		if($_GET['page']=='addMarkingOpening'){
			//include('html/left_nevi.php');
			$currentPage='markingOpening';
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/markOpeningComplete.php');
		}

		if($_GET['page']=='addMarkingOpeningDetil'){
			$currentPage='markingOpening';
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/markingOpening.php');
		}

		if($_GET['page']=='deleteTreeDetailOpening'){

			include('opening/deleteTreeDetailOpening.php');
		}



		if($_GET['page']=='makeProgressEntryOpening'){

			include('opening/openingHome.php');
			include('opening/progressOpeningEntry.php');
		}

		if($_GET['page']=='fellingHomeOpening'){
			$currentPage='fellingOpening';
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/openingfellingHome.php');
		}


		if($_GET['page']=='conversionHomeOpening'){
			$currentPage='conversionHomeOpening';
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/conversionHomeOpening.php');
		}

		if($_GET['page']=='progressConversionOpening'){
			$currentPage='conversionHomeOpening';
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/treeConversionOpening.php');
		}

		if($_GET['page']=='transportationHomeOpening'){
			$currentPage='transportationHomeOpening';
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/transPortationHomeOpening.php');
		}

		if($_GET['page']=='transportationEntryOpening'){
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/transPortationConversionOpening.php');
		}

		if($_GET['page']=='transportationEntryNewOpening'){
			echo '<div id="content">';
			include('opening/openingHome.php');
			include('opening/transPortationConversionNewOpening.php');
		}

		if($_GET['page']=='deleteTransportationEntryOpening'){
			echo '<div id="content">';
			include('opening/deletTransportationEntryOpening.php');
		}

		if($_GET['page']=='markCompleteDetailStep1'){

			$currentPage='marktrees';
			echo '<div id="content">';
			include('profile_header.php');
			include('markDetailComplete1.php');
		}


		if($_GET['page']=='markCompleteDetail'){

			$currentPage='marktrees';
			echo '<div id="content">';
			include('profile_header.php');
			include('markDetailComplete.php');
		}


		if($_GET['page']=='assignWorkList'){

			$currentPage='assignwork';
			echo '<div id="content">';
			include('profile_header.php');
			include('assignWorkList.php');
		}

		if($_GET['page']=='assignWork'){

			$currentPage='assignwork';
			echo '<div id="content">';
			include('profile_header.php');
			include('assignWork.php');
		}






		if($_GET['page']=='addConversion'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('profile_header.php');
			include('fillingSummary.php');
		}
		if($_GET['page']=='addtreeConversion'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('profile_header.php');
			include('treeConversion.php');
		}
		if($_GET['page']=='addFillingDetail'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('profile_header.php');
			include('treeFilled.php');
		}
		if($_GET['page']=='editProfile'){
			//include('html/left_nevi.php');
			$currentPage='editprofile';
			echo '<div id="content">';
			include('profile_header.php');
			include('edit_profile.php');
		}
		if($_GET['page']=='markTrees'){
			//include('html/left_nevi.php');
			$currentPage='marktrees';
			echo '<div id="content">';
			include('profile_header.php');
			include('screen1.php');
		}
		if($_GET['page']=='sc2'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('profile_header.php');
			include('screen2.php');
		}
		if($_GET['page']=='sc3'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('profile_header.php');
			include('screen3.php');
		}
		if($_GET['page']=='login'){
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('login.php');
		}
		if($_GET['page']=='editTreeDetail'){
			//include('html/left_nevi.php');
			$currentPage='marktrees';
			echo '<div id="content">';
			include('profile_header.php');
			include('editAdd.php');
		}
		if($_GET['page']=='deleteTreeDetail'){
			include('deleteTreeDetail.php');
		}

		if($_GET['page']=='addOverhead'){
			echo '<div id="content">';
			include('overhead_entities.php');
		}
		if($_GET['page']=='markSummaryReport'){
			$currentPage='ecnomicreports';
			echo '<div id="content">';
			include('profile_header.php');
			include('reports/markSummary.php');
		}

		if($_GET['page']=='ecomonicsSummaryReport'){
			$currentPage='ecnomicreports';
			echo '<div id="content">';
			include('profile_header.php');
			include('reports/ecoSummary.php');
		}
		if($_GET['page']=='fixedEntry'){
			include('fixedEntry.php');
		}
		if($_GET['page']=='ecnomics'){
			$currentPage='conversion';
			echo '<div id="content">';
			include('ecnomics/ecnomicsHome.php');
		}

		if($_GET['page']=='addProduct'){
			$currentPage='product';
			echo '<div id="content">';
			include('ecnomics/addProductDetails.php');
		}

		if($_GET['page']=='addProductDetial'){
			$currentPage='product';
			echo '<div id="content">';
			include('ecnomics/ecnomicsCategoryDetail.php');
		}

		if($_GET['page']=='addfelling'){
			$currentPage='charges';
			echo '<div id="content">';
			include('ecnomics/addFellingCharges.php');
		}
		if($_GET['page']=='addEcnomicsOverHead'){
			$currentPage='overhead';
			echo '<div id="content">';
			include('ecnomics/ecnomicsOverHead.php');
		}
		if($_GET['page']=='ecnomicreports'){
			echo '<div id="content">';
			include('ecnomics/ecnomicsReport.php');
		}
		if($_GET['page']=='ecnomicreportsEls'){
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=your_file_name.xls");

			include('ecnomics/ecnomicsReport.php');
		}

		if($_GET['page']=='ecnomicreportsdetail'){
			$currentPage='ecnomicreports';
			echo '<div id="content">';
			include('profile_header.php');
			include('ecnomics/ecnomicsReportDetail.php');
		}

		if($_GET['page']=='addEcnomicsExpenses'){
			$currentPage='ecnomicreports';
			echo '<div id="content">';
			include('profile_header.php');
			include('ecnomics/ecnomicsOtherCharges.php');
		}
		if($_GET['page']=='actualEcmonicsReport'){
			$currentPage='ecnomicreports';
			echo '<div id="content">';
			include('profile_header.php');
			include('reports/actualEcmonisReport.php');
		}


		if($_GET['page']=='fellingHome'){
			$currentPage='felling';
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/fellingHome.php');
		}

		if($_GET['page']=='makeProgressEntry'){
			//	$currentPage='felling';
			echo '<div id="content">';

			include('progress/progressHome.php');
		}


		if($_GET['page']=='makeProgressEntryVolume'){
			//	$currentPage='felling';
			echo '<div id="content">';

			include('progress/progressHomeVolume.php');
		}


		if($_GET['page']=='conversionHomeStep1'){
			$currentPage='felling';
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/conversionHomeVolumeDetail.php');
		}

		if($_GET['page']=='conversionHome'){
			$currentPage='felling';
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/conversionHome.php');
		}
		if($_GET['page']=='progressConversion'){
			include('progress/treeConversion.php');
		}
		if($_GET['page']=='progressConversionVolumeDetail'){
			include('progress/treeConversionVolumeDetail.php');
		}


		if($_GET['page']=='transportationEntryMaster'){
			echo '<div id="content">';
			include('progress/addTransPortationMaster.php');
		}

		if($_GET['page']=='transportationEntry'){
			echo '<div id="content">';
			include('progress/transPortationConversion.php');
		}

		if($_GET['page']=='deleteTransportationEntry'){
			echo '<div id="content">';
			include('progress/deletTransportationEntry.php');
		}


		if($_GET['page']=='deleteTransportationEntryDetail'){
			echo '<div id="content">';
			include('progress/deletTransportationEntryDetail.php');
		}
		if($_GET['page']=='transportationReportDetail'){
			echo '<div id="content">';
			include('progress/transPortationReportDetail.php');
		}


		if($_GET['page']=='transportationEntryNew'){
			echo '<div id="content">';
			include('progress/transPortationConversionNew.php');
		}

		if($_GET['page']=='transportationHome'){
			$currentPage='felling';
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/transPortationHome.php');
		}


		if($_GET['page']=='progressOverHeadEntry'){

			echo '<div id="content">';
			include('progress/progressOverHeadDetails.php');
		}

		if($_GET['page']=='overHeadHomeHtml'){
			$currentPage='felling';
			echo '<div id="content">';
			include('progress/fellingHeader.php');

			include('progress/overHeadHome.php');
		}
		if($_GET['page']=='progressReportDetail'){
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/progressReport.php');
		}



		if($_GET['page']=='detailProgressYearSelect'){
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/detailedProgressReportYearSelect.php');
		}




		if($_GET['page']=='detailProgressMonthSelect'){
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/detailedProgressReportMonthSelect.php');
		}
		if($_GET['page']=='detailProgressReport'){
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/detailedProgressReport.php');
		}

		if($_GET['page']=='detailProgressReportMonthly'){
			//header("Content-type: application/vnd.ms-excel");
			//header("Content-Disposition: attachment; filename=your_file_name.xls");
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/detailedProgressReportMonthly.php');
		}


		if($_GET['page']=='detailProgressReportMonthlyxls'){
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=your_file_name.xls");
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/detailedProgressReportMonthly.php');
		}


		if($_GET['page']=='progressFellingDetailReport'){
			include('progress/progressFellingDetailReport.php');
		}
		if($_GET['page']=='progressConversionDetailReport'){
			include('profile_header.php');
			include('progress/progressConversionDetailReport.php');
		}
		if($_GET['page']=='progressConversionTimberReport'){
			include('profile_header.php');
			include('progress/progressConversionTimberWise.php');
		}
		if($_GET['page']=='makeInventoryEntry'){

			echo '<div id="content">';
			include('inventory/inventoryEntry.php');
		}
		if($_GET['page']=='inventoryHome'){
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('inventory/inventoryHome.php');
		}

		if($_GET['page']=='inventoryTimberWiseReport'){
			include('profile_header.php');

			include('inventory/inventoryTimberWise.php');
		}
		if($_GET['page']=='inventoryLocationReport'){
			echo '<div id="content">';
			include('profile_header.php');

			include('inventory/inventoryLocation.php');
		}
		if($_GET['page']=='inventoryTimberLocation'){
			echo '<div id="content">';
			include('profile_header.php');

			include('inventory/inventoryExitType.php');
		}


		if($_GET['page']=='permormaReport'){
			$currentPage='permormaReport';
			echo '<div id="content">';
			include('profile_header.php');
			include('performaReports/detailedProgressReportYearSelect.php');
		}
		if($_GET['page']=='performa1'){
			echo '<div id="content">';
			include('profile_header.php');
			include('performaReports/performa1.php');
		}
		if($_GET['page']=='performa2'){
			echo '<div id="content">';
			include('profile_header.php');
			include('performaReports/performa2.php');
		}
		if($_GET['page']=='performa3'){
			echo '<div id="content">';
			include('profile_header.php');
			include('performaReports/performa3.php');
		}
		if($_GET['page']=='performa4'){
			echo '<div id="content">';
			include('profile_header.php');
			include('performaReports/performa4.php');
		}
		if($_GET['page']=='performa5'){
			echo '<div id="content">';
			include('profile_header.php');
			include('performaReports/performa5.php');
		}

		if($_GET['page']=='transportationHomefromRSD'){
			$currentPage='felling';
			$fromRSD=1;
			echo '<div id="content">';
			include('progress/fellingHeader.php');
			include('progress/transPortationHome.php');
		}


		if($_GET['page']=='transportationEntryfromRSD'){
			$fromRSD=1;
			echo '<div id="content">';
			include('progress/transPortationConversion.php');
		}

		if($_GET['page']=='transportationEntryNewfromRSD'){
			$fromRSD=1;
			echo '<div id="content">';
			include('progress/transPortationConversionNew.php');
		}

		if($_GET['page']=='transportationEntryEcnomics'){
			echo '<div id="content">';
			include('ecnomics/transPortationConversionEconomics.php');
		}


		if($_GET['page']=='transportationEntryEco'){
			echo '<div id="content">';
			include('ecnomics/transPortationConversionNewEconomics.php');
		}
		
		if($_GET['page']=='logout'){
			session_destroy();
			header("location:".BASE_URL."index.php");
		}
	}
	else{
		if(!isset($_SESSION['userId']))
		{
			//include('html/left_nevi.php');
			echo '<div id="content">';
			include('login.php');
		}else{
			//include('html/left_nevi.php');
			$currentPage="home";
			echo '<div id="content">';
			include('profile_header.php');
			include('profile.php');
		}
	}
	?>
</div>
<!-- end of #content -->


	<?php
}// end else

//include('html/right_nevi.php');
include('html/footer.php');
?>
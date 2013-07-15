<?
ob_start();
session_start();

  if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
include '../include.php';
include("../config.php");
include("../constants.php");
include("check_session.php");
include("html/header.php");
$arrAllForests     = $common->getAllForests();
$arrVolumeTables   = $common->getAllVolumeTables();
$arrAllCategories  = $common->getAllCategories('A');
$arrAllTrees       = $common->getAllTrees();
$arrRecords     =		array();
$table			=	    'c_volume_detail';
$whereClause	=		"";
$start			=		0;
$recNo			=		0;
$recsPerPage	=		REC_PER_PAGE;
$showPages		=		SHOW_PAGES;
$orderBy		=		'id';
$selectColumns	=		'*';
if(isSet($_REQUEST['recNo']))
{
	$recNo	=	$_REQUEST['recNo'];
}

$paging = new Paging();
$selectColumns          ="DISTINCT i_tree_type_id, i_table_id";
$paging->primaryColumn    ="DISTINCT i_tree_type_id, i_table_id";
$paging->whereClause	= $whereClause;
$paging->recsPerPage	= $recsPerPage;
$paging->showPages		= $showPages;
$paging->orderBy		= $orderBy;
$paging->table			= $table;
$paging->recordNo	    = $recNo;	// starting record No.
$paging->startRow	    = $recNo;
$paging->selectColumns	= $selectColumns;
$paging->path			= BASE_URL."cpanel/categories_volume.php";
$paging->totalRecords   = $totalRecords;
if($paging->getTotalRecords()!=0){
$result = $paging->getRecords();
while($row = mysql_fetch_array($result))
	{
		$arrRecords[] = $row;
	}
	
     
}
if($totalRecords > 0){
	//$paging->recordNo	=	$recNo;	// starting record No.
	//$paging->startRow	=	$recNo;
	$paging->setPageNo();
	//$result = $paging->getRecords();
	
}
/*echo '<pre>';
print_R($arrRecords);
echo '</pre>';*/
include("html/categories_volume.php");
include("html/footer.php");
?>
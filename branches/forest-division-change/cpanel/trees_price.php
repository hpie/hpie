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
$arrAllTrees       = $common->getAllTrees();
$selectColumns          ="DISTINCT i_forest_id";
$paging->primaryColumn  ="DISTINCT i_forest_id";
$arrRecords     =		array();
$table			=	    'm_price';
$whereClause	=		"";
$start			=		0;
$recNo			=		0;
$recsPerPage	=		REC_PER_PAGE;
$showPages		=		SHOW_PAGES;
$orderBy		=		'id';
if(isSet($_REQUEST['recNo']))
{
	$recNo	=	$_REQUEST['recNo'];
}

$paging = new Paging();
$paging->whereClause	= $whereClause;
$paging->recsPerPage	= $recsPerPage;
$paging->showPages		= $showPages;
$paging->orderBy		= $orderBy;
$paging->table			= $table;
$paging->recordNo	    = $recNo;	// starting record No.
$paging->startRow	    = $recNo;
$paging->selectColumns	= $selectColumns;
$paging->path			= BASE_URL."cpanel/trees_price.php";
$totalRecords			= $paging->getTotalRecords();
if($totalRecords > 0){
	$paging->recordNo	=	$recNo;	// starting record No.
	$paging->startRow	=	$recNo;
	$paging->setPageNo();
	$paging->query = "SELECT DISTINCT t1.i_forest_id as i_forest_id ,t1.id as eid,t1.i_tree_id,t1.price,t1.i_status,t2.id,t2.vc_name as f_name FROM m_price as t1 join m_forest as t2 where t1.i_forest_id=t2.id group by t1.i_forest_id ORDER BY $paging->orderBy limit $paging->startRow,$paging->recsPerPage";
	
	$result = $paging->getJoinRecords();
	while($row = mysql_fetch_array($result))
	{
		$arrRecords[] = $row;
	}
}

include("html/trees_price.php");
include("html/footer.php");
?>
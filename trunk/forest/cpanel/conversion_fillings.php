<?
ob_start();
session_start();

  if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
include '../include.php';
include("../config.php");
include("../constants.php");
include("check_session.php");
include("html/header.php");

$arrAllValueType     = array('0'=>"Rs",'1'=>"%age");
$arrAllForests       = $common->getAllForests();
$arrAllCategories    = $common->getAllCategories('A');
$arrAllTimbers       = $common->getTimberNList('A');
$arrRecords     =		array();
$table			= 'c_conversion_felling';
$whereClause	=		"";
$start			=		0;
$recNo			=		0;
$recsPerPage	=		REC_PER_PAGE;
$showPages		=		SHOW_PAGES;
$selectColumns	=		'*';
if(isSet($_REQUEST['recNo']))
{
	$recNo	=	$_REQUEST['recNo'];
}
$forderlink     =       "ASC";
$orderBy		=		'f_name';
if($_GET['ob']=='forest'){

if(isset($_GET['o'])){
  if( $_GET['o']=='ASC'){
   $forderlink='DESC';
   }else{
   $forderlink='ASC';
   }
}
$orderBy		='f_name '.$_GET['o'];
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
$paging->path			= BASE_URL."cpanel/conversion_fillings.php";
$totalRecords			= $paging->getTotalRecords();
if($totalRecords > 0){
	$paging->recordNo	=	$recNo;	// starting record No.
	$paging->startRow	=	$recNo;
	$paging->setPageNo();
	$paging->query = "SELECT distinct '1' as eid,t1.i_forest_id,t1.i_value_type,t2.id,t2.vc_name as f_name FROM c_conversion_felling as t1 join m_forest as t2 where t1.i_forest_id=t2.id ORDER BY $paging->orderBy limit $paging->startRow,$paging->recsPerPage";
	$result = $paging->getJoinRecords();
	while($row = mysql_fetch_array($result))
	{
		$arrRecords[] = $row;
	}
}

include("html/conversion_fillings.php");
include("html/footer.php");
?>
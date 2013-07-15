<?	
	ob_start();
	session_start();
	
    if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
	include '../include_files.php';
  	include("check_session.php");
	include("html/header.php");

    $arrAllForests     = $common->getAllForests();
    $arrAllForests[-1]     = 'Common To All';
    
	$arrRecords     =		array();
	$table			=	    'm_forest_points';
	$whereClause	=		"";
	$start			=		0; 
	$recNo			=		0;
	$recsPerPage	=		REC_PER_PAGE;
	$showPages		=		SHOW_PAGES;
	$orderBy		=		'i_forest_id';
	$selectColumns	=		'*';
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
	$paging->path			= BASE_URL."cpanel/forest_points.php";
	$totalRecords			= $paging->getTotalRecords();
	if($totalRecords > 0){
			$paging->recordNo	=	$recNo;	// starting record No.
			$paging->startRow	=	$recNo;
			$paging->setPageNo();
			$result = $paging->getRecords();
			while($row = mysql_fetch_array($result))
			{
				$arrRecords[] = $row;
			}	
		}
		
	include("html/forest_points.php");
	include("html/footer.php");
 ?>
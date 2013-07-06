<?	
	ob_start();
	session_start();
	
    if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
	include '../include.php';
  	include("../config.php");
	include("../constants.php");
	include("check_session.php");
	include("html/header.php");


	$arrRecords     =		array();
	$table			=		'm_category';
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
	$paging->whereClause	= $whereClause;
	$paging->recsPerPage	= $recsPerPage;
	$paging->showPages		= $showPages;
	$paging->orderBy		= $orderBy;
	$paging->table			= $table; 
	$paging->recordNo	    = $recNo;	// starting record No.
	$paging->startRow	    = $recNo;
	$paging->selectColumns	= $selectColumns;
	$paging->path			= BASE_URL."cpanel/categories.php";
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
		
	include("html/categories.php");
	include("html/footer.php");
 ?>
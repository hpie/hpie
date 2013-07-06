<?	
	ob_start();
	session_start();

	include '../include.php';
	include("../config.php");
  	include("../constants.php");
	include("check_session.php");
	include("html/header.php");

		  
	$arrPages		=		array();
	$table			=		TBL_PAGES;
	$whereClause	=		"";
	$start			=		0; 
	$recNo			=		0;
	$recsPerPage	=		REC_PER_PAGE;
	$showPages		=		SHOW_PAGES;
	$orderBy		=		'id';
	$selectColumns	=		'*';

	$page		=	0;
	if(isSet($_REQUEST['recNo']))
		{
			$recNo	=	$_REQUEST['recNo'];
		}
	
	$paging = new Paging();
	$paging->whereClause		= $whereClause;
	$paging->recsPerPage		= $recsPerPage;
	$paging->showPages		= $showPages;
	$paging->orderBy			= $orderBy;
	$paging->table			= $table; 
	$paging->selectColumns	= $selectColumns;
	$paging->path			= BASE_URL."cpanel/pages.php";
	$totalRecords = $paging->getTotalRecords();
	if($totalRecords > 0)
		{
			$paging->recordNo	=	$recNo;
			$paging->startRow	=	$recNo;
			$paging->setPageNo();
			$result = $paging->getRecords();
			while($row = mysql_fetch_array($result))
			{
				$arrPages[] = $row;
			}	
		}
	include("html/pages.php");
	include("html/footer.php");
 ?>
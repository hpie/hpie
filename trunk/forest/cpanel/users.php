<?	
	ob_start();
	session_start();
	include ('../include.php');
	
	include("../config.php");
	include('../constants.php');
	include("check_session.php");
	include("html/header.php");


	  if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
	$arrUsers		=		array();
	$table			=		TBL_USERS;
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
	$paging->startRow   	= $recNo;
	$paging->selectColumns	= $selectColumns;
	$paging->path			= BASE_URL."cpanel/users.php";
	$totalRecords			= $paging->getTotalRecords();
	if($totalRecords > 0){
			$paging->recordNo	=	$recNo;	// starting record No.
			$paging->startRow	=	$recNo;
			$paging->setPageNo();
			$result = $paging->getRecords();
			while($row = mysql_fetch_array($result))
			{
				$arrUsers[] = $row;
			}	
		}
	
	include("html/users.php");
	include("html/footer.php");
 ?>
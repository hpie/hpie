<?	
	ob_start();
	session_start();
	
	include '../include_files.php';
  
	include("check_session.php");
	include("html/header.php");

      if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
	$arrRecords     =		array();
	$table			=		'm_timber';
	$whereClause	=		"";
	$start			=		0; 
	$recNo			=		0;
	$recsPerPage	=		REC_PER_PAGE;
	$showPages		=		SHOW_PAGES;
	
	$selectColumns	=		'*';
	$torderlink     =       "ASC";
	$orderBy		=		'vc_name';
     if($_GET['ob']=='timber'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $torderlink='DESC';
		   }else{
		   $torderlink='ASC';
		   }
	   }
	   $orderBy		='vc_name '.$_GET['o'];
	  }	
	if(isSet($_REQUEST['recNo']))
		{
			$recNo	=	$_REQUEST['recNo'];
		}
	
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
	$paging->path			= BASE_URL."cpanel/timbers.php";
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
		
	include("html/timbers.php");
	include("html/footer.php");
 ?>
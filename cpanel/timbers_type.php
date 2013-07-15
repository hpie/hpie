<?	
	ob_start();
	session_start();
	
	include '../include.php';
  
	include("../config.php");
	include("../constants.php");
	include("check_session.php");
	include("html/header.php");
    if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
    $table			= 'm_timber_type';
	$arrTimber      = $common->getTimberNList();
   	$arrRecords     =		array();
	$table			=		'm_timber_type';
	$whereClause	=		"";
	$start			=		0; 
	$recNo			=		0;
	$recsPerPage	=		REC_PER_PAGE;
	$showPages		=		SHOW_PAGES;
	$selectColumns	=		'*';
	$torderlink     =       "ASC";
	$orderBy		=		't_name';
     if($_GET['ob']=='timber'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $torderlink='DESC';
		   }else{
		   $torderlink='ASC';
		   }
	   }
	   $orderBy		='t_name '.$_GET['o'];
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
	$paging->path			= BASE_URL."cpanel/timbers_type.php";
	$totalRecords			= $paging->getTotalRecords();
	if($totalRecords > 0){
			$paging->recordNo	=	$recNo;	// starting record No.
			$paging->startRow	=	$recNo;
			$paging->setPageNo();
			$paging->query = "SELECT t1.id as eid,t1.vc_name,t1.i_status,t1.i_timber_id,t2.id,t2.vc_name as t_name FROM m_timber_type as t1 join m_timber as t2 where t1.i_timber_id=t2.id ORDER BY $paging->orderBy limit $paging->startRow,$paging->recsPerPage";
			$result = $paging->getJoinRecords();
			while($row = mysql_fetch_array($result))
			{
				$arrRecords[] = $row;
			}	
		}
		
	include("html/timbers_type.php");
	include("html/footer.php");
 ?>
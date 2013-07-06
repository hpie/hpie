<?	
	ob_start();
	session_start();
	
	if(isset($_GET['recNo'])){ $page=$_GET['recNo'];}
	include '../include.php';
	include("../config.php");
  	include("../constants.php");
	include("check_session.php");
	include("html/header.php");

    $arrAllDepartments=$common->getAllDepartments();
	$arrRecords     =		array();
	$table			=		'm_treetype';
	$whereClause	=		"";
	$start			=		0; 
	$recNo			=		0;
	$recsPerPage	=		REC_PER_PAGE;
	$showPages		=		SHOW_PAGES;
	$selectColumns	=		'*';
	$dorderlink     =       "ASC";
	$ttorderlink     =       "ASC";
	$orderBy		=		'd_name';
     if($_GET['ob']=='treetype'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $ttorderlink='DESC';
		   }else{
		   $ttorderlink='ASC';
		   }
	   }
	   $orderBy		='vc_name '.$_GET['o'];
	  }	
     if($_GET['ob']=='department'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $dorderlink='DESC';
		   }else{
		   $dorderlink='ASC';
		   }
	   }
	   $orderBy		='d_name '.$_GET['o'];
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
	$paging->path			= BASE_URL."cpanel/tree_types.php";
	$totalRecords			= $paging->getTotalRecords();
	if($totalRecords > 0){
			$paging->recordNo	=	$recNo;	// starting record No.
			$paging->startRow	=	$recNo;
			$paging->setPageNo();
			$paging->query = "SELECT t1.id as eid,t1.vc_name,t1.i_status,t1.i_department_id,t2.id,t2.vc_name as d_name FROM m_treetype as t1 join m_forest_department as t2 where t1.i_department_id=t2.id ORDER BY $paging->orderBy limit $paging->startRow,$paging->recsPerPage";
			$result = $paging->getJoinRecords();
			while($row = mysql_fetch_array($result))
			{
				$arrRecords[] = $row;
			}	
		}
		
	include("html/tree_types.php");
	include("html/footer.php");
 ?>
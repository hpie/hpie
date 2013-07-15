<?php  
  $coonversionPending=0;
  $overheadePending=0;
  $statusString='';
  
   
    $arrRecords     =		array();
	$table			=	    'c_mark_detail';
	$whereClause	=		""; //where i_user_id=".$_SESSION['userId'];
	if($_GET['daterangeerror']=="error" || isset($_SESSION['daterangeerror']))
	{
		
		$whereClause	= "WHERE dt_fromDate>='".$_GET['dt_fromDate']."' AND dt_toDate<='".$_GET['dt_toDate'].
		"' AND i_division_id='".$_GET['i_division_id']."' AND i_forest_id='".$_GET['i_forest_id']."' ";
		
		$_SESSION['dt_fromDate'] = $_GET['dt_fromDate'];
		$_SESSION['dt_toDate'] = $_GET['dt_toDate'];
		$_SESSION['i_division_id'] = $_GET['i_division_id'];
		$_SESSION['i_forest_id'] = $_GET['i_forest_id'];
		$_SESSION['daterangeerror'] = $_GET['daterangeerror'];
	}
	
	$start			=		0; 
	$recNo			=		0;
	$recsPerPage	=		REC_PER_PAGE;
	$showPages		=		SHOW_PAGES;
    $lorderlink     =       "ASC";
	$dorderlink     =       "ASC";
	$forderlink     =       "ASC";
	$tdorderlink     =       "ASC";
	$fdorderlink     =       "ASC";
	if(isset($_GET['ob'])){
      if($_GET['ob']=='lot'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $lorderlink='DESC';
		   }else{
		   $lorderlink='ASC';
		   }
	   }
	   $orderBy		='id '.$_GET['o'];
	  }
	  if($_GET['ob']=='forest'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $forderlink='DESC';
		   }else{
		   $forderlink='ASC';
		   }
	   }
	   $orderBy		='i_forest_id '.$_GET['o'];
	  }	
     if($_GET['ob']=='division'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $dorderlink='DESC';
		   }else{
		   $dorderlink='ASC';
		   }
	   }
	   $orderBy		='i_division_id '.$_GET['o'];
	  }	
     if($_GET['ob']=='fd'){
       
	   if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $fdorderlink='DESC';
		   }else{
		   $fdorderlink='ASC';
		   }
	   }
      $orderBy		='dt_fromDate '.$_GET['o'];
	  }	
    if($_GET['ob']=='td'){
     
      if(isset($_GET['o'])){
		  if( $_GET['o']=='ASC'){
           $tdorderlink='DESC';
		   }else{
		   $tdorderlink='ASC';
		   }
	   }
	     $orderBy		='dt_toDate '.$_GET['o'];
	  }	

	}else{
	$orderBy		=		'id';
	}
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
	$paging->path			= BASE_URL."index.php?page=profile&ob=".$_GET['ob']."&o=".$_GET['o'];
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
   
   
  /* echo '<pre>';
   print_r($arrRecords);
   echo '</pre>';
*/
   
   
  include('html/reportListHTML.php');  
  $alert=getUserPendingDetails($_SESSION['userId']);



?>
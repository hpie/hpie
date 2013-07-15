<?php

class paging 
{
	var $whereClause;	// Part of where clause used in only online query
	var $recsPerPage;	// Number of records per page
	var $showPages;		// How many links to be displayed for paging
	var $orderBy;		// Used in Order By Clause
	var $table;			// Table name to be used in queries
	var $selectColumns;	// Columns to be selected
	var $recordNo;		// current record number
	var $startRow;
	var $primaryColumn	= "";// if want to count distinct record then set it with distinct keyword	
	var $hasFirstLink	=	true;				
	var $totalRecords	=	0;	// Total records found
	var $pageNo;		// current page number
	var $pageFrom;		// first page to be displayed in paging list
	var $path;			// for hyerlink in nextpage and page no.
	var $htmlPageNo		=	false;

//*************** additional variable to store ID **********

	function showQuery()
	{
		if(!empty($this->orderBy))
			$orderBy = "ORDER BY $this->orderBy";
		
		$query = "SELECT $this->selectColumns FROM $this->table $this->whereClause $orderBy limit $this->startRow,$this->recsPerPage";

		return $query;
	}

	function getTotalRecords()
	{
		if(!empty($this->primaryColumn))
		{
			$query = "SELECT $this->primaryColumn FROM $this->table $this->whereClause";
			//echo $query;

			$total_result = @mysql_num_rows(mysql_query($query));
		}
		else
		{
			$query = "SELECT count(0) FROM $this->table $this->whereClause";
			//echo $query;
			$total_result = @mysql_result(mysql_query($query),0);
		}
		
		$this->totalRecords =	$total_result;
		return $this->totalRecords;
	}

	function setPageNo()
	{
		if($this->recordNo != 0)
		{
			$this->pageNo = floor(($this->recordNo/$this->recsPerPage)+1);
		}
		else
		{
			$this->pageNo = 1;
		}

		$this->pageFrom = ($this->pageNo - $this->pageNo % $this->showPages) + 1;
		$this->recordNo = ($this->pageFrom-1)*$this->recsPerPage;

		// if current page is last page in displayed paging list 
		if($this->pageNo % $this->showPages == 0)
		{
			$this->pageFrom = $this->pageFrom - $this->showPages;
			$this->recordNo = $this->recordNo - ($this->showPages * $this->recsPerPage);
		}
	}

	function activateHtmlPageNo()
	{
			if($this->recordNo>=1)
			{
				$this->recordNo--;
				$this->recordNo *= $this->recsPerPage;
			}
			else
			{
				$this->recordNo = 0;
			}
			$this->startRow = $this->recordNo;
			$this->htmlPageNo = true;
	}

	function getRecords()
	{	

		if(!empty($this->orderBy))
			$this->orderBy = "ORDER BY $this->orderBy";

		 $query = "SELECT $this->selectColumns FROM $this->table $this->whereClause $this->orderBy limit $this->startRow,$this->recsPerPage";
		$result = mysql_query($query) or die(mysql_error());
		
		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}
		
	}
	//new code 22/10/2011
   function getJoinRecords()
	{	

		if(!empty($this->query))
		  $result = mysql_query($this->query) or die(mysql_error());
		
		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}
		
	}

	function displayPaging($queryString='',$linkCaption='Page')
	{	
		$totalPages = $this->getTotalPages();

		if($totalPages > 1)
		{
			// if we don't have much records to be display complete paging list then adjust pageupto
			$pageUpto = 0;
			if(($pageUpto*$this->recsPerPage) > $this->totalRecords)
			{	
				if($this->totalRecords % $this->recsPerPage == 0)
				{
					$pageUpto = floor(($this->totalRecords/$this->recsPerPage));
				}
				else
				{
					$pageUpto = floor(($this->totalRecords/$this->recsPerPage))+1;
				}
			}
			if( $totalPages > $this->showPages)
			{
				if($this->pageNo < floor($this->showPages/2))
				{
					 $pageUpto = $this->pageFrom + $this->showPages-1;
				}
				else
				{
					 $addRight			= floor($this->showPages/2);
					 $subLeft			= $this->showPages - floor($this->showPages/2) - 1;
					 
					 $pageUpto			=  $this->pageNo + $addRight;
					 $this->pageFrom	=  $this->pageNo - $subLeft;	
					 

					 if($pageUpto > $totalPages)
					 {
						$leftOverEnd	=	$pageUpto - $totalPages;
						$this->pageFrom =	$this->pageFrom - $leftOverEnd;
						$pageUpto		=	$totalPages;
					 }
					 if($this->pageFrom < 1)
					{
						$pageUpto		=	$this->showPages;		
						$this->pageFrom	=	1;
					}
				}
			}					 
			else
			{
				$pageUpto		=	$totalPages;		
				$this->pageFrom	=	1;
			}

					
			echo "<center>";
		
			if(!$this->htmlPageNo)
			{
				echo $this->getPreviousPageLink($queryString,'',$linkCaption);
				echo $this->getNextPageLink($queryString,'',$linkCaption);
				echo "<br><br>";
				echo "<center>Pages : ";
				

				// display the numbered links in paging list
				for($z=$this->pageFrom; $z<=$pageUpto; $z++)
				{
					$this->recordNo = ($z-1) * $this->recsPerPage;
					// if displaying current page disable link
					if($this->pageNo == $z) 
					{
						echo "&nbsp;<font color=red><b>$z</b></font> ";
					}
					else
					{
						if($this->hasFirstLink===false && $z==1)
						{
							echo "&nbsp;<a href='". $this->path . "/' title='Go to page ".$z."'><font color=#666666><b>$z</b></font></a> ";
						}
						else
						{
							if(isset($_GET['page']) && $_GET['page']=='profile'){
                              echo "&nbsp;<a href='". $this->path . "&recNo=$this->recordNo".$queryString."' title='Go to page ".$z."'><font color=#666666><b>$z</b></font></a> ";		  
							}else{
							   $link="";
								if(isset($_GET['ob']) && isset($_GET['o'])){
							
							  $link="&o=".$_GET['o']."&ob=".$_GET['ob'];
								}
							echo "&nbsp;<a href='". $this->path . "?recNo=$this->recordNo".$link.$queryString."' title='Go to page ".$z."'><font color=#666666><b>$z</b></font></a> ";							
						    }
						
						}
					}
				}
				echo "</center>";
			}
			else
			{
					if(!empty($queryString))
					{
						$queryString = "?$queryString";
					}

					echo $this->getPreviousHTMLPageLink($queryString);
					echo $this->getNextHTMLPageLink($queryString);
					echo "<br><br>";
					echo "<center>Pages : ";
					
					// display the numbered links in paging list
					for($z=$this->pageFrom; $z<=$pageUpto; $z++)
					{
						$this->recordNo = ($z-1) * $this->recsPerPage;
						// if displaying current page disable link
						if($this->pageNo == $z) 
						{
							echo "&nbsp;<font color=red><b>$z</b></font> ";
						}
						else
						{
							if($this->hasFirstLink===false && $z==1)
							{									
								echo "&nbsp;<a href='". $this->path ."/' title='Go to page ".$z."'><font color=#666666 size=2><b>$z</b></font></a> ";
							}
							else
							{
								echo "&nbsp;<a href='". $this->path . "$z.htm$queryString' title='Go to page ".$z."'><font color=#666666 size=2><b>$z</b></font></a> ";
							}
						}
					}
			}
			echo "</center>";	
		}// End of if($totalPages > 1)
	}

	function getCurrentPage()
	{
		return $this->pageNo;
	}


	function getPreviousPageLink($queryString='', $styleClass='',$linkCaption='Page')
	{
		$previousPageLink	=	"";
		$previousLinkCaption	=	"Previous ".$linkCaption;
		
		if($this->pageNo > 1)
		{
			if($this->hasFirstLink===false && ($this->pageNo-1)==1)
			{
				$previousPageLink = "[ <a  href='". $this->path . "/' title='Go to page ".($this->pageNo-1)."' class='$styleClass'>$previousLinkCaption</a> ] &nbsp;";	
			}
			else
			{
				   $link="";
								if(isset($_GET['ob']) && isset($_GET['o'])){
								

							  $link="&o=".$_GET['o']."&ob=".$_GET['ob'];
								}

			  if(isset($_GET['page']) && $_GET['page']=='profile'){
              $previousPageLink = "[ <a  href='". $this->path . "&recNo=".($this->pageNo-2)*$this->recsPerPage . $queryString."' title='Go to page ".($this->pageNo -1)."' class='$styleClass'>$previousLinkCaption</a> ] &nbsp;";	  
     			}else{
							
			  $previousPageLink = "[ <a  href='". $this->path . "?recNo=".($this->pageNo-2)*$this->recsPerPage.$link. $queryString."' title='Go to page ".($this->pageNo -1)."' class='$styleClass'>$previousLinkCaption</a> ] &nbsp;";					
			   }
				
				


			}
		}
		else
		{
			$previousPageLink = "[ <font class='$styleClass'><font color=#bebebe>$previousLinkCaption</font></font> ]";
		}
		return $previousPageLink;
	}

	function getNextPageLink($queryString='', $styleClass='',$linkCaption='Page')
	{
		$nextPageLink	=	"";
		$totalPages		=	$this->getTotalPages();
		$nextLinkCaption		=	"Next ". $linkCaption;
		if($this->pageNo < $totalPages)
		{
			if(isset($_GET['page']) && $_GET['page']=='profile'){
              $nextPageLink	=	 "[ <a href='". $this->path . "&recNo=".  ($this->pageNo)*$this->recsPerPage.$queryString."' title='Go to page ".($this->pageNo + 1)."' class='$styleClass'>$nextLinkCaption</a> ]";		  
			}else{
							
			  $nextPageLink	=	 "[ <a href='". $this->path . "?recNo=".  ($this->pageNo)*$this->recsPerPage.$queryString."' title='Go to page ".($this->pageNo + 1)."' class='$styleClass'>$nextLinkCaption</a> ]";						
			 }
				
		}
		else
		{
			$nextPageLink	= "[ <font class='$styleClass'><font color='#bebebe'>$nextLinkCaption</font></font> ]";
		}
		return $nextPageLink;
	}


	function getPreviousHTMLPageLink($queryString='', $styleClass='')
	{
		if(!empty($queryString))
		{
			if(strpos($queryString, "?")===false)
			{
				$queryString = "?$queryString";
			}
		}

		$previousPageLink	=	"";
		if($this->pageNo > 1)
		{
			if($this->hasFirstLink===false && ($this->pageNo-1)==1)
			{
				$previousPageLink = "[ <a  href='". $this->path . "/' title='Go to page ".($this->pageNo-1)."' class='$styleClass'>Previous Page</a> ] &nbsp;";	
			}
			else
			{
				$previousPageLink	= "[ <a  href='". $this->path . "".($this->pageNo -1).".htm$queryString' title='Go to page ".($this->pageNo -1)."' class='account'>Previous Page</a> ] &nbsp;";	
			}
		}
		else
		{
			$previousPageLink	= "[ <font class='$styleClass'><font color='#bebebe'>Previous Page</font></font> ]";
		}
		return $previousPageLink;
	}

	function getNextHTMLPageLink($queryString='', $styleClass='')
	{
		if(!empty($queryString))
		{
			if(strpos($queryString, "?")===false)
			{
				$queryString = "?$queryString";
			}
		}

		$nextPageLink	=	"";
		$totalPages		=	$this->getTotalPages();

		if($this->pageNo < $totalPages)
		{
			$nextPageLink = "[ <a href='". $this->path . "". ($this->pageNo + 1) .".htm$queryString' title='Go to page ".($this->pageNo + 1)."' class='account'>Next Page</a> ]";	
		}
		else
		{
			$nextPageLink = "[ <font color='#bebebe'>Next Page</font> ]";
		}

		return $nextPageLink;
	}

	function getTotalPages()
	{
		// get total number of pages
		if($this->totalRecords % $this->recsPerPage == 0)
		{
			$totalPages = floor($this->totalRecords / $this->recsPerPage);
		}
		else
		{
			$totalPages = floor(($this->totalRecords / $this->recsPerPage))+1;
		}
		return $totalPages;
	}
}
?>
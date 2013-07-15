<?php

class MarkDetailDO {
	/*
	 Function that inserts city data in DB.
	 Accepts CityVO .
	 */
	function insert($mark_detail)  {
		echo $query="INSERT INTO
				c_mark_detail
				( `id`, 
				  `dt_fromDate`,
				  `dt_toDate`,
				  `f_area`, 
				  `dt_created`,
				  `dt_updated`, 
				  `i_status`,
				  `i_user_id`,
				  `i_forest_id`,
				  `i_table_id`,
				  `i_unit_id`,
				  `i_division_id`,
				  `vc_lotno`,
				  `dt_completionDate`
				  ) VALUES
				   ('".$mark_detail->id."',
				    '".$mark_detail->dt_fromDate."',
				    '".$mark_detail->dt_toDate."',
				    '".$mark_detail->f_area."',
				     CURDATE(),
				     CURDATE(), 
				    '1',
				    '".$mark_detail->i_user_id."'
				    ,'".$mark_detail->i_forest_id."'
					 ,'".$mark_detail->i_table_id."'
					  ,'".$mark_detail->i_unit_id."'
					,'".$mark_detail->i_division_id."'
					,'".$mark_detail->vc_lotno."'
					,'".$mark_detail->dt_completionDate."'
					)" ;
			
		mysql_query($query) or die("Exception During Inserting Data Into Table c_mark_detail  the Mysql");
		
		
		/**
		 * Block of code that will act as a triggreds
		 */
		
		echo $_SESSION['centerKey'];
		$queryNew ="update c_mark_detail set id=concat('".$_SESSION['centerKey']."',id1) where id1='".mysql_insert_id()."'";
		$mark_detail->id=$_SESSION['centerKey'].mysql_insert_id();
		$hRes = mysql_query($queryNew);
		/**
		 * Block Of code ends
		 */
		
		
		return $mark_detail;
		die();
	} //insert

	function insertTreeCategoryDetail($detail)  {
		$query="INSERT INTO `hishimla_forest`.`r_tree_category` (
				`id` ,
				`i_tree_id` ,
				`i_category_id` ,
				`i_mark_detail_id` ,
				`i_value`,
				`i_tree_type_id` 
				)
				VALUES (
				'".$detail->id."',
				'".$detail->i_tree_id."',
				'".$detail->i_category_id."',
				'".$detail->i_mark_detail_id."',
				'".$detail->i_value."',
				'".$detail->i_tree_type_id."')" ;
		//echo '<br>';
		mysql_query($query) or die("Exception During Inserting Data Into Table r_tree_category  the Mysql");
		$mark_detail->id=mysql_insert_id();
		
		/**
		 * Block of code that will act as a triggreds
		 */
		$queryNew ="update r_tree_category set id=concat('".$_SESSION['centerKey']."'+id1) where id1='".mysql_insert_id()."'";
		$hRes = mysql_query($queryNew);
		/**
		 * Block Of code ends
		 */
		return $mark_detail;
	} //insert

	function getMarkDetailList($id)
	{
		$query = "select * from c_mark_detail where i_forest_id='".$id."'";
		$list  = array();
		$count = 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();
			$mark_detail->id=$row['id'];
			$mark_detail->dt_fromDate=$row['dt_fromDate'];
			$mark_detail->dt_toDate=$row['dt_toDate'];
			$mark_detail->f_area=$row['f_area'];
			$mark_detail->i_user_id=$row['i_user_id'];
			$mark_detail->i_forest_id=$row['i_forest_id'];
			$list[$mark_detail->id] = $mark_detail;
		}//end while
		return $list;
	}
	function getMarkDetailUser($id)
	{
		$query = "select * from c_mark_detail where i_user_id='".$id."'";
		$list  = array();
		$count = 0;
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();
			$mark_detail->id=$row['id'];
			$mark_detail->dt_fromDate=$row['dt_fromDate'];
			$mark_detail->dt_toDate=$row['dt_toDate'];
			$mark_detail->f_area=$row['f_area'];
			$mark_detail->i_user_id=$row['i_user_id'];
			$mark_detail->i_forest_id=$row['i_forest_id'];
			$mark_detail->i_overhead_status=$row['i_overhead_status'];
			$mark_detail->i_conversion_status=$row['i_conversion_status'];
			$list[$mark_detail->id] = $mark_detail;
		}//end while
		return $list;
	}
	function getMarkDetail($id)
	{
		$query = "SELECT * FROM `r_tree_category` where i_mark_detail_id='".$id."'  order by i_tree_id,	";
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			if($previous !=0 && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}

			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_value=$row['i_value'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		$markDetailList[$previous]=$treeDetailList;
		return $markDetailList;
	}
	function getTreeMarkDetail($id,$treeId,$vc_year='')
	{
		if($vc_year=='')
		{
		$query = "SELECT * FROM `r_tree_category` where i_mark_detail_id='".$id."' and i_tree_id='".$treeId."'  order by 	i_tree_type_id	";
		}
		else 
		{
	    $query = "SELECT * FROM `r_tree_category` where i_mark_detail_id='".$id."' and i_tree_id='".$treeId."' 
                   and vc_year='".$vc_year."' 
	               order by 	i_tree_type_id	";
		}
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getTreeMarkDetail");

		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_type_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_type_id'];
			}

			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_value=$row['i_value'];
			$detail->i_tree_type_id=$row['i_tree_type_id'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_type_id'];
		}//end while
		$markDetailList[$previous]=$treeDetailList;
		return $markDetailList;
	}
	function getTreeMarkDetailOpening($id,$treeId)
	{
		$query = "SELECT * FROM `r_tree_opening_category` where i_mark_detail_id='".$id."' and i_tree_id='".$treeId."'  order by 	i_tree_type_id	";
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_type_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_type_id'];
			}
	
			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_value=$row['i_value'];
			$detail->i_tree_type_id=$row['i_tree_type_id'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_type_id'];
		}//end while
		$markDetailList[$previous]=$treeDetailList;
		return $markDetailList;
	}

	function getMarkDetailSummarry($id,$fromYear='',$opening='')
	{
		
		if($opening =='')
		{
		if($fromYear=='')
		{
		$query = "SELECT sum(i_value) as i_value,i_tree_id,i_category_id,i_mark_detail_id FROM `r_tree_category` where i_mark_detail_id='".$id."'  group by i_tree_id,i_category_id order by i_tree_id";
		}
		else
		{
		$query = "SELECT sum(i_value) as i_value,i_tree_id,i_category_id,i_mark_detail_id FROM `r_tree_category` 
				  where i_mark_detail_id='".$id."'  
				  and vc_year='".$fromYear."'
		          group by i_tree_id,i_category_id order by i_tree_id";
		}
		}
		else
		{
			
			if($fromYear=='')
			{
				$query = "SELECT sum(i_value) as i_value,i_tree_id,i_category_id,i_mark_detail_id FROM  (SELECT sum(i_value) as i_value,i_tree_id,i_category_id,i_mark_detail_id FROM `r_tree_category` where i_mark_detail_id='".$id."'  group by i_tree_id,i_category_id 
				         UNION
				          SELECT sum(i_value) as i_value,i_tree_id,i_category_id,i_mark_detail_id FROM `r_tree_opening_category` where i_mark_detail_id='".$id."'  group by i_tree_id,i_category_id 
							) as tbl group by i_tree_id,i_category_id order by i_tree_id  ";
			}
			else
			{
				$query = "SELECT sum(i_value) as i_value,i_tree_id,i_category_id,i_mark_detail_id FROM `r_tree_category`
				where i_mark_detail_id='".$id."'
				and vc_year='".$fromYear."'
				group by i_tree_id,i_category_id order by i_tree_id";
			}
			
		}
		
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}

			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_value=$row['i_value'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous !='0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}
	
	function getMarkDetailMasterDetail($id)
	{
		$query = "SELECT * FROM `marking_master_detail` where i_mark_id='".$id."'  order by from_vc_year;";
	  
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			$list[$row['id']]=$row;
		}//end while
		
		return $list;
	}
	
	
	function getMarkDetailSummarryOpening($id)
	{
		$query = "SELECT sum(i_value) as i_value,i_tree_id,i_category_id,i_mark_detail_id FROM `r_tree_opening_category` where i_mark_detail_id='".$id."'  group by i_tree_id,i_category_id order by i_tree_id";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching opening count detail");
	
		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}
	
			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_value=$row['i_value'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous != '0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}
	
	
	
	function getFeelingDetailSummarry($id)
	{
		$query = "SELECT sum(i_value) as i_value,i_tree_id,i_category_id,'".$id."' as i_mark_detail_id from (SELECT sum(i_count) as i_value,i_tree_id,i_category_id,'".$id."' as i_mark_detail_id FROM `progress_felling_detail` where 
		           i_progress_id in (select id from progress_felling_master where i_mark_id = '".$id."')  group by i_tree_id,i_category_id 
		           UNION 
		           SELECT sum(i_count) as i_value,i_tree_id,i_category_id,'".$id."' as i_mark_detail_id  FROM `opening_progress_felling_detail` where 
		           i_progress_id in (select id from opening_progress_felling_master where i_mark_id = '".$id."')  group by i_tree_id,i_category_id 
		           ) as tbl
				   group by i_tree_id,i_category_id order by i_tree_id
				   ";

		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getFeelingDetailSummarry($id)");
	
		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}
	
			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_value=$row['i_value'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous != '0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}
function getMarkDetailVolumeDetail($id)
	{
		$query = "SELECT sum(i_tree_volume) as i_value,i_tree_id,i_category_id, i_mark_id as i_mark_detail_id FROM `c_marked_volume` where i_mark_id='".$id."'  group by i_tree_id,i_category_id";
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}

			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_value=$row['i_value'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous != '0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}

	function getMarkDetailVolumeSummarry($id)
	{
		$query = "SELECT sum(i_tree_volume) as i_value,sum(i_economics_volume) as 
				  i_economics_volume, sum(i_felling_charges*	i_economics_volume) as i_felling_charges ,sum(i_conversion_charges*	i_economics_volume) as  i_conversion_charges,
				  i_tree_id,i_category_id, i_mark_id as i_mark_detail_id FROM `c_marked_volume` 
				   where i_mark_id='".$id."'  group by i_tree_id";

		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_array($result))
		{


			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_mark_detail_id=$row['i_mark_detail_id'];
			$detail->i_felling_charges=$row['i_felling_charges'];
			$detail->i_conversion_charges=$row['i_conversion_charges'];
			
			$detail->i_value=$row['i_value'];
			$detail->i_economics_volume=$row['i_economics_volume'];
			
			$treeDetailList[$detail->i_tree_id] =$detail;

		}//end while

		return $treeDetailList;
	}

	function getMarkIdDetail($id)
	{
		$query = "select * from c_mark_detail where id='".$id."'";
		$markDetail = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();
			$mark_detail->id=$row['id'];
			$mark_detail->dt_fromDate=$row['dt_fromDate'];
			$mark_detail->dt_toDate=$row['dt_toDate'];
			$mark_detail->f_area=$row['f_area'];
			$mark_detail->i_user_id=$row['i_user_id'];
			$mark_detail->i_forest_id=$row['i_forest_id'];

		}//end while

	 return $mark_detail;
	}

	function getMarkIdDetailHTML($markDetailId,$forestName){
		$markIdDetail= $this->getMarkIdDetail($markDetailId);
		echo $markDetailIdHTML='<table align="center" style ="width:400px;"  border="0" cellspacing="0px" cellpadding="0px" ><tr><td  align="left"><b>Forest Name</b></td><td align="center"><b>Lot Start Date</b></td></tr><tr><td align="left"><b>'.$forestName.'</b> 		</td>		<td align="center"><b>'.$markIdDetail->dt_fromDate.'</b> 		</td> 		<td colspan="1" align="center"><b></b> 		</td>	</tr> 	</table>';
	}

	function getMarkIdVolume($id,$treeId,$vc_year='')
	{
		if($vc_year=='')
		{
		$query = "select * from c_marked_volume where 	i_mark_id='".$id."' and i_tree_id='".$treeId."' ";
		}
		else 
		{
			$query = "select * from c_marked_volume where
						vc_year='".$vc_year."' and	i_mark_id='".$id."' and i_tree_id='".$treeId."' ";
			
		}
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();
			$mark_detail->id=$row['id'];
			$mark_detail->i_mark_id=$row['i_mark_id'];
			$mark_detail->i_category_id=$row['i_category_id'];
			$mark_detail->i_tree_volume=$row['i_tree_volume'];
			$mark_detail->i_user_id=$row['i_user_id'];
			$mark_detail->i_forest_id=$row['i_forest_id'];
			$treeDetailList[$mark_detail->i_category_id] =$mark_detail;
		}//end while

	 return $treeDetailList;
	}
	
	function getMarkIdVolumeOpening($id,$treeId)
	{
		$query = "select * from c_marked_volume where 	i_mark_id='".$id."' and i_tree_id='".$treeId."' ";
		$treeDetailList = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();
			$mark_detail->id=$row['id'];
			$mark_detail->i_mark_id=$row['i_mark_id'];
			$mark_detail->i_category_id=$row['i_category_id'];
			$mark_detail->i_tree_volume=$row['i_tree_volume'];
			$mark_detail->i_user_id=$row['i_user_id'];
			$mark_detail->i_forest_id=$row['i_forest_id'];
			$treeDetailList[$mark_detail->i_category_id] =$mark_detail;
		}//end while
	
		return $treeDetailList;
	}
	function getMarkIdVolumeSummarry($id,$fromYear='')
	{
		if($fromYear=='')
		{
			$query = "select i_tree_id,
							 sum(i_tree_volume) as i_tree_volume,
						     sum(i_tree_volume)* i_royality as totalRoyality  from c_marked_volume where 	i_mark_id='".$id."'  group by i_tree_id ";
		}
		else
		{
			
			$query = "select i_tree_id,
			                sum(i_tree_volume) as i_tree_volume,
			                sum(i_tree_volume) * i_royality as totalRoyality  from c_marked_volume
						 where 	i_mark_id='".$id."' 
			 			 and vc_year='".$fromYear."' group by i_tree_id ";
				
		}
		
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();

			$mark_detail->i_tree_volume=$row['i_tree_volume'];
			$mark_detail->i_total_royality=$row['totalRoyality'];
			
			$treeDetailList[$row['i_tree_id']] =$mark_detail;
		}//end while

	 return $treeDetailList;
	}
	function getMarkIdVolumeSummarryOpening($id,$fromYear='')
	{
		
	
	    $query = "
	             select i_tree_id ,sum(i_tree_volume) as i_tree_volume,sum(totalRoyality) as totalRoyality from
	             (
	    		  select i_tree_id,sum(i_tree_volume) as i_tree_volume,
	    		  sum(i_tree_volume) * i_royality as totalRoyality  from c_marked_volume
			  	  where 	i_mark_id='".$id."'
		  	      and vc_year < '".$fromYear."' group by i_tree_id
                  union
                  select i_tree_id,sum(i_tree_volume) as i_tree_volume ,
                  sum(i_tree_volume) * i_royality as totalRoyality  from c_marked_opening_volume
			  	  where 	i_mark_id='".$id."'
		  	      group by i_tree_id)
                  as tbl 
                  group by  i_tree_id
                   ";
	    
		$treeDetailList = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during getMarkIdVolumeSummarryOpening");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();
	
			$mark_detail->i_tree_volume=$row['i_tree_volume'];
			$mark_detail->i_total_royality=$row['totalRoyality'];
			$treeDetailList[$row['i_tree_id']] =$mark_detail;
		}//end while
	
		return $treeDetailList;
	}
	
	function getMarkIdOpeningVolumeSummarry($id)
	{
		$query = "select i_tree_id,sum(i_tree_volume) as i_tree_volume  from c_marked_opening_volume where 	i_mark_id='".$id."'  group by i_tree_id ";
	
		$treeDetailList = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();
	
			$mark_detail->i_tree_volume=$row['i_tree_volume'];
			$treeDetailList[$row['i_tree_id']] =$mark_detail;
		}//end while
	
		return $treeDetailList;
	}
	function getMarkIdCountSummarry($id,$year='')
	{
		if($year =='')
		{
		$query = "select i_tree_id,sum(i_value) as i_value  from r_tree_category where 	i_mark_detail_id='".$id."'  group by i_tree_id ";
		}
		else 
		{
			$year=$_SESSION['year'];
			//echo '<br>'.$year.'<br>'; 
			$query = "select i_tree_id,sum(i_value) as i_value  from r_tree_category
				 where 	
			        vc_year='".$year."' and i_mark_detail_id='".$id."'  group by i_tree_id ";
			
		}
		
		$treeDetailList = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching volume  count");
		while($row =  mysql_fetch_array($result))
		{
			
			$treeDetailList[$row['i_tree_id']] =$row;
		}//end while
	
		return $treeDetailList;
	}
	function getMarkIdCountSummarryOpening($id,$year='')
	{

		
		$year=$_SESSION['year'];
		//echo '<br>'.$year.'<br>';
		
		$query = "  select i_tree_id,sum(i_value) as i_value  from
					(select i_tree_id,sum(i_value) as i_value  from r_tree_category
					where vc_year < '".$year."'
					and i_mark_detail_id='".$id."'  group by i_tree_id 
					union 
					select i_tree_id,sum(i_value) as i_value  from r_tree_opening_category
					where 
					i_mark_detail_id='".$id."'  group by i_tree_id)
					as tbl   group by i_tree_id
		
						";
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching volume  count");
		while($row =  mysql_fetch_array($result))
		{

			$treeDetailList[$row['i_tree_id']] =$row;
		}//end while

		return $treeDetailList;
	}
	
	
function getMarkIdVolumeDetailTree($id)
	{
		$query = "select i_tree_id,i_category_id,sum(i_tree_volume) as i_tree_volume  from c_marked_volume where 	i_mark_id='".$id."'  group by i_tree_id,i_category_id	 ";

		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();

			$mark_detail->i_tree_volume=$row['i_tree_volume'];
			$treeDetailList[$row['i_tree_id'] ][$row['i_category_id']] =$mark_detail;
			
		}//end while

	 return $treeDetailList;
	}

	function getMarkIdVolumeDetail($id)
	{
		$query = "select i_tree_id, i_tree_volume,i_category_id  from c_marked_volume where 	i_mark_id='".$id."'  ";

		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$mark_detail = new MarkingVO();

			$mark_detail->i_tree_volume=$row['i_tree_volume'];
			$treeDetailList[$row['i_category_id']][$row['i_tree_id']] =$mark_detail;
		}//end while

	 return $treeDetailList;
	}
	
function getPriceMaster($id)
	{
		$query = "SELECT * FROM m_price  where 	i_forest_id='".$id."'";
      
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			
		
			$treeDetailList[$row['i_tree_id']] =$row['price'];
			
		}//end while

	 return $treeDetailList;
	}
	function getTreeMarkedDetail($id,$vc_year='')
	{
		if($vc_year=='')
		{
		$query = "SELECT DISTINCT i_tree_id  FROM r_tree_category where i_mark_detail_id='".$id."'  ";
		}
		else 
		{
			$query = "SELECT DISTINCT i_tree_id  FROM r_tree_category where
							vc_year='".$vc_year."' and  i_mark_detail_id='".$id."'  ";
		}
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$treeDetailList[$row['i_tree_id']] =$row['i_tree_id'];
		}//end while

	 return $treeDetailList;
	}
	
	function getTreeMarkedDetailVolume($id)
	{
		$query = "SELECT DISTINCT i_tree_id  FROM r_tree_category where i_mark_detail_id='".$id."'  ";
	
		$treeDetailList = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$treeDetailList[$row['i_tree_id']] =$row['i_tree_id'];
		}//end while
	
		return $treeDetailList;
	}
	function getTreeMarkedDetailOpeningVolume($id)
	{
		$query = "SELECT DISTINCT i_tree_id  FROM r_tree_opening_category where i_mark_detail_id='".$id."'  ";
	
		$treeDetailList = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$treeDetailList[$row['i_tree_id']] =$row['i_tree_id'];
		}//end while
	
		return $treeDetailList;
	}
	
	
	function getVolumeLevelDetail($id)
	{
		$query = "SELECT *  FROM c_volume_detail where i_table_id in( select i_table_id from c_mark_detail 		WHERE   id='".$id."') order by i_tree_type_id";
      
		$volumeList = array();
		$volumeListAlls = array();
		
		$count= '0';
	    $previous='0';
		$result= mysql_query($query) or die("Exception during fetching category volum");
		while($row =  mysql_fetch_array($result))
		{

			
		if($previous !='0' && $previous !=$row['i_tree_type_id'] )
			{
				//Tree Changed
				$volumeListAlls[$previous]=$volumeList;
				$previous=$row['i_tree_type_id'];
				$volumeList = array();
				
			}
			
			$volumneDetail['i_table_id'] =$row['i_table_id'];
			$volumneDetail['id'] =$row['id'];
			$volumneDetail['i_category_id'] =$row['i_category_id'];
			$volumneDetail['volume'] =$row['volume'];
			$volumneDetail['i_status'] =$row['i_status'];
			$volumneDetail['i_tree_type_id'] =$row['i_tree_type_id'];
			$volumeList[$row['i_category_id']]=$volumneDetail;
			$previous =$row['i_tree_type_id'];
				
		}//end while
       $volumeListAlls[$previous]=$volumeList;
	 return $volumeListAlls;
	}
	function getExistingEntry($mark_detail)
	{
		$query = "SELECT count(*) as rowsAdded FROM `c_mark_detail` WHERE
		          dt_fromDate >= '".$mark_detail->dt_fromDate."' and
		          dt_toDate <= '".$mark_detail->dt_toDate."' and
		          i_forest_id = '".$mark_detail->i_forest_id."' and
		          i_division_id='".$mark_detail->i_division_id."' and i_table_id='".$mark_detail->i_table_id."' and i_unit_id='".$mark_detail->i_unit_id."'";
		$treeDetailList = array();
		$count= 0;
		$query;
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			return $row['rowsAdded'];
		}//end while
	 return '0';
	}
	
function checkManualLotNumber($mark_detail)
	{
		$query = "SELECT count(*) as rowsAdded FROM `c_mark_detail` WHERE
		          vc_lotno = 'M_".$mark_detail->vc_lotno."'";
		
		$treeDetailList = array();
		$count= 0;
		$query;
		$result= mysql_query($query) or die("Exception during checking lot number  exists  or not");
		while($row =  mysql_fetch_array($result))
		{
			return $row['rowsAdded'];
		}//end while
	 return '0';
	}


	function getprevTimberDetail($treeId,$markId,$c_Id)
	{
		$query = "select i_timber_id,i_timber_type_id,i_tree_id,i_mark_id,sum(i_current_count) as i_current_count,
				  sum(i_current_volume) as i_current_volume  
				  from c_filling_detail where i_tree_id='".$treeId."'  and i_mark_id ='".$markId."'  group by i_timber_type_id  ";

		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();

			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$treeDetailList[$row['i_timber_id']][$row['i_timber_type_id']]=$filling_detail;
		}//end while

	 return $treeDetailList;
	}

	function getprevTimberSum($markId)
	{
		$query = "select i_timber_id,i_tree_id,i_mark_id,sum(i_current_count) as i_current_count,
				  sum(i_current_volume) as i_current_volume  
				  from c_filling_detail where  i_mark_id ='".$markId."'  group by i_tree_id ";

		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();

			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$treeDetailList[$row['i_tree_id']]=$filling_detail;
		}//end while

	 return $treeDetailList;
	}
	function getExistingTimber($mark_detail)
	{
		$query = "SELECT count(*) as rowsAdded FROM `c_filling_detail` WHERE
		          month = '".$mark_detail->month."' and
		          year = '".$mark_detail->year."' and
				  i_contractor_id ='".$mark_detail->i_contractor_id."' and
		          i_tree_id='".$mark_detail->treeId."' 
		          and i_mark_id ='".$mark_detail->markId."'";


		$treeDetailList = array();
		$count= 0;
		$result= mysql_query($query) or die("Exception getExistingTimber");
		while($row =  mysql_fetch_array($result))
		{
			return $row['rowsAdded'];
		}//end while
	 return '0';
	}


	function getExistingDateWiseDetail($treeId,$markId)
	{
		$query = "SELECT
					i_tree_id, 
					i_mark_id,
					sum(i_current_count) as i_current_count,
				    sum(i_current_volume) as i_current_volume,
				    i_contractor_id,
					month,
				    year FROM `c_filling_detail` WHERE
		            i_tree_id='".$treeId."' 
		            and i_mark_id ='".$markId."' group  by month ,year,i_contractor_id";

		$treeDetailList = array();
		$count= 0;
		$result= mysql_query($query) or die("Exception getExistingTimber");
		while($row =  mysql_fetch_array($result))
		{

			$filling_detail = array();

			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$filling_detail['month']=$row['month'];
			$filling_detail['year']=$row['year'];
			$filling_detail['i_contractor_id']=$row['i_contractor_id'];

			$treeDetailList[$count]=$filling_detail;
			$count++;
		}//end while
	 return $treeDetailList;
	}

	function getExistingDateWiseFull($treeId,$markId,$month ,$year,$c_id)
	{
		$query = "select i_timber_id,i_timber_type_id,i_tree_id,i_mark_id, i_current_count,
				  i_current_volume  
				  from c_filling_detail where month='".$month."' and year='".$year."' and i_tree_id='".$treeId."'  and i_mark_id ='".$markId."'  and i_contractor_id='".$c_id."' order  by i_timber_id ";


		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();

			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$treeDetailList[$row['i_timber_id']][$row['i_timber_type_id']]=$filling_detail;
		}//end while

	 return $treeDetailList;
	}

	function getTimberVolummeDetail()
	{
		$query = "SELECT * FROM `m_timber_type`  order by i_timber_id";

		$volumeListAll = array();
		$volumeList = array();
		$count= 0;
        $previous !='0' ;
		$result= mysql_query($query) or die("Exception during fetching timber volum");
		while($row =  mysql_fetch_array($result))
		{

		if($previous !='0' && $previous !=$row['i_timber_id'] )
			{
				//Tree Changed
				$volumeListAlls[$previous]=$volumeList;
				$previous=$row['i_tree_id'];
				$volumeList = array();
				
			}
			$volumneDetail['i_timber_id'] =$row['i_timber_id'];
			$volumneDetail['vc_name'] =$row['vc_name'];
			$volumneDetail['volume'] =$row['volume'];
			$volumeList[$row['id']]=$volumneDetail;
			$previous=$row['i_timber_id']	;
		}//end while
		$volumeListAlls[$previous]=$volumeList;
	 return $volumeListAlls;
	}

	
function getConversionMaster($id)
	{
		$query = "SELECT *  FROM c_conversion_felling where i_forest_id='".$id."'  ";

		$conversionMaster = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc($result))
		{
			$conversionMaster[$row['i_category_id']] =$row;
			
			
		}//end while

	 return $conversionMaster;
	}
	
	
	function getCurrentMarkingPrice($id)
	{
		$query = "SELECT *  FROM c_marked_price where i_mark_id='".$id."'  order by i_tree_id 	 ";

		$dataList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc($result))
		{
			$dataList[$row['i_tree_id']] =$row;
				
				
		}//end while

	 return $dataList;
	}
	
	
function getDefaultPriceModel($id)
	{
		$query = "SELECT *  FROM m_price where i_forest_id ='".$id."'  order by i_tree_id 	 ";

		$dataList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc($result))
		{
			$dataList[$row['i_tree_id']] =$row;
				
				
		}//end while

	 return $dataList;
	}

	function getFellingConversionDetail($id)
	{
		$query = "SELECT *  FROM `progress_felling_detail` where i_progress_id='".$id."'  order by i_tree_id,i_category_id";

        
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}

			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_count=$row['i_count'];
			$detail->i_volume=$row['i_volume'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous != '0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}
	function getFellingConversionDetailOpening($id)
	{
		$query = "SELECT *  FROM `opening_progress_felling_detail` where i_progress_id='".$id."'  order by i_tree_id,i_category_id";
	
	
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}
	
			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_count=$row['i_count'];
			$detail->i_volume=$row['i_volume'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous != '0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}
	
	function getFellingConversionDetailVolume($id)
	{
		$query = "SELECT *  FROM `progress_conversion_actual_detail` where i_progress_id='".$id."'  order by i_tree_id,i_category_id";
	
	 
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}
	
			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_count=$row['i_count'];
			$detail->i_volume=$row['i_volume'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous !='0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}

function getMarkedTreesOnly($id)
	{
		$query = "SELECT distinct i_tree_id,vc_name FROM `r_tree_category` a,m_trees b where i_mark_detail_id='".$id."' and a.i_tree_id=b.id order  by vc_name ";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			
			$list[$row['i_tree_id']]=$row['vc_name'];
		}//end while
		
		return $list;
	}
	
function getprogressConversionDetail($progressId)
	{
		$query = "select * from progress_conversion_detail  where 	i_progress_id ='".$progressId."'  ";

		
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();
			$filling_detail['i_timber_type_id']=$row['i_timber_type_id'];
			
			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$treeDetailList[$row['i_timber_id']][$row['i_tree_id']][$row['i_timber_type_id']]=$filling_detail;
		}//end while

	 return $treeDetailList;
	 
	}
	
	function getprogressConversionDetailOpening($progressId)
	{
		$query = "select * from opening_progress_conversion_detail  where 	i_progress_id ='".$progressId."'  ";
	
	
		$treeDetailList = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();
	
			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$treeDetailList[$row['i_timber_id']][$row['i_tree_id']][$row['i_timber_type_id']]=$filling_detail;
		}//end while
	
		return $treeDetailList;
	
	}
		
	
function getEcnomicsConDetail($ecnomicsId)
	{
		$query = "select * from ecnomics_conversion_detail  where	i_ecnomics_master_id ='".$ecnomicsId."'  ";
       
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$treeDetailList[$row['i_timber_id']][$row['i_tree_id']][$row['i_timber_type_id']]=$row;
			
		}//end while

	 return $treeDetailList;
	 
	}	
	
function getprogressTransportationDetailComplete($progressId)
	{
		$query = "select * from progress_transportation_detail  where 	i_progress_id ='".$progressId."'  order by id1 desc";

		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc($result))
		{
		   $list[$row['id']]=$row;
		}//end while
     
	 return $list;
	 
	}

	function getprogressTransportationDetailCompleteEconomics($i_ecnomics_master_id )
	{
		$query = "select * from ecnomics_transportation_detail  where 	i_ecnomics_master_id  ='".$i_ecnomics_master_id."'  ";
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['id']]=$row;
		}//end while
	
		return $list;
	
	}
	
	
	function getprogressTransportationDetailCompleteEconomicsRSD($i_ecnomics_master_id )
	{
		$query = "select * from ecnomics_transportation_detail_RSD  where 	i_ecnomics_master_id  ='".$i_ecnomics_master_id."'  ";
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['id']]=$row;
		}//end while
	
		return $list;
	
	}
	function getprogressTransportationDetailCompleteOpening($progressId)
	{
		$query = "select * from opening_progress_transportation_detail  where 	i_progress_id ='".$progressId."'  ";
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['id']]=$row;
		}//end while
	
		return $list;
	
	}
	
function getProgressFellingDetail($id)
	{
		$query = "SELECT a.*,b.contractor_name,b.id as contractId FROM `progress_felling_master` a , contractor_detail b where  a.i_contractor_id=b.id and a.i_mark_id='".$id."' ";
        
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;	
		}//end while
	
		return $list;
	}	
	
	
	function getProgressFellingDetailOpening($id)
	{
		$query = "SELECT a.* FROM `opening_progress_felling_master` a  where   a.i_mark_id='".$id."' ";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during getProgressFellingDetailOpening");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;
		}//end while
	
		return $list;
	}
function getProgressTransPortationDetail($id)
	{
		$query = "SELECT a.* FROM `progress_transportation_master` a where   a.i_mark_id='".$id."' and a.i_type=1";
        
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;	
		}//end while
	
		return $list;
	}
	
	
	function getProgressTransPortationDetailfromRSD($id)
	{
		$query = "SELECT a.* FROM `progress_transportation_master` a where   a.i_mark_id='".$id."' and a.i_type=2";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;
		}//end while
	
		return $list;
	}
	function getProgressTransPortationDetailOpening($id)
	{
		$query = "SELECT a.* FROM `opening_progress_transportation_master` a where   a.i_mark_id='".$id."' ";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;
		}//end while
	
		return $list;
	}	
function getProgressConversionMasterDetail($id)
	{
		$query = "SELECT a.*,b.contractor_name,b.id as contractId FROM `progress_conversion_master` a , contractor_detail b where  a.i_contractor_id=b.id and a.i_mark_id='".$id."' ";
        
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;	
		}//end while
	
		return $list;
	}
	
	function getProgressConversionMasterDetailOpening($id)
	{
		$query = "SELECT a.* FROM `opening_progress_conversion_master` a where   a.i_mark_id='".$id."' ";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;
		}//end while
	
		return $list;
	}
	
	function getProgressConversionMasterVolumeDetail($id)
	{
		$query = "SELECT a.*,b.contractor_name,b.id as contractId FROM `progress_conversion_actual_master` a , contractor_detail b where  a.i_contractor_id=b.id and a.i_mark_id='".$id."' ";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;
		}//end while
	
		return $list;
	}
function getInventoryMasterDetail($id)
	{
		$query = "SELECT a.* FROM `inventory_master` a  where  a.i_mark_id='".$id."' ";
        
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;	
		}//end while
	
		return $list;
	}	
function getProgressOverHeadDetail($id)
	{
		$query = "SELECT a.*,b.contractor_name FROM `progress_overhead_master` a , contractor_detail b where  a.i_contractor_id=b.id and a.i_mark_id='".$id."' ";
        
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[] = $row;	
		}//end while
	
		return $list;
	}
	
	
	
function getProgressFellingTreeWise($id)
	{
	$query = "SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
					FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
					and `i_progress_id`
					IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' ) group by i_tree_id order by vc_name";
        
	    
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;	
		}//end while
	
		return $list;
	}
	
	function getProgressFellingTreeWiseYearBased($id,$year,$control,$month='')
	{
		if($month == '')
		{
		if($control == 1)
		{
		$query = "SELECT vc_name ,`i_tree_id` ,
						 sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,
						 sum(i_felling_charges) as i_felling_charges
				  FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
				  and `i_progress_id`
		          IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' and vc_year='".$year."' ) group by i_tree_id order by vc_name";
		}
		else if($control == -1)
		{
			$query = " SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volumne` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
						from (SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
						FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
						and `i_progress_id`
						IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' and vc_year <'".$year."' ) 
						group by i_tree_id 
			           UNION  
			           SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
						FROM `opening_progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
						and `i_progress_id`
						IN (SELECT id FROM opening_progress_felling_master  WHERE i_mark_id ='".$id."' and vc_year ='".$year."' ) 
						group by i_tree_id
			           ) as tbl group by i_tree_id 
			           ";
		}
		}
		else
		{
			if($control == 1)
			{
				$query = "SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
				FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' and vc_year='".$year."' and vc_month='".$month."' ) group by i_tree_id order by vc_name";
			}
			else if($control == -1)
			{
				$query = "SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
				FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' and vc_year <='".$year."' and vc_month<'".$month."' ) group by i_tree_id order by vc_name";
			}
					
		}
	   
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getProgressFellingTreeWiseYearBased");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}
	
	
	function getConversionTreeWiseYearBased($id,$year,$control,$month='')
	{
		if($month == '')
		{
			if($control == 1)
			{
				$query = "SELECT vc_name ,`i_tree_id` ,
				sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,
				sum(i_felling_charges) as i_felling_charges
				FROM `progress_conversion_actual_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_conversion_actual_master  WHERE i_mark_id ='".$id."' and vc_year='".$year."' ) group by i_tree_id order by vc_name";
			}
			else if($control == -1)
			{
				$query = " SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volumne` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
				from (SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
				FROM `progress_conversion_actual_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_conversion_actual_master  WHERE i_mark_id ='".$id."' and vc_year <'".$year."' )
				group by i_tree_id
				
				) as tbl group by i_tree_id
				";
			}
		}
		else
		{
			if($control == 1)
			{
				$query = "SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
				FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' and vc_year='".$year."' and vc_month='".$month."' ) group by i_tree_id order by vc_name";
			}
			else if($control == -1)
			{
				$query = "SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
				FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' and vc_year <='".$year."' and vc_month<'".$month."' ) group by i_tree_id order by vc_name";
			}
	
		}
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getProgressFellingTreeWiseYearBased");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}
function getProgressFellingCategoryWise($id)
	{
	$query = "SELECT vc_name ,i_category_id,`i_tree_id` , sum( `i_count` ) as i_felling_charges , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne ,sum(i_felling_charges) as i_felling_charges
					FROM `progress_felling_detail` a,m_trees b WHERE a.i_tree_id=b.id
					and `i_progress_id`
					IN (SELECT id FROM progress_felling_master  WHERE i_mark_id ='".$id."' ) group by i_category_id,i_tree_id order by i_category_id";
        
	 	$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
		if($previous !='0' && $previous !=$row['i_category_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$list;
				$previous=$row['i_tree_id'];
				$list = array();
			}
			$previous=$row['i_category_id'];
			$list[$row['i_tree_id']] = $row;	
		}//end while
	   
		if($previous  != '0')
		{
			$markDetailList[$previous]=$list;
		}
		
		
		return $markDetailList;
	}
		
	
function getProgressConversionTreeWise($id)
	{
	$query = " SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
			  FROM `progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
			  and `i_progress_id`
			  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' ) 
			  group by i_tree_id order by vc_name";
        
	   
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;	
		}//end while
	
		return $list;
	}
	function getProgressConversionTreeWiseTimberWise($id,$i_timber_id,$i_timbertype_id)
	{
		$query = "	SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volumne` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
					FROM 
					(SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
					FROM `progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
					and `i_progress_id`		IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' )
					group by i_tree_id,i_timber_id,i_timber_type_id
                    UNION 
                   SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
					FROM `opening_progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
					and `i_progress_id`		IN (SELECT id FROM opening_progress_conversion_master  WHERE i_mark_id ='".$id."' )
					group by i_tree_id,i_timber_id,i_timber_type_id
                   ) as tbl order by vc_name";
	
	  	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during getProgressConversionTreeWiseTimberWise($id,$i_timber_id,$i_timbertype_id)");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}	
	function getProgressConversionTreeWiseTimberWiseEco($id,$i_timber_id,$i_timbertype_id,$ecnomicsId)
	{
		$query = " SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne
		FROM `ecnomics_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		and i_ecnomics_master_id= '".$ecnomicsId."'
		group by i_tree_id,i_timber_id,i_timber_type_id order by vc_name";
	
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getProgressConversionTreeWiseTimberWiseEco");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}
	
	function getProgressConversionTreeWiseYearBased($id,$year,$control,$month='')
	{
		
		if($month == '')
		{
			if($control == 1)
			{
				$query = " SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
				FROM `progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' and vc_year ='".$year."')
				group by i_tree_id order by vc_name";
			}
			else if($control == -1)
			{
				$query = "SELECT vc_name ,`i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volumne` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
				 		FROM (SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
						  	  FROM `progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
							  and `i_progress_id`
							  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' and vc_year < '".$year."')
							  group by i_tree_id 
						
							union 
				
							 SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
							 FROM `opening_progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
							 and `i_progress_id`
							 IN (SELECT id FROM opening_progress_conversion_master  WHERE i_mark_id ='".$id."' and vc_year = '".$year."')
							 group by i_tree_id )
					 as tbl group by i_tree_id 
				";

			}
		}
		else
		{
			if($control == 1)
			{
				$query = " SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
				FROM `progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' and vc_year ='".$year."'
				and vc_month='".$month."')
				group by i_tree_id order by vc_name";
			}
			else if($control == -1)
			{
				$query = " SELECT vc_name ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
				FROM `progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
				and `i_progress_id`
				IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' and vc_year <= '".$year."' 
				and vc_month < '".$month."') 
				group by i_tree_id order by vc_name";
					
			}
		}
      
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getProgressConversionTreeWiseYearBased");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}
	
	function getCarriageDetail($id,$year,$control,$month)
	{
	
		
				$query = " SELECT `i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne,sum(i_charges) as i_conversion_charges
							 FROM `progress_transportation_detail` a,m_trees b WHERE a.i_tree_id=b.id
							 and i_exit=1 and vc_destination in (select id from 	m_forest_points where i_type=1)  and `i_progress_id`
							 IN (SELECT id FROM progress_transportation_master  WHERE i_mark_id ='".$id."' and vc_year = '".$year."') group by i_tree_id";
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getCarriageDetail");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}
	
	
	function getTotalTransfer($id,$year,$control,$month)
	{
	
	
		$query = " SELECT `i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne,sum(i_charges) as i_conversion_charges
		FROM `progress_transportation_detail` a,m_trees b WHERE a.i_tree_id=b.id
		  and vc_destination in (select id from 	m_forest_points where i_type=2) and
		 `i_progress_id` IN (SELECT id FROM progress_transportation_master  WHERE i_mark_id ='".$id."' and vc_year = '".$year."') group by i_tree_id";
		
		
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getTotalTransfer");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}
	function getCarriageDetailOpening($id,$year,$control,$month)
	{
	
	
		$query = " SELECT `i_tree_id` , sum( `i_count` ) as i_count , sum( `i_volume` ) as i_volumne,sum(i_charges) as i_conversion_charges
		FROM `opening_progress_transportation_detail` a,m_trees b WHERE a.i_tree_id=b.id
		 and `i_progress_id`
		IN (SELECT id FROM opening_progress_transportation_master  WHERE i_mark_id ='".$id."' and vc_year = '".$year."') group by i_tree_id";
	
	
	
	
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getCarriageDetail");
	
		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']] = $row;
		}//end while
	
		return $list;
	}
	
function getProgressOverHeadWise($id)
	{
	$query = "
					SELECT 	a.*,vc_name ,`i_overhead_id`  
					FROM `progress_transportation_detail` a,m_overhead_entities b WHERE a.i_overhead_id=b.id
					and `i_progress_id`
					IN (SELECT id FROM progress_transportation_master  WHERE i_mark_id ='".$id."' ) 
					order by vc_name";
        
	   
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['id']] = $row;	
		}//end while
	
		return $list;
	}

	
	function getprogressConversionCharges($progressId)
	{
		$query = "select * from progress_conversion_charges  where 	i_progress_id ='".$progressId."'  ";

		
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();

			
			$filling_detail['i_timber_type_id']=$row['i_timber_type_id'];
			
			$filling_detail['i_timber_id']=$row['i_timber_id'];
			$filling_detail['i_felling_charges']=$row['i_felling_charges'];
			$filling_detail['i_progress_id']=$row['i_progress_id'];
			$treeDetailList[$row['i_timber_id']]=$filling_detail;
		}//end while

	 return $treeDetailList;
	 
	}

function getConvertedTimberName($id)
	{
		$query = "SELECT distinct vc_name ,`i_timber_id` 
			  	  FROM `progress_conversion_detail` a,m_timber b WHERE a.i_timber_id=b.id
			  	  and `i_progress_id`
			  	  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' ) 
			  	  order by vc_name";
	
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			
			$list[$row['i_timber_id']]=$row['vc_name'];
		}//end while
		
		return $list;
	}
	
function getConvertedTimberTreeWiseDetail($id)
	{
		$query = "SELECT vc_name ,a.i_timber_id,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
			  	  FROM `progress_conversion_detail` a,m_timber b WHERE a.i_timber_id=b.id
			  	  and `i_progress_id`
			  	  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' ) 
			  	  group by i_tree_id,i_timber_id order by i_tree_id,i_timber_id";
	
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$timberDetail =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous='0';
		while($row =  mysql_fetch_assoc($result))
		{
		if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$timberDetail[$previous]=$list;
				$previous=$row['i_tree_id'];
				$list = array();
			}
			$previous=$row['i_tree_id'];
			$list[$row['i_timber_id']] = $row;	
		}//end while
	   
		if($previous != '0')
		{
			$timberDetail[$previous]=$list;
		}
		
		
		return $timberDetail;
	}
	
function getConvertedTreeName($id)
	{
		$query = "SELECT distinct vc_name ,`i_tree_id` 
			  	  FROM `progress_conversion_detail` a,m_trees b WHERE a.i_tree_id=b.id
			  	  and `i_progress_id`
			  	  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' ) 
			  	  group by i_tree_id order by vc_name";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			
			$list[$row['i_tree_id']]=$row['vc_name'];
		}//end while
		
		return $list;
	}
	
	
	function getConvertedTimberTypeWiseDetail($id)
	{
		$query = "SELECT vc_name ,a.i_timber_id,a.i_timber_type_id ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,sum(i_conversion_charges) as i_conversion_charges
			  	  FROM `progress_conversion_detail` a,m_timber b WHERE a.i_timber_id=b.id
			  	  and `i_progress_id`
			  	  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' ) 
			  	  group by i_tree_id,i_timber_type_id  order by i_tree_id,i_timber_id";
	
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$timberDetail =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous='0';
		while($row =  mysql_fetch_assoc($result))
		{
		if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$timberDetail[$previous]=$list;
				$previous=$row['i_tree_id'];
				$list = array();
			}
			$previous=$row['i_tree_id'];
			$list[$row['i_timber_type_id']] = $row;	
		}//end while
	   
		if($previous !='0')
		{
			$timberDetail[$previous]=$list;
		}
		
		
		return $timberDetail;
	}
	
function getConvertedTimberTypeName($id)
	{
		$query = "SELECT distinct b.vc_name ,a.i_timber_id ,c.vc_name as timberType,a.i_timber_type_id
			  	  FROM `progress_conversion_detail` a,m_timber b,m_timber_type c WHERE a.i_timber_id=b.id
			  	  and c.id=a.i_timber_type_id and `i_progress_id`
			  	  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' ) 
			  	  order by b.vc_name";
	
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			
			$list[$row['i_timber_type_id']]=$row;
		}//end while
		
		return $list;
	}
	
	
	
	function getProgressTreesOnly($id)
	{
		$query = 	" SELECT distinct i_tree_id,vc_name FROM 
						(SELECT distinct i_tree_id,vc_name FROM `progress_conversion_actual_detail` a,m_trees b
				  		where  a.i_tree_id=b.id and a.i_count  > 0 
				  		and a.i_progress_id  in (select id from progress_conversion_actual_master where i_mark_id='".$id."')
					  	UNION
				    	SELECT distinct i_tree_id,vc_name FROM `opening_progress_conversion_detail` a,m_trees b
				  		where  a.i_tree_id=b.id and a.i_current_count  > 0 
				  		and a.i_progress_id  in (select id from opening_progress_conversion_master where i_mark_id='".$id."'))
						as tbl order  by vc_name ";
	
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching getProgressTreesOnly($id)");

		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			
			$list[$row['i_tree_id']]=$row['vc_name'];
		}//end while
		
		return $list;
	}
	
	
	function getTreesOpeningOnly($id)
	{
		$query = "SELECT distinct id,vc_name FROM m_trees  ";
	
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching tree Detail For opening");
	
		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
	
			$list[$row['id']]=$row['vc_name'];
		}//end while
	
		return $list;
	}
	
	
	
function getInventory($id)
	{
		$query = "SELECT i_tree_id, i_timber_id, i_timber_type_id, 
		          i_tree_id, sum( i_current_count ) AS i_current_count,
		          sum( i_current_volume ) AS i_current_volume
				  FROM progress_conversion_detail
				  where `i_progress_id`
			  	  IN (SELECT id FROM progress_conversion_master  WHERE i_mark_id ='".$id."' ) 
			  	  
                  GROUP BY i_timber_id, i_timber_type_id, i_tree_id ";

		
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching timber  detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();

			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$treeDetailList[$row['i_timber_id']][$row['i_timber_type_id']]=$filling_detail;
		}//end while

	 return $treeDetailList;
	 
	}
	
	
function getPreviousSellingDetail()
	{
		$query = "SELECT i_tree_id, i_timber_id, i_timber_type_id, 
		          i_tree_id, sum( i_current_count ) AS i_current_count,
		          sum( i_current_volume ) AS i_current_volume
				  FROM inventory_detail
                  GROUP BY i_timber_id, i_timber_type_id, i_tree_id ";

		
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching timber  detail");
		while($row =  mysql_fetch_array($result))
		{
			$filling_detail = array();

			$filling_detail['i_tree_id']=$row['i_tree_id'];
			$filling_detail['i_mark_id']=$row['i_mark_id'];
			$filling_detail['i_current_count']=$row['i_current_count'];
			$filling_detail['i_current_volume']=$row['i_current_volume'];
			$treeDetailList[$row['i_timber_id']][$row['i_timber_type_id']]=$filling_detail;
		}//end while

	 return $treeDetailList;
	 
	}
	
	
function getSoldTimberTypeWiseDetail($id)
	{
		$query = "SELECT vc_name ,a.i_timber_id,a.i_timber_type_id ,`i_tree_id` , sum( `i_current_count` ) as i_count , sum( `i_current_volume` ) as i_volumne,i_selling_price,sum(i_selling_price * i_current_volume) as i_conversion_charges
			  	  FROM `inventory_detail` a,m_timber b WHERE a.i_timber_id=b.id
			  	  and `i_inventory_id`
			  	  IN (SELECT id FROM inventory_master  WHERE i_mark_id ='".$id."' ) 
			  	  group by i_tree_id,i_timber_type_id  order by i_tree_id,i_timber_id";
	
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$timberDetail =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous='0';
		while($row =  mysql_fetch_assoc($result))
		{
		if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$timberDetail[$previous]=$list;
				$previous=$row['i_tree_id'];
				$list = array();
			}
			$previous=$row['i_tree_id'];
			$list[$row['i_timber_type_id']] = $row;	
		}//end while
	   
		if($previous != '0')
		{
			$timberDetail[$previous]=$list;
		}
		
		
		return $timberDetail;
	}
	
function getSoldTimberTypeDetail($id)
	{
		$query = "SELECT a.*
			  	  FROM `inventory_detail` a,m_timber b WHERE a.i_timber_id=b.id
			  	  and `i_inventory_id`
			  	  IN (SELECT id FROM inventory_master  WHERE i_mark_id ='".$id."' ) 
			  	   order by i_tree_id,i_timber_id";
	
	 
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$timberDetail =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['id']] = $row;	
		}//end while
	   
		
		
		
		return $list;
	}
		
function getSoldTreeName($id)
	{
		$query = "SELECT distinct vc_name ,`i_tree_id` 
			  	  FROM `inventory_detail` a,m_trees b WHERE a.i_tree_id=b.id
			  	  and a.i_current_count > 0 and `i_inventory_id`
			  	  IN (SELECT id FROM inventory_master  WHERE i_mark_id ='".$id."' ) 
			  	  group by i_tree_id order by vc_name";
	
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_array($result))
		{
			
			$list[$row['i_tree_id']]=$row['vc_name'];
		}//end while
		
		return $list;
	}
	
	
function getSoldTimberTypeName($id)
	{
		$query = "SELECT distinct b.vc_name ,a.i_timber_id ,c.vc_name as timberType,a.i_timber_type_id
			  	  FROM `inventory_detail` a,m_timber b,m_timber_type c WHERE a.i_timber_id=b.id
			  	  and c.id=a.i_timber_type_id and a.i_current_count > 0 and `i_inventory_id` 
			  	  IN (SELECT id FROM inventory_master  WHERE i_mark_id ='".$id."' ) 
			  	  order by b.vc_name";
	
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous=0;
		while($row =  mysql_fetch_assoc($result))
		{
			
			$list[$row['i_timber_type_id']]=$row;
		}//end while
		
		return $list;
	}
	
	
function getPreviousCurrentSellingDetail($progressId)
	{
		$query = "select * from inventory_detail  where 	i_inventory_id ='".$progressId."'  ";

		
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_array($result))
		{
			
			$treeDetailList[$row['i_timber_id']][$row['i_timber_type_id']]=$row;
		}//end while

	 return $treeDetailList;
	 
	}
	
function getPreviousSold($progressId)
	{
		$query = "SELECT i_tree_id, i_timber_id, i_timber_type_id, 
		          i_tree_id, sum( i_current_count ) AS i_current_count,
		          sum( i_current_volume ) AS i_current_volume ,i_location_id,i_exit_id
				  FROM inventory_detail where i_inventory_id != '".$progressId."' 	
                  GROUP BY i_timber_id, i_timber_type_id, i_tree_id ";

		
		$treeDetailList = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching timber  detail");
		while($row =  mysql_fetch_array($result))
		{
			
			$treeDetailList[$row['i_timber_id']][$row['i_timber_type_id']]=$row;
		}//end while

	 return $treeDetailList;
	 
	}

	
	
function getFellingPreviousConversionDetail($id,$progressId=0)
	{
		$query = "SELECT i_tree_id,	i_category_id,sum(i_count) as i_count FROM 
				   	`progress_felling_detail` where  i_progress_id in (select id from progress_felling_master where (id not in ('".$progressId."') and i_mark_id = '".$id."'))  group by i_tree_id,i_category_id order by i_tree_id,i_category_id";
    
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");

		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}

			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_count=$row['i_count'];
			$detail->i_volume=$row['i_volume'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous  != '0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}

	
	function getConversionPreviousConversionDetail($id,$progressId=0)
	{
		
				
		$query = "SELECT i_tree_id,	i_category_id,sum(i_count) as i_count FROM
		`progress_conversion_actual_detail` where  i_progress_id in (select id from progress_conversion_actual_master where (id not in ('".$progressId."') and i_mark_id = '".$id."'))  group by i_tree_id,i_category_id order by i_tree_id,i_category_id";
	
		
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
	
		$previous='0';
		while($row =  mysql_fetch_array($result))
		{
			if($previous !='0' && $previous !=$row['i_tree_id'] )
			{
				//Tree Changed
				$markDetailList[$previous]=$treeDetailList;
				$previous=$row['i_tree_id'];
			}
	
			$detail = new TreeCategoryVO();
			$detail->id=$row['id'];
			$detail->i_tree_id=$row['i_tree_id'];
			$detail->i_category_id=$row['i_category_id'];
			$detail->i_count=$row['i_count'];
			$detail->i_volume=$row['i_volume'];
			$treeDetailList[$detail->i_category_id] =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous != '0')
		{
			$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}
	
function getRoyalityMarkIdPrice($id,$vc_year='')
	{
		
		
		if($vc_year=='')
		{
		$query = "SELECT * FROM `c_marked_price` where 	i_mark_id='".$id."' ";
		}
		else 
		{
			$query = "SELECT * FROM `c_marked_price` where
			 			vc_year='".$vc_year."' and  i_mark_id='".$id."' ";
			
		}
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while

	 return $list;
	}
	
	function getRoyalityMarkIdPriceOpening($id,$vc_year)
	{
	
	
		
		{
			$query = "SELECT * FROM `c_marked_price` where
					  vc_year <'".$vc_year."' and  i_mark_id='".$id."' 
			          union 
					 SELECT * FROM `c_marked_price` where
					  vc_year <'".$vc_year."' and  i_mark_id='".$id."' 
			          
					";
	
		}
		
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	}
		

function getTimberProductVolume($id)
	{
		$query1 = "SELECT *,sum(i_economics_volume * i_product_persentage /100) as productVolume FROM c_marked_volume where i_mark_id='".$id."' group by i_tree_id ";
		$list = array();
		$count= 0;

		$result= mysql_query($query1) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while

	 return $list;
	}

function getTimberDetailVolume($id)
	{
		$query1 = "SELECT * , sum( i_current_volume ) AS volume FROM `ecnomics_conversion_detail` WHERE `i_ecnomics_master_id` ='".$id."' GROUP BY `i_tree_id`";
		$list = array();
		$count= 0;

		$result= mysql_query($query1) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while

	 return $list;
	}

function getSalePrice($id)
	{
		$query1 = "SELECT *
				   FROM  ecnomics_sale_price  WHERE  i_ecnomics_master_id  ='".$id."' GROUP BY `i_tree_id`";
		$list = array();
		$count= 0;

		$result= mysql_query($query1) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while

	 return $list;
	}

	function getFellingChargesEco($id)
	{
		$query1 = "SELECT *
		FROM  ecnomics_felling_chargs  WHERE  i_ecnomics_master_id  ='".$id."' ";
		$list = array();
		$count= 0;
	
		$result= mysql_query($query1) or die("Exception during getFellingChargesEco");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$id]=$row;
		}//end while
	
		return $list;
	}
function getTimberDetailVolumeTimberWise($id)
	{
		$query1 = "SELECT * , sum( i_current_volume ) AS volume FROM `ecnomics_conversion_detail` WHERE `i_ecnomics_master_id` ='".$id."' GROUP BY `i_tree_id`,i_timber_type_id";
		$list = array();
		$count= 0;

		$result= mysql_query($query1) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_tree_id']][$row['i_timber_type_id']]=$row;
		}//end while

	 return $list;
	}
	
function getSaleRateDetail($id)
	{
		$query1 = "SELECT *  FROM ecnomics_schedule_rates WHERE `i_ecnomics_master_id` ='".$id."'";
		$list = array();
		$count= 0;

		$result= mysql_query($query1) or die("Exception during fetching ecnomics_schedule_rates");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_timber_type_id']]=$row;
		}//end while

	 return $list;
	}	
function getConverionCharges($id)
	{
		$query1 = "SELECT a.*,c.vc_name,c.id as timber_id,sum(a.i_total_volume * i_average) as i_totalConversionCharge	  FROM ecnomics_schedule_rates a,
		            m_timber_type  b,
		             m_timber c 
					WHERE `i_ecnomics_master_id` ='".$id."'
					 and a.i_timber_type_id=b.id
					 and  c.id=b.i_timber_id
					group by  c.id";
		$list = array();
		$count= 0;

		$result= mysql_query($query1) or die("Exception during fetching ecnomics_schedule_rates");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['timber_id']]=$row;
		}//end while

	 return $list;
	}	
	
function getEcnomicsConvertedTimberName($id)
	{
		$query1 = "SELECT distinct a.i_timber_id,a.i_timber_type_id,b.vc_name as timberType,c.vc_name as timber	 FROM 
					`ecnomics_conversion_detail` a,
                    `m_timber_type` b,
                    `m_timber` c    
					 WHERE `i_ecnomics_master_id` ='".$id."'
                      and a.i_timber_type_id=b.id and c.id=b.i_timber_id
					  order by c.id";
		
		$list = array();
		$count= 0;

		$result= mysql_query($query1) or die("Exception during fetching c_mark_detail");
		while($row =  mysql_fetch_assoc(($result)))
		{
			$list[$row['i_timber_type_id']]=$row;
		}//end while

	 return $list;
	}

function getExitTypes()
	{
		$query = "select * from m_exit_types where i_status =1 ";
		$list = array();
		$result= mysql_query($query) or die("Exception during fetching getEcnomicsConvertedTimberName");
		while($row =  mysql_fetch_array($result))
		{
			$list[$row['id']]=$row['vc_name'];
		}//end while
		return $list;
	}
	
	
	//Added for the Inventory  Report 
	
	function getTransPortationMonth($markDetailId)
	{
		$query = "select vc_month, vc_year from ( SELECT vc_month, vc_year
					FROM progress_conversion_master where i_mark_id='".$markDetailId."'
					UNION 
					SELECT vc_month, vc_year
					FROM progress_transportation_master  where i_mark_id='".$markDetailId."' )as tbl order by vc_month,vc_year" ;
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getTransPortationMonth");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['vc_year']][$row['vc_month']]=$row;
		}//end while
	
		return $list;
	
	}
	
	
	function getForestInOut($markDetailId,$vc_month,$vc_year)
	{
		$query = "select 
					
					i_tree_id , 
					sum(InVolume) as InVolume ,
					sum(InCount) as InCount
		          , sum(OutVolume) as OutVolume,
		            sum(OutCount) as OutCount 
			from (
					SELECT 
					
					i_tree_id,
		       		sum(i_current_volume) as InVolume ,
		       		sum(i_current_count) as InCount ,
		     	    0  as OutVolume,
		       		0 as OutCount 
					
					FROM `progress_conversion_detail` 
					WHERE i_progress_id in (select id  from progress_conversion_master where vc_month='".$vc_month."' and vc_year='".$vc_year."' and  i_mark_id='".$markDetailId."')
			       group by i_tree_id
			 union
			    	SELECT 
			    	
			    	i_tree_id,
		        	0  as InVolume,
		        	0 as InCount,
		       		sum(i_volume) as OutVolume,
			  	    sum(i_count) as OutCount

			    	FROM progress_transportation_detail 
			    	WHERE vc_from=-1 and i_progress_id in (select id  from progress_transportation_master where  vc_month='".$vc_month."' and vc_year='".$vc_year."'  
			    	and  i_mark_id='".$markDetailId."') group by i_tree_id) as tbl where i_tree_id != '' group by i_tree_id";
	
	   
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getForestInOut");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	
	function getForestInOutDetail($markDetailId,$vc_year)
	{
		$query = "select i_tree_id , 
					sum(InVolume) as InVolume ,
					sum(InCount) as InCount
		          , sum(OutVolume) as OutVolume,
		            sum(OutCount) as OutCount
		from (
		SELECT i_tree_id,
		       sum(i_current_volume) as InVolume ,
		       sum(i_current_count) as InCount ,
		       0  as OutVolume,
		       0 as OutCount 
	    FROM `progress_conversion_detail`
		WHERE i_progress_id in (select id  from progress_conversion_master where  vc_year='".$vc_year."' and  i_mark_id='".$markDetailId."') group by i_tree_id
		union
		SELECT  i_tree_id,
		        0  as InVolume,
		        0 as InCount,
		        sum(i_volume) as OutVolume,
			    sum(i_count) as OutCount
		       FROM progress_transportation_detail
		WHERE vc_from=-1 and i_progress_id in (select id  from progress_transportation_master where  
		    vc_year='".$vc_year."' and  i_mark_id='".$markDetailId."') group by i_tree_id ) as tbl where i_tree_id != '' group by i_tree_id";
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getForestInOutDetail");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	
	function getForestPrevInOut($markDetailId,$vc_month,$vc_year,$treeId)
	{
		$query = "select 
		
		 i_tree_id , 
					sum(InVolume) as InVolume ,
					sum(InCount) as InCount
		          , sum(OutVolume) as OutVolume,
		            sum(OutCount) as OutCount
		
		from (
		SELECT

		   i_tree_id,
		       sum(i_current_volume) as InVolume ,
		       sum(i_current_count) as InCount ,
		       0  as OutVolume,
		       0 as OutCount   
		 
		FROM `progress_conversion_detail`
		WHERE i_progress_id in (select id  from progress_conversion_master where vc_month <'".$vc_month."' and vc_year='".$vc_year."' and  i_mark_id='".$markDetailId."')
		group by i_tree_id
		union
		SELECT 
		
		        i_tree_id,
		        0  as InVolume,
		        0 as InCount,
		        sum(i_volume) as OutVolume,
			    sum(i_count) as OutCount 
		
		FROM progress_transportation_detail
		WHERE vc_from=-1 and i_progress_id in (select id  from progress_transportation_master where  vc_month<'".$vc_month."' and vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id ) as tbl where i_tree_id != '' group by i_tree_id having i_tree_id ='".$treeId."'";
	
	//echo $query;
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getForestPrevInOut  ");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	function getForestPrevInOutY($markDetailId,$vc_month,$vc_year,$treeId)
	{
		$query = "select
	
		i_tree_id ,
		sum(InVolume) as InVolume ,
		sum(InCount) as InCount
		, sum(OutVolume) as OutVolume,
		sum(OutCount) as OutCount
	
		from (
		SELECT
	
		i_tree_id,
		sum(i_current_volume) as InVolume ,
		sum(i_current_count) as InCount ,
		0  as OutVolume,
		0 as OutCount
	
		FROM `progress_conversion_detail`
		WHERE i_progress_id in (select id  from progress_conversion_master where  vc_year<'".$vc_year."' and  i_mark_id='".$markDetailId."')
		group by i_tree_id
		union
		SELECT
	
		i_tree_id,
		0  as InVolume,
		0 as InCount,
		sum(i_volume) as OutVolume,
		sum(i_count) as OutCount
	
		FROM progress_transportation_detail
		WHERE vc_from=-1 and i_progress_id in (select id  from progress_transportation_master where   vc_year<'".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id ) as tbl where i_tree_id != '' group by i_tree_id having i_tree_id ='".$treeId."'";
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getForestPrevInOutY");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	
	function getForestPrevInOutDetail($markDetailId,$vc_year,$treeId)
	{
		$query = "select 
		            i_tree_id , 
					sum(InVolume) as InVolume ,
					sum(InCount) as InCount
		          , sum(OutVolume) as OutVolume,
		            sum(OutCount) as OutCount
		from (
		
		SELECT 
		       i_tree_id,
		       sum(i_current_volume) as InVolume ,
		       sum(i_current_count) as InCount ,
		       0  as OutVolume,
		       0 as OutCount  
		
		FROM `opening_progress_conversion_detail`
		WHERE i_progress_id in (select id  from opening_progress_conversion_master where  vc_year ='".$vc_year."' and  i_mark_id='".$markDetailId."') group by i_tree_id
		UNION
		SELECT 
		       i_tree_id,
		       sum(i_current_volume) as InVolume ,
		       sum(i_current_count) as InCount ,
		       0  as OutVolume,
		       0 as OutCount  
		
		FROM `progress_conversion_detail`
		WHERE i_progress_id in (select id  from progress_conversion_master where  vc_year <'".$vc_year."' and  i_mark_id='".$markDetailId."') group by i_tree_id
		union
		SELECT 
		        i_tree_id,
		        0  as InVolume,
		        0 as InCount,
		        sum(i_volume) as OutVolume,
			    sum(i_count) as OutCount

		 FROM progress_transportation_detail
		WHERE vc_from=-1 and i_progress_id in (select id  from progress_transportation_master where   vc_year < '".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id) as tbl where i_tree_id != '' group by i_tree_id having i_tree_id ='".$treeId."'";
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getForestPrevInOutDetail");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	function getPointInOut($markDetailId,$vc_month,$vc_year,$pointId)
	{
		$query = "select
		i_tree_id ,
		sum(InVolume) as InVolume ,
		sum(InCount) as InCount
		, sum(OutVolume) as OutVolume
		, sum(OutCount) as OutCount
		from (
		SELECT

		i_tree_id,
		sum(i_volume)  as InVolume,
		sum(i_count)  as InCount,

		0 as OutVolume
		,0 as OutCount

		FROM progress_transportation_detail
		WHERE vc_destination='".$pointId."' and i_progress_id in (select id  from progress_transportation_master where  vc_month='".$vc_month."' and vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."')  group by i_tree_id
		union
		SELECT
		i_tree_id,
		0  as InVolume,
		0  as InCount,

		sum(i_volume) as OutVolume  ,
		sum(i_count) as OutCount
		FROM progress_transportation_detail
		WHERE vc_from='".$pointId."' and i_progress_id in (select id  from progress_transportation_master where  vc_month='".$vc_month."' and vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id)   as tbl where i_tree_id != '' group by i_tree_id";

	 
		$list = array();
		$count= 0;
		$result= mysql_query($query) or die("Exception during fetching getPointInOutDetail");
		
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
		
		return $list;
	
	}
	
	
	function getPointInOutDetail($markDetailId,$pointId,$vc_year)
	{
		$query = "select i_tree_id , 
		sum(InVolume) as InVolume ,
		sum(InCount) as InCount
		, sum(OutVolume) as OutVolume
		, sum(OutCount) as OutCount
		from (
		SELECT i_tree_id,
		sum(i_volume)  as InVolume,
		sum(i_count)  as InCount,
		
		0 as OutVolume  
		,0 as OutCount  
		
		FROM progress_transportation_detail
		WHERE vc_destination='".$pointId."' and i_progress_id in (select id  from progress_transportation_master where   vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id
		union
		SELECT i_tree_id,
		0  as InVolume,
		0  as InCount,
		
		sum(i_volume) as OutVolume  ,
		sum(i_count) as OutCount  
		
		FROM progress_transportation_detail
		WHERE vc_from='".$pointId."' and i_progress_id in (select id  from progress_transportation_master where   vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id ) as tbl where i_tree_id != '0' group by i_tree_id";
	
		
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getPointInOutDetail");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	function getPointPrevInOut($markDetailId,$vc_month,$vc_year,$pointId,$treeId)
	{
		$query = "select 
		
		
		i_tree_id , 
		sum(InVolume) as InVolume ,
		sum(InCount) as InCount
		, sum(OutVolume) as OutVolume
		, sum(OutCount) as OutCount
		
		from (
		SELECT 
		
		i_tree_id,
		sum(i_volume)  as InVolume,
		sum(i_count)  as InCount,
		
		0 as OutVolume  
		,0 as OutCount 
		
		FROM progress_transportation_detail
		
		WHERE vc_destination='".$pointId."' and i_progress_id in 
		(select id  from progress_transportation_master where  vc_month<'".$vc_month."' and vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id
		union
		SELECT 
		
		   i_tree_id,
		    0  as InVolume,
		    0  as InCount,
		
		sum(i_volume) as OutVolume  ,
		sum(i_count) as OutCount  
		
		FROM progress_transportation_detail
		WHERE vc_from='".$pointId."' and i_progress_id in 
		(select id  from progress_transportation_master where  vc_month<'".$vc_month."' and vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id ) as tbl where i_tree_id != '' group by i_tree_id having i_tree_id='".$treeId."'";
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching prev getPointInOut");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	function getPointPrevInOutY($markDetailId,$vc_month,$vc_year,$pointId,$treeId)
	{
		$query = "select
	
	
		i_tree_id ,
		sum(InVolume) as InVolume ,
		sum(InCount) as InCount
		, sum(OutVolume) as OutVolume
		, sum(OutCount) as OutCount
	
		from (
		SELECT
	
		i_tree_id,
		sum(i_volume)  as InVolume,
		sum(i_count)  as InCount,
	
		0 as OutVolume
		,0 as OutCount
	
		FROM progress_transportation_detail
	
		WHERE vc_destination='".$pointId."' and i_progress_id in
		(select id  from progress_transportation_master where  vc_year<'".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id
		union
		SELECT
	
		i_tree_id,
		0  as InVolume,
		0  as InCount,
	
		sum(i_volume) as OutVolume  ,
		sum(i_count) as OutCount
	
		FROM progress_transportation_detail
		WHERE vc_from='".$pointId."' and i_progress_id in
		(select id  from progress_transportation_master where   vc_year<'".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id ) as tbl where i_tree_id > 0 group by i_tree_id having i_tree_id='".$treeId."'";
	
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching prev getPointInOut");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	
	
	function getPointPrevInOutDetail($markDetailId,$vc_year,$pointId,$treeId)
	{
		$query = "select 
			
			i_tree_id , 
		sum(InVolume) as InVolume ,
		sum(InCount) as InCount
		, sum(OutVolume) as OutVolume
		, sum(OutCount) as OutCount
		
		from (
		SELECT 
			
			i_tree_id,
		sum(i_volume)  as InVolume,
		sum(i_count)  as InCount,
		
		0 as OutVolume  
		,0 as OutCount 
		
		FROM progress_transportation_detail
		WHERE vc_destination='".$pointId."' and i_progress_id in
		(select id  from progress_transportation_master where    vc_year<'".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id
		UNION
		SELECT 
		
		 	i_tree_id,
		    0  as InVolume,
		    0  as InCount,
		
		sum(i_volume) as OutVolume  ,
		sum(i_count) as OutCount   

		 FROM progress_transportation_detail
		WHERE vc_from='".$pointId."' and i_progress_id in
		(select id  from progress_transportation_master where   vc_year<'".$vc_year."'
		and  i_mark_id='".$markDetailId."') group by i_tree_id
		UNION 
		SELECT 
		
		 	i_tree_id,
		  
		
		sum(i_volume) as  InVolume   ,
		sum(i_count) as  InCount ,   
           0  as OutVolume,
		    0  as OutCount
		 FROM opening_progress_transportation_detail
		WHERE vc_destination='".$pointId."' and i_progress_id in
		(select id  from opening_progress_transportation_master where   vc_year='".$vc_year."'
		and  i_mark_id='".$markDetailId."')
		group by i_tree_id ) as tbl where i_tree_id != '' group by i_tree_id having i_tree_id='".$treeId."'";
	
		
	
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching getPointInOut");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_tree_id']]=$row;
		}//end while
	
		return $list;
	
	}
	
	
	//Added for minventory  report ends 
}

?>
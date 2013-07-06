<?php

class TimberDO {
	/*
	 Function that inserts city data in DB.
	 Accepts CityVO .
	 */
	function insert($user_object)  {
		$query="INSERT INTO user_info
					 (i_user_id,
					  vc_name ,
					  vc_email,
					  vc_key,
					  vc_netflex_userid,
					  vc_netflex_secret,
					  b_netflex,
					  i_status)
					   VALUES 
					   ('0', 
					    '".$user_object->vc_name."',
					   '".$user_object->vc_email."',
					   '".$user_object->vc_key."',
					   '".$user_object->vc_netflex_userid."',
					   '".$user_object->vc_netflex_secret."',
					   '".$user_object->b_netflex."',
					    '".$user_object->i_status."')" ;
		mysql_query($query) or die("Exception During Inserting Data Into Table m_City  the Mysql");
	} //insert

	function getTimberList()
	{
		$query = "select * from m_timber where i_status=1  order by id ";
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_array($result))
		{
			$timberVO = new TimberVO();
			$timberVO->id = $row['id'];
			$timberVO->vc_name = $row['vc_name'];
			$timberVO->i_status = $row['i_status'];
			$list[$count] = $timberVO;
			$count++;

		}//end while
		return $list;
	}
	function getTimberCategoryDetail($forestID)
	{
		$query = "select * from c_category_timber where i_forest_id='".$forestID."' ";
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_category_id']][$row['i_timber_id']] = $row;
			}//end while
		return $list;
	}
	
	
	
	
function getTimberCategoryRelationDetail($i_mark_id,$ecnomicsId,$i_tree_id)
	{
		$query = "select * from ecnomics_category_timber where 
					i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsId."' and i_tree_id='".$i_tree_id."' ";
		
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_category_id']][$row['i_timber_id']] = $row;
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}
function getCategoryFillingRelation($i_mark_id,$ecnomicsId)
	{
		$query = "select * from ecnomics_category_felling where 
				  i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsId."'";
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
     
		while($row =  mysql_fetch_assoc($result))
		{
            
			$record['i_felling_charges'] = $row['i_felling_charges'];
			$record['i_conversion_charges'] = $row['i_conversion_charges'];
			$record['i_conversion'] = $row['i_conversion'];
			
			$list[$row['i_category_id']] = $record;
		
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}
	
function getMarkingOverHeadRelation($i_mark_id,$ecnomicsMaster)
	{
		$query = "select a.*,a.i_value as vc_value,b.vc_name as vc_name,b.i_overhead_type from ecnomics_overhead a ,
				  m_overhead_entities b where 
				  a.i_overhead_id=b.id 
				  and b.i_overhead_type in ('1','3')
				  and  i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsMaster."' ";
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_overhead_id']] = $row;
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}
function getOtherExpensis($i_mark_id,$ecnomicsMaster)
	{
		$query = "select a.*,a.i_value as vc_value,b.vc_name as vc_name,b.i_overhead_type 
				  from ecnomics_extracharges a ,
				  m_overhead_entities b where 
				  a.i_overhead_id=b.id 
				  and  i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsMaster."' ";
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_overhead_id']] = $row;
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}
		
function getMarkingTransPortationRelation($i_mark_id,$ecnomicsMaster)
	{
		$query = "select a.*,a.i_value as vc_value,b.vc_name as vc_name,b.i_overhead_type from ecnomics_overhead a ,
				  m_overhead_entities b where 
				  a.i_overhead_id=b.id 
				  and b.i_overhead_type in ('4','5')
				  and  i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsMaster."' ";
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_overhead_id']] = $row;
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}	
	
function getMarkingHandlingCharges($i_mark_id,$ecnomicsMaster)
	{
		$query = "select a.*,a.i_value as vc_value,b.vc_name as vc_name,b.i_overhead_type from ecnomics_overhead a ,
				  m_overhead_entities b where 
				  a.i_overhead_id=b.id 
				  and b.i_overhead_type in ('2')
				  and  i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsMaster."' ";
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_overhead_id']] = $row;
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}	
function getCategoryConversionRelation($i_mark_id,$ecnomicsId)
	{
		$query = "select * from ecnomics_category_conversion where
				 i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsId."'";
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_category_id']] = $row['i_value'];
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}

	function getCategoryConversionRelationTreeWise($i_mark_id,$ecnomicsId,$i_tree_id)
	{
		$query = "select * from ecnomics_category_conversion where
		i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsId."' and i_tree_id='".$i_tree_id."'";
		$list = array();
		$count= 0;
	
		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_category_id']] = $row['i_value'];
		}//end while
		if(count($list)==0)
		{
			return '';
		}
		return $list;
	
	}
	
	function getTimberDetail($id,$markId)
	{
		$query = "SELECT * FROM  c_filling_detail WHERE i_tree_id=".$id." AND i_mark_id =".$markId." order by i_timber_id";
		$list = array();
		$count= 0;
		$treeDetailList = array();
		$markDetailList =  array();
		$result= mysql_query($query) or die("Exception during fetching c_mark_detail");
		$previous=0;
		while($row =  mysql_fetch_array($result))
		{


				
				
			$detail = new TreeConversionVO();

			$common  =new common();
			$timberNlist=$common->getTimberNList();
				
			$timberName=  $timberNlist[$row['i_timber_id']];
			$detail->timberType=$row['i_timber_id'];
				
			$detail->timberName =$timberName;
			$detail->treetype_id=$row['i_timber_id'];
			$detail->previousCount=$row['i_previous_count'];
			$detail->previousVolume=$row['i_previous_volume'];
			$detail->currentCount=$row['i_current_count'];
			$detail->currentVolume=$row['i_current_volume'];
			$treeDetailList =$detail;
			$markDetailList[$row['i_timber_id']]=$treeDetailList;


		}//end while


		return $markDetailList;
	}
function getEcnomicsPriceRelation($i_mark_id,$ecnomicsMaster)
	{
		$query = "SELECT * FROM `ecnomics_timber_price_detail` where 
				    i_mark_id='".$i_mark_id."' and i_ecnomics_master_id ='".$ecnomicsMaster."' ";
		
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$list[$row['i_timber_id']] = $row;
			}//end while
		 if(count($list)==0)
		 {
		 	return '';
		 }
			return $list;
		
	}
	
	
function getTimberPriceDefault($forestID)
	{
		$query = "select * from m_timber_price where i_forest_id='".$forestID."' ";
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest Master Data");
		while($row =  mysql_fetch_assoc($result))
		{
			$row['i_value']=$row['price'];
			$list[$row['i_timber_id']] = $row;
			}//end while
		return $list;
	}

}
?>

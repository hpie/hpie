<?php

class TreeDO {
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

	function getTreeList()
	{
		$query = "select * from m_trees where i_status=1 order by vc_name  ";
		$list = array();
		$count= 0;
		
		$result= mysql_query($query) or die("Exception during fetching Tree List from Forest Master Data");
		while($row =  mysql_fetch_array($result))
		{
			$forestVO = new ForestVO();
			$forestVO->id = $row['id'];
			$forestVO->vc_name = $row['vc_name'];
			$forestVO->i_status = $row['i_status'];
			$list[$forestVO->id] = $forestVO;
			$count++;

		}//end while
		return $list;
	}

 function getFillingDetail($id)
	{
		$query = "SELECT * FROM c_tree_filling where i_mark_id='".$id."' order by i_tree_id";
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
				
			$detail = new TreeFillingVO();
			$detail->id=$row['id'];
			$detail->treetype_id=$row['i_tree_id'];
			$detail->previousCount=$row['i_prev_count'];
			$detail->previousVolume=$row['i_prev_volume'];
			$detail->currentCount=$row['i_current_count'];
			$detail->currentVolume=$row['i_current_volume'];
			$treeDetailList =$detail;
			$previous=$row['i_tree_id'];
		}//end while
		if($previous !=0)
		{
		$markDetailList[$previous]=$treeDetailList;
		}
		return $markDetailList;
	}


}
?>

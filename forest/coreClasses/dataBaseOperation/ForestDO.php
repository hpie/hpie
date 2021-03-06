<?php

class ForestDO {
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

	function getForestList()
	{
		$query = "select * from m_forest where i_status=1  order by vc_name ";
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest List from Forest Master Data");
		while($row =  mysql_fetch_array($result))
		{
			$forestVO = new ForestVO();
			$forestVO->id = $row['id'];
			$forestVO->vc_name = $row['vc_name'];
			$forestVO->i_status = $row['i_status'];
			$forestVO->i_department_id = $row['i_department_id'];
			
			$list[$forestVO->id] = $forestVO;
			$count++;

		}//end while
		return $list;
	}
	function getForestListDFO($id)
	{
		$query = "select * from m_forest where i_status=1 and i_department_id ='".$id."'";
		$list = array();
		$count= 0;

		$result= mysql_query($query) or die("Exception during fetching Forest DFO List from Forest Master Data");
		while($row =  mysql_fetch_array($result))
		{
			$forestVO = new ForestVO();
			$forestVO->id = $row['id'];
			$forestVO->vc_name = $row['vc_name'];
			$forestVO->i_status = $row['i_status'];
			$forestVO->i_department_id = $row['i_department_id'];
			$list[$forestVO->id] = $forestVO;
			$count++;

		}//end while
		return $list;
	}



}
?>

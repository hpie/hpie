<?php 
class common
{

	function makeSelectOptions($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str="")
	{
		//echo '<pre>'; print_r($arrData); echo '<pre>';
		$strOptions= "";
		if(isset($javascript) && $javascript != ""){
			$callJs = "onchange ='javascript:".$javascript."(this.value)'";
		}else{
			$callJs= "";
		}
		if(!$size){
			$selectSize = "180px";
		}else{
			$selectSize = $size."px";
		}
	    
		if(is_array($arrData) && count($arrData)>=0){
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			
			$strOptions .= "<option value =''>-select-</option>";
			foreach($arrData as $k=>$v){
				$selected= "";
				if($selectedIndex == $k){
					$selected= "selected";
				}
				$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
			}
			$strOptions .= "</select>";
		}
		return $strOptions;
	}





	function makeSelectOptionsCustomize($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str="")
	{
		//echo '<pre>'; print_r($arrData); echo '<pre>';
		$strOptions= "";
		if(isset($javascript) && $javascript != ""){
			$callJs = "onchange ='javascript:".$javascript."'";
		}else{
			$callJs= "";
		}
		
		if(!$size){
			$selectSize = "180px";
		}else{
			$selectSize = $size."px";
		}
	    
		if(is_array($arrData) && count($arrData)>=0){
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			
			$strOptions .= "<option value =''>-select-</option>";
			foreach($arrData as $k=>$v){
				$selected= "";
				if($selectedIndex == $k){
					$selected= "selected";
				}
				$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
			}
			$strOptions .= "</select>";
		}
		return $strOptions;
	}

	
	function generateSelectList($i_mark_id,$economicsId)
	{
		$selectList=$this->getEcnomicsDateSelect($i_mark_id);
		count($selectList);
		$selectdetail="<select name='i_ecnomics_master_id' id='i_ecnomics_master_id' onChange='submitForm(this.form)'>";
		foreach($selectList as $detail)
		{
			if($economicsId ==$detail['id'])
			{
				$selectdetail.="<option selected=selected value='".$detail['id']."'>";
			}
			else
			{ 
				$selectdetail.="<option value='".$detail['id']."'>";
			}
			
			$selectdetail.=$detail['dt_createDate'];
			$selectdetail.="</option>";
		}
		
		$selectdetail.="</select>";
		echo $selectdetail;
		
	}
	
	function getSeasonYearList($season_year)
	{
		//$saesonList = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
		$selectList='<select id="season_year" name="season_year" data-required="true" data-error-message="Season is required">'; 
        $oldestYear = 2010; 
		$currYear = intval(date('Y')+2); 
        
		$selectList.='<option value="">Select</option>';
            for($i = $oldestYear; $i <= $currYear; $i++){ 
                $val=$i."-02-15";
            	if($val==$season_year)
            	{	
                	$selectList.='<option value="'. $val .'" selected="selected">' . $i . '</option>';
            	}else
            	{
            		$selectList.='<option value="'. $val .'">' . $i . '</option>';
            	} 
            } 
    	$selectList.="</select>";
		
		echo $selectList;
	}
}
?>
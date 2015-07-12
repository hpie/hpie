<?php
class common
{
	public $accountId;
    
	 public function __construct($param) 
	 {
    	$this->accountId = $param;
  	 }
	
	
	function makeSelectOptions($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str="")
	{
		//echo '<pre>'; print_r($arrData); echo '<pre>';
		$strOptions= "";
		if(isset($javascript) && $javascript != "")
		{
			$callJs = "onchange ='javascript:".$javascript."(this.value)'";
		}else
		{
			$callJs= "";
		}
		if(!$size)
		{
			$selectSize = "180px";
		}else
		{
			$selectSize = $size."px";
		}
	    
		if(is_array($arrData) && count($arrData)>=0)
		{
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			
			$strOptions .= "<option value =''>-select-</option>";
			foreach($arrData as $k=>$v)
			{
				$selected= "";
				if($selectedIndex == $k)
				{
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
		if(isset($javascript) && $javascript != "")
		{
			$callJs = "onchange ='javascript:".$javascript."'";
		}else
		{
			$callJs= "";
		}
		
		if(!$size)
		{
			$selectSize = "180px";
		}else{
			$selectSize = $size."px";
		}
	    
		if(is_array($arrData) && count($arrData)>=0)
		{
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			
			$strOptions .= "<option value ='-1'>-select-</option>";
			foreach($arrData as $k=>$v)
			{
				$selected= "";
				if($selectedIndex == $k)
				{
					$selected= "selected";
				}
				$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
			}
			$strOptions .= "</select>";
		}
		return $strOptions;
	}		
	
}
?>
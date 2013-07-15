<?php 
	
	class form_validation{
		
		function validate_form($arrFields){
			$arrErrors = array();
			if(!empty($arrFields)){
				foreach($arrFields as $k=>$v){
					if($this->is_empty($v)){
						if($k == 'privacy_page_link' || $k == 'privacy_page_data'){
							continue;
						}
						$arrErrors[$k] = "Please enter ".str_replace("_"," ",$k);
					}
				}
			}
			return $arrErrors;
		}
	
		function is_email($email){
			if(!preg_match("/^[A-Za-z0-9\._\-+]+@[A-Za-z0-9_\-+]+(\.[A-Za-z0-9_\-+]+)+$/",$email))
				return true;
			else
			return false;
		}
		
		function is_empty($str){
			if(empty($str))
				return true;	
			else
				return false;
		}


		
		function is_number($number){
		if(!preg_match("/^\-?\+?[0-9e1-9]+$/",$number))
			return false;
		return true;
		}

		function is_unsign_number($number){
			if(!preg_match("/^\+?[0-9]+$/",$number))
				return false;
			return true;
		}
		
		function is_alpha_numeric($str){
		if(!preg_match("/^[A-Za-z0-9 ]+$/",$str))
			return false;
		return true;
		}

		function is_date($d){
			if(!preg_match("/^(\d){1,2}[-\/](\d){1,2}[-\/]\d{4}$/",$d,$matches))
				return -1;//Bad Date Format
			$T = split("[-/\\]",$d);
			$MON=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
			$M = $T[0];
			$D = $T[1];
			$Y = $T[2];
			return $D>0 && ($D<=$MON[$M] ||	$D==29 && $Y%4==0 && ($Y%100!=0 || $Y%400==0)); 
		}
      function is_valid_phone_number($number){
           if(ereg("^[0-9]{3}-[0-9]{3}-[0-9]{4}$", $number)) {
               $errmsg = 'Please enter your valid phone number';
		   }
	  }
}
	
?>
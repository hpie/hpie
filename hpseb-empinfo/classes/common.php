<?php
class common
{

	var $myVar;
	function getMyVariable()
	{
		return $myVar;
	}
	
	function setMyVariable($varValue)
	{
		$myVar = $varValue;
	}
	
// address.php Address code	
	function getAddressType($adress_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$addressList = array("1"=>"Permanent Residence", 
							 "3"=>"Present Residence", 
							 "5"=>"Mailing address", 
							 "Z1"=>"Address on Deputation");
		$selectList='<select id="ADDRESS_TYPE_CODE" name="ADDRESS_TYPE_CODE" '.$callJs.' data-validation-help="Please enter Address Type" data-validation="required" data-validation-error-msg="Address Type is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($addressList as $address_c=>$address_v)
		{
			if($address_c==$adress_code)
	        {	
	     	   $selectList.='<option value="'.$address_c.'" selected="selected">' . $address_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $address_c .'">' . $address_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
// address.php Region code
//	
	function getRegionList($region_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$regionList = array("01"=>"Andra Pradesh", 
							"02"=>"Arunachal Pradesh", 
							"03"=>"Assam", 
							"04"=>"Bihar",
							"05"=>"Goa",
							"06"=>"Gujarat",
							"07"=>"Haryana",
							"08"=>"Himachal Pradesh",
							"09"=>"Jammu und Kashmir",
							"10"=>"Karnataka",
							"11"=>"Kerala",
							"12"=>"Madhya Pradesh",
							"13"=>"Maharashtra",
							"14"=>"Manipur",
							"15"=>"Megalaya",
							"16"=>"Mizoram",
							"17"=>"Nagaland",
							"18"=>"Orissa",
							"19"=>"Punjab",
							"20"=>"Rajasthan",
							"21"=>"Sikkim",
							"22"=>"Tamil Nadu",
							"23"=>"Tripura",
							"24"=>"Uttar Pradesh",
							"25"=>"West Bengal",
							"26"=>"Andaman und Nico.In.",
							"27"=>"Chandigarh",
							"28"=>"Dadra und Nagar Hav.",
							"29"=>"Daman und Diu",
							"30"=>"Delhi",
							"31"=>"Lakshadweep",
							"32"=>"Pondicherry",
							"33"=>"Chhaattisgarh",
							"34"=>"Jharkhand",
							"35"=>"Uttaranchal");
		
		$selectList='<select id="ADDRESS_REGION_CODE" name="ADDRESS_REGION_CODE" '.$callJs.' data-validation-help="Please enter Region code" data-validation="required" data-validation-error-msg="Region code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($regionList as $region_c=>$region_v)
		{
			if($region_c==$region_code)
	        {	
	     	   $selectList.='<option value="'.$region_c.'" selected="selected">' . $region_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $region_c .'">' . $region_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
//personal-id.php Personal ID type		
	function getIdentificationType($identification_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$identificationList = array("02"=>"PAN Number", 
									"03"=>"Gratuity for India", 
									"05"=>"TAN Number", 
									"Z1"=>"GPF Number", 
									"Z2"=>"CPS Number" , 
									"Z3"=>"Health Insurance");
		$selectList='<select id="IDENTIFICATION_CODE" name="IDENTIFICATION_CODE" '.$callJs.' data-validation-help="Please enter Identification Type" data-validation="required" data-validation-error-msg="Identification Type is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($identificationList as $identification_c=>$identification_v)
		{
			if($identification_c==$identification_code)
	        {	
	     	   $selectList.='<option value="'.$identification_c.'" selected="selected">' . $identification_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $identification_c .'">' . $identification_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
//planned-work-schedule.php work schedule code	
	function getScheduleCode($schedule_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$scheduleRules = array("HPNORM"=>"HPSEB Normal Shift",
								"HPWSRDF"=>"HP Female Daily Wage", 
								"HPWSRDM"=>"HP Male Daily Wage",
								"HPWSRF"=>"HP Female Regular Wrk Chg",
								"HPWSRM"=>"HP Male Regular Wrk Chrge",
								"HPWSRPT"=>"HP Part-Time employees",
								"WSRCF"=>"HP Female Contractual",
								"WSRCM"=>"HP Male Contractual",
								"WSRFES"=>"HPSEB Fri Evening Shift",
								"WSRFMS"=>"HPSEB Fri Morning Shift",
								"WSRFNS"=>"HPSEB Fri night Shift",
								"WSRMAS"=>"HPSEB Mon Evening Shift",
								"WSRMMS"=>"HPSEB Mon Morning Shift",
								"WSRMNS"=>"HPSEB Mon night Shift",
								"WSRSAES"=>"HPSEB Sat Evening Shift",
								"WSRSAMS"=>"HPSEB Sat Morning Shift",
								"WSRSANS"=>"HPSEB Sat night Shift",
								"WSRSUES"=>"HPSEB Sun Evening Shift",
								"WSRSUMS"=>"HPSEB Sun Morning Shift",
								"WSRSUNS"=>"HPSEB Sun night Shift",
								"WSRTES"=>"HPSEB Tue Evening Shift",
								"WSRTHM"=>"HPSEB Thur Morning Shift",
								"WSRTHNS"=>"HPSEB Thur night Shift",
								"WSRTHS"=>"HPSEB Thur Evening Shift",
								"WSRTMS"=>"HPSEB Tue Morning Shift",
								"WSRTNS"=>"HPSEB Tue night Shift",
								"WSRWES"=>"HPSEB Wed Evening Shift",
								"WSRWES"=>"HPSEB Wed Morning Shift",
								"WSRWMS"=>"HPSEB Wed night Shift");
		$selectList='<select id="WORKSCHEDULE_RULE_CODE" name="WORKSCHEDULE_RULE_CODE" '.$callJs.' data-validation-help="Please enter Work Schedule type" data-validation="required" data-validation-error-msg="Work Schedule type is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($scheduleRules as $schedule_c=>$schedule_v)
		{
			if($schedule_c==$schedule_code)
	        {	
	     	   $selectList.='<option value="'.$schedule_c.'" selected="selected">' . $schedule_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $schedule_c .'">' . $schedule_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//communication.php Type of communication	
	function getCommunicationType($communication_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$communicationList = array("0010"=>"E-mail", 
								   "0020"=>"Office Number", 
								   "0030"=>"Private E-Mail Address", 
								   "CELL"=>"Cell Phone");
		$selectList='<select id="COMMUNICATION_CODE" name="COMMUNICATION_CODE" '.$callJs.' data-validation-help="Please enter Communication type" data-validation="required" data-validation-error-msg="Communication type is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($communicationList as $communication_c=>$communication_v)
		{
			if($communication_c==$communication_code)
	        {	
	     	   $selectList.='<option value="'.$communication_c.'" selected="selected">' . $communication_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $communication_c .'">' . $communication_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//appraisal.php appraisal code	
	function getAppraisalCode($appraisal_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$appraisalList = array("1"=>"Poor", 
							   "2"=>"Average", 
							   "3"=>"Good", 
							   "4"=>"Very Good", 
							   "5"=>"Outstanding");
		$selectList='<select id="APPRAISAL_SCALE_CODE" name="APPRAISAL_SCALE_CODE" '.$callJs.' data-validation-help="Please enter Appraisal code" data-validation="required" data-validation-error-msg="Appraisal code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($appraisalList as $appraisal_c=>$appraisal_v)
		{
			if($appraisal_c==$appraisal_code)
	        {	
	     	   $selectList.='<option value="'.$appraisal_c.'" selected="selected">' . $appraisal_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $appraisal_c .'">' . $appraisal_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
//appraisal.php promotion code	
	function getAppraisaPromotionlCode($appraisaPromotion_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$appraisaPromotionlList = array("1"=>"Poor", 
										"2"=>"Average", 
										"3"=>"Good", 
										"4"=>"Very Good", 
										"5"=>"Outstanding");
		$selectList='<select id="APPRAISAL_SCALE_CODE" name="APPRAISAL_SCALE_CODE" '.$callJs.' data-validation-help="Please enter Appraisal scale code" data-validation="required" data-validation-error-msg="Appraisal scale code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($appraisaPromotionlList as $appraisaPromotion_c=>$appraisaPromotion_v)
		{
			if($appraisaPromotion_c==$appraisaPromotion_code)
	        {	
	     	   $selectList.='<option value="'.$appraisaPromotion_c.'" selected="selected">' . $appraisaPromotion_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $appraisaPromotion_c .'">' . $appraisaPromotion_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//contract.php contract type code	
	function getContractType($contract_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$contractList = array("Z1"=>"On Probation", 
							  "Z2"=>"Confirmed", 
							  "Z3"=>"Ext. of Probation", 
							  "Z4"=>"Fixed term contract", 
							  "Z5"=>"Ext. of Contract", 
							  "Z6"=>"Part-Time", 
							  "Z7"=>"Daily Wage contract", 
							  "Z8"=>"Work Charge Contract");
		$selectList='<select id="CONTRACT_TYPE_CODE" name="CONTRACT_TYPE_CODE" '.$callJs.' data-validation-help="Please enter Contract code" data-validation="required" data-validation-error-msg="Contract code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($contractList as $contract_c=>$contract_v)
		{
			if($contract_c==$contract_code)
	        {	
	     	   $selectList.='<option value="'.$contract_c.'" selected="selected">' . $contract_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $contract_c .'">' . $contract_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

	
//ethinic.php ethinic code	
function getEthinicCode($ethinic_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$ethinicList = array("Z1"=>"GEN", 
							  "Z2"=>"SC", 
							  "Z3"=>"ST", 
							  "Z4"=>"OBC"
						);
		$selectList='<select id="EMP_ETHINIC_CODE" name="EMP_ETHINIC_CODE" '.$callJs.' data-validation-help="Please enter ethinic code" data-validation="required" data-validation-error-msg="Ethnic contract code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($ethinicList as $ethinic_c=>$ethinic_v)
		{
			if($ethinic_c==$ethinic_code)
	        {	
	     	   $selectList.='<option value="'.$ethinic_c.'" selected="selected">' . $ethinic_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $ethinic_c .'">' . $ethinic_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	

//ethinic.php ethinic code	
function getEthinicCode($ethinic_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$ethinicList = array("Z1"=>"GEN", 
							  "Z2"=>"SC", 
							  "Z3"=>"ST", 
							  "Z4"=>"OBC"
						);
		$selectList='<select id="EMP_ETHINIC_CODE" name="EMP_ETHINIC_CODE" '.$callJs.' data-validation-help="Please enter ethinic code" data-validation="required" data-validation-error-msg="Ethnic contract code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($ethinicList as $ethinic_c=>$ethinic_v)
		{
			if($ethinic_c==$ethinic_code)
	        {	
	     	   $selectList.='<option value="'.$ethinic_c.'" selected="selected">' . $ethinic_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $ethinic_c .'">' . $ethinic_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
	
//contract.php contract notice period	
	function getContractERNoticePeriodlList($contractERNoticePeriod_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$contractERNoticePeriodList = array("13"=>"3 months", 
										  "Z1"=>"7 days", 
										  "Z2"=>"15 days", 
										  "03"=>"1 month", 
										  "04"=>"2 months");
		$selectList='<select id="CONTRACT_ER_NOTICE_PERIOD_CODE" name="CONTRACT_ER_NOTICE_PERIOD_CODE" '.$callJs.' data-validation-help="Please enter Contract EE notice period code code" data-validation="required" data-validation-error-msg="Contract EE notice period code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($contractERNoticePeriodList as $contractERNoticePeriod_c=>$contractERNoticePeriod_v)
		{
			if($contractERNoticePeriod_c==$contractERNoticePeriod_code)
	        {	
	     	   $selectList.='<option value="'.$contractERNoticePeriod_c.'" selected="selected">' . $contractERNoticePeriod_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $contractERNoticePeriod_c .'">' . $contractERNoticePeriod_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
function getContractEENoticePeriodlList($contractEENoticePeriod_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$contractEENoticePeriodList = array("13"=>"3 months", 
										  "Z1"=>"7 days", 
										  "Z2"=>"15 days", 
										  "03"=>"1 month", 
										  "04"=>"2 months");
		$selectList='<select id="CONTRACT_EE_NOTICE_PERIOD_CODE" name="CONTRACT_EE_NOTICE_PERIOD_CODE" '.$callJs.' data-validation-help="Please enter Contract EE notice period code code" data-validation="required" data-validation-error-msg="Contract EE notice period code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($contractEENoticePeriodList as $contractEENoticePeriod_c=>$contractEENoticePeriod_v)
		{
			if($contractEENoticePeriod_c==$contractEENoticePeriod_code)
	        {	
	     	   $selectList.='<option value="'.$contractEENoticePeriod_c.'" selected="selected">' . $contractEENoticePeriod_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $contractEENoticePeriod_c .'">' . $contractEENoticePeriod_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
		
//absences.php absence code 	
	function getAbsenceCodeList($absence_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$absenceCodeList = array("01"=>"Earned Leave", 
								"02"=>"Half Pay Leave", 
								"03"=>"Commuted Leave", 
								"04"=>"Extra Ordinary Leave", 
								"05"=>"Maternity Leave", 
								"06"=>"Paternity Leave", 
								"07"=>"Casual Leave- Half Day", 
								"08"=>"Joining Time", 
								"09"=>"Restricted Holiday", 
								"10"=>"Unauthorized Absence", 
								"11"=>"Study Leave", 
								"12"=>"Leave Not Due", 
								"13"=>"Dies-Non", 
								"14"=>"Special Casual Leave", 
								"15"=>"Hospital Leave-Full Pay", 
								"16"=>"Hospital Leave-Half Pay", 
								"17"=>"Child Care Leave", 
								"18"=>"Spl Disability Leave-Pay", 
								"19"=>"HPL during Disability Lev", 
								"21"=>"Child Adoption Leave", 
								"22"=>"Departmental Leave");
		$selectList='<select id="ABSENCE_CODE" name="ABSENCE_CODE" '.$callJs.' data-validation-help="Please enter absence code" data-validation="required" data-validation-error-msg="Absence code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($absenceCodeList as $absence_c=>$absence_v)
		{
			if($absence_c==$absence_code)
	        {	
	     	   $selectList.='<option value="'.$absence_c.'" selected="selected">' . $absence_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $absence_c .'">' . $absence_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
	
	//	leave.php leave codes
	function getMilitaryCodeList($military_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$militaryCodeList = array("90"=>"Ex-Serviceman" 
								);
		$selectList='<select id="LEAVE_CODE" name="LEAVE_CODE" '.$callJs.' data-validation-help="Please enter leave code" data-validation="required" data-validation-error-msg="Leave code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($militaryCodeList as $military_c=>$military_v)
		{
			if($military_c==$military_code)
	        {	
	     	   $selectList.='<option value="'.$military_c.'" selected="selected">' . $military_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $military_c .'">' . $military_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//additional-personal-details.php military code	
    function getMilitaryCodeList($military_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
			$militaryCodeList = array(
										"01"=>"Earned Leave Quota", 
										"02"=>"Casual Leave Quota", 
										"03"=>"Half Pay Leave Quota", 
										"04"=>"Restricted  Quota", 
										"05"=>"EL from Previous Employer", 
										"06"=>"Study Leave Quota", 
										"07"=>"Special Casual Leave");
		$selectList='<select id="LEAVE_CODE" name="LEAVE_CODE" '.$callJs.' data-validation-help="Please enter Military code" data-validation="required" data-validation-error-msg="Military code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($militaryCodeList as $military_c=>$military_v)
		{
			if($military_c==$military_code)
	        {	
	     	   $selectList.='<option value="'.$military_c.'" selected="selected">' . $military_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $military_c .'">' . $military_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//challenge.php challenge code	
	function getChallengeCodeList($challenge_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$challengeCodeList = array("Z1"=>"Recruited on Merit", 
								   "Z2"=>"DisabilityinService"	);
		$selectList='<select id="CHALLENGE_GROUP_CODE" name="CHALLENGE_GROUP_CODE" '.$callJs.' data-validation-help="Please enter Challenge group code" data-validation="required" data-validation-error-msg="Challenge group code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($challengeCodeList as $challenge_c=>$challenge_v)
		{
			if($challenge_c==$challenge_code)
	        {	
	     	   $selectList.='<option value="'.$challenge_c.'" selected="selected">' . $challenge_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $challenge_c .'">' . $challenge_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//challenge.php challenge group list	
	function getChallengeGroupList($challengeGroup_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$challengeGroupList = array("Z1"=>"Visual Impairment",
									"Z2"=>"Hearing Impairment", 
									"Z3"=>"Speech Impairment", 
									"Z4"=>"PhysicallyChallenged",  
									"Z5"=>"Others");
		$selectList='<select id="CHALLENGE_GROUP_TYPE" name="CHALLENGE_GROUP_TYPE" '.$callJs.' data-validation-help="Please enter Challenge group code" data-validation="required" data-validation-error-msg="Challenge group is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($challengeGroupList as $challenge_c=>$challenge_v)
		{
			if($challenge_c==$challengeGroup_code)
	        {	
	     	   $selectList.='<option value="'.$challenge_c.'" selected="selected">' . $challenge_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $challenge_c .'">' . $challenge_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//disciplinary.php disciplinary code	
function getDisciplineCodeList($discipline_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$disciplineCodeList = array(
								     "Z001"=>"Habitual absenteeism",
						             "Z002"=>"Irregular attendance",
						             "Z003"=>"Habitual late coming",
						             "Z004"=>"Disobedience",
						             "Z005"=>"Assaulting",
						             "Z006"=>"Misappropriation",
						             "Z007"=>"Taking bribe",
						             "Z008"=>"Fraud in official dealings",
						             "Z009"=>"Theft",
						             "Z010"=>"Cheating the company",
						             "Z011"=>"Neglect of duty",
						             "Z012"=>"Damage of company property",
						             "Z013"=>"Drunkenness",
						             "Z014"=>"Riotous behaviour",
						             "Z015"=>"Gambling",
						             "Z016"=>"Abetment",
						             "Z017"=>"Sleeping while on duty",
						             "Z018"=>"Striking work",
						             "Z019"=>"Failure to observe safety instructions.",
						             "Z020"=>"Conviction in court of law",
						             "Z021"=>"Others");
						             
			$selectList='<select id="DECIPLINE_ACTION_CODE" name="DECIPLINE_ACTION_CODE" '.$callJs.' data-validation-help="Please enter discipline action code" data-validation="required" data-validation-error-msg="Discipline action is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($disciplineCodeList as $discipline_c=>$discipline_v)
		{
			if($discipline_c==$discipline_code)
	        {	
	     	   $selectList.='<option value="'.$discipline_c.'" selected="selected">' . $discipline_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $discipline_c .'">' . $discipline_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//disciplinary.php action source code
function getActionSourceCodeList($actionSource_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$actionSourceCodeList = array(
									     "01"=>"Controlling Officer",
							             "02"=>"DDO",
							             "03"=>"Head of Office",
							             "04"=>"Other Employee",
							             "05"=>"Customer",
							             "06"=>"Vendor",
							             "07"=>"Complaint through vigilance dept.",
							             "08"=>"Anti corruption unit",
							             "09"=>"Departmental inspection reports",
							             "10"=>"Stock verification surveys",
							             "11"=>"Scrutiny of property statement",
							             "12"=>"Scrutiny of transaction -Conduct Rules",
							             "13"=>"Ire-regularity - routine audit of Accnt.",
							             "14"=>"Audit report on Board accounts",
							             "15"=>"Report of Vidhan Sabha committees",
							             "16"=>"Complaints/allegation Press conferences",
							             "17"=>"Others");
									
		
		$selectList='<select id="DECIPLINE_ACTION_SOURCE_CODE" name="DECIPLINE_ACTION_SOURCE_CODE" '.$callJs.' data-validation-help="Please enter actionSource code" data-validation="required" data-validation-error-msg="actionSource code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($actionSourceCodeList as $actionSource_c=>$actionSource_v)
		{
			if($actionSource_c==$actionSource_code)
	        {	
	     	   $selectList.='<option value="'.$actionSource_c.'" selected="selected">' . $actionSource_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $actionSource_c .'">' . $actionSource_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//disciplinary.php action status code	
function getActionStatusCodeList($actionStatus_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$actionStatusCodeList = array(
									     "001"=>"Approved by DA for issue of CS",
							             "002"=>"Issued chargesheet",
							             "003"=>"Reply submitted",
							             "004"=>"Enquiry in progress",
							             "005"=>"Enquiry report submitted",
							             "006"=>"Case Disposed",
							             "007"=>"Appealed",
							             "008"=>"Review",
							             "009"=>"Charges Dropped"
							            );
		
		
		$selectList='<select id="DECIPLINE_ACTION_STATUS_CODE" name="DECIPLINE_ACTION_STATUS_CODE" '.$callJs.' data-validation-help="Please enter actionStatus code" data-validation="required" data-validation-error-msg="actionStatus code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($actionStatusCodeList as $actionStatus_c=>$actionStatus_v)
		{
			if($actionStatus_c==$actionStatus_code)
	        {	
	     	   $selectList.='<option value="'.$actionStatus_c.'" selected="selected">' . $actionStatus_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $actionStatus_c .'">' . $actionStatus_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//	disciplinary.php action outcome code
function getActionOutcomeCodeList($actionOutcome_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$actionOutcomeCodeList = array(
									    "Z01">"Sentenced/Imprisonment",
							             "Z02"=>"Written warning",
							             "Z03"=>"Suspension",
							             "Z04"=>"Minor Penalty-Censure",
							             "Z05"=>"Minor Penalty-Withholding of Promotion",
							             "Z06"=>"Minor Penalty-Recovery from pay",
							             "Z07"=>"Minor Penalty-Reduction to Lower Pay Scale",
							             "Z08"=>"Minor Penalty-Withholding Increment with Cumulative Effect",
							             "Z09"=>"Minor Penalty-Withholding Increment without Cumulative Effect",
							             "Z10"=>"Major Penalty-Reduction to Lower Time Scale",
							             "Z11"=>"Major Penalty-Reduction to Lower Post",
							             "Z12"=>"Major Penalty-Dismissal",
							             "Z13"=>"Major Penalty-Removal",
							             "Z14"=>"Major Penalty-Cumpulsory Retirement",
							             "Z15"=>"Exonerated",
							             "Z16"=>"Sentenced/Imprisonment"
            							);
		
		
		$selectList='<select id="DECIPLINE_ACTION_OUTCOME_CODE" name="DECIPLINE_ACTION_OUTCOME_CODE" '.$callJs.' data-validation-help="Please enter actionOutcome code" data-validation="required" data-validation-error-msg="actionOutcome code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($actionOutcomeCodeList as $actionOutcome_c=>$actionOutcome_v)
		{
			if($actionOutcome_c==$actionOutcome_code)
	        {	
	     	   $selectList.='<option value="'.$actionOutcome_c.'" selected="selected">' . $actionOutcome_v . '</option>';
	        }else
	        {
	        	$selectList.='"=>""'. $actionOutcome_c .'">' . $actionOutcome_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//	common unit for the period
function getUnitCodeList($actionOutcome_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$unitCodeList = array(
		   "Y"=>"Years",
           "M"=>"Months",
           "D"=>"Days"    );
		
		
		$selectList='<select id="DECIPLINE_SENTENCE_PERIOD_UNIT" name="DECIPLINE_SENTENCE_PERIOD_UNIT" '.$callJs.' data-validation-help="Please enter unit code" data-validation="required" data-validation-error-msg="Unit code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($unitCodeList as $unit_c=>$unit_v)
		{
			if($unit_c==$unit_code)
	        {	
	     	   $selectList.='<option value="'.$unit_c.'" selected="selected">' . $unit_v . '</option>';
	        }else
	        {
	        	$selectList.='"=>""'. $unit_c .'">' . $unit_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//contract.php

function getContractUnitCodeList($contractUnit_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$unitContractUnitCodeList = array(
		   "Y"=>"Years",
           "M"=>"Months",
           "D"=>"Days"    );
		
		
		$selectList='<select id="CONTRACT_PROBATION_UNITS" name="CONTRACT_PROBATION_UNITS" '.$callJs.' data-validation-help="Please enter unit code" data-validation="required" data-validation-error-msg="Unit code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($unitContractUnitCodeList as $unit_c=>$unit_v)
		{
			if($unit_c==$contractUnit_code)
	        {	
	     	   $selectList.='<option value="'.$unit_c.'" selected="selected">' . $unit_v . '</option>';
	        }else
	        {
	        	$selectList.='"=>""'. $unit_c .'">' . $unit_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//educaiton.php education code 	
	function getEducationCodeList($education_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$educationCodeList = array(
								   	 "01"=>"Illiterate",
						             "02"=>"Under Primary(< 5)",
						             "03"=>"Under Middle(5 to 7)",
						             "04"=>"Under Matric(8 to 9)",
						             "05"=>"Matric Pass(X pass)",
						             "06"=>"Prod Siksha",
						             "07"=>"Prep",
						             "08"=>"Plus One",
						             "09"=>"Higher Second.(Pt-1)",
						             "10"=>"Senior Second.(12th)",
						             "11"=>"Graduation (T)",
						             "12"=>"Graduation (NT)",
						             "13"=>"Post Graduation (T)",
						             "14"=>"Post Graduation (NT)",
						             "15"=>"I.T.I",
						             "16"=>"AMIE",
						             "17"=>"Diploma (T)",
						             "18"=>"Diploma (NT)",
						             "19"=>"Certification",
						             "20"=>"Doctorate",
						             "21"=>"Professional Inter",
						             "22"=>"Professional Final",
						             "23"=>"Intra State Training",
						             "24"=>"Inter State Training",
						             "25"=>"Inhouse- HPSEB Training",
						             "26"=>"Foreign Training",
						             "27"=>"Departmental Exam" );
		
		
		$selectList='<select id="EDUCATION_ESTABLISHMENT_CODE" name="EDUCATION_ESTABLISHMENT_CODE" '.$callJs.' data-validation-help="Please enter eduction establishment code" data-validation="required" data-validation-error-msg=" eduction establishment code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($educationCodeList as $education_c=>$education_v)
		{
			if($education_c==$education_code)
	        {	
	     	   $selectList.='<option value="'.$education_c.'" selected="selected">' . $education_v . '</option>';
	        }else
	        {
	        	$selectList.='"=>""'. $education_c .'">' . $education_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//education.php country code list	
	function getCountryCodeList($country_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$countryCodeList = array(
								   	 "IN"=>"India",
						             "NP"=>"Nepal"
						             );
		
		
		$selectList='<select id="EDUCATION_COUNTRY_CODE" name="EDUCATION_COUNTRY_CODE" '.$callJs.' data-validation-help="Please enter country code" data-validation="required" data-validation-error-msg="Country code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($countryCodeList as $country_c=>$country_v)
		{
			if($country_c==$country_code)
	        {	
	     	   $selectList.='<option value="'.$country_c.'" selected="selected">' . $country_v . '</option>';
	        }else
	        {
	        	$selectList.='"=>""'. $country_c .'">' . $country_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

function getCddressCountryCodeList($addressCountry_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$addressCountryCodeList = array("IN"=>"India", 
							 "NP"=>"Nepal" 
							 );
		$selectList='<select id="ADDRESS_COUNTRY_CODE" name="ADDRESS_COUNTRY_CODE" '.$callJs.' data-validation-help="Please enter Address country code" data-validation="required" data-validation-error-msg="Address country code is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($addressCountryCodeList as $addressCountry_c =>$addressCountry_v)
		{
			if($addressCountry_c==$addressCountry_code)
	        {	
	     	   $selectList.='<option value="'.$addressCountry_c.'" selected="selected">' . $addressCountry_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $addressCountry_c .'">' . $addressCountry_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}	
	
	
//education.php certification code	
	function getCertificateCodeList($certificate_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$certificateCodeList = array(
								   	 "00"=>"Illiterate",
						             "00"=>"II Std",
						             "00"=>"III Std",
						             "00"=>"IV Std",
						             "00"=>"V Std",
						             "00"=>"VI Std",
						             "00"=>"VII Std",
						             "00"=>"VIII Std",
						             "00"=>"IX Std",
						             "00"=>"I.C.S.E Board",
						             "00"=>"C.B.S.E Board",
						             "00"=>"State Board",
						             "00"=>"Others",
						             "00"=>"College/University",
						             "00"=>"AMIE(Technical)",
						             "00"=>"B Tech",
						             "00"=>"B Tech (H)",
						             "00"=>"BE",
						             "00"=>"BE (H)",
						             "00"=>"B Arch",
						             "00"=>"BSC Engg",
						             "00"=>"BSC Engg (H)",
						             "00"=>"BS",
						             "00"=>"B Com",
						             "00"=>"B Ed",
						             "00"=>"B Pharm",
						             "00"=>"BA",
						             "00"=>"BA (H)",
						             "00"=>"BBA",
						             "00"=>"BSC",
						             "00"=>"BSC (H)",
						             "00"=>"LLB",
						             "00"=>"BIT",
						             "00"=>"B Com ",
						             "00"=>"B Com (H)",
						             "00"=>"M Tech",
						             "00"=>"ME",
						             "00"=>"MS",
						             "00"=>"MSC Engg",
						             "00"=>"MSC",
						             "00"=>"M COM",
						             "00"=>"M Pharmacy",
						             "00"=>"M Phil",
						             "00"=>"M PM&IR",
						             "00"=>"M M S",
						             "00"=>"MA",
						             "008"=>"MBA",
						             "008"=>"MCA",
						             "008"=>"PGDBA",
						             "008"=>"PGDCA",
						             "008"=>"PGDM",
						             "008"=>"PGDIM",
						             "008"=>"PGHRM",
						             "008"=>"NTC",
						             "008"=>"Graduate Diploma",
						             "008"=>"PG Diploma",
						             "008"=>"Graduate",
						             "008"=>"Post Graduate",
						             "008"=>"Certificate Course",
						             "008"=>"Ph. D",
						             "008"=>"CA",
						             "008"=>"CS",
						             "008"=>"ICWA",
						             "008"=>"CFA",
						             "008"=>"Self Fin Cert.",
						             "008"=>"Sponsored Cert.",
						             "008"=>"Departmental Ex Passed",
						             "008"=>"Departmental Ex Failed"
						             );
		
		
		$selectList='<select id="EDUCATION_CERTIFICATE_CODE" name="EDUCATION_CERTIFICATE_CODE" '.$callJs.' data-validation-help="Please enter education certificate code" data-validation="required" data-validation-error-msg="Education certificate code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($certificateCodeList as $certificate_c=>$certificate_v)
		{
			if($certificate_c==$certificate_code)
	        {	
	     	   $selectList.='<option value="'.$certificate_c.'" selected="selected">' . $certificate_v . '</option>';
	        }else
	        {
	        	$selectList.='"=>""'. $certificate_c .'">' . $certificate_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}

//education.php education branch code	
	function getBranchCodeList($branch_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$branchCodeList = array(
								 "1"=>"Common Subjects",
					             "2"=>"Science-Math",
					             "3"=>"Science-Biology",
					             "4"=>"Commerce-Accounts",
					             "5"=>"Commerce-Economics",
					             "6"=>"Arts",
					             "7"=>"Electronics",
					             "8"=>"Civil Engg",
					             "9"=>"Computer Science",
					             "10"=>"Electrical Engg",
					             "11"=>"Electronics Engg",
					             "12"=>"Mechanical Engg",
					             "13"=>"Production Engg",
					             "14"=>"Aerodynamics",
					             "15"=>"Aeronautical Engg",
					             "16"=>"Aerospace Engg",
					             "17"=>"Applied Mechanics",
					             "18"=>"Applied Physics",
					             "19"=>"Applied Science",
					             "20"=>"Architecture",
					             "21"=>"Automobile Engg",
					             "22"=>"Chemical Engg",
					             "23"=>"Civil & Structural Engg",
					             "24"=>"Computer Applications",
					             "25"=>"Computer Programming",
					             "26"=>"Computers & Communications",
					             "27"=>"Digital Communications",
					             "28"=>"Electrical",
					             "29"=>"Electrical & Electronics",
					             "30"=>"Electrical & Mech",
					             "31"=>"Electronics & Communications",
					             "32"=>"Electronics & Telecommunications",
					             "33"=>"Engg Materials",
					             "34"=>"Engineering Equpiments",
					             "35"=>"Geology",
					             "36"=>"Indl Engg",
					             "37"=>"Indl Eqpt Design",
					             "38"=>"Industrial & Production Engg",
					             "39"=>"Information Technology",
					             "40"=>"Instrumentation",
					             "41"=>"Machine Tool Engg",
					             "42"=>"Manufacturing Tech",
					             "43"=>"Material Mgt",
					             "44"=>"Mechanical",
					             "45"=>"Metallurgy",
					             "46"=>"Quality Assuarance",
					             "47"=>"Telecom Engg",
					             "48"=>"Welding Technology",
					             "49"=>"Computer Aided Design",
					             "50"=>"Machine Design",
					             "51"=>"Manufacturing Management",
					             "52"=>"Material Science",
					             "53"=>"Production Management",
					             "54"=>"Project Management",
					             "55"=>"Software System",
					             "56"=>"Electronics & Instrumentation",
					             "57"=>"Others",
					             "58"=>"Commerce",
					             "59"=>"Pharmacy",
					             "60"=>"Advertising & PR",
					             "61"=>"Banking",
					             "62"=>"Bio-Chemistry",
					             "63"=>"Biology",
					             "64"=>"Business Admn (Finance)",
					             "65"=>"Business Admn (Marketing)",
					             "66"=>"Business Admn (Personnel)",
					             "67"=>"Business Finance",
					             "68"=>"Communication",
					             "69"=>"Economics",
					             "70"=>"English",
					             "71"=>"Finance",
					             "72"=>"Finance & Costing",
					             "73"=>"Foreign Trade",
					             "74"=>"Hotel Management",
					             "75"=>"Human Resource Mgt",
					             "76"=>"Journalism & Mass Communication",
					             "77"=>"Labour Laws",
					             "78"=>"Law",
					             "79"=>"Management",
					             "80"=>"Marketing",
					             "81"=>"Mathematics",
					             "82"=>"Science",
					             "83"=>"Social Science",
					             "84"=>"Sociology",
					             "85"=>"Statistics",
					             "86"=>"Training & Devt",
					             "87"=>"Accountancy",
					             "88"=>"Defence Studies",
					             "89"=>"Mass Communication",
					             "90"=>"Operations Management",
					             "91"=>"Personnel Mgt & Labour Law",
					             "92"=>"Home Science",
					             "93"=>"Public Relations",
					             "94"=>"Engg Management",
					             "95"=>"Fluid Mechanics",
					             "96"=>"Marine Engg",
					             "97"=>"Tool Design",
					             "98"=>"Computer Engg",
					             "99"=>"Maintenance Management",
					             "100"=>"Heavy Electrical Equipment",
					             "101"=>"Electrical Communications",
					             "102"=>"Electrical Machines",
					             "103"=>"Hindi",
					             "104"=>"Business Admn",
					             "105"=>"Business Admn (HR)",
					             "106"=>"Costing",
					             "107"=>"Financial Management",
					             "108"=>"Human Resource Devt",
					             "109"=>"Indl Relations",
					             "110"=>"Journalism",
					             "111"=>"Operations",
					             "112"=>"Personnel Management",
					             "113"=>"Political Science",
					             "114"=>"Taxation Law",
					             "115"=>"Construction Management",
					             "116"=>"Hospital Administration",
					             "117"=>"Labour Law & Admn Law",
					             "118"=>"Electrician",
					             "119"=>"Automobile Mechanic",
					             "120"=>"Fitter",
					             "121"=>"Paint Technology",
					             "122"=>"Mechanic",
					             "123"=>"Technical School Certificate",
					             "124"=>"Welding",
					             "125"=>"Refrigeration & AC",
					             "126"=>"Automation & Control",
					             "127"=>"Indl Electronics",
					             "128"=>"Factory Admn",
					             "129"=>"Operations Research",
					             "130"=>"Labour Laws & IR",
					             "131"=>"ARC Welding",
					             "132"=>"SAS Civil",
					             "133"=>"SAS Supply",
					             "134"=>"Secretarial",
					             "135"=>"Shorthand - Higher",
					             "136"=>"Typewriting - Higher",
					             "137"=>"Wireman",
					             "138"=>"Personnel Management & IR",
					             "139"=>"Foreign Language",
					             "140"=>"Automobile",
					             "141"=>"Computer Hardware Maintenance",
					             "142"=>"Driving",
					             "143"=>"Electrical Systems",
					             "144"=>"Fire & Safety",
					             "145"=>"Telecom / Telex Operation",
					             "146"=>"Human Resource",
					             "147"=>"Accountancy/Law",
					             "148"=>"Costing/Law",
					             "149"=>"Corporate",
					             "150"=>"Industrial Law",
					             "151"=>"Civil and Mechanical",
					             "152"=>"Academic Education",
					             "153"=>"Managerial Training",
					             "154"=>"Technical Training",
					             "155"=>"Non Technical Training",
					             "156"=>"Specialized Training"
					             );
		
		
		$selectList='<select id="EDUCATION_COURSE_BRANCH_CODE" name="EDUCATION_COURSE_BRANCH_CODE" '.$callJs.' data-validation-help="Please enter education branch code" data-validation="required" data-validation-error-msg="Education branch code is required">'; 
        
		$selectList.='">""">Select</option>';
		
		foreach($branchCodeList as $branch_c=>$branch_v)
		{
			if($branch_c==$branch_code)
	        {	
	     	   $selectList.='<option value="'.$branch_c.'" selected="selected">' . $branch_v . '</option>';
	        }else
	        {
	        	$selectList.='"=>""'. $branch_c .'">' . $branch_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
//To check the credit challenge between 0 - 100

function maximCheck($num)
{
    if ($num > 0 && $num < 100)
    {
         return TRUE;

    }
    else
    {
        $this->form_validation->set_message(
                        'DIGREE_OF_CHALLENGE',
                        'The %s field must be in 1 to 100'
                    );
        return FALSE;
    }
}

	
}
?>
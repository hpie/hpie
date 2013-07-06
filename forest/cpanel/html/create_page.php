<? if($templates_id == 1){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
    if (!validatePresent(document.forms.step2.big_banner,  'big_banner'))   errs += 1; 

    if (!validatePresent(document.forms.step2.portfolio_photo,  'portfolio_photo'))   errs += 1; 
    if (!validatePresent(document.forms.step2.header,  'header'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1; 

    if (!validatePresent(document.forms.step2.product_image,  'product_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.hyperlink_image,  'hyperlink_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.date,  'date'))   errs += 1; 
    if (!validatePresent(document.forms.step2.fm_address,  'fm_address'))   errs += 1; 
    if (!validatePresent(document.forms.step2.to_address,  'to_address'))   errs += 1; 

    if (!validatePresent(document.forms.step2.profile,  'profile'))   errs += 1; 
    if (!validatePresent(document.forms.step2.additional_profile,  'additional_profile'))   errs += 1; 
    if (!validatePresent(document.forms.step2.more_about_profile,  'more_about_profile'))   errs += 1; 
    if (!validatePresent(document.forms.step2.buy_now_text,  'buy_now_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.buy_now_link,  'buy_now_link'))   errs += 1; 
    if (!validatePresent(document.forms.step2.buy_now_price_description,  'buy_now_price_description'))   errs += 1; 
    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id ==2){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
    if (!validatePresent(document.forms.step2.headline,  'headline'))   errs += 1; 

    if (!validatePresent(document.forms.step2.headline_color,  'headline_color'))   errs += 1; 
    if (!validatePresent(document.forms.step2.sub_headline,  'sub_headline'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1; 

    if (!validatePresent(document.forms.step2.right_title_text,  'right_title_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.right_below_title_text,  'right_below_title_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.image,  'image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.hyperlink_image,  'hyperlink_image'))   errs += 1;
    if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
    if (!validatePresent(document.forms.step2.footer,  'footer'))   errs += 1; 
    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id == 3){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
    if (!validatePresent(document.forms.step2.attention,  'attention'))   errs += 1; 
	
    if (!validatePresent(document.forms.step2.header,  'header'))   errs += 1; 
	if (!validatePresent(document.forms.step2.below_header_text,  'below_header_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.from_name,  'from_name'))   errs += 1; 

    if (!validatePresent(document.forms.step2.inside_header_text,  'inside_header_text'))   errs += 1; 

    if (!validatePresent(document.forms.step2.para1,  'para1'))   errs += 1; 
    if (!validatePresent(document.forms.step2.para2,  'para2'))   errs += 1; 
    if (!validatePresent(document.forms.step2.para3,  'para3'))   errs += 1; 
    if (!validatePresent(document.forms.step2.para4,  'para4'))   errs += 1; 
    if (!validatePresent(document.forms.step2.para5,  'para5'))   errs += 1; 
    if (!validatePresent(document.forms.step2.para6,  'para6'))   errs += 1; 

    if (!validatePresent(document.forms.step2.book_image,  'book_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.more_text,  'more_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.download_header_start,  'download_header_start'))   errs += 1; 
    if (!validatePresent(document.forms.step2.download_header_middle,  'download_header_middle'))   errs += 1; 
    if (!validatePresent(document.forms.step2.download_header_end,  'download_header_end'))   errs += 1; 

    if (!validatePresent(document.forms.step2.download_header_below_text,  'download_header_below_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
    if (!validatePresent(document.forms.step2.privacy_page_title,  'privacy_page_title'))   errs += 1; 
    
	if (!validatePresent(document.forms.step2.contact_email,  'contact_email'))   errs += 1; 
	if (!validatePresent(document.forms.step2.footer_text,  'footer_text'))   errs += 1; 
	if (!validatePresent(document.forms.step2.logo,  'logo'))   errs += 1; 


/*
    if (!validatePresent(document.forms.step2.product_image,  'product_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.hyperlink_image,  'hyperlink_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.date,  'date'))   errs += 1; 
    if (!validatePresent(document.forms.step2.fm_address,  'fm_address'))   errs += 1; 
    if (!validatePresent(document.forms.step2.to_address,  'to_address'))   errs += 1; 

    if (!validatePresent(document.forms.step2.profile,  'profile'))   errs += 1; 
    if (!validatePresent(document.forms.step2.additional_profile,  'additional_profile'))   errs += 1; 
    if (!validatePresent(document.forms.step2.more_about_profile,  'more_about_profile'))   errs += 1; 
    if (!validatePresent(document.forms.step2.buy_now_text,  'buy_now_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.buy_now_link,  'buy_now_link'))   errs += 1; 
    if (!validatePresent(document.forms.step2.buy_now_price_description,  'buy_now_price_description'))   errs += 1; 
	*/
    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id ==4){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
	
    if (!validatePresent(document.forms.step2.headline,  'headline'))   errs += 1; 

    if (!validatePresent(document.forms.step2.sub_headline,  'sub_headline'))   errs += 1; 
    if (!validatePresent(document.forms.step2.signup_text,  'signup_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.signup_below_text,  'signup_below_text'))   errs += 1; 

    if (!validatePresent(document.forms.step2.video_title,  'video_title'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1; 
    if (!validatePresent(document.forms.step2.below_video_text,  'below_video_text'))   errs += 1; 
    if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
    if (!validatePresent(document.forms.step2.below_opt_in_box_text,  'below_opt_in_box_text'))   errs += 1; 

    if (!validatePresent(document.forms.step2.twitter_url,  'twitter_url'))   errs += 1; 
    if (!validatePresent(document.forms.step2.facebook_url,  'facebook_url'))   errs += 1; 
    if (!validatePresent(document.forms.step2.footer,  'footer'))   errs += 1; 
    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id ==5){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
	
    if (!validatePresent(document.forms.step2.headline,  'headline'))   errs += 1; 

    if (!validatePresent(document.forms.step2.sub_headline,  'sub_headline'))   errs += 1; 
    if (!validatePresent(document.forms.step2.signup_title,  'signup_title'))   errs += 1; 
	if (!validatePresent(document.forms.step2.product_image,  'product_image'))   errs += 1; 
	 if (!validatePresent(document.forms.step2.logo,  'logo'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1;  
	if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
	if (!validatePresent(document.forms.step2.body,  'body'))   errs += 1; 

    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id ==6){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
	
    if (!validatePresent(document.forms.step2.headline,  'headline'))   errs += 1; 

    if (!validatePresent(document.forms.step2.sub_headline,  'sub_headline'))   errs += 1; 
    if (!validatePresent(document.forms.step2.signup_title,  'signup_title'))   errs += 1; 
	if (!validatePresent(document.forms.step2.product_image,  'product_image'))   errs += 1; 
	 if (!validatePresent(document.forms.step2.logo,  'logo'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1;  
	if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
	if (!validatePresent(document.forms.step2.body,  'body'))   errs += 1; 

    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id ==7){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
	
    if (!validatePresent(document.forms.step2.headline,  'headline'))   errs += 1; 

    if (!validatePresent(document.forms.step2.sub_headline,  'sub_headline'))   errs += 1; 
    if (!validatePresent(document.forms.step2.signup_title,  'signup_title'))   errs += 1; 
	if (!validatePresent(document.forms.step2.product_image,  'product_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1;  
	if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
	if (!validatePresent(document.forms.step2.body,  'body'))   errs += 1; 

    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id ==8){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
	
    if (!validatePresent(document.forms.step2.headline,  'headline'))   errs += 1; 

    if (!validatePresent(document.forms.step2.sub_headline,  'sub_headline'))   errs += 1; 
    if (!validatePresent(document.forms.step2.signup_title,  'signup_title'))   errs += 1; 
	if (!validatePresent(document.forms.step2.product_image,  'product_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1;  
	if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
	if (!validatePresent(document.forms.step2.body,  'body'))   errs += 1; 

    return (errs==0);
  };
</SCRIPT>
<?}elseif($templates_id ==9){?>
<SCRIPT TYPE="text/javascript">
  function validateOnSubmit() {
    var elem;
    var errs=0;
    if (!validatePresent(document.forms.step2.page_name,  'page_name'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_title,  'meta_title'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_keywords,  'meta_keywords'))        errs += 1; 
    if (!validatePresent(document.forms.step2.meta_description,  'meta_description'))   errs += 1; 
	
    if (!validatePresent(document.forms.step2.headline,  'headline'))   errs += 1; 

    if (!validatePresent(document.forms.step2.sub_headline,  'sub_headline'))   errs += 1; 
    if (!validatePresent(document.forms.step2.signup_title,  'signup_title'))   errs += 1; 
	if (!validatePresent(document.forms.step2.product_image,  'product_image'))   errs += 1; 
    if (!validatePresent(document.forms.step2.video_code,  'video_code'))   errs += 1;  
	if (!validatePresent(document.forms.step2.opt_in_box,  'opt_in_box'))   errs += 1; 
	if (!validatePresent(document.forms.step2.body,  'body'))   errs += 1; 

    return (errs==0);
  };
</SCRIPT>
<?}?>
<form name ='step2' id='step2' method ='POST' action ='' enctype="multipart/form-data" onsubmit="return validateOnSubmit()">
	<table cellspacing="0" cellpadding="0" width='670' border ='0'>
	<?	
		if(!empty($arrErrors)){
			echo "<ul class='error_div'>";
			echo "<li class='error_label'>Please correct the errors marked in red</li>";
			//foreach($arrErrors as $k=>$v){
			//	echo "<li class='error'>".$v."</li>";
			//}
			echo "</ul>";
		}
	if(!empty($arrTemplateFields)){
		$strTable		= "";	
		$tempSection	= ""; 
		$counter		= 0;
		foreach($arrTemplateFields as $data){				
			$checkedY	= "";
			$checkedN	= "";
			$key	= trim($data['key_name']);
			$value	= trim($data['key_values']);
			$type	= trim($data['key_type']);
			$rows	= $data['rows'];
			$cols	= $data['cols'];
			$char_limit =$data['char_limit'];
			if($counter%2 ==0){
				$rowClass = "";	
			}else{
				$rowClass = "";	
			}
			$counter++;
			//$option_values = $data->option_values;
			/*if($data->section != $tempSection){
				$strTable .="<tr>";	
				$strTable .="<td colspan ='2' style ='font-size:14px;font-weight:bold;background-color:#f7f7f7;color:#2F7ABD;'>Section : ";
				$strTable .=ucwords(eregi_replace("_"," ",$config['section']));
				$strTable .="</td>";
				$strTable .="</tr>";	
			}*/
			$cssLabelClass = "class='label'";
			if(!empty($arrErrors) && array_key_exists($key,$arrErrors)){
				$cssInputClass = "";
				$tAreaClass  = "";
				//$showError ="<font style ='margin-left:20px;color:red;font-size:12px;'>".$arrErrors[$key]."</font><br/>";
				$showError ="<font style ='margin-left:20px;color:red;font-size:12px;' id='".$key."'>Required</font><br/>";
			}else{
				$cssInputClass = "";
				$tAreaClass  = "";
				$showError ="<br/>";
			}
			if($type == 'file' && $id){
				$showError ="<br/>";
			}else{
				$showError ="<font style ='margin-left:20px;font-size:12px;' id='".$key."'>Required</font><br/>";
			}
			if($key =='fm_address' || $key =='from_name'){
				$lbl =  "From";
				}else{
					$lbl = trim(ucwords(eregi_replace("_"," ",$key)));
				}
			$strTable .="<tr ".$rowClass.">";
			$strTable .="<td width='25%' valign ='top' ".$cssLabelClass.">";
			$strTable .= $lbl;
			$strTable .="</td>";
			$strTable .="<td width ='75%' walign='left' valign ='top'>";	
			switch($type){
				case 'text':				 
				$colorClass='';
				if($key == 'headline_color'){
					$cssInputClass ="class='label color'";
				}
				$strTable .= show_tooltip_text($key,$templates_id).$showError;
				if($key == 'date'){
					$cdate = date('l, d F Y');
					$dateClass = "class='w16em dateformat-l-cc-sp-d-sp-F-sp-Y show-weeks statusformat-l-cc-sp-d-sp-F-sp-Y'";
					$strTable .=  "<input type ='text' id='".$key."' name='".$key."' value ='".$cdate."' size='".$rows."' maxlength ='".$cols."' ".$cssInputClass.">";
				}else{
					$strTable .=  "<input ".$cssInputClass." type ='text' id='".$key."' name='".$key."' value ='".${"$key"}."' size='".$rows."' maxlength ='".$cols."' onchange=\"validatePresent(this, '".$key."');\">";
				}
				break;
				case 'file':
					$strTable .= show_tooltip_text($key,$templates_id).$showError;					
					if($key == 'big_banner'){
						$strTable .= "Please upload the picture of dimension (640 x 170) px<br/ >";
					}
					if($key == 'portfolio_photo'){
						$strTable .= "Please upload the picture of dimension (100 x 150) px<br/ >";
					}
					if($key == 'product_image' && $templates_id ==5){
						$strTable .= "Please upload the picture of dimension (265 x 156) px<br/ >";
					}elseif($key == 'product_image' && $templates_id ==6){
						$strTable .= "Please upload the picture of dimension (197 x 260) px<br/ >";
					}else if($key == 'product_image' && $templates_id ==7){
						$strTable .= "Please upload the picture of dimension (230 x 176) px<br/ >";
					}else if($key == 'product_image' && $templates_id ==8){
						$strTable .= "Please upload the picture of dimension (235 x 252) px<br/ >";
					}else if($key == 'product_image' && $templates_id ==9){
						$strTable .= "Please upload the picture of dimension (98 x 214) px<br/ >";
					}elseif($key == 'product_image'){
						$strTable .= "Please upload the picture of dimension (400 x 290) px<br/ >";
					}
					if($key =='image'){
						$strTable .= "Please upload the picture of dimension (400 x 290) px<br/ >";
					}
					if($key == 'logo' && $templates_id ==5){
						$strTable .= "Please upload the picture of dimension (185 x 60) px<br/ >";
					}elseif($key == 'logo' && $templates_id ==6){
						$strTable .= "Please upload the picture of dimension (252 x 178) px<br/ >";
					}elseif($key == 'logo'){
						$strTable .= "Please upload the picture of dimension (170 x 90) px<br/ >";
					}
					if($key == 'book_image'){
						$strTable .= "Please upload the picture of dimension (300 x 400) px<br/ >";
					}					
					$strTable .=  "<input ".$cssInputClass." type ='file' id='".$key."' name='".$key."' value ='".${"$key"}."' size='".$rows."' maxlength ='".$cols."' onchange=\"validatePresent(this, '".$key."');\">";
					if($id){
						$strTable .=  "<br/><div style ='border:0px solid #ff0000;width:460px;overflow:auto;'><img src ='".SQUEEZE_PAGE_URL.$users_id."/".$templates_id."_".$id."/".${"$key"}."'/></div>";
					}
				break;
				case 'radio':
				if($value){
					$checkedY = "checked";
				}else{
					$checkedN = "checked";
				}
				$strTable .= show_tooltip_text($key,$templates_id).$showError;
				$strTable .=  "<input  ".$cssInputClass." style ='width:20px;' type ='radio' id='".$key."' name='".$key."' ".$checkedY."' value ='1'>Yes";
				$strTable .=  "<input ".$cssInputClass." style ='width:20px;' type ='radio' id='".$key."' name='".$key."' ".$checkedN."' value ='0'>No";		break;
				
				case 'checkbox':
				//$strTable .= show_tooltip_text($key,$templates_id).$showError;
				$strTable .=  "<input  ".$cssInputClass." style ='width:20px;' type ='checkbox' id='".$key."' name='".$key."' ".$checkedC."' value ='1'>".$value."";		
				break;
				case 'select':
				$strTable .= show_tooltip_text($key,$templates_id).$showError;
				$strTable .=  "<select  ".$cssInputClass." id='".$key."' name='".$key."' onchange=\"validatePresent(this, '".$key."');\">";
				if(!empty($option_values)){
					$arr_option_values = explode(",",$option_values);
					foreach($arr_option_values as $v){
						$selected = "";
						if($value == $v){
							$selected = "selected";
						}
						$strTable .="<option value ='".$v."' ".$selected.">".$v;
					}
				}
				$strTable .=  "</select>";				
				break;
				case 'textarea':
					if($char_limit){
						$set_char_limit = 'onKeyDown="textCounter(document.step2.'.$key.',document.step2.remLen'.$key.','.$char_limit.')" onKeyUp="textCounter(document.step2.'.$key.',document.step2.remLen'.$key.','.$char_limit.')"';	
					}else{
						$set_char_limit = "";
					}
				if($value == 'show_editor'){
					$show_editor = $tAreaClass;
				}else{
					$show_editor = "class='mceNoEditor ".$tAreaClass."'";
				}
				$strTable .= show_tooltip_text($key,$templates_id).$showError;
				if($key == 'video_code'){
					if($templates_id ==2)
						$strTable .= "Please upload the video of dimension (490 x 306) px<br/ >";
					else if($templates_id ==1)
						$strTable .= "Please upload the video of dimension (540 x 380) px <br/ >";
					else if($templates_id ==4)
						$strTable .= "Please upload the video of dimension (499 x 312) px <br/ >";
					else if($templates_id ==5)
						$strTable .= "Please upload the video of dimension (641 x 386) px <br/ >";
					else if($templates_id ==6)
						$strTable .= "Please upload the video of dimension (641 x 386) px <br/ >";
					else if($templates_id ==7)
						$strTable .= "Please upload the video of dimension (640 x 385) px <br/ >";
					else if($templates_id ==8)
						$strTable .= "Please upload the video of dimension (640 x 385) px <br/ >";
					else if($templates_id ==9)
						$strTable .= "Please upload the video of dimension (640 x 385) px <br/ >";
				}
				$strTable .=  "<textarea ".$set_char_limit." name='".$key."' ".$show_editor." rows = '".$rows."' cols='".$cols."' onchange=\"validatePresent(this, '".$key."');\">".stripslashes(${"$key"})."</textarea>";
				if($char_limit){
					$strTable .= '<br /><input readonly type="text" name="remLen'.$key.'" size="3" maxlength="3" value="'.$char_limit.'">&nbsp;characters left';
				}
				if($templates_id ==3 && $key == 'privacy_page_link'){
					$strTable .="<br/><b>OR</b><br/>";
				}
				
			}
			$strTable .="</td>";
			$strTable .="</tr>";
		  //$tempSection = $data->section;
		}
		echo $strTable;
	}
	?>
	<tr>
	<td>&nbsp;</td>
	<td align ='left' valign ='top'><br/><br/>
		<input type ='hidden' name ='templates_id' value ='<?=$templates_id?>'>
		<input type ='hidden' name ='id' value ='<?=$id?>'>
		<input type ='hidden' name ='step1Submitted' value ='1'>
		<input id='generatebtn' type ='submit' name ='step2Submitted' value ='Update Page'>
		</form>
	</td>
	</tr>
	</table>
	</form>
	<br/>
	<br/>
	<br/>
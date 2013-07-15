<img id="step" src="images/step1.gif"/><br/>
<h2 class="heading">Choose a template</h2>
<ul id="themeslist">
<?	

	if(!empty($a_templates)){
	$counter = 0;
	$totalRecored = count($a_templates);
	foreach($a_templates as $templates){
		$t_templates[$templates['id']] = $templates['name'];
			$checked = "";			
		if($templates['id']	==	1){
			$checked = "checked";
		}
		$counter++;
		//echo "<li class='themebox'><h2><input ".$checked." type ='radio' name ='templates_id' id ='templates_id' value='".$templates['id']."'>".$templates['name']."</h2><a href ='#' rel='".TEMPLATE_URL.$templates['id']."/".$templates['id'].".jpg' class='screenshot'><p class='theme'><img id='showlagreImage' name='showlagreImage' src ='".TEMPLATE_URL.$templates['id']."/t_".$templates['id'].".jpg' border ='0'></p></a></li>";
		$imageURL = TEMPLATE_URL.$templates['id']."/".$templates['id'].".jpg";
		$t_imageURL = TEMPLATE_URL.$templates['id']."/t_".$templates['id'].".jpg";
		$demoURL  = TEMPLATE_URL.$templates['id']."/demo.html";
		$name = ucfirst(trim($templates['name']));
		echo "<li class='themebox'>
        <h2>".$name."</h2>
        <p class='theme'><a id='example2' href ='".$imageURL."'><img src ='".$t_imageURL."'></a></p>
        <p><form name ='step1' id='step1' method ='POST' action =''>
		<input type ='hidden' name ='templates_id' id ='templates_id' value='".$templates['id']."'>
		<input type ='hidden' name ='step1Submitted' value ='Next'>
		<input class='sbmt_button' style ='border:none;background:#ffffff;cursor:pointer;' title ='click to install template $name' type ='submit' name ='submit' value ='Install Page'>&nbsp;&nbsp;"?>
		<a title="<?=$name ?>demo page" onclick="popupWindow('<?=$demoURL?>',900,600,1,1,0)">Page Demo</a>
		<?php echo "</form></p></li>";
		if($totalRecored != $counter){
		}
	}
}
?>
</ul>
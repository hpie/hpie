<script type ='text/javascript'>
function checkDomain(nname){
var arr = new Array(
'.com','.net','.org','.biz','.coop','.info','.museum','.name',
'.pro','.edu','.gov','.int','.mil','.ac','.ad','.ae','.af','.ag',
'.ai','.al','.am','.an','.ao','.aq','.ar','.as','.at','.au','.aw',
'.az','.ba','.bb','.bd','.be','.bf','.bg','.bh','.bi','.bj','.bm',
'.bn','.bo','.br','.bs','.bt','.bv','.bw','.by','.bz','.ca','.cc',
'.cd','.cf','.cg','.ch','.ci','.ck','.cl','.cm','.cn','.co','.cr',
'.cu','.cv','.cx','.cy','.cz','.de','.dj','.dk','.dm','.do','.dz',
'.ec','.ee','.eg','.eh','.er','.es','.et','.fi','.fj','.fk','.fm',
'.fo','.fr','.ga','.gd','.ge','.gf','.gg','.gh','.gi','.gl','.gm',
'.gn','.gp','.gq','.gr','.gs','.gt','.gu','.gv','.gy','.hk','.hm',
'.hn','.hr','.ht','.hu','.id','.ie','.il','.im','.in','.io','.iq',
'.ir','.is','.it','.je','.jm','.jo','.jp','.ke','.kg','.kh','.ki',
'.km','.kn','.kp','.kr','.kw','.ky','.kz','.la','.lb','.lc','.li',
'.lk','.lr','.ls','.lt','.lu','.lv','.ly','.ma','.mc','.md','.mg',
'.mh','.mk','.ml','.mm','.mn','.mo','.mp','.mq','.mr','.ms','.mt',
'.mu','.mv','.mw','.mx','.my','.mz','.na','.nc','.ne','.nf','.ng',
'.ni','.nl','.no','.np','.nr','.nu','.nz','.om','.pa','.pe','.pf',
'.pg','.ph','.pk','.pl','.pm','.pn','.pr','.ps','.pt','.pw','.py',
'.qa','.re','.ro','.rw','.ru','.sa','.sb','.sc','.sd','.se','.sg',
'.sh','.si','.sj','.sk','.sl','.sm','.sn','.so','.sr','.st','.sv',
'.sy','.sz','.tc','.td','.tf','.tg','.th','.tj','.tk','.tm','.tn',
'.to','.tp','.tr','.tt','.tv','.tw','.tz','.ua','.ug','.uk','.um',
'.us','.uy','.uz','.va','.vc','.ve','.vg','.vi','.vn','.vu','.ws',
'.wf','.ye','.yt','.yu','.za','.zm','.zw');

var mai = nname;
var val = true;

var dot = mai.lastIndexOf(".");
var dname = mai.substring(0,dot);
var ext = mai.substring(dot,mai.length);
//alert(ext);
	
if(dot>2 && dot<57)
{
	for(var i=0; i<arr.length; i++)
	{
	  if(ext == arr[i])
	  {
	 	val = true;
		break;
	  }	
	  else
	  {
	 	val = false;
	  }
	}
	if(val == false)
	{
	  	return "\nYour domain extension "+ext+" is not correct";
	}
	else
	{
		for(var j=0; j<dname.length; j++)
		{
		  var dh = dname.charAt(j);
		  var hh = dh.charCodeAt(0);
		  if((hh > 47 && hh<59) || (hh > 64 && hh<91) || (hh > 96 && hh<123) || hh==45 || hh==46)
		  {
			 if((j==0 || j==dname.length-1) && hh == 45)	
		  	 {
				return "\nDomain name should not begin are end with '-'";
		 	 }
		  }
		else{
		  	return "\nYour domain name should not have special characters";
		  }
		}
	}
}
else{
	return "\nYour Domain name is not valid";
}	
return true;
}

function validate_ftp_form(){
	var strError = "Please correct the following error";
	var errorStatus = false;

	var ftp_server = document.getElementById('ftp_server').value;	
	var ftp_user_name = document.getElementById('ftp_user_name').value;	
	var ftp_user_pass = document.getElementById('ftp_user_pass').value;	
	var destination_dir = document.getElementById('destination_dir').value;	
	var ftp_option;
	

	if(valButton(step3.ftp_option) == null){
		errorStatus = true;
		strError +="\nYou forgot to choose option, please choose";
	}else{
		ftp_option = valButton(step3.ftp_option);
	}
	if(ftp_server == ""){
		errorStatus = true;
		strError +="\nYou forgot to enter ftp server name, please enter";
	}else if(checkDomain(ftp_server) != true){
		errorStatus = true;
		strError += checkDomain(ftp_server);
	}
	if(ftp_user_name == ""){
		errorStatus = true;
		strError +="\nYou forgot to enter ftp user name, please enter";
	}
	if(ftp_user_pass == ""){
		errorStatus = true;
		strError +="\nYou forgot to enter ftp password, please enter";
	}
	if(ftp_option == 3 && destination_dir == ""){
		errorStatus = true;
		strError +="\nYou forgot to enter destination directory, please enter";
	}
	if(errorStatus){
		alert(strError);
		return false;
	}else{
		return true;
	}	
}

function showHideDiv(div_option){
	var divstyle = new String();
	//divstyle = document.getElementById("div1").style.display;
	if(div_option != 3){
		document.getElementById("div1").style.display = "none";
	}else{
		document.getElementById("div1").style.display = "block";
	}
}

function valButton(btn) {
    var cnt = -1;
    for (var i=btn.length-1; i > -1; i--) {
        if (btn[i].checked) {cnt = i; i = -1;}
    }
    if (cnt > -1) return btn[cnt].value;
    else return null;
}
 </script>                  
<img src="images/step3.gif" name="step" id="step" />
<br/>
<?php if($errorFTPConnection != "")echo"<font class='error'>".$errorFTPConnection."</font>"?>
<h2 class="heading">Enter your FTP Details</h2>
<form name ='step3' id='step3' method ='POST' action ='' onsubmit='return validate_ftp_form();'>
<table width ='98%' align ='center' cellpadding ='0' cellspacing ='0' border ='0'>
<tr>
	<td align ='center' valign ='top' colspan ='2'><?php 	echo "<a style ='cursor:pointer' onclick=\"window.open('$page_name','','width=500,height=500,scrollbars=yes')\"><img src ='images/temp_view.gif'></a><br/><br/>";?></td>
</tr>
<tr>
	<td align ='left' valign ='top' class='label' colspan ='2'>Please choose an option to upload your page:</td>
</tr>
<tr>
	<td align ='right' width='25%'><input type ='radio' name ='ftp_option' id ='ftp_option' value ='1' onclick="showHideDiv(1)"></td>
	<td align ='left' valign ='top' class='small_text'>Option 1<br/> 
		The page will be installed in the following format "<b>www.yourdomain.com</b>" CAUTIONS this means if you already have a website up it will erase it if thats the case then chooses option 2 or 3.
</td>
</tr>
<tr>
	<td align ='right'><input type ='radio' name ='ftp_option' id ='ftp_option' value ='2' onclick="showHideDiv(2)"></td>
<td align='left' valign ='top' class='small_text'>Option 2 <br/>The page will be installed in the following format "<b>www.yourdomain.com/yourwebinatorpage.html</b>"
</td>
</tr>
<tr>
	<td align ='right'>
		<input type ='radio' name ='ftp_option' id ='ftp_option' value ='3' onclick="showHideDiv(3)">
	</td>
<td align ='left' valign ='top' class='small_text'>Option 3 <br/>Choose this option if you want your webinator pages stored into one folder. You will need to create a folder on your server first (click here to see how) The page will be installed in the following format "<b>www.yourdomain.com/folder/yourwebinatorpage.html</b>"
	</td>
</tr>
<tr>
	<td align ='left' valign ='top' class='label'>Ftp Server :</td>
	<td align ='left' valign ='top'><input type ='text' name ='ftp_server' id ='ftp_server' size='60' maxlength='255' value ='<?=$ftp_server;?>'></td>
</tr>
<tr>
	<td align ='left' valign ='top' class='label'>Ftp User Name :</td>
	<td align ='left' valign ='top'><input type ='text' name ='ftp_user_name' id ='ftp_user_name' size='60' maxlength='255' value ='<?=$ftp_user_name;?>'></td>
</tr>
<tr>
	<td align ='left' valign ='top' class='label'>Ftp User Password :</td>
	<td align ='left' valign ='top'><input type ='text' name ='ftp_user_pass' id ='ftp_user_pass' size='60' maxlength='255' value ='<?=$ftp_user_pass;?>'></td>
</tr>
<tr>
<td colspan ='2' width ='100%'>
<div id ='div1' style ='display:none;border:0px solid #ff0000;'>
	<table width ='100%' border ='0' cellpadding ='0' cellspacing ='0'>
	<td align ='left' valign ='top' class='label' width='25%'>Destination Directory :</td>
	<td align ='left' valign ='top'><input type ='text' name ='destination_dir' id ='destination_dir' size='60' maxlength='255' value ='<?=$destination_dir;?>'></td>
	</tr>
</table>
</div>
</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td align ='left' valign ='top'>
		<input type ='hidden' name ='templates_id' value ='<?=$templates_id?>'>
		<input type ='hidden' name ='sqeeze_page_id' value ='<?=$id?>'>
		<input type ='hidden' name ='step3Submitted' value ='1'>
		<input type ='submit' name ='step3Submitted' value ='Upload Page to server'>		
	</td>
</tr>
</table>
</form>
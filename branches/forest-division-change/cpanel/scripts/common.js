function change_type(type){
	window.location.href='categories.php?type='+type;
}
function set_featured(id,isFeatured){
	var url = 'set_featured.php';
	var pars = 'id='+id+'&isFeatured='+isFeatured;
	//var target = 'featured_'+id;	
	var target = 'show_data';	
	var myAjax = new Ajax.Updater(target, url, {method: 'get', parameters: pars});
}
/*
function get_video_detail(id){
	var url = 'fetch_video.php';
	var pars = 'id='+id;
	//var target = 'featured_'+id;	
	var target = 'show_video_data';	
	var myAjax = new Ajax.Updater(target, url, {method: 'get', parameters: pars});
}
*/

 function get_video_detail(id) {  
	var url = 'fetch_video.php';
	var pars = 'id='+id;
   var aj = new Ajax.Request(  
   url, {  
    method:'get',   
    parameters: pars,   
    onComplete: getResponse  
    }  
   );  
 }
 /* ajax.Response */  
 function getResponse(oReq) {  
	 alert(oReq.responseText);
   $('show_video_data').innerHTML = oReq.responseText;  
 }  

function validateLoginForm(){
	var login_name	= document.getElementById("login_name").value;
	var password	= document.getElementById("password").value;
	var errorStatus = false;
	var errorMsg	= "";

	if(login_name == "" || login_name == null){
		errorStatus = true;
		errorMsg	= "Please Enter the Login Name\n";
	}
	if(password == "" || password == null){
		errorStatus = true;
		errorMsg	+= "Please Enter the Password\n";
	}
	if(errorStatus){
		alert(errorMsg);
		return false;
	}else{
		return true;
	}
}

function deleteRecord(id,label,name,stage){
	deleteStatus	= window.confirm("R U sure to delete "+label+" ? "+name);
	if(deleteStatus){
		window.location.href='delete_record.php?id='+id+'&stage='+stage;
	}
}
		
function Check(chk,form_name){	
	if(form_name =='manageProductAttribute'){
		var temp = document.manageProductAttribute.Check_ctr.checked==true
	}
	if(form_name =='manageJobs'){
		var temp = document.manageJobs.Check_ctr.checked==true
	}
	if(form_name =='manageJobSeekers'){
		var temp = document.manageJobSeekers.Check_ctr.checked==true
	}
	if(form_name =='managePages'){
		var temp = document.managePages.Check_ctr.checked==true
	}
	if(form_name =='manageCategory'){
		var temp = document.manageCategory.Check_ctr.checked==true
	}
	if(form_name =='manageEvents'){
		var temp = document.manageEvents.Check_ctr.checked==true
	}
	if(temp){
		for (i = 0; i < chk.length; i++)
			chk[i].checked = true ;
	}else{
		for (i = 0; i < chk.length; i++)
			chk[i].checked = false ;
	}
}

PositionX = 100;
PositionY = 100;
defaultWidth  = 500;
defaultHeight = 500;

var AutoClose = true;

// Do not edit below this line...
// ================================
if (parseInt(navigator.appVersion.charAt(0))>=4){
var isNN=(navigator.appName=="Netscape")?1:0;
var isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}
var optNN='scrollbars=no,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
var optIE='scrollbars=no,width=150,height=100,left='+PositionX+',top='+PositionY;
function popImage(imageURL,imageTitle){
	if (isNN){imgWin=window.open('about:blank','',optNN);}
	if (isIE){imgWin=window.open('about:blank','',optIE);}
	with (imgWin.document){
		writeln('<html><head><title>Loading...</title><style>body{margin:0px;}</style>');writeln('<sc'+'ript>');
		writeln('var isNN,isIE;');writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
		writeln('isNN=(navigator.appName=="Netscape")?1:0;');writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
		writeln('function reSizeToImage(){');writeln('if (isIE){');writeln('window.resizeTo(300,300);');
		writeln('width=300-(document.body.clientWidth-document.images[0].width);');
		writeln('height=300-(document.body.clientHeight-document.images[0].height);');
		writeln('window.resizeTo(width,height);}');writeln('if (isNN){');       
		writeln('window.innerWidth=document.images["George"].width;');writeln('window.innerHeight=document.images["George"].height;}}');
		writeln('function doTitle(){document.title="'+imageTitle+'";}');writeln('</sc'+'ript>');
		if (!AutoClose) writeln('</head><body bgcolor=000000 scroll="no" onload="reSizeToImage();doTitle();self.focus()">')
		else writeln('</head><body bgcolor=000000 scroll="no" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
		writeln('<img name="George" src='+imageURL+' style="display:block"></body></html>');
		close();		
	}
}

function popupWindow(strURL,strWidth,strHeight,resize,scroll,toolbar){
	var strToolbar		= 0;
	var	strScrollbars	= 0;
	var strResizeable	= 0;
	if(toolbar){
		strToolbar = 1;
	}
	if(resize){
		strResizeable	= 1;
	}
	if(scroll){
		strScrollbars	= 1;
	}
	window.open(strURL,"","toolbar="+strToolbar+",scrollbars="+strScrollbars+",resizable="+strResizeable+",width="+strWidth+",height="+strHeight);
}


function getCategoryWiseProduct(catID,productID){
	window.location.href = "add_related_product.php?product_id="+productID+"&cat_id="+catID;
}
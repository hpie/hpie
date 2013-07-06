document.onmousemove=getMouseCoordinates;
var x;
var y;
function getMouseCoordinates(event)
{
ev = event || window.event;
x=ev.pageX;
y=ev.pageY;
}
function loadContractorDetail(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
   }
else
   {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
  xmlhttp.onreadystatechange=function()
   {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	  document.getElementById("contractorDetail").style.display="block";
	  document.getElementById("contractorDetail").style.top=y+"px";
	  document.getElementById("contractorDetail").style.left=x+"px";
	  
      document.getElementById("contractorDetail").innerHTML=xmlhttp.responseText;
    }
  }
  var fileCall='ajax_call.php?get=getContractor&id='+id;
  
  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}
function closeDec()
{
	document.getElementById("contractorDetail").style.display="none";	
}

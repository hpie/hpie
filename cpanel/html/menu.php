<HTML>
<HEAD>
  <STYLE>
    BODY {
      background-color: #D2EDF6;}
    TD {
      font-size: 10pt;
      font-family: verdana,helvetica;
      text-decoration: none;
      white-space:nowrap;}
    A {
      text-decoration: none;
      color: black;}
    .specialClass {
      font-family: verdana,helvetica;
      font-size:12pt;
      color:green;
      font-weight:bold;
      text-decoration:underline}
  </STYLE>
  <SCRIPT src="../scripts/ua.js"></SCRIPT>
  <SCRIPT src="../scripts/ftiens4.js"></SCRIPT>
  <script>
USETEXTLINKS = 1
STARTALLOPEN = 0
ICONPATH = '../images/'
</script>
<?php
include('../html/admin_links.php');
echo "<script>foldersTree = gFld(\"<b><font style='font-size:13px;color:#000000;font-family: verdana,helvetica;'>Admin Panel </font></b>\",\"\")</script>";
echo "<script>foldersTree.treeID = 'Frameset'</script>";
 
foreach($topLinks as $key=>$value)
{
	$mLink = explode("|",$value);
	$mTitle = $mLink[0];
	$mPath =  $mLink[1];
	$linkID = "links_".$key;
	$a_links =$$linkID;
	
	echo "<script>aux$key = insFld(foldersTree, gFld(\"<font style ='color:#000000;font-size:11px;font-family: verdana,helvetica;'><b>$mTitle</b>\</font>\", \"$mPath\"))</script>";
	if(is_array($a_links))
	{
		while(list($cKey,$cValue) =each($a_links))
		{
			
			$cLink = explode("|",$cValue);
			$cTitle = $cLink[0];
			$cPath = $cLink[1];
			echo "<script>insDoc(aux$key, gLnk(\"R\", \"<font style ='color:#000000;font-size:11px;font-family: verdana,helvetica;'>$cTitle</font>\", \"$cPath\"))</script>";
		}
	}
}
 
?>
<script>
</script>
 </HEAD>
 <BODY topmargin="5" marginheight="5">
  <SCRIPT>initializeDocument()</SCRIPT>
  <NOSCRIPT>
   A tree for site navigation will open here if you enable JavaScript in your browser.
  </NOSCRIPT>

 </BODY>

</HTML>

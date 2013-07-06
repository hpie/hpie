<?php 

if (isset($_POST['sendToValue'])){
	$value = $_POST['sendToValue'];	

 
$i=1;
if($value!="")
echo 'Enter the Mannual Carriage Details<table><tr><td><strong>Quantity in Qtls</strong></td><td><strong>Distance in KMS.</strong></td></tr>';
while($i<=$value)
{
echo '<tr><td>
<input type="text" name="man'.$i.'Q"></td><td>

<input type="text" name="man'.$i.'D"></td></tr>';
$i++;


}
echo '</table><input type="Hidden" name="numman" value="'.$value.'" />';
echo '';

}
?>
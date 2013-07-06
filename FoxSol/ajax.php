<?php 

if (isset($_POST['sendToValue'])){
	$value = $_POST['sendToValue'];	

 
$i=1;
echo '<tr><td><strong>Quantity in Qtls</strong></td><td><strong>Distance in KMS.</strong></td></tr>';
while($i<=$value)
{
echo '<tr><td>
<input type="text" name="man'.$i.'Q"></td><td>

<input type="text" name="man'.$i.'D"></td></tr>';
$i++;


}
echo '<input type="Hidden" name="num" value="'.$value.'" />';
echo '';

}
?>
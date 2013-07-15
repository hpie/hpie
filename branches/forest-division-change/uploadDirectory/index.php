<?php
$filePath=$_GET['filePath'];
echo 'inside curl';
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);

//curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_URL,"http://localhost/fileUpload/upload_file.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");

curl_setopt($ch, CURLOPT_POST, 1);
// same as <input type="file" name="file_box">
$post = array("file"=>"@".$filePath);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$response = curl_exec($ch);
echo '<br>inside curl'.$response;

?>
<?php
// create a new cURL resource
/*
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://localhost/fileUpload/upload_file.php");
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
echo  curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
*/
?> 
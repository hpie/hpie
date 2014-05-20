<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Communication Details Forms</title>
<link rel="stylesheet" href="css/style.css" />

<link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
<!--[if IE]>
  <script src="js/html5.js"></script>
<![endif]-->
    <script src="js/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.uniform.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input:checkbox, input:radio, input:file, select").uniform();
      });
    </script>
	<script src="js/jquery.form-validator.min.js"></script>
</head>
<body>
<article>
<h2>Employee Communication Details Information</h2>
<form id="third">
	<ul>
        <li>
            <label for="USRTY">Address type:</label>
            <select id="USRTY">
                <option value="0010">E-mail</option>
				<option value="0020">Office Number</option>
				<option value="0030">Private E-Mail Address</option>
				<option value="CELL">Cell Phone</option>
            </select>
        </li>
        <li>
        	<label for="USRID">ID/ Number:</label>
            <input type="text" size="30" id="USRID" data-validation-help="Please enter ID/ Number"   />
        </li>
		<li>
        	<label for="USRID_LONG">Telephone/ ID/ Number:</label>
            <input type="text" size="241" id="USRID_LONG" data-validation-help="Please enter Telephone/ ID/ Number" data-validation="required" data-validation-error-msg="Telephone/ ID/ Number is required" />
        </li>
	</ul>
	
	<p>
        <button type="submit" class="action">Submit</button>
        <button type="reset" class="right">Reset</button>
    </p>
</form>
</article>
<footer>

</footer>

<script>
 
  $.validate({
    
  });
 
  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );
 
</script>
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Additional Personal Info Forms</title>
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
<h2>Employee Additional Personal Information</h2>
<form id="third">
	<ul>
        <li>
            <label for="RACKY">Ethnic Origin:</label>
            <select id="RACKY">
                <option value="Z1">GEN</option>
				<option value="Z2">SC</option>
				<option value="Z3">ST</option>
				<option value="Z4">OBC</option>
            </select>
        </li>
		<li>
            <label for="Military Status">Military Status:</label>
            <select id="Military Status">
                <option value="90">Ex-Serviceman</option>
            </select>
        </li>
		 <li>
        	<label for="DISLE">Disability Date Learned by Employer(DD.MM.YYYY):</label>
            <input type="text" size="40" id="DISLE" data-validation-help="Please enter Disability Date Learned by Employer"/>
        </li>
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
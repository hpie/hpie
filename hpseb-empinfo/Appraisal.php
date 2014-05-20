<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Appraisal Forms</title>
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
<h2>Employee Appraisal Information</h2>
<form id="third">
	<ul>
        <li>
            <label for="RATING">Appraisal Rating:</label>
            <select id="RATING">
                <option value="1">Poor</option>
				<option value="2">Average</option>
				<option value="3">Good</option>
				<option value="4">Very Good</option>
				<option value="5">Outstanding</option>
            </select>
        </li>
		<li>
            <label for="FFP">Fit for Promotion:</label>
            <select id="FFP">
                <option value="1">Not Yet Fit</option>
				<option value="2">Fit for Promotion</option>
				<option value="3">Fit for Promotion Out of Turn</option>
            </select>
        </li>
        <li>
        	<label for="Accepting Authority EE no">Personnel Number:</label>
            <input type="text" size="8" id="Accepting Authority EE no" />
        </li>
		<li>
        	<label for="Appraisal remarks">Appraisal Remarks of Accepting Authority:</label>
            <input type="text" size="255" id="Appraisal remarks" />
        </li>
		<li>
        	<label for="Adverse Remarks Applicability">Adverse Remarks Applicability(Y/N):</label>
            <input type="text" size="1" id="Adverse Remarks Applicability" />
        </li>
		<li>
        	<label for="Adverse Remarks">Adverse Remarks :</label>
            <input type="text" size="255" id="Adverse Remarks" />
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
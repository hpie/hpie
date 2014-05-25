<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Forms</title>
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
<h2>Employee Information</h2>
<form id="third">
	<ul>
        <li>
        	<label for="name">First Name:</label>
            <input type="text" size="40" id="fname" data-validation-help="Please enter First Name" data-validation="required" data-validation-error-msg="First Name is required"/>
        </li>
        <li>
        	<label for="lname">Last Name:</label>
            <input type="text" size="40" id="lname" data-validation-help="Please enter Last Name" data-validation="required" data-validation-error-msg="Last Name is required"/>
        </li>
        
        <li>
        	<label for="panno">PAN No:</label>
            <input type="text" size="40" id="panno" data-validation-help="Please enter PAN No" data-validation="required" data-validation-error-msg="PAN No. is required"/>
        </li>
        <li>
        	<label for="gpfno">GPF No:</label>
            <input type="text" size="40" id="gpfno" data-validation-help="Please enter GPF No" data-validation="required" data-validation-error-msg="Last Name is required"/>
        </li>
        <li>
        	<label for="cpsno">CPS No:</label>
            <input type="text" size="40" id="cpsno" data-validation-help="Please enter CPS No" data-validation="required" data-validation-error-msg="Last Name is required"/>
        </li>
        
        <li>
        	<label for="dob">Date of Birth:</label>
            <input type="text" size="40" id="dob" data-validation-help="Please enter Date of Birth" data-validation="required" data-validation-error-msg="PAN No. is required"/>
        </li>
        
        <li>
        	<label for="mobileno">Personal No:</label>
            <input type="text" size="40" id="mobile" data-validation-help="Please enter Personal No" data-validation="required" data-validation-error-msg="Last Name is required"/>
        </li>
        <li>
        	<label for="begda">BEGDA:</label>
            <input type="text" size="40" id=""begda"" data-validation-help="Please enter Begin Date" data-validation="required date" data-validation-error-msg="Last Name is required"/>
        </li>
        <li>
        	<label for="endda">ENDDA:</label>
            <input type="text" size="40" id=""endda"" data-validation-help="Please enter End Date" data-validation="required date" data-validation-error-msg="Last Name is required"/>
        </li>
        
        <li>
            <label><input type="radio" name="challangeGroup" value="Z1"/>Recruited on Merit</label>
            <label><input type="radio" name="challangeGroup" value="Z2"/>Disability in Service</label>
        </li>
        <li>
            <label for="challangeType">Challange Type:</label>
            <select id="challangeType">
                <option value="Z1">Visual Impairment</option>
				<option value="Z2">Hearing Impairment</option>
				<option value="Z3">Speech Impairment</option>
				<option value="Z4">PhysicallyChallenged</option>
				<option value="Z5">Others</option>
            </select>
        </li>

        <li>
			<label><input type="checkbox" /> Agree ?</label>
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

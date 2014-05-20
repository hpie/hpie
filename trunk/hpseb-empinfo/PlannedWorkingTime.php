<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Planned Working Time Forms</title>
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
<h2>Employee Planned Working Time Information</h2>
<form id="third">
	<ul>
        <li>
            <label for="SCHKZ">Address type:</label>
            <select id="SCHKZ" data-validation-help="Please enter House number"  data-validation="required" data-validation-error-msg="Work Schedule Rule">
			<option value="HPNORM">HPSEB Normal Shift</option>
			<option value="HPWSRDF">HP Female Daily Wage</option>
			<option value="HPWSRDM">HP Male Daily Wage</option>
			<option value="HPWSRF">HP Female Regular Wrk Chg</option>
			<option value="HPWSRM">HP Male Regular Wrk Chrge</option>
			<option value="HPWSRPT">HP Part-Time employees</option>
			<option value="WSRCF">HP Female Contractual</option>
			<option value="WSRCM">HP Male Contractual</option>
			<option value="WSRFES">HPSEB Fri Evening Shift</option>
			<option value="WSRFMS">HPSEB Fri Morning Shift</option>
			<option value="WSRFNS">HPSEB Fri night Shift</option>
			<option value="WSRMAS">HPSEB Mon Evening Shift</option>
			<option value="WSRMMS">HPSEB Mon Morning Shift</option>
			<option value="WSRMNS">HPSEB Mon night Shift</option>
			<option value="WSRSAES">HPSEB Sat Evening Shift</option>
			<option value="WSRSAMS">HPSEB Sat Morning Shift</option>
			<option value="WSRSANS">HPSEB Sat night Shift</option>
			<option value="WSRSUES">HPSEB Sun Evening Shift</option>
			<option value="WSRSUMS">HPSEB Sun Morning Shift</option>
			<option value="WSRSUNS">HPSEB Sun night Shift</option>
			<option value="WSRTES">HPSEB Tue Evening Shift</option>
			<option value="WSRTHM">HPSEB Thur Morning Shift</option>
			<option value="WSRTHNS">HPSEB Thur night Shift</option>
			<option value="WSRTHS">HPSEB Thur Evening Shift</option>
			<option value="WSRTMS">HPSEB Tue Morning Shift</option>
			<option value="WSRTNS">HPSEB Tue night Shift</option>
			<option value="WSRWES">HPSEB Wed Evening Shift</option>
			<option value="WSRWMS">HPSEB Wed Morning Shift</option>
			<option value="WSRWNS">HPSEB Wed night Shift</option>
            </select>
        </li>
        <li>
        	<label for="ZTERF">Time Mgmt Status:</label>
            <input type="text" size="1" id="ZTERF" data-validation-help="Please enter House number" data-validation-error-msg="Work Schedule Rule" />
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
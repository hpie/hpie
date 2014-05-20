<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Address Forms</title>
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
<h2>Employee Address Information</h2>
<form id="third">
	<ul>
        <li>
            <label for="Addresstype">Address type:</label>
            <select id="Addresstype">
                <option value="1">Permanent Residence</option>
				<option value="3">Present Residence</option>
				<option value="5">Mailing address</option>
				<option value="Z1">Address on Deputation</option>
            </select>
        </li>
        <li>
        	<label for="C/O">C/O:</label>
            <input type="text" size="40" id="C/O" data-validation-help="Please enter C/O"  data-validation-help="Please enter Postal code" />
        </li>
		<li>
        	<label for="House number">House number:</label>
            <input type="text" size="60" id="House number" />
        </li>
		<li>
        	<label for="Address line 2">Address line 2:</label>
            <input type="text" size="40" id="Address line 2"  data-validation-help="Please enter Postal code" />
        </li>
		<li>
        	<label for="Postal code">Postal code:</label>
            <input type="text" size="10" id="Postal code" data-validation-help="Please enter Postal code" data-validation="required" data-validation-error-msg="Postal code is required"/>
        </li>
		<li>
        	<label for="City">City:</label>
            <input type="text" size="40" id="City" data-validation-help="Please enter City" data-validation="required" data-validation-error-msg="City is required"/>
        </li>
		<li>
        	<label for="District">District:</label>
            <input type="text" size="40" id="District" data-validation-help="Please enter District" data-validation="required" data-validation-error-msg="District is required"/>
		</li>
        <li>
            <label for="Region">Region:</label>
            <select id="Region">
			<option value="01">Andra Pradesh</option>
			<option value="02">Arunachal Pradesh</option>
			<option value="03">Assam</option>
			<option value="04">Bihar</option>
			<option value="05">Goa</option>
			<option value="06">Gujarat</option>
			<option value="07">Haryana</option>
			<option value="08">Himachal Pradesh</option>
			<option value="09">Jammu und Kashmir</option>
			<option value="10">Karnataka</option>
			<option value="11">Kerala</option>
			<option value="12">Madhya Pradesh</option>
			<option value="13">Maharashtra</option>
			<option value="14">Manipur</option>
			<option value="15">Megalaya</option>
			<option value="16">Mizoram</option>
			<option value="17">Nagaland</option>
			<option value="18">Orissa</option>
			<option value="19">Punjab</option>
			<option value="20">Rajasthan</option>
			<option value="21">Sikkim</option>
			<option value="22">Tamil Nadu</option>
			<option value="23">Tripura</option>
			<option value="24">Uttar Pradesh</option>
			<option value="25">West Bengal</option>
			<option value="26">Andaman und Nico.In.</option>
			<option value="27">Chandigarh</option>
			<option value="28">Dadra und Nagar Hav.</option>
			<option value="29">Daman und Diu</option>
			<option value="30">Delhi</option>
			<option value="31">Lakshadweep</option>
			<option value="32">Pondicherry</option>
			<option value="33">Chhaattisgarh</option>
			<option value="34">Jharkhand</option>
			<option value="35">Uttaranchal</option>  </select>
        </li>
		<li>
        	<label for="Country">Country</label>
            <input type="text" size="3" id="Country" value="IN"/>
		</li>
		<li>
        	<label for="Telephone">Telephone</label>
            <input type="text" size="14" id="Telephone" data-validation-help="Please enter Telephone#" data-validation="required" data-validation-error-msg=" Telephone Number is required"/>
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
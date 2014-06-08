<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_education_details SET
		EDUCATION_ESTABLISHMENT_CODE='".$_POST['EDUCATION_ESTABLISHMENT_CODE']."',
		EDUCATION_TRAINING_INSTITUTE= '".$_POST['EDUCATION_TRAINING_INSTITUTE']."',
		EDUCATION_COURSE_LOCATION= '".$_POST['EDUCATION_COURSE_LOCATION']."',
		EDUCATION_COUNTRY_CODE= '".$_POST['EDUCATION_COUNTRY_CODE']."',
		EDUCATION_CERTIFICATE_CODE= '".$_POST['EDUCATION_CERTIFICATE_CODE']."',
		EDUCATION_COURSE_DURATION= '".$_POST['EDUCATION_COURSE_DURATION']."',
		EDUCATION_COURSE_DURATION_UNITS= '".$_POST['EDUCATION_COURSE_DURATION_UNITS']."',
		EDUCATION_COURSE_GRADE= '".$_POST['EDUCATION_COURSE_GRADE']."',
		EDUCATION_COURSE_DURATION= '".$_POST['EDUCATION_COURSE_DURATION']."',
		EDUCATION_COURSE_BRANCH_CODE= '".$_POST['EDUCATION_COURSE_BRANCH_CODE']."',
		EDUCATION_COURSE_BRANCH_CODE_UNIT= '".$_POST['EDUCATION_COURSE_BRANCH_CODE_UNIT']."',
		EDUCATION_INSTITUTE= '".$_POST['EDUCATION_INSTITUTE']."',
		EDUCATION_BEGIN_DT= '".$_POST['EDUCATION_BEGIN_DT']."',
		EDUCATION_END_DT= '".$_POST['EDUCATION_END_DT']."',
		STATUS= '".$_POST['status']."',
		MODIFIED_BY= '".$_POST['modified_by']."',
		MODIFIED_DATE==now()
		WHERE ROW_ID='".$_POST['rowid']."'");
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details Successfully Updated.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating Employee details. Please try again.";
			echo($_SESSION['msg']);
		}
		//Header("Location: receive-blazes.php");
	}else if($action=="save")
	{
		$db->query("INSERT INTO employee_education_details
		(  EMPLOYEE_ROW_ID, EDUCATION_ESTABLISHMENT_CODE,EDUCATION_TRAINING_INSTITUTE,EDUCATION_COURSE_LOCATION,EDUCATION_COUNTRY_CODE,EDUCATION_CERTIFICATE_CODE,EDUCATION_COURSE_DURATION, EDUCATION_COURSE_DURATION_UNITS, EDUCATION_COURSE_GRADE, EDUCATION_COURSE_DURATION, EDUCATION_COURSE_BRANCH_CODE, EDUCATION_COURSE_BRANCH_CODE_UNIT, EDUCATION_INSTITUTE, EDUCATION_BEGIN_DT, EDUCATION_END_DT STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['EDUCATION_ESTABLISHMENT_CODE']."', '".$_POST['EDUCATION_TRAINING_INSTITUTE']."', '".$_POST['EDUCATION_COURSE_LOCATION']."', '".$_POST['EDUCATION_COUNTRY_CODE']."', '".$_POST['EDUCATION_CERTIFICATE_CODE']."', '".$_POST['EDUCATION_COURSE_DURATION']."', '".$_POST['EDUCATION_COURSE_DURATION_UNITS']."',
		 '".$_POST['EDUCATION_COURSE_GRADE']."', '".$_POST['EDUCATION_COURSE_DURATION']."', '".$_POST['EDUCATION_COURSE_BRANCH_CODE']."', '".$_POST['EDUCATION_COURSE_BRANCH_CODE_UNIT']."', '".$_POST['EDUCATION_INSTITUTE']."', '".$_POST['EDUCATION_BEGIN_DT']."','".$_POST['EDUCATION_END_DT']."', '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating employee details. Please try again.";
			echo($_SESSION['msg']);
		}
		// Removed Header receive-blazes.php
	}else if($action=="Status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_education_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_education_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Active";
		}
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details status is now set to ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating employee details status. Please try again.";
			echo($_SESSION['msg']);
		}

	}else if($action=="delete")
	{
		$db->query("UPDATE employee_education_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");

		$status="deleted";
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details is now marked as ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating Employee. Please try again.";
			echo($_SESSION['msg']);
		}

	}




}// if submitted

?>

<!-- html head start -->
<?php include('includes/header.php'); ?>
<!-- html head  end-->


<body>

<h5>
	<div style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?>  <?php // echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php// echo($_SESSION['division']);?> .</font></div>
	<div style="float:right;">
    <?php 
		date_default_timezone_set('Asia/Calcutta');
		print date("jS F Y, g:i A");
	?>
	</div>
</h5>
<br />

<?php
	if($action=="create")
	{
?>	
<article>
<h2>Employee Education Information</h2>
<form action="education.php" method="post" id="employeeEducationForm">
	<ul>
        <li>
           <label for="EDUCATION_ESTABLISHMENT_CODE">EDUCATION ESTABLISHMENT CODE:</label>
           <select id="EDUCATION_ESTABLISHMENT_CODE" name="EDUCATION_ESTABLISHMENT_CODE"
            data-validation-help="Please enter education establish code" 
            data-validation="required" 
            data-validation-error-msg="Education establish code is required"/>
            <option value="01">Illiterate</option>
            <option value="02">Under Primary(< 5)</option>
            <option value="03">Under Middle(5 to 7)</option>
            <option value="04">Under Matric(8 to 9)</option>
            <option value="05">Matric Pass(X pass)</option>
            <option value="06">Prod Siksha</option>
            <option value="07">Prep</option>
            <option value="08">Plus One</option>
            <option value="09">Higher Second.(Pt-1)</option>
            <option value="10">Senior Second.(12th)</option>
            <option value="11">Graduation (T)</option>
            <option value="12">Graduation (NT)</option>
            <option value="13">Post Graduation (T)</option>
            <option value="14">Post Graduation (NT)</option>
            <option value="15">I.T.I</option>
            <option value="16">AMIE</option>
            <option value="17">Diploma (T)</option>
            <option value="18">Diploma (NT)</option>
            <option value="19">Certification</option>
            <option value="20">Doctorate</option>
            <option value="21">Professional Inter</option>
            <option value="22">Professional Final</option>
            <option value="23">Intra State Training</option>
            <option value="24">Inter State Training</option>
            <option value="25">Inhouse- HPSEB Training</option>
            <option value="26">Foreign Training</option>
            <option value="27">Departmental Exam</option>            
        </li>
        <li>
        	<label for="EDUCATION_TRAINING_INSTITUTE">EDUCATION TRAINING INSTITUTE:</label>
            <input type="text"
            size="80"
            id="EDUCATION_TRAINING_INSTITUTE" name="EDUCATION_TRAINING_INSTITUTE"
            data-validation-help="Please enter education training institute" 
            data-validation="required" 
            data-validation-error-msg="Education training institute is required"/>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_LOCATION">EDUCATION COURSE LOCATION:</label>
            <input type="text"
            size="80"
            id="EDUCATION_COURSE_LOCATION" name="EDUCATION_COURSE_LOCATION"
                data-validation-help="Please enter education course location" 
            data-validation="required" 
            data-validation-error-msg="Education course location is required"/>
        </li>
		<li>
        	<label for="EDUCATION_COUNTRY_CODE">EDUCATION COUNTRY CODE:</label>
            <select id="EDUCATION_COUNTRY_CODE"  name="EDUCATION_COUNTRY_CODE"
            data-validation-help="Please enter education country code" 
            data-validation="required" 
            data-validation-error-msg="Education country code is required"/>
            <option value="IN">India</option>
            <option value="NP">Nepal</option>
            </select>
        </li>
		<li>
        	<label for="EDUCATION_CERTIFICATE_CODE">EDUCATION CERTIFICATE CODE:</label>
            <select id="EDUCATION_CERTIFICATE_CODE" name="EDUCATION_CERTIFICATE_CODE"
            data-validation-help="Please enter education certificate code" 
            data-validation="required" 
            data-validation-error-msg="Education certificate code is required"/>
            <option value="00">Illiterate</option>
            <option value="00">II Std</option>
            <option value="00">III Std</option>
            <option value="00">IV Std</option>
            <option value="00">V Std</option>
            <option value="00">VI Std</option>
            <option value="00">VII Std</option>
            <option value="00">VIII Std</option>
            <option value="00">IX Std</option>
            <option value="00">I.C.S.E Board</option>
            <option value="00">C.B.S.E Board</option>
            <option value="00">State Board</option>
            <option value="00">Others</option>
            <option value="00">College/University</option>
            <option value="00">AMIE(Technical)</option>
            <option value="00">B Tech</option>
            <option value="00">B Tech (H)</option>
            <option value="00">BE</option>
            <option value="00">BE (H)</option>
            <option value="00">B Arch</option>
            <option value="00">BSC Engg</option>
            <option value="00">BSC Engg (H)</option>
            <option value="00">BS</option>
            <option value="00">B Com</option>
            <option value="00">B Ed</option>
            <option value="00">B Pharm</option>
            <option value="00">BA</option>
            <option value="00">BA (H)</option>
            <option value="00">BBA</option>
            <option value="00">BSC</option>
            <option value="00">BSC (H)</option>
            <option value="00">LLB</option>
            <option value="00">BIT</option>
            <option value="00">B Com </option>
            <option value="00">B Com (H)</option>
            <option value="00">M Tech</option>
            <option value="00">ME</option>
            <option value="00">MS</option>
            <option value="00">MSC Engg</option>
            <option value="00">MSC</option>
            <option value="00">M COM</option>
            <option value="00">M Pharmacy</option>
            <option value="00">M Phil</option>
            <option value="00">M PM&IR</option>
            <option value="00">M M S</option>
            <option value="00">MA</option>
            <option value="008">MBA</option>
            <option value="008">MCA</option>
            <option value="008">PGDBA</option>
            <option value="008">PGDCA</option>
            <option value="008">PGDM</option>
            <option value="008">PGDIM</option>
            <option value="008">PGHRM</option>
            <option value="008">NTC</option>
            <option value="008">Graduate Diploma</option>
            <option value="008">PG Diploma</option>
            <option value="008">Graduate</option>
            <option value="008">Post Graduate</option>
            <option value="008">Certificate Course</option>
            <option value="008">Ph. D</option>
            <option value="008">CA</option>
            <option value="008">CS</option>
            <option value="008">ICWA</option>
            <option value="008">CFA</option>
            <option value="008">Self Fin Cert.</option>
            <option value="008">Sponsored Cert.</option>
            <option value="008">Departmental Ex Passed</option>
            <option value="008">Departmental Ex Failed</option>
            </select>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_DURATION">EDUCATION COURSE DURATION:</label>
            <input type="text"
            size="4"
            id="EDUCATION_COURSE_DURATION" name="EDUCATION_COURSE_DURATION"
            data-validation-help="Please enter education course duration" 
            data-validation="required" 
            data-validation-error-msg="Education course duration required"/>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_DURATION_UNITS">EDUCATION COURSE DURATION UNITS:</label>
            <select id="EDUCATION_COURSE_DURATION_UNITS" name="EDUCATION_COURSE_DURATION_UNITS"
            data-validation-help="Please enter education course duration units" 
            data-validation="required" 
            data-validation-error-msg="Education course duration units is required"/>
            <option value="Y">Years</option>
            <option value="M">Months</option>
            <option value="D">Days</option>
            </select>
        </li>
        <li>
            <label for="EDUCATION_COURSE_GRADE">EDUCATION COURSE GRADE:</label>
            <input type="text"
            size="10" 
            id="EDUCATION_COURSE_GRADE" name="EDUCATION_COURSE_GRADE"
            data-validation-help="Please enter education course grade" 
            data-validation="required" 
            data-validation-error-msg="Education course grade is required"/>
        </li>
        <li>
        	<label for="EDUCATION_COURSE_BRANCH_CODE">EDUCATION COURSE BRANCH CODE:</label>
            <select 
            id="EDUCATION_COURSE_BRANCH_CODE" name="EDUCATION_COURSE_BRANCH_CODE"
            data-validation-help="Please enter education course branch code" 
            data-validation-error-msg="Education course branch code is required"/>
            <option value="1">Common Subjects</option>
            <option value="2">Science-Math</option>
            <option value="3">Science-Biology</option>
            <option value="4">Commerce-Accounts</option>
            <option value="5">Commerce-Economics</option>
            <option value="6">Arts</option>
            <option value="7">Electronics</option>
            <option value="8">Civil Engg</option>
            <option value="9">Computer Science</option>
            <option value="10">Electrical Engg</option>
            <option value="11">Electronics Engg</option>
            <option value="12">Mechanical Engg</option>
            <option value="13">Production Engg</option>
            <option value="14">Aerodynamics</option>
            <option value="15">Aeronautical Engg</option>
            <option value="16">Aerospace Engg</option>
            <option value="17">Applied Mechanics</option>
            <option value="18">Applied Physics</option>
            <option value="19">Applied Science</option>
            <option value="20">Architecture</option>
            <option value="21">Automobile Engg</option>
            <option value="22">Chemical Engg</option>
            <option value="23">Civil & Structural Engg</option>
            <option value="24">Computer Applications</option>
            <option value="25">Computer Programming</option>
            <option value="26">Computers & Communications</option>
            <option value="27">Digital Communications</option>
            <option value="28">Electrical</option>
            <option value="29">Electrical & Electronics</option>
            <option value="30">Electrical & Mech</option>
            <option value="31">Electronics & Communications</option>
            <option value="32">Electronics & Telecommunications</option>
            <option value="33">Engg Materials</option>
            <option value="34">Engineering Equpiments</option>
            <option value="35">Geology</option>
            <option value="36">Indl Engg</option>
            <option value="37">Indl Eqpt Design</option>
            <option value="38">Industrial & Production Engg</option>
            <option value="39">Information Technology</option>
            <option value="40">Instrumentation</option>
            <option value="41">Machine Tool Engg</option>
            <option value="42">Manufacturing Tech</option>
            <option value="43">Material Mgt</option>
            <option value="44">Mechanical</option>
            <option value="45">Metallurgy</option>
            <option value="46">Quality Assuarance</option>
            <option value="47">Telecom Engg</option>
            <option value="48">Welding Technology</option>
            <option value="49">Computer Aided Design</option>
            <option value="50">Machine Design</option>
            <option value="51">Manufacturing Management</option>
            <option value="52">Material Science</option>
            <option value="53">Production Management</option>
            <option value="54">Project Management</option>
            <option value="55">Software System</option>
            <option value="56">Electronics & Instrumentation</option>
            <option value="57">Others</option>
            <option value="58">Commerce</option>
            <option value="59">Pharmacy</option>
            <option value="60">Advertising & PR</option>
            <option value="61">Banking</option>
            <option value="62">Bio-Chemistry</option>
            <option value="63">Biology</option>
            <option value="64">Business Admn (Finance)</option>
            <option value="65">Business Admn (Marketing)</option>
            <option value="66">Business Admn (Personnel)</option>
            <option value="67">Business Finance</option>
            <option value="68">Communication</option>
            <option value="69">Economics</option>
            <option value="70">English</option>
            <option value="71">Finance</option>
            <option value="72">Finance & Costing</option>
            <option value="73">Foreign Trade</option>
            <option value="74">Hotel Management</option>
            <option value="75">Human Resource Mgt</option>
            <option value="76">Journalism & Mass Communication</option>
            <option value="77">Labour Laws</option>
            <option value="78">Law</option>
            <option value="79">Management</option>
            <option value="80">Marketing</option>
            <option value="81">Mathematics</option>
            <option value="82">Science</option>
            <option value="83">Social Science</option>
            <option value="84">Sociology</option>
            <option value="85">Statistics</option>
            <option value="86">Training & Devt</option>
            <option value="87">Accountancy</option>
            <option value="88">Defence Studies</option>
            <option value="89">Mass Communication</option>
            <option value="90">Operations Management</option>
            <option value="91">Personnel Mgt & Labour Law</option>
            <option value="92">Home Science</option>
            <option value="93">Public Relations</option>
            <option value="94">Engg Management</option>
            <option value="95">Fluid Mechanics</option>
            <option value="96">Marine Engg</option>
            <option value="97">Tool Design</option>
            <option value="98">Computer Engg</option>
            <option value="99">Maintenance Management</option>
            <option value="100">Heavy Electrical Equipment</option>
            <option value="101">Electrical Communications</option>
            <option value="102">Electrical Machines</option>
            <option value="103">Hindi</option>
            <option value="104">Business Admn</option>
            <option value="105">Business Admn (HR)</option>
            <option value="106">Costing</option>
            <option value="107">Financial Management</option>
            <option value="108">Human Resource Devt</option>
            <option value="109">Indl Relations</option>
            <option value="110">Journalism</option>
            <option value="111">Operations</option>
            <option value="112">Personnel Management</option>
            <option value="113">Political Science</option>
            <option value="114">Taxation Law</option>
            <option value="115">Construction Management</option>
            <option value="116">Hospital Administration</option>
            <option value="117">Labour Law & Admn Law</option>
            <option value="118">Electrician</option>
            <option value="119">Automobile Mechanic</option>
            <option value="120">Fitter</option>
            <option value="121">Paint Technology</option>
            <option value="122">Mechanic</option>
            <option value="123">Technical School Certificate</option>
            <option value="124">Welding</option>
            <option value="125">Refrigeration & AC</option>
            <option value="126">Automation & Control</option>
            <option value="127">Indl Electronics</option>
            <option value="128">Factory Admn</option>
            <option value="129">Operations Research</option>
            <option value="130">Labour Laws & IR</option>
            <option value="131">ARC Welding</option>
            <option value="132">SAS Civil</option>
            <option value="133">SAS Supply</option>
            <option value="134">Secretarial</option>
            <option value="135">Shorthand - Higher</option>
            <option value="136">Typewriting - Higher</option>
            <option value="137">Wireman</option>
            <option value="138">Personnel Management & IR</option>
            <option value="139">Foreign Language</option>
            <option value="140">Automobile</option>
            <option value="141">Computer Hardware Maintenance</option>
            <option value="142">Driving</option>
            <option value="143">Electrical Systems</option>
            <option value="144">Fire & Safety</option>
            <option value="145">Telecom / Telex Operation</option>
            <option value="146">Human Resource</option>
            <option value="147">Accountancy/Law</option>
            <option value="148">Costing/Law</option>
            <option value="149">Corporate</option>
            <option value="150">Industrial Law</option>
            <option value="151">Civil and Mechanical</option>
            <option value="152">Academic Education</option>
            <option value="153">Managerial Training</option>
            <option value="154">Technical Training</option>
            <option value="155">Non Technical Training</option>
            <option value="156">Specialized Training</option>
            </select>
		</li>
		<li>
        	<label for="EDUCATION_INSTITUTE">EDUCATION INSTITUTE:</label>
            <select id="EDUCATION_INSTITUTE" name="EDUCATION_INSTITUTE"
            data-validation-help="Please enter education institute" 
            data-validation-error-msg="Education institute is required"/>
        </li>
		<li>
        	<label for="EDUCATION_BEGIN_DT">EDUCATION BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_BEGIN_DT" name="EDUCATION_BEGIN_DT"
            data-validation-help="Please enter eduction begin date" 
            data-validation-error-msg="Education begin date is required"/>
		</li>
			<li>
        	<label for="EDUCATION_END_DT">EDUCATION END DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_END_DT" name="EDUCATION_END_DT"
            data-validation-help="Please enter education end date" 
            data-validation-error-msg="Education end date is required"/>
		</li>
	</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Save">Save</button>
			<button type="reset" class="right">Reset</button>
			<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
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

<?php
	}else if($action=="edit")
	{

		$education = $db->get_row("SELECT * FROM employee_education_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Education Information</h2>
<form action="education.php" method="post" id="employeeEducationForm">
	<ul>
        <li>
           <label for="EDUCATION_ESTABLISHMENT_CODE">EDUCATION ESTABLISHMENT CODE:</label>
           <select id="EDUCATION_ESTABLISHMENT_CODE" name="EDUCATION_ESTABLISHMENT_CODE" />
 			value=<?php echo($common->getEducationCodeList($education['EDUCATION_ESTABLISHMENT_CODE']));?>       
        </li>
        <li>
        	<label for="EDUCATION_TRAINING_INSTITUTE">EDUCATION TRAINING INSTITUTE:</label>
            <input type="text"
            size="80"
            id="EDUCATION_TRAINING_INSTITUTE" name="EDUCATION_TRAINING_INSTITUTE"
            value="<?php echo($education['EDUCATION_TRAINING_INSTITUTE']);?>"
            data-validation-help="Please enter education training institute" 
            data-validation="required" 
            data-validation-error-msg="Education training institute is required"/>
         </li>
		<li>
        	<label for="EDUCATION_COURSE_LOCATION">EDUCATION COURSE LOCATION:</label>
            <input type="text"
            size="80"
            id="EDUCATION_COURSE_LOCATION" name="EDUCATION_COURSE_LOCATION"
            value="<?php echo($education['EDUCATION_COURSE_LOCATION']);?>"
            data-validation-help="Please enter education course location" 
            data-validation="required" 
            data-validation-error-msg="Education course location is required"/>
        </li>
		<li>
        	<label for="EDUCATION_COUNTRY_CODE">EDUCATION COUNTRY CODE:</label>
            <id="EDUCATION_COUNTRY_CODE"  name="EDUCATION_COUNTRY_CODE" />
            value=<?php echo($common->getCountryCodeList($education['EDUCATION_COUNTRY_CODE']));?>
        </li>
		<li>
        	<label for="EDUCATION_CERTIFICATE_CODE">EDUCATION CERTIFICATE CODE:</label>
            <id="EDUCATION_CERTIFICATE_CODE" name="EDUCATION_CERTIFICATE_CODE" />
            value=<?php echo($common->getCertificateCodeList($education['"EDUCATION_CERTIFICATE_CODE"']));?>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_DURATION">EDUCATION COURSE DURATION:</label>
            <input type="text"
            size="4"
            id="EDUCATION_COURSE_DURATION" name="EDUCATION_COURSE_DURATION"
            value="<?php echo($education['EDUCATION_COURSE_LOCATION']);?>"
            data-validation-help="Please enter education course duration" 
            data-validation="required" 
            data-validation-error-msg="Education course duration required"/>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_DURATION_UNITS">EDUCATION COURSE DURATION UNITS:</label>
            <id="EDUCATION_COURSE_DURATION_UNITS" name="EDUCATION_COURSE_DURATION_UNITS" />
           value=<?php echo($common->getunitCodeList($education['"EDUCATION_COURSE_DURATION_UNITS"']));?>
        </li>
        <li>
            <label for="EDUCATION_COURSE_GRADE">EDUCATION COURSE GRADE:</label>
            <input type="text"
            size="10" 
            id="EDUCATION_COURSE_GRADE" name="EDUCATION_COURSE_GRADE"
            value="<?php echo($education['EDUCATION_COURSE_LOCATION']);?>"
            data-validation-help="Please enter education course grade" 
            data-validation="required" 
            data-validation-error-msg="Education course grade is required"/>
        </li>
        <li>
        	<label for="EDUCATION_COURSE_BRANCH_CODE">EDUCATION COURSE BRANCH CODE:</label>
            <select 
            id="EDUCATION_COURSE_BRANCH_CODE" name="EDUCATION_COURSE_BRANCH_CODE" />
            value=<?php echo($common->getBranchCodeList($education['"EDUCATION_COURSE_BRANCH_CODE"']));?>
		</li>
		<li>
        	<label for="EDUCATION_INSTITUTE">EDUCATION INSTITUTE:</label>
            <select id="EDUCATION_INSTITUTE" name="EDUCATION_INSTITUTE"
            value="<?php echo($education['EDUCATION_INSTITUTE']);?>"
            data-validation-help="Please enter education institute" 
            data-validation-error-msg="Education institute is required"/>
        </li>
		<li>
        	<label for="EDUCATION_BEGIN_DT">EDUCATION BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_BEGIN_DT" name="EDUCATION_BEGIN_DT"
            value="<?php echo($education['EDUCATION_BEGIN_DT']);?>"
            data-validation-help="Please enter eduction begin date" 
            data-validation-error-msg="Education begin date is required"/>
		</li>
			<li>
        	<label for="EDUCATION_END_DT">EDUCATION END DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_END_DT" name="EDUCATION_END_DT"
            value="<?php echo($education['EDUCATION_END_DT']);?>"
            data-validation-help="Please enter education end date" 
            data-validation-error-msg="Education end date is required"/>
		</li>
	</ul>
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($address['ROW_ID']);?>" />
			<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
</article>		
<?php
	}else
	{
?>
	<div class="CSSTableGenerator" >
	<table>
			<tr>
				<td>Education Establishment</td> <td>Educaiton Institute</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_education_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_educations = $db->get_results("SELECT * FROM employee_education_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_educations as $employee_education )
		           	{
		         		echo("<td>".$employee_education['EDUCATION_ESTABLISHMENT_CODE'] ."</td> <td>".$employee_education['EDUCATION_TRAINING_INSTITUTE']."</td> <td>".$employee_education['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="education.php" method="post" id="employeeEducationForm_<?php echo($employee_education['ROW_ID']);?>" name="employeeEducationForm_<?php echo($employee_education['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_education['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_education['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_education['STATUS']=="1")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		//if($db->num_rows==1)
				         	 		//{
				         	 			echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									//}
									
								        echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted'/> &nbsp;");
								        
								        									     						
												 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="status" type="hidden" value="<?php echo($employee_education['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_education['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_education['EMPLOYEE_ROW_ID']);?>" />
								<input name="submitted" type="hidden" id="submitted" value="1"/>
					</form>
					</td>
			     <?php  	
		           }
				?>
				
		</table>
	</div>
	<div>
	    <br /><br />
	    <form action="education.php" method="post" id="employeeEducationForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	
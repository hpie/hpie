<h2><?php echo HEAD1;?></h2>	
<form   method="POST" action=" " NAME="Register"  onsubmit="  " id="form">
 	
 
<fieldset >
 <p style="color:#FF0000;">
 <label for="Name">  <?if(isset($_GET['m'])=='r'){ echo "Succesfully registered. " ; unset($_SESSION['register']);  }?></label>
 </p>

  <?php foreach($arrError as $error){?>
   <p style="color:#FF0000;">
  <?php echo $error;?>
   </p>
 <?}?>

 <p>
  <label for="Name"> <?= USER_NAME?> *:</label>
  <input type="text" name="user_name" id="user_name"   class="required" placeholder="<?=USER_NAME;?>" value='<?=$user_name?>'/>
</p>

<p>
  <label for="Name"> <?=PASSWORD;?> *:</label>
  <input type="password" name="password" id="password"   class="required" value='<?=$password?>' onblur="this.value=removeSpaces(this.value);"/>
</p>

<p>
  <label for="Name"> <?=RE_PASSWORD;?> *:</label>
  <input type="password" name="cPassword" id="cPassword"  id='cPassword' class="required" value='<?=$cPassword?>' onblur="this.value=removeSpaces(this.value);"/>
</p>

 <p>
  <label for="Name"> <?= FIRST_NAME?> *:</label>
  <input type="text" name="first_name" id="first_name"   class="required"  placeholder="<?=FIRST_NAME;?>" value='<?=$first_name?>'/>
</p>

 <p>
  <label for="Name"> <?= LAST_NAME?> :</label>
  <input type="text" name="last_name" id="last_name"     placeholder="<?=LAST_NAME;?>" value='<?=$last_name?>'/>
 </p>

  <p>
  <label for="Name"> <?= EMAIL?> :</label>
  <input type="text" name="email" id="email"     placeholder="email@example.com" value='<?=$email?>'/>
 </p>
 
  <p>
  <label for="Name"> <?= RE_EMAIL?> :</label>
  <input type="email" name="cEmail" id="cEmail"    placeholder="email@example.com" value='<?=$cEmail?>'/>
 </p>

  <p>
  <label for="Name"> <img alt='animated captcha' src="<?=BASE_URL;?>CaptchaSecurityImages.php"></label>
  </p>
  
  <p>
  <label for="Name"> <?= ENTER_CODE?> *:</label>
  <input type="text" name="security_code" id="security_code"   required=""  placeholder="<?= ENTER_CODE?>" value=''/>
  </p>
 
  <p>
  <label for="Name"> <?= AGREE?> *: <a href=""><?=TERMS;?>:</a></label>
   <input type="checkbox"  name="terms" id="terms" value="ON" >
  </p>

   <p>
   <input class="submit" type="submit" tabindex="10" value="Submit" name="submit">
   </p>
</fieldset>
	
		
	
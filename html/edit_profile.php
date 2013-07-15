<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>

<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>
  $(document).ready(function(){
    $("form").validate();
  });
</script>
</head>
<h2><?php echo EDIT_PROFILE;?></h2>
<form name ='edit_page'  method ='POST' action ='' enctype='multipart/form-data' id="form">
  <?php foreach($arrError1 as $error){?>
   <p style="color:#FF0000;">
  <?php echo $error;?>
   </p>
 <?}?>
<fieldset >
  
 

 <p>
  <label for="Name"> <?=USER_NAME;?> *:</label>
  <input type="text" name="user_name" id="user_name"   class="required" placeholder="<?=USER_NAME;?>" value='<?=$user_name?>'/>
</p>

<p>
  <label for="Name"> <?=FIRST_NAME;?> *:</label>
  <input type="text" name="first_name" id="first_name"   class="required"  value='<?=$first_name?>'/>
</p>

</fieldset >
<fieldset >

<p>
  <label for="Name"> <?=EMAIL;?> :</label>
  <input type="text" name="email" id="email" value='<?=$email?>'/>
</p>

<p>
  <label for="Name"> <?=LAST_NAME;?> *:</label>
  <input type="text" name="last_name" id="last_name"   class="required"  value='<?=$last_name?>'/>
</p>

</fieldset>
 <input class="submit" type="submit" tabindex="10" value="Update Registration" name="submit">

</form>





<form name ='change_password' id ='form' method ='POST' action ='' enctype='multipart/form-data' >
 <fieldset  >
	 <?php foreach($arrError2 as $error){?>
	   <p style="color:#FF0000;">
	  <?php echo $error;?>
	   </p>
	 <?}?>
	
	 <p>
	  <label for="Name"> <?=OLD_PASSWORD;?> *:</label>
	  <input type="password" name="old_passowrd" id="old_passowrd"   class="required" value='<?=$old_password?>'/>
	 </p>

	 <p>
	  <label for="Name"> <?=NEW_PASSWORD;?> *:</label>
	  <input type="password" name="new_password" id="new_password"   class="required" value='<?=$new_password?>'/>
	 </p>

	 <p>
	  <label for="Name"> <?=NEW_PASSWORD_AGAIN;?> *:</label>
	  <input type="password" name="new_password_again" id="new_password_again"   class="required" value='<?=$new_password_again?>'/>
	 </p>
  </fieldset>
   <input class="submit" type="submit" tabindex="10" value="Change Password" name="submit">

 </form>






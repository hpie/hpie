<h2><?php echo LOGIN;?></h2>
<form action="" method="post" id="form">
 
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
  <label for="Name"> <?=USER_NAME;?> *:</label>
  <input type="text" name="user_name" id="user_name"  required="" placeholder="<?=USER_NAME;?>" value='<?=$user_name?>'/>
</p>

<p>
  <label for="Name"> <?=PASSWORD;?> *:</label>
  <input type="password" name="password" id="password"  required="" value='<?=$password?>'/>
</p>
<p>
  <label for="Name"> You are logging to: <b> <?php echo($_SESSION['centerKey'])?> <b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <a href="index.php?changeDiv=yes">Change Division</a></label>
</p>

<p>
 <input class="submit" type="submit" tabindex="10" value="Login" name="submit">
</p>

<p>
 New User Please <a href="<?=BASE_URL?>index.php?page=register"><b>Register.</b></a>
</p>
</fieldset>

</form>
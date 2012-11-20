<?php
session_start();
$title='Login - Online examination system';
include('./template/header.php');
?>
<form name="loginForm" method="post" action="./index.php">
<fieldset>
<legend>Log In :</legend>
Username: <input type="text" name="user" id="user" /><br />
Password: <input type="password" name="pass" id="pass" /><br />
<input type="submit" value="Submit" name="submit" />
</fieldset>
</form>
<div class="center">
<a href="#" onclick="document.getElementById('user').value = 'test@user.com';document.getElementById('pass').value = 'test'">Autofill login details</a>
</div>
<?php include('./template/footer.php'); ?>
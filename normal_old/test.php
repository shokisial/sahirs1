<!DOCTYPE html>
<html>
<body>

<?php     
$to_email = 'shokisial@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: pechsizmir@hotmail.com';
mail($to_email,$subject,$message,$headers);
?>
<h1>The input pattern attribute</h1>

<p>A form with a password field that must contain 8 or more characters:</p>

<form action="/action_page.php">
  <label for="pwd">Password:</label>
  <input type="password" id="pwd" name="pwd" pattern=".{6}." title="Six characters Only">
  <input type="submit">
</form>

</body>
</html>
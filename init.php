<?php
include "./libs/functions.php";
session_start();


if(isset($_POST['password']) && $_POST['password']==$config['dev_pass']){
  $_SESSION['is_dev'] = true;
}

if(!isset($_SESSION['is_dev']) || !$_SESSION['is_dev']){
  echo '<form action="init.php" method="POST">
  <input type="text" name="password" placeholder="Пароль">
  <input type="submit" name="submit" value="Войти">
  <input type="hidden" name="method" value="auth">
</form>
</body>
</html>';
die();
}

function read($file){
	highlight_string(file_get_contents($file), $return = false);
}
?>

<form action = "init.php" method = "GET">
<input type = "text" name = "php" style = "width: 400px;" placeholder = "PHP код">
<input type = "submit" name="submit" value = "Выполнить">
</form>

<?php
if(!empty($_REQUEST['php'])) eval($_REQUEST['php']);
?>
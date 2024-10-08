<?php
header('Content-Type: text/html; charset=UTF-8');
require('app/config/config.php');
require('app/config/db.php');
require('app/functions/validate.function.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	fieldRequired('Imie',$_POST['name']);
	fieldRequired('Nazwisko',$_POST['surname']);
	fieldRequired('E-mail',$_POST['email']);
	displayErrors();
	if(!$isError){
		isEmail('E-mail',$_POST['email']);
			$password = md5(constant('PASS_SALT') . $_POST['password']);
			$query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password'";
	if ($db->query($query))
	{
		echo 'Data was inserted Successfully';
	}
	else
	{
		echo 'Data has not been inserted!';
	};
	};
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<section>
<h1 class="align-center">Formularz rejestracji użytkownika</h1>
<?php include ('templates/form.html.php'); ?>
</section>
</body>
</html>
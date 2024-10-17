<?php
header('Content-Type: text/html; charset=UTF-8');
require('app/config/config.php');
require('app/config/db.php');
require('app/functions/validate.function.php');
require('app/functions/helper.function.php');

include('templates/MasterPage.html.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){	
	fieldRequired('Imię', $_POST['name']);
	fieldRequired('Nazwisko', $_POST['surname']);
	fieldRequired('E-mail', $_POST['email']);
	fieldRequired('Hasło', $_POST['password']);
	if(!$isError){
		isEmail('E-mail', $_POST['email']);
	}
	if (!$isError){	
		$password = md5(PASS_SALT . $_POST['password']);
		$query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password'";
		if ($db->query($query)){
			showMessage('success', 'Data inserted succesfully!');
		}
		else{
			showMessage('warning', 'Data has not been inserted!');
		}
	}
}
?>
<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/style.css" />

		<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
	</head>
	<body>
		<main>
			<section class="content">
				<?php include ('templates/views/index/form.html.php'); ?>
			</section>
			<section class="content">
				<?php
				if(isset($_REQUEST['action'])){	
					$action = $_REQUEST['action'];
					switch($action){
						case 'delete':
							if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
								$id = (int) $_REQUEST['id'];
							}
							$query = "DELETE FROM users WHERE id=$id";
							if ($db->query($query)){
								showMessage('success', 'Data deleted succesfully!');
							}
							else{
								showMessage('warning', 'Data has not been deleted!');
							}
							break;
					}
				}
					include ('templates/views/index/users.html.php');	
				?>
			</section>
		</main>
	</body>
</html>
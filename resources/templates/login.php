<?php 
$errors = array();
if (isset($_POST['login'])) {
	$bandera = true;
	if(!isset($_POST['user'])){
		$errors[]="Escribe el usuario";
		$bandera = false;
	}
	if(!isset($_POST['password'])){
		$errors[]="Escribe la contraseña";
		$bandera = false;
	}
	if ($bandera == true) {
		try {
			$usuario = cleanInput($_POST['user']);
			$password = cleanInput($_POST['password']);
			$_SESSION['usuario']=Expertos::Login($usuario,$password);
			header("location: index.php");
		} catch (Exception $e) {
			$errors[]=$e->getMessage();
		}
	}
}
 ?>
<div class="container">
	<div>
		<?php foreach ($errors as $key => $error): ?>
			<div class="error"><?php echo $error ?></div>
		<?php endforeach ?>

	</div>
	<form action="/?page=login" method="post">
		<label for="">Usuario</label>
		<input type="text" name="user">
		<label for="">Password</label>
		<input type="password" name="password">
		<input type="submit" name="login" value="Login">
	</form>
</div>
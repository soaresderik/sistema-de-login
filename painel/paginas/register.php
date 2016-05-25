<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'exercicios/painel/system/system.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastre-se</title>
	<meta charset="utf-8">
</head>
<body>

	<h2>Cadastre-se</h2>
	<hr>
	<?php 
		ValidateFormRegister();

	 ?>
	<form action="" method="post">

		<label>Nome</label><br>
		<input type="text" name="name" value="<?php echo GetPost('name'); ?>"><br>

		<label>Email</label><br>
		<input type="text" name="mail" value="<?php echo GetPost('mail'); ?>"><br>

		<label>Usuário</label><br>
		<input type="text" name="username" value="<?php echo GetPost('username'); ?>"><br>

		<label>Senha</label><br>
		<input type="password" name="password"><br>

		<label>Confirmar Senha</label><br>
		<input type="password" name="confirm"><br>
		
		<hr>
		<input type="submit" name="send" value="Cadastrar">
		<a href="<?php echo URL_BASE; ?>" title="Fazer Login">Fazer Login</a>


	</form>

</body>
</html>
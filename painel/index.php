<?php 
	require_once('system/system.php');
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Fazer Login</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Fazer Login</h2>
	<hr>
	<form action="" method="post">

		<label>Usuário</label><br>
		<input type="text" name="login"><br>

		<label>Senha</label><br>
		<input type="password" name="password"><br>
		
		<hr>
		<input type="submit" name="send" value="Fazer Login">

		<a href="<?php echo URL_REGISTER; ?>" title="Cadastrar-se">Cadastrar-se</a>

	</form>

</body>
</html>
<?php
	
	//verifica usuário
	function UserVerify($username, $password, $status = false)
	{
		$password = CryptPassword($password);

		$query    = "SELECT * FROM membros WHERE username = '$username' AND password = '$password'";
		$result   = mysqli_query($conn, $query) or die(mysqli_error());

		if(mysqli_num_rows($result) <= 0)
			return false;
		else
			return true;
	}
	
	//Cadastra Usuario
	function Register($name, $mail, $username, $password, $status = true)
	{
		$password = CryptPassword($password);
		$userKey  = KeyGenerator();
		$register = time();

		$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

		$query    = "INSERT INTO membros (nome, mail, username, password, userkey, register, status)";
		$query   .=	" VALUES ('$name', '$mail', '$username', '$password', '$userKey', $register, $status)";
		$result   = mysqli_query($conn, $query) or die (mysqli_error());

		mysqli_close($conn);

		return $result;
	}

	//verifica se login Existe
	function UserNameExists($username)
	{
		$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

		$query = "SELECT username FROM membros WHERE username = '$username'";
		$result = mysqli_query($conn, $query) or die(mysqli_error());

		if(mysqli_num_rows($result) <= 0)
			return true;
		else
			return false;

		mysqli_close($conn);
	} 

	//Verifica se existe email
	function MailExists($mail)
	{
		$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

		$query = "SELECT mail FROM membros WHERE mail = '$mail'";
		$result = mysqli_query($conn, $query) or die(mysqli_error());

		if(mysqli_num_rows($result) <= 0)
			return true;
		else
			return false;

		mysqli_close($conn);
	} 

	//conexão com o bando de dados
	function Connect()
	{
		$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

		if(!$conn)
			die(mysqli_error());
		else
		{
			mysqli_select_db($conn, DATABASE) or die(mysqli_error());

			// mysqli_query("SET NAMES 'utf-8'");
			// mysqli_query("SET character_set_connection=utf8");
			// mysqli_query("SET character_set_client=utf8");
			// mysqli_query("SET character_set_results=utf8");
		}
	}
 ?>
<?php
	
	/*========================*/
		//proteção

		//Controla acesso publico
		function AccessPublic()
		{
			if(IsLogged())
				Redirect(URL_PAINEL);
		}

		//Controla acesso privado
		function AccessPrivate()
		{
			if(!IsLogged())
				Redirect(URL_BASE);
		}
	/*========================*/


	/*========================*/
		//sessão

		// Seta ou recupera USER LOG
		function UserLog($value = null)
		{
			if($value === null)
				return $_SESSION['userLog'];
			else
				$_SESSION['userLog'] = $value;
		}

		//verifica login
		function IsLogged()
		{
			if(!isset($_SESSION['userLog']) || empty($_SESSION['userLog']))
				return false;
			else
				return true;
		}
	/*========================*/

	//criptografar senhas
	function CryptPassword($password)
	{
		return sha1($password);
	}

	//Gera KEY de usuario
	function KeyGenerator()
	{
		return sha1(rand().time());
	} 

	//Recuperar POST
	function GetPost($key = null)
	{
		if($key === null)
			return $_POST;
		else
			return(isset($_POST[$key]))? ClearString($_POST[$key]) : false;
	}

	//Redireciona
	function Redirect($url)
	{
		header("Location: ".$url);
		die();
	}

	//limpa String
	function ClearString($str)
	{
		$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
		return mysqli_real_escape_string($conn, strip_tags(trim($str)));
		mysqli_close($conn);
	}
 ?>
<?php 


	Init();

	//  valida form do cadastro

	function ValidateFormRegister()
	{
		if(!!GetPost('send'))
		{
			$message = null;

			$name = GetPost('name');
			$mail = GetPost('mail');
			$username = GetPost('username');
			$password = GetPost('password');
			$confirm = GetPost('confirm');

			if(empty($name))
				$message = 'Informe seu Nome!';
			else if(empty($mail))
				$message = 'informe o seu E-mail!';
			else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) //verifica se o email é válido
				$message = 'Informe um Email Válido';
			else if(empty($username))
				$message = 'Informe seu nome de Usuário!';
			else if(empty($password))
				$message = 'Informe a sua Senha!';
			else if(empty($confirm))
				$message = 'confirme a sua Senha!';
			else if($password != $confirm)
				$message = 'As senhas não correnpondem!';
			else 
			{
				if(!MailExists($mail))
					$message = 'Este email ja foi cadastrado!';
				else if(!UserNameExists($username))
					$message = 'Este nome de usuário ja foi cadastrado!';
				else
				{
					$register = Register($name, $mail, $username, $password);
					if(!$register)
						$message = 'Desculpe, ocorreu um erro...';
					else
						$message = 'Você foi cadastrado com sucesso';
				}
			}

			echo ($message != null) ? $message. '<hr>' : null;
		}
	}
	//inicia o sistema
	function Init()
	{
		session_start();

		//chama Config
		$configFile = $_SERVER['DOCUMENT_ROOT']. 'exercicios/painel/system/config.php';
		
		if(!file_exists($configFile))
			die('Erro. arquivo config.php não existe!');
		else
			require_once $configFile;

		//Chama Helpers
		if(!file_exists(FILE_HELPERS))
			die('Erro, arquivo helpers.php não existe!');
		else
			require_once FILE_HELPERS;

		//Chama database
		if(!file_exists(FILE_DATABASE))
			die('Erro, arquivo database.php não existe!');
		else
			require_once FILE_DATABASE;

		Connect();
	}
	
 ?>
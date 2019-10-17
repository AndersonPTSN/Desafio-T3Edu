<?php

// Verifica se algo foi postado
if (!empty($_POST)) {
	session_start();
	//pega os valores
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	//pega a data de acesso
	date_default_timezone_set('America/Sao_Paulo');
	$now = new DateTime();
	$datetime = $now->format('Y-m-d H:i:s'); 
	//verifica a existencia do db caso n exista cria
	if(!file_exists('C:\xampp\htdocs\teste\Banco_de_dados\db_login.txt')){
		$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db_login.txt', "w+");
		fclose($arquivo);
	}
	//abre arquivo criado
	$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db.txt', "a+");
	//ler o arquivo e compara com o email pego
	$arquivo_string = fread($arquivo, filesize('C:\xampp\htdocs\teste\Banco_de_dados\db.txt'));
	$have_email = strpos($arquivo_string, $email);
	//verifica se já existe o email cadastrado
	if($have_email !== false) {
		//verifica se a senha bate com o email

		$linhas = count(file('C:\xampp\htdocs\teste\Banco_de_dados\db.txt'));
		$dados = file('C:\xampp\htdocs\teste\Banco_de_dados\db.txt');

		$senha_validada = 'false';
		for($i = 0; $i<$linhas; $i++){

			$condicao = strpos($dados[$i], $email);
			//email esta nessa linha?
			if($condicao !== false){
				//pega somente o email_dado
				$x = substr($dados[$i],7);
				//pega tamanho do email_dado
				$tamanho_dado = strlen($x) -2;
				//pega o tamanho do email recebido
				$tamanho_email = strlen($email);
				//compara os tamanhos
				if($tamanho_dado == $tamanho_email){

					$condicao = strpos($dados[$i+1], $senha);
					//senha esta nessa linha?
					if($condicao !== false){
						//pega somente a senha_dado
						$x = substr($dados[$i+1],7);
						//pega tamanho da senha_dado
						$tamanho_dado = strlen($x) -2;
						//pega o tamanho da senha recebido
						$tamanho_senha = strlen($senha);
						//compara os tamanhos
						if($tamanho_dado == $tamanho_senha){
							$nome = substr($dados[$i-1],6);
							$nivel = substr($dados[$i+3],7);
							$senha_validada = 'true';
							echo 'Voce esta logado';
						}
					}

				}
			}
		}
		fclose($arquivo);
		if($senha_validada != 'true'){ //< --------------------------- SENHA ERRADA
			//verifica a existencia do db caso n exista cria
			if(!file_exists('C:\xampp\htdocs\teste\Banco_de_dados\db_bad_login.txt')){
				$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db_bad_login.txt', "w+");
				fclose($arquivo);
			}
			//abre arquivo criado
			$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db_bad_login.txt', "a+");
			//salva os dados 
			fwrite($arquivo, "\r\nEMAIL: ".$email."\r\n");
			fwrite($arquivo, "SENHA: ".$senha."\r\n");
			fwrite($arquivo, "ERRO: Senha errada\r\n");
			fwrite($arquivo, "DATA: ".$datetime."\r\n");
			//fecha o arquivo
			fclose($arquivo);
			echo 'Senha errada';
		}else{  //< -------------------------------------------------- EMAIL E SENHA CORRETOS
			//abre arquivo criado
			$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db_login.txt', "a+");
			//salva os dados 
			fwrite($arquivo, "\r\nEMAIL: ".$email."\r\n");
			fwrite($arquivo, "STATUS: Login\r\n");
			fwrite($arquivo, "DATA: ".$datetime."\r\n");
			//fecha o arquivo
			fclose($arquivo);
			session_start();
			$_SESSION['login'] = [$nome,$email,$senha,$nivel];
			header('Location: /teste/perfil.php');
		}
	}else{  //< -------------------------------------------------- EMAIL ERRADA
		//verifica a existencia do db caso n exista cria
		if(!file_exists('C:\xampp\htdocs\teste\Banco_de_dados\db_bad_login.txt')){
			$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db_bad_login.txt', "w+");
			fclose($arquivo);
		}
		//abre arquivo criado
		$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db_bad_login.txt', "a+");
		//salva os dados 
		fwrite($arquivo, "\r\nEMAIL: ".$email."\r\n");
		fwrite($arquivo, "SENHA: ".$senha."\r\n");
		fwrite($arquivo, "ERRO: Email não cadastrado\r\n");
		fwrite($arquivo, "DATA: ".$datetime."\r\n");
		//fecha o arquivo
		fclose($arquivo);
		echo 'Email não cadastrado.';
	}
} else {
	echo 'Nada foi postado.';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Teste PHP</title>
	</head>
	<body>
		</br><a href="index.html">Voltar</a>
	</body>
</html>

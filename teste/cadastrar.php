<?php

// Verifica se algo foi postado
if (!empty($_POST)) {
	//pega os valores
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$nivel = $_POST['nivel_de_acesso'];
	$senha = $_POST['senha'];
	//pega a data de acesso
	date_default_timezone_set('America/Sao_Paulo');
	$now = new DateTime();
	$datetime = $now->format('Y-m-d H:i:s'); 
	//verifica a existencia do db caso n exista cria
	if(!file_exists('C:\xampp\htdocs\teste\Banco_de_dados\db.txt')){
		$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db.txt', "w+");
		fclose($arquivo);
	}
	//abre arquivo criado
	$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db.txt', "a+");
	//ler o arquivo e compara com o email pego
	$arquivo_string = fread($arquivo, filesize('C:\xampp\htdocs\teste\Banco_de_dados\db.txt'));
	$have_email = strpos($arquivo_string, $email);
	//verifica se já existe o email cadastrado
	if($have_email !== false) {
    	echo "Email já cadastrado";
    	fclose($arquivo);
	}else{
		session_start();
		//salva os dados 
		fwrite($arquivo, "\r\nNOME: ".$nome."\r\n");
		fwrite($arquivo, "EMAIL: ".$email."\r\n");
		fwrite($arquivo, "SENHA: ".$senha."\r\n");
		fwrite($arquivo, "TELEFONE: ".$telefone."\r\n");
		fwrite($arquivo, "NÍVEL: ".$nivel."\r\n");
		fwrite($arquivo, "DATA: ".$datetime."\r\n");
		//fecha o arquivo
		fclose($arquivo);
		//confirma a criação apra o usuário
		echo 'Usuário criado com sucesso.';
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
		</br><a href="cadastro.html">Voltar</a>
	</body>
</html>


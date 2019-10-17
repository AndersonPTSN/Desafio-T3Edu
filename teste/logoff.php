<?php
	session_start();
	//pega a data de logoff
	date_default_timezone_set('America/Sao_Paulo');
	$now = new DateTime();
	$datetime = $now->format('Y-m-d H:i:s'); 
	//abre arquivo criado
	$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db_login.txt', "a+");
	//salva os dados 
	fwrite($arquivo, "\r\nEMAIL: ".$_SESSION['login'][1]."\r\n");
	fwrite($arquivo, "STATUS: Logoff\r\n");
	fwrite($arquivo, "DATA: ".$datetime."\r\n");
	//fecha o arquivo
	fclose($arquivo);

	session_destroy(); 
	header('Location: /teste/index.html');
?>
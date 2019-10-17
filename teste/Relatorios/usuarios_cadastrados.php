<?php
	session_start();
	$log = $_SESSION['login'];
	if(isset($log)){

	}else{
		echo 'Você não está logado';
		header('Location: /teste/erro403.php');
	}
	$condicao = strpos($_SESSION['login'][3], "Admin_master");
	if($condicao !== false){
		$arquivo = fopen('C:\xampp\htdocs\teste\Banco_de_dados\db.txt', "a+");
		$linhas = count(file('C:\xampp\htdocs\teste\Banco_de_dados\db.txt'));
		$dados = file('C:\xampp\htdocs\teste\Banco_de_dados\db.txt');
		for($i = 0; $i<$linhas; $i++){
			echo $dados[$i]."</br>";
		}
	}else{
		echo "Voce não tem permição </br>";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Teste PHP</title>
		<style>
			body {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			}
		</style>
	</head>
	<body>
		</br><a href="../relatorios.php">Voltar</a>
	</body>
</html>
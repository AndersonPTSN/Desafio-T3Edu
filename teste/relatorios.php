<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Teste PHP</title>

		<style>
			table, h2, a{
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			}
		</style>

	</head>
	<body>
		<fieldset>
    		<legend><h2>Relatórios:</h2></legend>
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
				?>
		        	<a href="Relatorios/usuarios_cadastrados.php">Usuários Cadastrados</a></br>
		        	<a href="Relatorios/erros_de_log.php">Erros de Log</a></br>
		        	<a href="Relatorios/login_e_logoff.php">Login's e logoff's</a>
				<?php }else{
					echo "Voce não tem permição de acesso </br>";
				} ?>
				</br></br><a href="perfil.php">Voltar</a>
			</table>
		</fieldset>
	</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Teste PHP</title>

		<style>
			table, h2{
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			}

			td, th {
			  text-align: left;
			  padding: 10px;
			}
		</style>

	</head>
	<body>
		<?php
			session_start();
			$log = $_SESSION['login'];
			if(isset($log)){

			}else{
				echo 'Você não está logado';
				header('Location: /teste/erro403.php');
			}
		?>
		<fieldset>
    		<legend><h2>Perfil:</h2></legend>
				<table>
				  <tr>
				    <th><?php echo "Usuário: ".$_SESSION['login'][0]; ?></th>
				    <td><form action="logoff.php" id="form" name="form">
				    	<input type="submit" value="Logoff" >
				    	</form></td>
				  </tr>
				  <tr>
				    <th><?php echo "Email: ".$_SESSION['login'][1]; ?></th>
				    <td><form action="relatorios.php" id="form" name="form">
				    	<input type="submit" value="Relatórios" >
				    	</form></td>
				  </tr>
				</table>
		</fieldset>
	</body>
</html>
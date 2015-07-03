<html>

<head>
	<?php
		session_start();
		if(isset($_SESSION['usuario'])){
			echo "<script type='Text/javascript'>window.open('\pagina.php','_self');</script>";
		}
	?>
	<title>Login</title>
	<meta charset = "utf-8"/>
	<link rel="stylesheet" href="estilo.css">

</head>

	<body>
		<h1>Autenticação</h1>


	<form method="post" action="processa.php">
		<table>
				<tr>
					<td>Login:</td>
					<td><input type="text" name="usuario" id="usuario"/><br/></td>
				</tr>
				<tr>
					<td>Senha:</td>
					<td><input type="password" name="senha" id="senha"/><br/></td>
				</tr>
				<tr>
					<td></td>
					<td valign ="right"><input type="submit" value="Login" /></td>
				</tr>
		</table>
	</form>

	</body>

</html>


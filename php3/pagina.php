<html>

<head>
	<title>Minha primeira página</title>
	<meta charset = "utf-8"/>

	
</head>

	<body>
		<?php 
			session_start();
				$usuario = $_SESSION['usuario'];
		?>
		<h1>Este é um grande cabeçalho</h1>

			<h3>E este aqui é um pequeno cabeçalho</h3>
			
			<p>Aqui eu coloquei um parágrafo com algum texto aleatório, e a seguir</br>vou inserir um formulário dentro de uma tabela. Além disso aqui vai</br> um link:<a href="http://icomp.ufam.edu.br/david"> http://icomp.ufam.edu.br/david </a>
			</p>


		<form method="POST" action ="processa.php">
			<table>
					<tr>
						<td>Seu Nome</td>
						<td><input type = "text" id ="nome_completo" name = "nome_completo">
						</td>
					</tr>
					<tr>
						<td>Seu sexo</td>
						<td><select name="sex" id="sex">
							<option value="Masculino" selected ="">Masculino</option>
							<option value="Feminino">Feminino</option>
						</select></td>
					</tr>
					<tr>
						<td valign="top">Seus</br>comentários</td>
						<td><textarea name="mensagem" rows="10" cols="60"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type = "submit" name ="submit" value ="Enviar"></td>
					</tr>
			</table>
	  	</form>

	  	<form action= "logout.php" method = "GET" >
   			<input type = "submit" value= "Logout" />
		</form>

	</body>

</html>
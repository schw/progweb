<?php
	
	$nome = $_POST['nome_completo'];
	$sexo = $_POST['sex'];
	$mensagem = $_POST['mensagem'];

	$conexao = mysql_connect("localhost","root","",3306);

	if (!$conexao) 
		die("<p>O servidor do banco está indisponível</p>"); 

	$banco = @mysql_select_db("bd_progweb",$conexao); 

	if (!$banco) 
		die("<p>Banco de Dados não disponível.</p>"); 

	echo "<p>Banco de dados aberto com sucesso.</p>"; 

	$sql = "INSERT INTO registros (Id,Nome,Sexo,Comentarios) VALUES (NULL,'$nome','$sexo','$mensagem')";  
	mysql_query ($sql,$conexao);  

	mysql_close($conexao);


?>
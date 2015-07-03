<?php

	$usuario = $_POST['usuario'];	//As variáveis usuario e senha recebem os dados digitados na página anterior
	$senha = $_POST['senha'];

	if ($usuario == "demo" && $senha == "demo"){
    	session_start();

    	$_SESSION['usuario'] = $usuario;
    	$_SESSION['senha'] = $senha;
    }

	echo "<script type='Text/javascript'>window.open('\login.php','_self');</script>";

?>
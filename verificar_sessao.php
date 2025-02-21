<?php
	// iniciar sessão
	session_start();
	 
	// verificar se há uma sessão associada ao campo id_utilizador
	if (empty($_SESSION["nome_utilizador"])) {
		// caso a sessão não esteja iniciada, volta à página de acesso
		header('Location: ../index.php');
		exit();
	}
?>






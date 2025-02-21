<?php
	// iniciar sessão
	session_start();
 
	// destruir a sessão
	session_destroy();
 
	// enviar o utilizador para página de autenticação
	header('Location: index.php');
?>

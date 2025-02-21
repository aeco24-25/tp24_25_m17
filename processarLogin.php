<?php
	//verificar se os campos foram todos preenchidos
	if (!empty($_POST) AND (empty($_POST['nome_utilizador']) OR empty($_POST['palavra_passe']))){
		header ("Location: login.php");
		exit;
	}
	//Ligação
	include ("ligacao.php");
	
	// definir $username and $password
	$nome_utilizador=$_POST["nome_utilizador"];
	$palavra_passe=$_POST["palavra_passe"];
	
	$sql = "SELECT nomeuser, pwd, niveluser FROM utilizadores 
	WHERE nomeuser = '$nome_utilizador' AND pwd = '$palavra_passe'";
	$consulta = $ligacao->query($sql);
	$consulta->setFetchMode(PDO::FETCH_ASSOC);

	// consulta à base de dados
	while ($result = $consulta->fetch()){
		/*$login = $result['nomeuser'];
		$pass = $result['pwd'];*/
		$nivel = $result['niveluser'];
	}
	$contar = $consulta->rowCount();
	if ($contar == 1){
		
		session_start();
		$_SESSION["nome_utilizador"] = $nome_utilizador;
		if ($nivel == 1){
			header("Location: ./admin/pag_admin.php"); exit;
		}
		else {
			header("Location: ./user/pag_user.php"); exit;
		}
	}
	else{
		header("Location: registarU.php"); exit;
	}
?>


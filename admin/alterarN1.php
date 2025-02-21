<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../script.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="../estilos.css">
	<link rel="stylesheet" href="../formularios.css">
	<link rel="stylesheet" href="../tabela.css">
	<title>LivrariaDD</title>
</head>
<body>
	<div class="row">
		<header>
			<div class="col-8">
				<h1>LivrariaDD</h1>
			</div>
		</header>
	</div>
	<div class="row">
		<?php 
			include("../verificar_sessao.php");
			include ("menu_admin.inc");
			$iduser = $_REQUEST['iduser'];
			$nome = $_REQUEST['nomeuser'];
			$email = $_REQUEST['email'];
			$nivel = $_REQUEST['niveluser'];
		?>
		<section class="col-6">
			<p class = "texto" ><b>Id utilizador - </b><?php echo $iduser;?> </p>
			<p class = "texto"><b>Nome - </b><?php echo $nome;?> </p>
			<p class = "texto"><b>Email - </b><?php echo $email;?> </p>
			<div class="container">
				<form action="alterarN2.php" method = "POST">
					<div class="row">
						<div class="col-25">
							<label for="nome"><b>Nível de utilizador</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $nivel; ?>" name="nivel">
						</div>
					</div>
					<input type="hidden" value="<?php echo $iduser; ?>" name="iduser">
					<input type="hidden" value="<?php echo $nome; ?>" name="nome">
					<input type="hidden" value="<?php echo $email; ?>" name="email">
					<br>
					<div class="row">
						<input type="submit" value="Alterar">
					</div>
				</form>
			</div>
		</section>
		<aside class="col-3">
			<figure>
				<img src="../imagens/livros.jpg" alt="livros" style="width:100%;">
			</figure>
			<figcaption> </figcaption>
		</aside>
	</div>
	<div class="row">
		<footer class="col-12">&copy; 2024-2025 3PSI todos os direitos reservados.</footer>
	</div>
</body>
</html>


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
			$codCL = $_REQUEST['codCL'];
			$nome = $_REQUEST['nome'];
			$morada = $_REQUEST['morada'];
			$telefone = $_REQUEST['telefone'];
		?>
		<section class="col-6">
			<p class = "texto" ><b>Código Cliente - </b><?php echo $codCL;?> </p>
			<div class="container">
				<form action="atualizarC2.php" method = "POST">
					<div class="row">
						<div class="col-25">
							<label for="nome"><b>Nome</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $nome; ?>" name="nome">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="morada"><b>Morada</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $morada; ?>" name="morada">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for=""><b>Telefone</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $telefone; ?>" name="telefone">
						</div>
					</div>
					<input type="hidden" value="<?php echo $codCL; ?>" name="codCL">
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


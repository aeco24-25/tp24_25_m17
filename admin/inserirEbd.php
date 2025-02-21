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
		?>
		<section class="col-6">
			<?php
				include("../ligacao.php");
				if (empty($_POST['nome']))
				{
					echo "Preencha os campos do formulario!";
					header("Refresh:3 ; URL=inserirE.php");
				}
				else
				{
					//Inserir editoras
					$nome = $_POST["nome"];
					$morada = $_POST["morada"];
					$telefone = $_POST["telefone"];
					$nif = $_POST["nif"];
					$email = $_POST["email"];
					
					//Ir buscar o nif às editoras
					$sqlC1 = "SELECT nif FROM editora WHERE nif = " .$nif. "";
					$consultaC1 = $ligacao->query($sqlC1);
					$consultaC1->setFetchMode(PDO::FETCH_ASSOC);
						
					while($resultC1 = $consultaC1->fetch()){
						$nifC1 = $resultC1['nif'];
					}
					
					if (!empty($nifC1)){
						if ($nifC1 == $nif){
							echo "NIF já existe!";
							header("Refresh:3 ; URL=inserirE.php");
						}
					}
					else {
						$sql = "INSERT INTO editora(nome, nif, morada, telefone, email) 
							VALUES(:nome, :nif, :morada, :telefone, :email)";
					
						$inserir = $ligacao->prepare($sql);
						$inserir->bindParam( ':nome', $nome, PDO::PARAM_STR);
						$inserir->bindParam( ':nif', $nif, PDO::PARAM_STR);
						$inserir->bindParam( ':morada', $morada, PDO::PARAM_STR);
						$inserir->bindParam( ':telefone', $telefone, PDO::PARAM_STR);
						$inserir->bindParam( ':email', $email, PDO::PARAM_STR);
						$inserir->execute();
						$contar = $inserir->rowCount();
						
						if ($contar == 1)
							header("Refresh:1 ; URL = pag_admin.php");
					}	
				}
		?>
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


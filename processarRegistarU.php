<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="formularios.css">
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
		<?php include ('menu.inc');?>
		<section class="col-6">
			<?php
			include 'ligacao.php';
			if (empty($_POST['nome']))
			{
				echo "Preencha os campos do formulario!";
				header("Refresh:3 ; URL=registarU.php");
			}
			else
			{
				//Inserir dados
				$nome = $_POST["nome"];
				$morada = $_POST["morada"];
				$telefone = $_POST["telefone"];
				$nif = $_POST["nif"];
				$email = $_POST["email"];
				$nomeuser = $_POST["nomeuser"];
				$pwd = $_POST["pwd"];	
				
				$sqlC = "INSERT INTO clientes(nome, nif, morada, telefone) 
						VALUES(:nome, :nif, :morada, :telefone)";
				
				$inserirC = $ligacao->prepare($sqlC);
				$inserirC->bindParam( ':nome', $nome, PDO::PARAM_STR);
				$inserirC->bindParam( ':nif', $nif, PDO::PARAM_STR);
				$inserirC->bindParam( ':morada', $morada, PDO::PARAM_STR);
				$inserirC->bindParam( ':telefone', $telefone, PDO::PARAM_STR);
				$inserirC->execute();
					
				$sqlC1 = "SELECT codCL FROM clientes WHERE nif = " .$nif. "";
				$consultaC1 = $ligacao->query($sqlC1);
				$consultaC1->setFetchMode(PDO::FETCH_ASSOC);
						
				while($resultC1 = $consultaC1->fetch()){
					$codCL = $resultC1['codCL'];
				}
					
				$sqlI = "INSERT INTO utilizadores(nomeuser, pwd, email, niveluser, codCL) 
						VALUES(:nomeuser, :pwd, :email, 2, :codCL)";
				
				$inserirU = $ligacao->prepare($sqlI);
				$inserirU->bindParam( ':nomeuser', $nomeuser, PDO::PARAM_STR);
				$inserirU->bindParam( ':pwd', $pwd, PDO::PARAM_STR);
				$inserirU->bindParam( ':email', $email, PDO::PARAM_STR);
				$inserirU->bindParam( ':codCL', $codCL, PDO::PARAM_STR);
				$inserirU->execute();
				$contarU = $inserirU->rowCount();
				
				if ($contarU == 1)
					header("Refresh:1 ; URL=index.php");
			}
		?>
		</section>
		<aside class="col-3">
			<figure>
				<img src="imagens/livros.jpg" alt="livros" style="width:100%;">
			</figure>
			<figcaption> </figcaption>
		</aside>
	</div>
	<div class="row">
		<footer class="col-12">&copy; 2024-2025 3PSI todos os direitos reservados.</footer>
	</div>
</body>
</html>


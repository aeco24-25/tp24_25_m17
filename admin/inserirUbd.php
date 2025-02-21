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
				if (empty($_POST['nomeuser']))
				{
					echo "Preencha os campos do formulario!";
					header("Refresh:3 ; URL=inserirU.php");
				}
				else
				{
					//Inserir utilizadores
					$nomeuser = $_POST["nomeuser"];
					$pwd = $_POST["pwd"];
					$email = $_POST["email"];
					$niveluser = $_POST["niveluser"];
					
					//Ir buscar o nomeuser aos utilizadores
					$sqlC1 = "SELECT nomeuser FROM utilizadores WHERE nomeuser = '$nomeuser'";
					$consultaC1 = $ligacao->query($sqlC1);
					$consultaC1->setFetchMode(PDO::FETCH_ASSOC);
						
					while($resultC1 = $consultaC1->fetch()){
						$nomeuserC1 = $resultC1['nomeuser'];
					}
					
					if (!empty($nomeuserC1)){
						if ($nomeuserC1 == $nomeuser){
							echo "Nome de utilzador já existe!";
							header("Refresh:3 ; URL=inserirU.php");
						}
					}
					else{
						$sql = "INSERT INTO utilizadores(nomeuser, pwd, email, niveluser) 
								VALUES(:nomeuser, :pwd, :email, :niveluser)";
					
						$inserir = $ligacao->prepare($sql);
						$inserir->bindParam( ':nomeuser', $nomeuser, PDO::PARAM_STR);
						$inserir->bindParam( ':pwd', $pwd, PDO::PARAM_STR);
						$inserir->bindParam( ':email', $email, PDO::PARAM_STR);
						$inserir->bindParam( ':niveluser', $niveluser, PDO::PARAM_STR);
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


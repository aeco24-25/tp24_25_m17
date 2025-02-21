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
				if (empty($_POST['isbn']))
				{
					echo "Preencha os campos do formulario!";
					header("Refresh:3 ; URL=inserirL.php");
				}
				else
				{
					//Inserir livros
					$isbn = $_POST["isbn"];
					$codE = $_POST["codE"];
					$codA = $_POST["codA"];
					$titulo = $_POST["titulo"];
					$genero = $_POST["genero"];
					$precoT = $_POST["precoT"];
					$npaginas = $_POST["npaginas"];
					$quantStock = $_POST["quantStock"];
					$data_edicao = $_POST["data_edicao"];
					$unidadesV = 0;
					
					//Ir buscar o isbn dos livros
					$sqlC1 = "SELECT isbn FROM livros WHERE isbn = '$isbn'";
					$consultaC1 = $ligacao->query($sqlC1);
					$consultaC1->setFetchMode(PDO::FETCH_ASSOC);
					
					while($resultC1 = $consultaC1->fetch()){
						$isbnC1 = $resultC1['isbn'];
					}
					
					if (!empty($isbnC1)){
						if ($isbnC1 == $isbn){
							echo "ISBN já existe!";
							header("Refresh:3 ; URL=inserirL.php");
						}
					}
					else{
						$sql = "INSERT INTO livros(isbn, codE, codA, titulo, genero, precoT, npaginas, quantStock, unidadesV, data_edicao) 
								VALUES(:isbn, :codE, :codA, :titulo, :genero, :precoT, :npaginas, :quantStock, :unidadesV, :data_edicao)";
					
						$inserir = $ligacao->prepare($sql);
						$inserir->bindParam( ':isbn', $isbn, PDO::PARAM_STR);
						$inserir->bindParam( ':codE', $codE, PDO::PARAM_STR);
						$inserir->bindParam( ':codA', $codA, PDO::PARAM_STR);
						$inserir->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
						$inserir->bindParam( ':genero', $genero, PDO::PARAM_STR);
						$inserir->bindParam( ':precoT', $precoT, PDO::PARAM_STR);
						$inserir->bindParam( ':npaginas', $npaginas, PDO::PARAM_STR);
						$inserir->bindParam( ':quantStock', $quantStock, PDO::PARAM_STR);
						$inserir->bindParam( ':unidadesV', $unidadesV, PDO::PARAM_STR);
						$inserir->bindParam( ':data_edicao', $data_edicao, PDO::PARAM_STR);
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


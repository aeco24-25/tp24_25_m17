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
			
		?>
		<section class="col-6">
			<?php 
				//Ligação
				include("../ligacao.php");
				$codCL = $_REQUEST['codCL'];
				$nome = $_REQUEST['nome'];
				$morada = $_REQUEST['morada'];
				$telefone = $_REQUEST['telefone'];
				$sql = "UPDATE clientes 
						SET nome = :nome, morada = :morada, telefone = :telefone
						WHERE codCL = :codCL";
				$atualizar = $ligacao->prepare($sql);
				$atualizar->bindParam( ':codCL', $codCL, PDO::PARAM_STR);
				$atualizar->bindParam( ':nome', $nome, PDO::PARAM_STR);
				$atualizar->bindParam( ':morada', $morada, PDO::PARAM_STR);
				$atualizar->bindParam( ':telefone', $telefone, PDO::PARAM_STR);
				$atualizar->execute();
				$contar = $atualizar->rowCount();
				if ($contar == 1)
				{
					print ("<table>");
					print("<tr><th>Código Cliente</th><th>Nome</th><th>Morada</th><th>Telefone</th></tr>");
					print("<tr><td>$codCL</td><td>$nome</td><td>$morada</td><td>$telefone</td></tr>");
					print("</table>");
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


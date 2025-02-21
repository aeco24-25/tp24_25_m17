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
	<link rel="stylesheet" href="tabela.css">
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
			include ("menu.inc");
			include("ligacao.php");
		?>
		<section class="col-6">
			<?php
				
				$nome = $_REQUEST['nome'];

				error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED & ~E_WARNING);
				$sql = $_REQUEST['sql'];
				$pag = $_REQUEST['pag'];
				$php_self = $_SERVER['PHP_SELF'];
				
				if ($nome){
					$sql1 = ($nome) ? "nome LIKE '%" . $nome . "%'" :"" ;
				}

				if ($nome){
					//Mostrar autores
					$sql = "SELECT nome FROM autores WHERE ";
					$sql .= $sql1. " ORDER BY nome";

					$consulta = $ligacao->query($sql);
					$consulta->setFetchMode(PDO::FETCH_ASSOC);
					$res = $consulta->rowCount();
					$num_reg = $consulta->rowCount();
					
					if ($res){
						$reg_pag = 3;
						
						if (!$pag) {
							$pag = 1;
						}
						
						$pag_ant = $pag-1;
						$pag_seg = $pag+1;
						$pag_ini = ($reg_pag * $pag)-$reg_pag;
						print ("<table>");
						print ("<tr><th>Nome do Autor</th></tr>");
						
						if ($num_reg <= $reg_pag){
							$num_pag = 1;
						}else if (($num_reg % $reg_pag) == 0) {
							$num_pag = $num_reg/$reg_pag;
						}else {
							$num_pag = $num_reg/$reg_pag + 1;
						}

						$sql2 = $sql." LIMIT $pag_ini, $reg_pag";
						$consulta = $ligacao->query($sql2);
						
						//Consulta dos autores
						while($result = $consulta->fetch()){
						/*Como a pesquisa é pelo nome do autor, esta variável PHP não pode ter o mesmo 
						  nome que a variável que vem do formulário*/
							$nomeA = $result['nome'];
							print("<tr><td>$nomeA</td></tr>");
						}		
						print("</table>");
						
						//Passar os registos por página
						if (($pag_ant) && ($pag>1)) {
							echo "<a class = \"tipo\" href=\"$php_self?pag=$pag_ant&
							nome=$nome&sql=$sql\">Anterior</a>|- ";
						}
						
						for ($i=1; $i<=$num_pag;$i++) {
							if($i !=$pag) {
								echo "<a class = \"tipo\" href=\"$php_self?pag=$i&
								nome=$nome&sql=$sql\">$i</a>-| ";
							}else {
								echo"$i -| ";
							}
						}
				
						if ($pag+1 < $num_pag) {
							echo  "<a class = \"tipo\" href=\"$php_self?pag=$pag_seg&
							nome=$nome&sql=$sql\"> Seguinte </a>";
						}
					}else{
						print ("Não há registos");
					}
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


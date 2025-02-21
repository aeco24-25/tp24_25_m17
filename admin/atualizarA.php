<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="../estilos.css">
	<link rel="stylesheet" href="../tabela.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../script.js"></script>
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
				error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED & ~E_WARNING);
				$sql = $_REQUEST['sql'];
				$pag = $_REQUEST['pag'];
				$php_self = $_SERVER['PHP_SELF'];
	
				//Mostrar autores
				$sql = "SELECT * FROM autores ORDER BY nome";
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
					print("<tr><th>Código</th><th>Nome</th><th>NIF</th><th>Morada</th><th>Idade</th>
					<th>Nacionalidade</th><th>Género Preferido</th></tr>");
					if ($num_reg <= $reg_pag){
						$num_pag = 1;
					}else if (($num_reg % $reg_pag) == 0) {
						$num_pag = $num_reg/$reg_pag;
					}else {
						$num_pag = $num_reg/$reg_pag + 1;
					}

					$sql1 = $sql." LIMIT $pag_ini, $reg_pag";
					$consulta = $ligacao->query($sql1);
					
					//Consulta à base de dados
					while($result = $consulta->fetch()){
						$codA = $result['codA'];
						$nome = $result['nome'];
						$nif = $result['nif'];
						$morada = $result['morada'];
						$idade = $result['idade'];
						$nacionalidade = $result['nacionalidade'];
						$generoP = $result['generoP'];
						print ("<tr><td><a href=\"atualizarA1.php?codA=$codA&
						nome=$nome&nif=$nif&morada=$morada&idade=$idade&nacionalidade=$nacionalidade&generoP=$generoP\">$codA</td></a><td>$nome</td><td>$nif</td>
						<td>$morada</td><td>$idade</td><td>$nacionalidade</td><td>$generoP</td></tr>");
					}	
					print ("</table>");
					//Passar os registos por página
					if (($pag_ant) && ($pag>1)) {
						echo "<a class = \"tipo\" href=\"$php_self?pag=$pag_ant&codA=$codA&
						nome=$nome&nif=$nif&morada=$morada&idade=$idade&nacionalidade=$nacionalidade&
						generoP=$generoP&sql=$sql\">Anterior </a>|- ";
					}
					for ($i=1; $i<=$num_pag;$i++) {
						if($i !=$pag) {
							echo "<a class = \"tipo\" href=\"$php_self?pag=$i&codA=$codA&
						nome=$nome&nif=$nif&morada=$morada&idade=$idade&nacionalidade=$nacionalidade&
						generoP=$generoP&sql=$sql\">$i</a>-| ";
						}else {
							echo"$i -| ";
						}
					}
					if ($pag+1 < $num_pag) {
						echo  "<a class = \"tipo\" href=\"$php_self?pag=$pag_seg&codA=$codA&
						nome=$nome&nif=$nif&morada=$morada&idade=$idade&nacionalidade=$nacionalidade&
						generoP=$generoP&sql=$sql\"> Seguinte </a>";
					}
				}else{
					print ("Não há registos");
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
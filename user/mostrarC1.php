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
			include ("menu_user.inc");
			include("../ligacao.php");
		?>
		<section class="col-6">
			<?php
				$user = $_SESSION["nome_utilizador"];
				
				//Selecionar os dados do utilizador
				$sqlU = "SELECT * FROM utilizadores";
				$consultaU = $ligacao->query($sqlU);
				$consultaU->setFetchMode(PDO::FETCH_ASSOC);
				
				//Consulta à base de dados
				while($resultU = $consultaU->fetch()){
					$nomeU = $resultU['nomeuser'];
					
					if ($nomeU == $user){
						$codCLU = $resultU['codCL'];
						break;
					}
				}
				
				//Selecionar o nome do cliente
				$nomeCL = $_POST['nomeC'];
				$sqlCL = "SELECT nome FROM clientes WHERE codCL = " .$codCLU. "";
				$consultaCL = $ligacao->query($sqlCL);
				$consultaCL->setFetchMode(PDO::FETCH_ASSOC);
				
				//Consulta à base de dados
				while($resultCL = $consultaCL->fetch()){
					$nomeCL1 = $resultCL['nome'];
				}
				
				//Verifica se o nome introduzido é igual ao nome do cliente
				if ($nomeCL == $nomeCL1)
				{			
					error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
					$sql = $_REQUEST['sql'];
					$pag = $_REQUEST['pag'];
					$php_self = $_SERVER['PHP_SELF'];
									
					//Mostrar as compras do cliente
					$sql = "SELECT * FROM vendas WHERE codCL = " .$codCLU. "";
					$consulta = $ligacao->query($sql);
					$consulta->setFetchMode(PDO::FETCH_ASSOC);
					$res = $consulta->rowCount();
					$num_reg = $consulta->rowCount();

					if ($res){
						$reg_pag = 3;
							
						if (!$pag){
							$pag = 1;
						}
							
						$pag_ant = $pag-1;
						$pag_seg = $pag+1;
						$pag_ini = ($reg_pag * $pag)-$reg_pag;
						print ("<table>");
						print("<tr><th>Data da Compra</th><th>Título</th><th>Preço Unitário</th>
								<th>Quantidade adquirida</th><th>Total Pago</th></tr>");
							
						if ($num_reg <= $reg_pag){
							$num_pag = 1;
						}
						else if (($num_reg % $reg_pag) == 0){
								$num_pag = $num_reg/$reg_pag;
							}
							else{
								$num_pag = $num_reg/$reg_pag + 1;
							}
						$sql1 = $sql." LIMIT $pag_ini, $reg_pag";
						$consultaV = $ligacao->query($sql1);
							
						//Consulta das vendas
						while($resultV = $consultaV->fetch()){
							$codL = $resultV['codL'];
								
							//Consulta do titulo do livro
							$sqlL = "SELECT titulo FROM livros WHERE isbn = '$codL'";
							$consultaL = $ligacao->query($sqlL);
							$consultaL->setFetchMode(PDO::FETCH_ASSOC);
														
							while($resultL = $consultaL->fetch()){
								$titulo = $resultL['titulo'];
							}
								
							$dataV = $resultV['dataV'];
							$precoU = $resultV['precoU'];
							$quantV = $resultV['quantV'];
							$totalV = $resultV['totalV'];
							print("<tr><td>$dataV</td><td>$titulo</td><td>$precoU €</td>
								<td>$quantV</td><td>$totalV €</td></tr>");
						}
							
						print("</table>");
							
						//Passar os registos por página
						if (($pag_ant) && ($pag>1)){
							echo "<a class = \"tipo\" href=\"$php_self?pag=$pag_ant&
										nome=$nomeC&sql=$sql\">Anterior</a>|- ";
						}
						for ($i=1; $i<=$num_pag;$i++){
							if($i != $pag){
								echo "<a class = \"tipo\" href=\"$php_self?pag=$i&
											nome=$nomeC&sql=$sql\">$i</a>-| ";
							}
							else {
									echo"$i -| ";
								}
						}
							
						if ($pag+1 < $num_pag) {
								echo  "<a class = \"tipo\" href=\"$php_self?pag=$pag_seg&
									nome=$nomeC&sql=$sql\"> Seguinte </a>";
						}
					}
				}
				else{
					print ("Não pode visualizar os dados de outro cliente.");
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


<?php
				$user = $_SESSION["nome_utilizador"];
				
				//Selecionar os dados do utilizador
				$sqlU = "SELECT * FROM utilizadores;";
				$consultaU = $ligacao->query($sqlU);
				$consultaU->setFetchMode(PDO::FETCH_ASSOC);
				//echo "1-$user <br>";
				//$i=1;
				//Consulta à base de dados
				while($resultU = $consultaU->fetch()){
					$nomeU = $resultU['nomeuser'];
					//echo "$i-$nomeU <br>";
					if ($nomeU == $user){
						$codCLU = $resultU['codCL'];
						//echo "$i-$nomeU <br>";
						//echo "$i-$codCLU <br>";
						break;
					}
					//$i++;
				}
				//echo "Nome user após ciclo-$nomeU <br>";
				//$nomeC = $_REQUEST['nomeC'];
				error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
				$sql = $_REQUEST['sql'];
				$pag = $_REQUEST['pag'];
				$php_self = $_SERVER['PHP_SELF'];
				
				//Selecionar o nome do cliente
				/*$sqlC = "SELECT * FROM clientes WHERE codCL = " .$codCLU. "";
				$consultaC = $ligacao->query($sqlC);
				$consultaC->setFetchMode(PDO::FETCH_ASSOC);
				
				//Consulta à base de dados
				while($resultC = $consultaC->fetch()){
					$nome = $resultC['nome'];
					$codC = $resultC['codCL'];
					
					if (($nome == $nomeC) AND ($codC == $codCL)){
							$nome = $nomeC;*/
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
								}else if (($num_reg % $reg_pag) == 0){
									$num_pag = $num_reg/$reg_pag;
								}else{
									$num_pag = $num_reg/$reg_pag + 1;
								}

								$sql1 = $sql." LIMIT $pag_ini, $reg_pag";
								$consulta = $ligacao->query($sql1);
					
								//Consulta dos livros
								while($result = $consulta->fetch()){
									$codL = $result['codL'];
						
									//Consulta do titulo do livro
									$sqlL = "SELECT titulo FROM livros WHERE isbn = " .$codL. "";
									$consultaL = $ligacao->query($sqlL);
									$consultaL->setFetchMode(PDO::FETCH_ASSOC);
						
									while($resultL = $consultaL->fetch()){
										$titulo = $resultL['titulo'];
									}
									$dataV = $result['dataV'];
									$precoU = $result['precoU'];
									$quantV = $result['quantV'];
									$totalV = $result['totalV'];
									print("<tr><td>$dataV</td><td>$titulo</td><td>$precoU</td>
									<td>$quantV</td><td>$totalV</td></tr>");
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
									}else {
										echo"$i -| ";
									}
								}
						
								if ($pag+1 < $num_pag) {
									echo  "<a class = \"tipo\" href=\"$php_self?pag=$pag_seg&
									nome=$nomeC&sql=$sql\"> Seguinte </a>";
								}
							}else{
								print ("Não há registos");
							}
					}else{
						print ("Não pode visualizar os dados de outro cliente.");
					}
				}
			?>
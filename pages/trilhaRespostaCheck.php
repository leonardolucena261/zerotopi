<?php 
    session_start();  	
	//exit(var_dump($_SESSION['id_pergunta']));
	//ini_set('display_errors', 1) ;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Do Zero à PI</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
  </head>
  <body>
	<!-- ATENÇÂO ESTA PAGINA PODE SER USADA TANTO PARA RESPOSTA CERTA QUANTO ERRADA, PRECISA FAZER A LÒGICA -->
	<!-- ATENÇÂO ESTA PAGINA PODE SER USADA TANTO PARA RESPOSTA CERTA QUANTO ERRADA, PRECISA FAZER A LÒGICA -->
	<!-- ATENÇÂO ESTA PAGINA PODE SER USADA TANTO PARA RESPOSTA CERTA QUANTO ERRADA, PRECISA FAZER A LÒGICA -->

    <div class="container">
		<!-- Cabeçalho -->
		<div class="row mt-4">
			<!-- Logo -->
			<div class="col-md-5">
				<img id="logo" alt="Do Zero à PI Logo" src="../pages/img/Zerotopi.png">
			</div>
			<!-- Troféu Player -->
			<div class="col-md-1 offset-md-3">
				<img alt="Trofeu" src="../pages/img/Medal1.png">
			</div>
			<!-- Avatar Player -->
			<div class="col-md-1">
				<img alt="Avatar" src="../pages/img/Avatar4.png">
			</div>
			<!-- Nome Player -->
			<div class="col-md-2">
					<span class="nomeJogador"><?php echo($_SESSION['nome'] );?></span>
					
			</div>
		</div>

		<?php 
			$pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');
			$consulta = $pdo->query("SELECT id, letra, alternativa, id_pergunta, id_resposta FROM public.alternativa WHERE id_pergunta=".$_SESSION['id_pergunta']." and id_resposta IS NOT NULL");
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);
			if($_GET['id'] == $linha['id'] ){

				$stmt = $pdo->prepare('INSERT INTO public.acerto(id_trilha, id_quiz, id_pergunta, id_jogador, ponto) VALUES(:id_trilha, :id_quiz, :id_pergunta, :id_jogador, 5)');
			//	exit(var_dump($stmt));
				$stmt->execute(array(
					':id_trilha' => $_SESSION['id_trilha'],
					':id_quiz' => $_SESSION['id_quiz'], 
					':id_pergunta' => $_SESSION['id_pergunta'],
					':id_jogador' => $_SESSION['id_jogador']            
				));
		?>
		<!-- Resposta certa -->
		<div class="row mt-4">
			
			<div class="col-md-12">

				<div class="d-flex justify-content-center cardTrilhaDetalhe respCerta">

					<div  class="p-2">
						<span class="respCertaTitle">Resposta Certa!</span>
					</div>
						
				</div>
				
			</div>
			
		</div>
		<?php
			}else{
		?>
		<!-- Resposta Errada -->
		<div class="row mt-4">
	
			<div class="col-md-12">

				<div class="d-flex justify-content-center cardTrilhaDetalhe respErrada">

					<div  class="p-2">
						<span class="respErradaTitle">Resposta Errada!</span>
					</div>
						
				</div>
				
			</div>
			
		</div>
		<!-- Resposta Errada fim -->
		<?php
			}
		?>
		<!-- Resposta certa fim -->

		<!-- Resposta Errada -->
		<!-- <div class="row mt-4">
	
			<div class="col-md-12">

				<div class="d-flex justify-content-center cardTrilhaDetalhe respErrada">

					<div  class="p-2">
						<span class="respErradaTitle">Resposta Errada!</span>
					</div>
						
				</div>
				
			</div>
			
		</div> -->
		<!-- Resposta Errada fim -->
		<?php
			$consulta_pergunta = $pdo->query("SELECT id, pergunta, id_quiz FROM public.pergunta where id =".$_SESSION['id_pergunta'].";");
			//exit(var_dump($consulta_pergunta));
			$linha_pergunta = $consulta_pergunta->fetch(PDO::FETCH_ASSOC);
		?>
		<!-- Pergunta -->
		<div id="tile" class="row mt-4 mx-2">
			<div>
				<?php echo($linha_pergunta['pergunta']);?>
			</div>
		</div>

		<!-- Bloco 1 -->
		<div class="row mt-4">
			
			<!-- coluna Imagem -->
			<div class="col-md-6">

				<!-- Imagem -->
				<div class="cardTrilhaDetalhe">

					<img src="../pages/img/imgMarcas.png" class="img-fluid" alt="...">
										
				</div>
				<!-- Final Card1 -->

			</div>

			<!-- coluna resposta -->
			<div class="col-md-6">

				<!-- Resposta -->
				<div class="cardTrilhaDetalhe respCerta row">

					<!-- coluna direita Card1 linha1 -->
					<div class="d-flex">

						<!-- coluna numero Resposta -->
						<div class="p-3">
							<h5><span class="badge badge-pill badge-primary"><?php echo($linha['letra']);?></span></h5>
						</div>

						<!-- Resposta -->
						<div  class="p-3">
							<span class="respCerta"><?php echo($linha['alternativa']);?></span>
						</div>
							
					</div>
					
				</div>
				<!-- pergunta 1 -->
				<?php
					$consulta_resposta = $pdo->query("SELECT id, resposta FROM public.resposta WHERE id = ".$linha['id_resposta']);
					$linha_resposta = $consulta_resposta->fetch(PDO::FETCH_ASSOC);

				?>
				<!-- Explicação da resposta -->
				<div class="d-flex justify-content-between mt-3">
					<div  class="mt-3">
						<span class="cardTrilhaTexto mt-3"><?php echo($linha_resposta['resposta']);?></span>
					</div>
				</div>
			</div>
		</div>
		<?php
					 
			
			$proxima_consulta = $pdo->query("SELECT id, pergunta, id_quiz FROM public.pergunta where id NOT IN (".implode(",", $_SESSION['pergunta']).");");
			
			$proxima_linha = $proxima_consulta->fetch(PDO::FETCH_ASSOC);
			//exit(var_dump($proxima_consulta));
			if($proxima_linha!=FALSE){
				if(!in_array($proxima_linha['id'], $_SESSION['pergunta'] )){
					array_push($_SESSION['pergunta'], $proxima_linha['id']);
				}
				$_SESSION['id_pergunta'] = $proxima_linha['id'];
				

		?>
				<!-- Botão próximo -->
				<div class="row mt-4">
					<div class="col-md-12">
						<div class="d-flex justify-content-center">
							<a href='trilhaPergunta.php?id=<?php echo($_SESSION['id_quiz']); ?>&pergunta=<?php echo($proxima_linha['id']); ?>'><button type="button" class="btn btn-circle btn-xl"><img alt="Tempo trilha" src="../pages/img/arrowNext.svg"></button></a>
						</div>
					</div>
				</div>
		<?php
			}else{
		?>
				<!-- Botão próximo -->
				<div class="row mt-4">
					<div class="col-md-12">
						<div class="d-flex justify-content-center">
							<a href='finalPasso.php?id=<?php echo($_SESSION['id_quiz']);?>'><button type="button" class="btn btn-circle btn-xl"><img alt="Tempo trilha" src="../pages/img/arrowNext.svg"></button></a>
						</div>
					</div>
				</div>	
				
				
		<?php
			}			
		?>
	
		
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/myChart.js"></script>
  </body>
</html>
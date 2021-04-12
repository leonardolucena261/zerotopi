<?php 
    session_start();  
	$_SESSION['id_trilha'] = $_GET['id'];
	ini_set('display_errors', 1) ;
	$_SESSION['pergunta'] = array();
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

		<!-- fechar -->
		<div id="tile" class="row mt-4">
		<a href="./index.php"><button type="button" class="close" aria-label="Close" href="#link" value="index">
				<span aria-hidden="true">&times;</span>
			</button></a>
		</div>
		
		<?php			
			$pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');
			$consulta = $pdo->query("SELECT id, nome, descricao FROM public.trilha where id =".$_GET['id'].";");
			$quiz = $pdo->query("SELECT * FROM public.quiz where id_trilha =".$_GET['id'].";");		
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);
			$passos = $quiz->rowCount();						
		?>
		<!-- Bloco 1 -->
		<div class="row mt-4">
			
			<!-- coluna esquerda -->
			<div class="col-md-5 p-4">

				<!-- coluna esquerda Linha1 -->
				<div class="d-flex justify-content-between">

					<!-- coluna esquerda Imagem Trilha -->
					<div class="col-md-5">
						<img alt="Imagem do R de Registro" src="../pages/img/Img2.png">
					</div>

					<!-- coluna esquerda Sua Pontuação -->
					<div class="mt-3">
						<span class="cardTrilhaTitulo">Trilha de <?php echo($linha['nome']); ?></span>
					</div>
				</div>

				<!-- coluna esquerda Linha2 -->
				<div class="d-flex justify-content-between mt-3">

					<!-- Titulo da trilha e descrição -->
					<div  class="mt-3">
						<span class="rankingTitle">Continue o Desafio</span>
						<span class="cardTrilhaTexto mt-3"><?php echo($linha['descricao']); ?></span>
					</div>
				</div>

				<!-- coluna esquerda Linha3 -->
				<div class="d-flex justify-content-between mt-3">

					<!-- coluna tempo da trilha -->
					<div>
						<img alt="Tempo trilha" src="../pages/img/clock.svg"> <?php echo(10*$passos);?> min
					</div>

					<!-- coluna esquerda Sua Pontuação -->
					<div>
						<img alt="Quantos passos" src="../pages/img/play.svg"> <?php echo($passos);?> passos
					</div>
				</div>

				<!-- coluna esquerda Linha4 -->
				<div class="d-flex mt-3">

					<!-- coluna Medalha 1 -->
					<div class="p-2">
						<img alt="Tempo trilha" src="../pages/img/medalTime.svg">
						<br>
						<span>Veloz</span>
					</div>

					<!-- coluna Medalha 2 -->
					<div class="p-2 ml-2">
						<img alt="Tempo trilha" src="../pages/img/medalCheck.svg">
						<br>
						<span>Acertivo</span>
					</div>

					<!-- Porcentagem -->
					<div class="ml-auto p-2">
						<!-- <img alt="Porcentagem concluida" src="../pages/img/porcent.png"> -->
						<canvas id="chPie" style="max-width: 100px"></canvas>
					</div>

				</div>

				<!-- coluna esquerda Linha5 -->
				<div class="d-flex justify-content-between mt-3">

					<!-- Titulo da Conhecimentos -->
					<div  class="mt-3">
						<span class="rankingTitle">Conhecimentos</span>
					</div>
				</div>

				<!-- coluna esquerda Linha6 -->
				<div class="d-flex justify-content-between mt-3">

					<!-- coluna pilula conhecimento -->
					<div>
						<span class="badge badge-pill badge-info"> <?php echo($linha['nome']); ?></span>
					</div>

				</div>

			</div>

			<!-- coluna direita -->
			<div class="col-md-6 offset-md-1">
				<?php 
					$count_quiz = 1;
					$_SESSION['quiz'] = array();
					while($linha_quiz = $quiz->fetch(PDO::FETCH_ASSOC)){
						if(!in_array($linha['id'], $_SESSION['pergunta'] )){
							array_push($_SESSION['quiz'], $linha_quiz['id']);
						}
						$pergunta = $pdo->query("SELECT * FROM public.pergunta where id_quiz =".$linha_quiz['id'].";");						
				?>
				<!-- coluna direita Card1 -->
				<div class="cardTrilhaDetalhe row mt-4 p-3">

					<!-- coluna direita Card1 linha1 -->
					<div class="d-flex justify-content-between mt-3">

						<!-- coluna numero Passo -->
						<div class="p-2">
							<h5><span class="badge badge-pill badge-primary"><?php echo($count_quiz); ?></span></h5>
						</div>

						<!-- Titulo da Conhecimentos -->
						<div  class="p-2">
							<span class="rankingTitle"><?php echo($linha_quiz['nome']); ?></span>
						</div>

						<!-- coluna tempo da trilha -->
						<div class="p-2">
							<img alt="Tempo trilha" src="../pages/img/clock.svg"> 10 min
						</div>

						<!-- coluna esquerda Sua Pontuação -->
						<div class="p-2">
							<img alt="Quantos passos" src="../pages/img/play.svg"> <?php echo($pergunta->rowCount());?> perguntas
						</div>
							
					</div>

					<!-- coluna direita Card1 linha2 -->
					<div class="d-flex justify-content-between m-3">

						<!-- Descrição do passo-->
						<div  class="mt-3">
							<span class="cardTrilhaTexto"><?php echo($linha_quiz['descricao']); ?></span>
						</div>
							
					</div>

					<!-- coluna direita Card1 linha2 -->
					<div class="d-flex m-3">
						<!-- Botão iniciar-->
						<a href='trilhaPergunta.php?id=<?php echo($linha_quiz['id']); ?>'> <button type="button" class="btn cardTrilhaDetalheButton">Jogar</button></a>
					</div>
					
				</div>

				<?php
					++$count_quiz; 
					}
				?>
				<!-- Final Card1 -->	
			</div>
		</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/myChart.js"></script>
  </body>
</html>
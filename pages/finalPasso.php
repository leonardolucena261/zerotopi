<?php 
    session_start();  	
	//exit(var_dump($_SESSION['id_pergunta']));
	//ini_set('display_errors', 1) ;
	$pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');
	//SELECT COUNT(DISTINCT id_pergunta) FROM acerto;
	//SELECT COUNT(DISTINCT id) FROM pergunta where id_quiz=3;
	$consulta_acerto_quiz = $pdo->query("SELECT COUNT(DISTINCT id_pergunta) as quantidade FROM acerto where id_quiz=".$_SESSION['id_quiz'].";");
	$consulta_pergunta_quiz = $pdo->query("SELECT COUNT(DISTINCT id) as quantidade FROM pergunta where id_quiz=".$_SESSION['id_quiz'].";");

	$linha_acerto = $consulta_acerto_quiz->fetch(PDO::FETCH_ASSOC);
	$linha_quiz = $consulta_pergunta_quiz->fetch(PDO::FETCH_ASSOC);
	
	$percent_concluido = ($linha_acerto['quantidade']*100)/$linha_quiz['quantidade'];

	//Conclusão
	$trilha =  $pdo->query("SELECT * FROM public.trilha where id =".$_SESSION['id_trilha'].";");
	$linha0 = $trilha->fetch(PDO::FETCH_ASSOC);	 
	$quiz = $pdo->query("SELECT * FROM public.quiz where id =".$_SESSION['id_quiz'].";");		
	$linha = $quiz->fetch(PDO::FETCH_ASSOC);
	$pergunta = $pdo->query("SELECT * FROM public.pergunta where id_quiz =".$_SESSION['id_quiz'].";");							


	if (($key = array_search($_SESSION['id_quiz'], $_SESSION['quiz'])) !== false) {
		unset($_SESSION['quiz'][$key]);
	}
	
	//EXIT(var_dump(min($_SESSION['quiz'])));
	//próximo quiz
	if(count($_SESSION['quiz'])!=0){
	$proximo_quiz = $pdo->query("SELECT * FROM public.quiz where id =".min($_SESSION['quiz']).";");
	$linha_proximo_quiz = $proximo_quiz->fetch(PDO::FETCH_ASSOC);
	$pergunta_proximo = $pdo->query("SELECT * FROM public.pergunta where id_quiz =".min($_SESSION['quiz']).";");	
	//EXIT(var_dump($linha_proximo_quiz));
	}else{
		header('Location: http://www.example.com/');
	}
	
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
		
		<!-- Titulo 1 -->
		<div class="row mt-4">
	
			<div class="col-md-12">

				<div class="d-flex justify-content-center">

					<div class="p-2 trilhaFinalTitle">
						<span>Passo Concluído</span>
					</div>
						
				</div>
				
			</div>
			
		</div>

		<!-- Cards -->
		<div class="d-flex flex-row justify-content-between my-4">

			<!-- Card 1 -->
			<div class="col-md-3 cardTrilha">
				<div class="d-flex flex-column justify-content-between m-3">


					<div  class="d-flex justify-content-center cardTrilhaTitulo my-3">
						<span>Trilha de <?php echo($linha0['nome']);?></span>
					</div>

					<div class="d-flex justify-content-center my-4">
						<img alt="Imagem do R de Registro" src="../pages/img/Img2.png">
					</div>

					
				</div>
			</div>

			<!-- Card 2 -->
			<div class="col-md-3 cardTrilha" style="position: relative;">

				<div  style="position: absolute; top: -3%; left: 87%;">
					<img alt="Passo Completo" src="../pages/img/complete.svg">
				</div>

				<div class="d-flex flex-column justify-content-between m-3">

					<div  class="d-flex flex-row mt-3 cardTrilhaTitulo">
						<span><?php echo($linha['nome']);?></span>
					</div>

					<div  class="d-flex flex-row my-3 cardTrilhaTexto">
						<span><?php echo($linha['descricao']);?>
						</span>
					</div>

					<div class="d-flex justify-content-between mt-1">

						<!-- coluna tempo da trilha -->
						<div class="p-2">
							<img alt="Tempo trilha" src="../pages/img/clock.svg"> 10 min
						</div>

						<!-- coluna esquerda Sua Pontuação -->
						<div class="p-2">
							<img alt="Quantos passos" src="../pages/img/play.svg"> <?php echo($pergunta->rowCount());?> perguntas
						</div>

					</div>

					<div  class="d-flex justify-content-center trilhaFinal mt-4">
						<span>Passo</span>
					</div>

					<div class="progress my-1">
						<div class="progress-bar bg-success" role="progressbar" 
						style="width: <?php echo($percent_concluido); ?>%;" aria-valuenow="<?php echo($percent_concluido); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo($percent_concluido); ?></div>
					</div>

					<div  class="d-flex justify-content-center trilhaFinal mt-1">
						<span>Completa</span>
					</div>

				</div>
			</div>

			<!-- Card 3 -->
			<div class="col-md-3 cardTrilha">
				<div class="d-flex flex-column justify-content-between m-3">
					
					<div  class="d-flex flex-row mt-3 cardTrilhaTitulo">
						<span><?php echo($linha_proximo_quiz['nome']); ?></span>
					</div>

					<div  class="d-flex flex-row my-3 cardTrilhaTexto">
						<span><?php echo($linha_proximo_quiz['descricao']); ?>
						</span>
					</div>

					<div class="d-flex justify-content-between mt-5">

						<!-- coluna tempo da trilha -->
						<div class="p-2">
							<img alt="Tempo trilha" src="../pages/img/clock.svg"> 10 min
						</div>

						<!-- coluna esquerda Sua Pontuação -->
						<div class="p-2">
							<img alt="Quantos passos" src="../pages/img/play.svg"> <?php echo($pergunta_proximo->rowCount());?>  perguntas
						</div>

					</div>

					<div class="d-flex mt-5">
						<!-- Botão iniciar-->
						<a href="trilhaPergunta.php?id=<?php echo($linha_proximo_quiz['id']); ?>"><button type="button" class="btn cardTrilhaDetalheButton">Iniciar</button></a>
					</div>

				</div>
			</div>

		</div>

		<!-- Botão próximo -->
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="d-flex justify-content-center">
					<a href="index.php"><button type="button" class="btn btn-circle btn-xl"><img alt="Tempo trilha" src="../pages/img/arrowNext.svg"></button></a>
				</div>
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
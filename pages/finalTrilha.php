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
					<span class="nomeJogador">Jogador 1</span>
				
			</div>
		</div>
		
		<!-- Titulo 1 -->
		<div class="row mt-4">
			
			<div class="col-md-12">

				<div class="d-flex justify-content-center">

					<div class="p-2 trilhaFinalTitle">
						<span>Trilha Concluída</span>
					</div>
						
				</div>
				
			</div>
			
		</div>

		<!-- Cards -->
		<div class="d-flex flex-row justify-content-around my-4">

			<!-- Card 1 -->
			<div class="col-md-3 cardTrilha" style="position: relative;">

				<div  style="position: absolute; top: -3%; left: 87%;">
					<img alt="Passo Completo" src="../pages/img/complete.svg">
				</div>

				<div class="d-flex flex-column justify-content-between m-3">

					<div  class="d-flex justify-content-center cardTrilhaTitulo my-3">
						<span>Trilha de Marcas</span>
					</div>

					<div class="d-flex justify-content-center my-4">
						<img alt="Imagem do R de Registro" src="../pages/img/Img2.png">
					</div>

					<div  class="d-flex justify-content-center trilhaFinal mt-4">
						<span>Trilha</span>
					</div>

					<div class="progress my-1">
						<div class="progress-bar bg-success" role="progressbar" 
						style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20%</div>
					</div>

					<div  class="d-flex justify-content-center trilhaFinal mt-1">
						<span>Completa</span>
					</div>

				</div>
			</div>

			<!-- Card 2 -->
			<div class="col-md-3 cardTrilha">
				<div class="d-flex flex-column justify-content-between m-3">
					
					<div  class="d-flex flex-row mt-3 cardTrilhaTitulo">
						<span>Categorização</span>
					</div>

					<div  class="d-flex flex-row my-3 cardTrilhaTexto">
						<span>Entenda como as marcas são classificadas quanto a sua apresentação e natureza 
						</span>
					</div>

					<div class="d-flex justify-content-between mt-5">

						<!-- coluna tempo da trilha -->
						<div class="p-2">
							<img alt="Tempo trilha" src="../pages/img/clock.svg"> 3 min
						</div>

						<!-- coluna esquerda Sua Pontuação -->
						<div class="p-2">
							<img alt="Quantos passos" src="../pages/img/play.svg"> 7 perguntas
						</div>

					</div>

					<div class="d-flex mt-5">
						<!-- Botão iniciar-->
						<button type="button" class="btn cardTrilhaDetalheButton">Iniciar</button>
					</div>

				</div>
			</div>

		</div>

		<!-- Botão próximo -->
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="d-flex justify-content-center">
					<button type="button" class="btn btn-circle btn-xl"><img alt="Tempo trilha" src="../pages/img/arrowNext.svg"></button>
				</div>
			</div>
		</div>

<<<<<<< HEAD:pages/finalTrilha.php
		

=======
>>>>>>> e1e7450c6fbff599650f236f651162cce734ccc2:pages/finalTrilha.html
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/myChart.js"></script>
  </body>
</html>
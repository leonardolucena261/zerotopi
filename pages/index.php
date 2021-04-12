<?php 
    session_start();  
	$pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');
	
	$usuario = $pdo->query("SELECT * FROM public.player Where email = '".$_SESSION['email']."';");
		
	$rst = $usuario->fetch(PDO::FETCH_ASSOC);
	$_SESSION['id_jogador'] = $rst['id'];

	$usuarioponto = $pdo->query("SELECT SUM(ponto) as ponto FROM public.acerto Where id_jogador = '".$_SESSION['id_jogador']."';");
	$rst = $usuarioponto->fetch(PDO::FETCH_ASSOC);

	$_SESSION['pontos'] = $rst['ponto'];

	if(isset($_SESSION['id_trilha'])){
		$consulta = $pdo->query("SELECT id, nome, descricao FROM public.trilha where id =".$_SESSION['id_trilha'].";");
		$linha = $consulta->fetch(PDO::FETCH_ASSOC);
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
					<span class="pontosJogador"><?php echo($_SESSION['pontos'])?></span>
			</div>
		</div>
		
		<!-- Titulo 1 -->
		<div id="tile" class="row mt-4">
			<div>
				Continue o Desafio
			</div>
		</div>
		
		<!-- Bloco 1 -->
		<div class="row mt-4">
			
			<!-- Cartão azul -->
			<div id="card1" class="col-md-7 p-4">
				<a href="<?php if(isset($linha)){echo("trilhaDetalhe.php?id=".$linha['id']);} ?>">
				<!-- Cartão azul Linha1 -->
				<div class="d-flex justify-content-between">

					<!-- Cartão azul Imagem Trilha -->
					<div class="col-md-6">
						<img alt="Imagem do R de Registro" src="../pages/img/Img1.png">						
					</div>
					
					<!-- Cartão azul Sua Pontuação -->
					<div id="card1text1" class="mt-3">
						<span>Sua melhor pontuação</span>
						<br>
						<span><?php echo($_SESSION['pontos'])?></span>
					</div>
				</div>

				<!-- Cartão azul Linha2 -->
				<div class="d-flex justify-content-between mt-3">

					<!-- Titulo da trilha e descrição -->
					<div  class="col-md-6 mt-3">
						<span id="card1text2"><?php if(isset($linha)){echo($linha['nome']);} ?></span>
						<span id="card1text3"><?php if(isset($linha)){echo($linha['descricao']);} ?></span>
					</div>

					<!-- Porcentagem -->
					<div class="mt-3">
						<!-- <img alt="Porcentagem concluida" src="../pages/img/porcent.png"> -->
						<canvas id="chPie" style="max-width: 130px"></canvas>
					</div>
				</div>
				</a>
			</div>
			

			<!-- Ranking -->
			<div id="ranking" class="col-md-4 offset-md-1">

				<!-- Cabeçalho Ranking -->
				<div class="row">

					<!-- Titulo -->
					<div class="col-md-6 rankingTitle">
						<span>Melhores Pontuações</span>
					</div>

					<!-- Filtro -->
					<div class="col-md-4 offset-md-2">
						<div class="dropdown">
							<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Geral
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							  <a class="dropdown-item" href="#">Amigos</a>
							  <a class="dropdown-item" href="#">Trilhas</a>
							</div>
						  </div>
					</div>
				</div>

				<!-- jogador 1 -->
				<div class="row mt-4">
					<div class="col-md-3">
						<img alt="Trofeu" src="../pages/img/Trofeu1.png">
					</div>
					<div class="col-md-3">
						<img alt="Avatar" src="../pages/img/Avatar1.png">
					</div>
					<div class="col-md-6">
						<span class="nomeJogador">Jogador 1</span>
						<span class="pontosJogador">2,760 pontos</span>
					</div>
				</div>

				<!-- jogador 2 -->
				<div class="row mt-4">
					<div class="col-md-3">
						<img alt="Trofeu" src="../pages/img/Trofeu2.png">
					</div>
					<div class="col-md-3">
						<img alt="Avatar" src="../pages/img/Avatar2.png">
					</div>
					<div class="col-md-6">
						<span class="nomeJogador">Jogador 2</span>
						<span class="pontosJogador">1,760 pontos</span>
					</div>
				</div>

				<!-- jogador 3 -->
				<div class="row mt-4">
					<div class="col-md-3">
						<img alt="Trofeu" src="../pages/img/Trofeu3.png">
					</div>
					<div class="col-md-3">
						<img alt="Avatar" src="../pages/img/Avatar3.png">
					</div>
					<div class="col-md-6">
						<span class="nomeJogador">Jogador 2</span>
						<span class="pontosJogador">760 pontos</span>
					</div>
				</div>			
			</div>
		</div>
		<!-- Titulo 2 -->
		<div id="tile" class="row mt-4">
			<div>Escolha sua trilha</div>
		</div>

		<!-- Bloco 2 -->
		<div class="row my-4">
			<?php
				//ini_set('display_errors', 1) ;
				
				$consulta = $pdo->query("SELECT id, nome, descricao FROM public.trilha;");
				$cont = 1;
				while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
			?>
			<!-- Card 1 -->
			<div class="<?php if($cont==1){echo('col-md-2 cardTrilha');}else{echo('col-md-2 offset-md-1 cardTrilha');}?>" >
				<a href="trilhaDetalhe.php?id=<?php echo($linha['id']); ?>" >
				<div class="d-flex flex-column justify-content-between m-3">
					<div class="d-flex justify-content-center my-3">
						<img alt="Imagem do R de Registro" src="../pages/img/Img1.png">
					</div>
					<div  class="d-flex flex-row mt-3 cardTrilhaTitulo">
						<span> <?php echo($linha['nome']); ?> </span>
					</div>
					<div  class="d-flex flex-row my-3 cardTrilhaTexto">
						<span><?php echo($linha['descricao']); ?></span>
					</div>
				</div>
				</a>
			</div>

			<?php 
				++$cont;
				}
			?>
			

		</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/myChart.js"></script>
  </body>
</html>
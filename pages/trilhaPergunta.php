<?php 
    session_start();  
	$_SESSION['id_quiz'] = $_GET['id'];
	
	ini_set('display_errors', 0) ;
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
		<div class="row mt-4">
			<div class="col-md-1">
				<a href="./index.php"><button type="button" class="close" aria-label="Close" value="index">
					<span aria-hidden="true">&times;</span>
				</button></a>
			</div>
			<div class="col-md-1">
				<img alt="Tempo trilha" src="../pages/img/clock.svg"> 
				<br> 7 sec
			</div>
			<div class="col-md-10">
				<!-- Preencher o style="width: 25%" aria-valuenow="25" com os valores do contador -->
				<div class="progress">
					<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
		<?php 
			$pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');
			if(!isset($_GET['pergunta'])){
				$consulta = $pdo->query("SELECT id, pergunta, id_quiz FROM public.pergunta where id_quiz =".$_GET['id'].";");
			}else{
				$consulta = $pdo->query("SELECT id, pergunta, id_quiz FROM public.pergunta where id =".$_GET['pergunta'].";");
			}
			if(is_array($_SESSION['pergunta']) and $_SESSION['pergunta']==NULL){		
				$_SESSION['pergunta'] = array();			
			}

			$linha = $consulta->fetch(PDO::FETCH_ASSOC);
			$_SESSION['id_pergunta'] = $linha['id'];

			if(!in_array($linha['id'], $_SESSION['pergunta'] )){
				array_push($_SESSION['pergunta'], $linha['id']);
			}
			//exit(var_dump($_SESSION['pergunta']));
		?>
		<!-- Titulo 1 -->
		<div id="tile" class="row mt-4 mx-2">
			<div>
				<?php echo($linha['pergunta']); ?>
			</div>
		</div>

		<!-- Bloco 1 -->
		<div class="row mt-4">
			
			<!-- coluna Imagem -->
			<div class="col-md-6">

				<!-- coluna Imagem -->
				<div class="cardTrilhaDetalhe">

					<img src="../pages/img/imgMarcas.png" class="img-fluid" alt="...">
										
				</div>
				<!-- Final Card1 -->

			</div>

			<!-- coluna Perguntas -->
			<div class="col-md-6">
				<?php 
					$consulta_alternativa = $pdo->query("SELECT id, letra, alternativa, id_pergunta, id_resposta FROM public.alternativa where id_pergunta =".$linha['id']." ORDER BY letra;");	
					$cont_alternativa = 1;
					while($linha_alternativa = $consulta_alternativa->fetch(PDO::FETCH_ASSOC))
					{
				?>
				<!-- pergunta 1 -->
				<div class="<?php if($cont_alternativa==1){ echo('cardTrilhaDetalhe e row');}else{echo('cardTrilhaDetalhe e row mt-3');}?>">

					<!-- coluna direita Card1 linha1 -->
					<div class="d-flex">

						<!-- coluna numero Passo -->
						<div class="p-3">
							<h5><span class="badge badge-pill badge-primary"><?php echo($linha_alternativa['letra']); ?></span></h5>
						</div>

						<!-- Titulo da Conhecimentos -->
						<div  class="p-3">
							<a href="trilhaRespostaCheck.php?id=<?php echo($linha_alternativa['id']);?>"> <span class="rankingTitle"><?php echo($linha_alternativa['alternativa']); ?></span> </a>
						</div>
							
					</div>
					
				</div>
				<!-- pergunta 1 -->
				<?php 
					++$cont_alternativa;
					}
				?>		
	
			</div>
		</div>

		<!-- Progresso trilha -->
		<div class="row mt-4">
			<div class="col-md-12">
				<!-- Preencher o style="width: 25%" aria-valuenow="25" com os valores do contador -->
				<div class="progress" style="height: 5px;">
					<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
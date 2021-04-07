<?php
    extract($_GET);
    $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');

    $conslutaplayer = $pdo->query("SELECT id,nome,email FROM player WHERE email='$email';");

    $resultado= $conslutaplayer->fetch(PDO::FETCH_ASSOC);

    if($resultado==FALSE){        
        $stmt = $pdo->prepare('INSERT INTO player (nome, email) VALUES(:nome, :email)');
        $stmt->execute(array(
            ':nome' => $nome,
            ':email' => $email
        ));

        if($stmt->rowCount() > 0){
            //inserir com sucesso redirencionar
            var_dump($stmt->rowCount());
        }
    }else{
        if($resultado['nome'] != $nome){
            //direcionar para tela de confirmação de atualização de dados           
        }else{
            //direcionar para o jogo
            ?>
            <script type="text/javascript">
                window.location.href = "conferindologin.php";
            </script>    
            <?php
        }
    }
?>
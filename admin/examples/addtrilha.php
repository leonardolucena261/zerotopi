<?php

    extract($_GET);
    if(isset($nometrilha) and isset($descricaotrilha)){
        $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');

        $stmt = $pdo->prepare('INSERT INTO public.trilha(nome, descricao) VALUES(:nome, :descricao)');
        $stmt->execute(array(
            ':nome' => $nometrilha, 
            ':descricao' => $descricaotrilha
        ));
        if($stmt->rowCount() > 0 ){
            ?>
            <script type="text/javascript">
                    window.location.href = "dashboard.php?msg=Trilha cadastrada com sucesso!";
            </script>
            <?php    
        }

    }else{
        ?>
        <script type="text/javascript">
                window.location.href = "cadastrartrilha.php?erro=Todos os campos devem ser preenchidos.";
        </script>
        <?php
    }

?>
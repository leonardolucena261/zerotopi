<?php
    extract($_GET);
    
    if($pergunta!=""){
        $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');

        $stmt = $pdo->prepare('INSERT INTO public.pergunta(pergunta, id_quiz) VALUES(:pergunta, :idquiz)');
        $stmt->execute(array(
            ':pergunta' => $pergunta, 
            ':idquiz' => $idquiz            
        ));
        if($stmt->rowCount() > 0 ){
            ?>
            <script type="text/javascript">
                    window.location.href = "cadastrarpergunta.php?id=<?php echo($idquiz);?>&msg=Quiz cadastrada com sucesso!";
            </script>
            <?php    
        }
    }else{
        ?>
        <script type="text/javascript">
                window.location.href = "novapergunta.php?id=<?php echo($idquiz);?>&erro=Todos os campos devem ser preenchidos.";
        </script>
        <?php
    }
?>
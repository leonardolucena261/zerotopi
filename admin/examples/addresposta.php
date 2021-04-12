<?php
    session_start();
    extract($_GET);
    
    if($resposta!=""){
        $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');

        $stmt = $pdo->prepare('INSERT INTO public.resposta(resposta) VALUES(:resposta)');
        $stmt->execute(array(
            ':resposta' => $resposta      
        ));
        $tempID = $pdo->lastInsertId();        
        if($stmt->rowCount() > 0 ){              
            $update = $pdo->prepare('UPDATE public.alternativa SET id_resposta=:id_resposta where id=:idalternativa');
            $update->execute(array(
                ':id_resposta' => $tempID,
                'idalternativa' => $idalternativa      
            ));
            ?>
            <script type="text/javascript">
                    window.location.href = "cadastraralternativa.php?id=<?php echo($_SESSION['admin_id_pergunta']);?>&msg=Quiz cadastrada com sucesso!";
            </script>
            <?php    
        }
    }else{
        ?>
        <script type="text/javascript">
                window.location.href = "novaalternativa.php?id=<?php echo($idquiz);?>&erro=Todos os campos devem ser preenchidos.";
        </script>
        <?php
    }
?>
<?php
    extract($_GET);
    
    if($alternativa!="" and $letra!=""){
        $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');
        //exit(Var_dump('INSERT INTO public.alternativa(letra, alternativa, id_pergunta) VALUES( $letra, $alternativa, $idpergunta)'));
        $stmt = $pdo->prepare('INSERT INTO public.alternativa(letra, alternativa, id_pergunta) VALUES(:letra, :alternativa, :id_pergunta)');
        $stmt->execute(array(
            ':letra' => $letra,
            ':alternativa' => $alternativa, 
            ':id_pergunta' => $idpergunta            
        ));
        if($stmt->rowCount() > 0 ){
            ?>
            <script type="text/javascript">
                    window.location.href = "cadastraralternativa.php?id=<?php echo($idpergunta);?>&msg=Quiz cadastrada com sucesso!";
            </script>
            <?php    
        }
    }else{
        ?>
        <script type="text/javascript">
                window.location.href = "novaalternativa.php?id=<?php echo($idpergunta);?>&erro=Todos os campos devem ser preenchidos.";
        </script>
        <?php
    }
?>
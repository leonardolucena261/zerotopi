<?php
    extract($_GET);
    
    if(($nometrilha!="") and ($descricaotrilha!="")){
        $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');

        $stmt = $pdo->prepare('UPDATE public.trilha SET nome=:nome, descricao=:descricao WHERE id=:id;');
        $stmt->execute(array(
            ':id' => $id, 
            ':nome' => $nometrilha, 
            ':descricao' => $descricaotrilha
        ));
        if($stmt->rowCount() > 0 ){
            ?>
            <script type="text/javascript">
                    window.location.href = "dashboard.php?msg=Trilha atualizada com sucesso!";
            </script>
            <?php    
        }
    }else{
        ?>
        <script type="text/javascript">
                window.location.href = 'editatrilha.php?id=<?php echo($id); ?>&erro=Todos os campos devem ser preenchidos.';
        </script>
        <?php
    }
?>
<?php
    extract($_GET);
    
    if($nomequiz!="" and $descricaoquiz!="" and $descricaoquiz!=""){
        $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');

        $stmt = $pdo->prepare('INSERT INTO public.quiz(nome, descricao, aprendizado, id_trilha) VALUES(:nome, :descricao, :conhecimentoquiz, :idtrilha)');
        $stmt->execute(array(
            ':nome' => $nomequiz, 
            ':descricao' => $descricaoquiz,
            ':conhecimentoquiz' => $conhecimentoquiz,
            ':idtrilha' => $idtrilha
        ));
        if($stmt->rowCount() > 0 ){
            ?>
            <script type="text/javascript">
                    window.location.href = "dashboard.php?msg=Quiz cadastrada com sucesso!";
            </script>
            <?php    
        }
    }else{
        ?>
        <script type="text/javascript">
                window.location.href = "cadastraquiz.php?id=<?php echo($idtrilha);?>&erro=Todos os campos devem ser preenchidos.";
        </script>
        <?php
    }
?>
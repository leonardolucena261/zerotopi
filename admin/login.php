<?php
    session_start();

    extract($_POST);
    $pdo = new PDO('pgsql:host=localhost;dbname=zerotopi;user=postgres;password=admin');
    $password = md5($password);

    $consulta = $pdo->query("SELECT id,username FROM public.\"user\" WHERE username='$username' and password='$password';");

    $resultado= $consulta->fetch(PDO::FETCH_ASSOC);

    if($resultado==FALSE){
        ?>
        <script type="text/javascript">
                window.location.href = "index.php?erro=Acesso negado.";
        </script>
        <?php
    }else{
        $_SESSION['username'] = $resultado['username'];
        ?>
        <script type="text/javascript">
                window.location.href = "examples/dashboard.php";
        </script>
        <?php
    }
    

?>
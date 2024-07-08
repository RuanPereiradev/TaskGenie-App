<?php
    include_once 'conexao.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            //code...
            $conexaoObj = new Conexao();
            $conexao = $conexaoObj->conectar();

            $stmt_check = $conexao->prepare("SELECT * FROM users WHERE email =  ? AND senha = ?");

            $stmt_check -> execute([$email,$password]);
            if($stmt_check->rowCount()===1){
                header('location: todas_tarefas.php');
                exit;
                $stmt_check ->closeCursor();
            }else{
                echo 'usuário não existe';
            }
        } catch (\Throwable $th) {
            echo 'Erro ao executar a operação'. $e->getMessage();
        }
    }

?>



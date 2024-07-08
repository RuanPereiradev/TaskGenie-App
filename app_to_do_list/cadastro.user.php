<?php

include_once 'conexao.php';

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $number = $_POST['number'];

    try{
        $conexaoObj = new Conexao();
        $conexao = $conexaoObj->conectar();

        $stmt_check = $conexao->prepare("SELECT * FROM users WHERE email = ?");

        $stmt_check -> execute([$email]);

        if($stmt_check->rowCount()>0){

            header('location: index.php');
            exit;
        }else{
            $stmt_insert = $conexao->prepare("INSERT INTO users(nome,email,senha, telefone) VALUES (?, ?, ?, ?)");

            $stmt_insert -> execute([$name, $email, $password, $number]);

            echo 'Dados inseridos com sucesso. <br>';

            $stmt_insert->closeCursor();
            $stmt_check->closeCursor();

            $conexao = null;

            header('location: todas_tarefas.php');
            exit;

        }

        }catch(PDOException $e){
            echo 'Erro ao executar a operação' .$e->getMessage();

    }

}
      
    


?>
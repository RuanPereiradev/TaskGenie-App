<?php
// $host = 'localhost';
// $dbname = 'db_taskgenie';
// $user = 'root';
// $pass = '';

// // Estabelece a conexão com o banco de dados
// $conection = new mysqli($host, $user, $pass, $dbname);

// // Verifica se houve algum erro na conexão
// if($conection->connect_error){
//     die('Erro na conexão: ' . $conection->connect_error);
// }


class Conexao{

    private $host = 'localhost';
    private $dbname = 'db_taskgenie';
    private $user = 'root';
    private $pass = '';

    public function conectar(){
        try{

            $conexao = new PDO(
                "mysql:host = $this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"

            );

            return $conexao;

        }catch (PDOException $e){
            echo '<p>'.$e->getMessage().'</p>';
        }
    }

}


?>


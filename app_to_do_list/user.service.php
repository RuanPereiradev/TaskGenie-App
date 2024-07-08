<?php

// class userService{

//     private $conection;
//     private $user;

//     public function __construct(Conection $conection, User $user){
//         $this->conection = $conection->conect();
//         $this -> user = $user;
//     }

//     public function insert(){
//         $query = 'insert into tb_users(user)values(:user)';
//         $stmt = $this->conection->prepare($query);
//         $stmt -> bindValue(':user', $this->user->__get('user'));
//         $stmt->execute();
//     }
//     public function recuperar(){
//         echo 'entrando em recuperar';
//         $query = '
//         select 
//         t.id, s.status, t.tarefa 
//         from
//          tb_tarefas as t 
//          left join tb_status as s on(t.id_status = s.id)

//         ';
//         $stmt = $this->conection->prepare($query);
//         $stmt ->execute();
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);

//     }

//     public function update(){
//         $query = "update tb_user set user ? where id = ?";
//         $stmt = $this->conection->prepare($query);
//         $stmt -> bindValue(1, $this->user->__get('user'));
//         $stmt -> bindValue(2, $this->user->__get('id'));
//         return $stmt -> execute();

//     }

//     public function remove(){
//         $query = 'delete from tb_user where id = :id';
//         $stmt = $this->conection-> prepare($query);
//         $stmt -> bindValue(':id', $this->user->__get('id'));
//         $stmt -> execute();
//     }
    

  
// }

?>
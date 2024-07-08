<?php 
$acao = 'recuperarTarefasCompletas';
// Supondo que você tenha importado $tarefas de tarefa.controler.php
require './app_to_do_list/tarefa.controler.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">  
<title>Todo List App in JavaScript | CodingNepal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Iconscout Link For Icons -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link href="/website/css/uicons-bold-rounded.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="./css/inicial.css">

<script>
    function editar(id, txt_tarefa) {
        // Limpa o conteúdo da tarefa para inserir o formulário de edição
        let tarefaElement = document.getElementById('tarefa_' + id);
        tarefaElement.innerHTML = '';

        // Cria o formulário dinâmico
        let form = document.createElement('form');
        form.action = 'tarefa_controler.php?acao=atualizar'; // Ajuste o action conforme necessário
        form.method = 'post';
        form.className = 'row';

        // Cria o input para a tarefa
        let inputTarefa = document.createElement('input');
        inputTarefa.type = 'text';
        inputTarefa.name = 'tarefa';
        inputTarefa.className = 'col-9 form-control';
        inputTarefa.value = txt_tarefa;
        form.appendChild(inputTarefa);

        // Cria o input hidden para o ID da tarefa
        let inputId = document.createElement('input');
        inputId.type = 'hidden';
        inputId.name = 'id';
        inputId.value = id;
        form.appendChild(inputId);

        // Cria o botão de submit
        let button = document.createElement('button');
        button.type = 'submit';
        button.className = 'col-3 btn btn-info'; // Ajuste o tamanho do botão conforme necessário
        button.innerHTML = 'Atualizar';
        form.appendChild(button);

        // Adiciona o formulário à div da tarefa
        tarefaElement.appendChild(form);
    }

    function remover(id){
        location.href = 'todas_tarefas.php?acao=remover&id='+id;
    }
    function marcarRealizada(id){
        location.href = 'todas_tarefas.php?acao=realizada&id='+id;
    }
    function inserir(id){
         location.href = 'todas_tarefas.php?acao=inserir&id='+id;

    }
</script>

</head>
<body>

<header>
    <div id="title">
        <h1>Task</h1>
        <h1>Genie</h1>
    </div>
    
    <div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Ajuda</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#" id="projetos-btn">Veja outros Projetos</a></li>
        </ul>
    </div>
</header>
    
<div class="wrapper">
    <form method="post" action="tarefa_controler.php?acao=inserir.">
        <div class="task-input">
            <img src="./menu-burger.svg" alt="icon" width="10px">
            <input type="text" placeholder="Add a new task" name="tarefa">
        </div>
        <div class="controls">
            <div class="filters">
            <span class="active" id="all"><a href="todas_tarefas.php">All</a></span>
                <span id="pending"><a href="tarefas_pendentes.php">Pending</a></span>
                <span id="completed"><a href="tarefas_completas.php">Completed</a></span>
            </div>
            <button class="clear-btn"onclick="inserir()">Add task</button>
       
        </div>

            <?php foreach ($tarefas as $indice => $tarefa) { ?>
                <ul class="task-box">
                    <li class="task">
                        <label for="<?= $tarefa->id ?>">
                        <?php if($tarefa->status == 'pendente'){?>
                            <input type="checkbox" onclick="marcarRealizada(<?= $tarefa->id ?>)">
                            <?php } ?>
                            <p id="tarefa_<?= $tarefa->id ?>">
                                <?= $tarefa->tarefa ?>(<?= $tarefa->status ?>)
                            </p>
                        </label>
                        <div class="settings">
                            <i class="uil uil-ellipsis-h"></i>
                            <i class="uil uil-trash" onclick="remover(<?= $tarefa->id ?>)"></i>
                            <?php if($tarefa->status == 'pendente'){?>
                            <i class="uil uil-edit-alt" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
                        <?php } ?>
                        </div>
                    </li>
                </ul>
            <?php } ?>
   


    </form>
</div>

<footer></footer>

</body>

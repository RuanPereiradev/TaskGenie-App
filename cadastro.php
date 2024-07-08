<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>TaskGenie</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Cadastre-se<br> para acessar o TaskGenie </h1>
            <img src="qa-engineers-animate.svg" class="left-login-image" alt="animacao">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>CADASTRE-SE</h1>
                <form action="cadastro_user.php" method="post">
                    <div class="text-field">
                        <label for="name">Nome e sobrenome</label>
                        <input type="text" name="name" placeholder="EX: Ruan Pereira" id="name" required>
                    </div>
                    
                    <div class="text-field">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="email" id="email" required>
                    </div>
                    
                    <div class="text-field">
                        <label for="password">Senha</label>
                        <input type="password" name="password" placeholder="Senha" id="password" required>
                    </div>

                    <div class="text-field">
                        <label for="number">Telefone</label>
                        <input type="tel" name="number" placeholder="N° telefone" id="tel" required>
                    </div>

                    <button type="submit" class="btn-login" name="submit">Cadastre-se</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

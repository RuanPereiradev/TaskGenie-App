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
            <h1>Faça login<br> para acessar o TaskGenie </h1>
            <img src="qa-engineers-animate.svg" class="left-login-image" alt="animacao">
            
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                    <form action="teste_login.php" method="post">
                    <div class="text-field">
                        <label for="email">Usuário</label>
                        <input type="email" type="email" name="email" placeholder="email" id="usuario" required>
                    </div>
                    
                    <div class="text-field">
                        <label for="senha">Senha</label>
                        <input type="password" name="password" placeholder="Senha" id="senha" required>
                    </div>
                  
                    <button type="submit" class="btn-login">Login</button>
                </form>



            </div>
        </div>
    </div>
</body>
</html>

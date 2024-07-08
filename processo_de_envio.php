<?php
require "./bibliotecas/PHPMailer/Exception.php";
require "./bibliotecas/PHPMailer/OAuth.php";
require "./bibliotecas/PHPMailer/PHPMailer.php";
require "./bibliotecas/PHPMailer/POP3.php";
require "./bibliotecas/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mensagem {
    private $para = null;
    private $assunto = null;
    private $mensagem = null;
    public $status = array('codigo_status'=>null, 'descricao_status'=>null);

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function mensagemValida(){
        if(empty($this->para)|| empty($this->assunto)|| empty($this->mensagem)){
            return false;
        }
        return true;
    }

}

$mensagem = new Mensagem();
$mensagem->__set('para', $_POST['para']);
$mensagem->__set('assunto',$_POST['assunto']);
$mensagem->__set('mensagem', $_POST['mensagem']);

if($mensagem->mensagemValida()){
    echo 'mensagem válida';
    header('location: index.php');
}

$mail = new PHPMailer(true);

try{

    //configuração do servidor
    $mail ->SMTPDebug = 2;
    $mail ->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ruanpereira@alu.ufc.br';
    $mail->Password = 'kvcu jqmj znrn lgln'; 
    $mail-> SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('ruanpereira@alu.ufc.br','Ruan remetente');
    $mail->addAddress($mensagem->__get('para'));
    $mail->addReplyTo('info@exemple.com', 'Information');

    //conteudo do email
    $mail->isHTML(true);
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body = $mensagem->__get('mensagem');
    $mail->AltBody = 'É necessário usar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

    $mail->send();

    $mensagem->status['código_status']=1;
    $mensagem->status['descricao_status']= 'E-mail enviado com sucesso';
    echo '';

}catch(Exception $e){
    $mensagem->status['código_status']=2;
    $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail! Por favor tente novamente mais tarde.';


}



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

                <?if($mensagem->status['codigo_status'] == 1){?>
                    <div class="div-sucesso">
                        <h1>Login bem-sucedido!</h1>
                        <p>Você foi autenticado com sucesso.</p>
                        <a href="index.html" class="btn-login">Voltar ao login</a>
                    </div>

                <?}?>

                <?if($mensagem->status['codigo_status'] == 2){?>
                    <div class="div-erro">
                        <h1>Erro ao autenticar</h1>
                        <p>Revise seu email e senha</p>
                        <a href="index.html" class="btn-login">Voltar ao login</a>
                    </div>
                    <?}?>




                    <!-- <div class="text-field">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário" id="usuario">
                    </div>
                    
                    <div class="text-field">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" id="senha">
                    </div> -->
                
                    <!-- <button type="submit" class="btn-login">Login</button> -->
                
            </div>
        </div>
    </div>
</body>
</html>

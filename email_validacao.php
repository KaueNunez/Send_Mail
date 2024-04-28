<?php

require './PHPMailer/Exception.php';
require './PHPMailer/OAuth.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/POP3.php';
require './PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mensagem
{
    public $email = null;
    public $assunto = null;
    public $mensagem = null;
    public $array = array('status' => null, 'descricao' => '');

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $value)
    {
        $this->$atributo = $value;
    }

    public function validarInputs()
    {
        if (empty($this->email) && empty($this->assunto) && empty($this->mensagem)) {
            header('location:index.php?resultado=1');
        } elseif (empty($this->email) && empty($this->assunto)) {
            header('location:index.php?resultado=2');
        } elseif (empty($this->email) && empty($this->mensagem)) {
            header('location:index.php?resultado=3');
        } elseif (empty($this->mensagem) && empty($this->assunto)) {
            header('location:index.php?resultado=4');
        } elseif (empty($this->email)) {
            header('location:index.php?resultado=5');
        } elseif (empty($this->assunto)) {
            header('location:index.php?resultado=6');
        } elseif (empty($this->mensagem)) {
            header('location:index.php?resultado=7');
        } else {

            $conta = "/^[a-zA-Z0-9\._-]+@";
            $domino = "[a-zA-Z0-9\._-]+.";
            $extensao = "([a-zA-Z]{2,4})$/";
            $validar_email = $this->email;
            $email_ok = '';
            $pattern = $conta . $domino . $extensao;
            if (!preg_match($pattern, $validar_email, $check)) {
                header('location:index.php?resultado=8');
            } else {

                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = false;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'seu_email';   //Digite o seu email           //SMTP username
                    $mail->Password   = 'sua_senha';   //Digite sua senha                           //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('seu_email');
                    $mail->addAddress($this->email);     //Add a recipient
                    //$mail->addAddress('ellen@example.com');               //Name is optional
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');

                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $this->assunto;
                    $mail->Body    = $this->mensagem;
                    $mail->AltBody = 'É necessário utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

                    $mail->send();
                    $this->array['status'] = 1;
                    $this->array['descricao'] = 'E-mail enviado com sucesso';
                } catch (Exception $e) {
                    $this->array['status'] = 2;
                    $this->array['descricao'] = "OPS!!!<br>Ocorreu um problema ao enviar o E-mail: {$mail->ErrorInfo}";
                }
            }
        }
    }
}

$mensagem = new Mensagem;

@$mensagem->__set('email', $_POST['email']);
@$mensagem->__set('assunto', $_POST['assunto']);
@$mensagem->__set('mensagem', $_POST['mensagem']);

echo $mensagem->validarInputs();

if ($mensagem->array['status'] === 1) {
    header('location:index.php?resultado=9');
} elseif ($mensagem->array['status'] === 2) {
    header('location:index.php?resultado=10');
} else {
    echo '';
}
?>
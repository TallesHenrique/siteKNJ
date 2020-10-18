<?php

date_default_timezone_set('America/Sao_Paulo');
 
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
if((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['message']) && !empty(trim($_POST['message'])))) {
 
	$nome = !empty($_POST['name']) ? $_POST['name'] : 'Não informado';
	$email = $_POST['email'];
	$telefone = !empty($_POST['fone']) ? utf8_decode($_POST['fone']) : 'Não informado';
	$mensagem = $_POST['message'];
	$data = date('d/m/Y H:i:s');
 
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'seuemail@gmail.com';
	$mail->Password = 'senhadoemail';
	$mail->Port = 587;
 
	$mail->setFrom('seuemail@gmail.com');
	$mail->addAddress('endereco1@provedor.com.br');
 
	$mail->isHTML(true);
	$mail->Subject = "Contato - Site KNJ-Archiqueture";
	$mail->Body = "Nome: {$nome}<br>
                   Email: {$email}<br>
                   Telefone: {$telefone}<br
				   Mensagem: {$mensagem}<br>
				   Data/hora: {$data}";
 
	if($mail->send()) {
		echo 'Email enviado com sucesso.';
	} else {
		echo 'Email não enviado.';
	}
} else {
	echo 'Não enviado: informar o email e a mensagem.';
}


?>
<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

  $name = $_POST['name'];
  $company = $_POST['company'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $data = date('d-m-Y H:i:s');

  $subject = 'Novo pedido de orçamento - [EloarNascimento]';

  $body = 'Recebido em: '.$data.' - ';
  $body .= 'Nome: '.$name.' - ';
  $body .= 'Empresa: '.$company.' - ';
  $body .= 'Telefone: '.$phone.' - ';
  $body .= 'E-mail: '.$email.' - ';
  $body .= 'Mensagem: '.$message;

  $csv = $name.';'.$company.';'.$phone.';'.$email.';'.$message.';'.$data.';BREAK'.PHP_EOL;

  $fp = fopen("listContact.csv", "a");
  $escreve = fwrite($fp, $csv);
  fclose($fp);

  $headers   = array();
  $headers[] = "MIME-Version: 1.0";
  $headers[] = "Content-type: text/html; charset=UTF-8";
  $headers[] = 'From: Eloar Estefany Nascimento <eloarestefanydev@gmail.com>';
  $headers[] = 'Reply-To: '.$nome.'<'.$email.'>';
  $headers[] = "X-Mailer: PHP/".phpversion();

  mail('eloarestefanydev@gmail.com', $subject, $body, $headers);
  exit;
}
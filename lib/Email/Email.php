<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    class Email{
        public function enviarEmail($emailDest, $titulo, $msgHtml, $msgText){
            $mail = new PHPMailer(true);

            //Configuração do Server
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->CharSet    = 'UTF-8';
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'matheusmunskelima@gmail.com';
            $mail->Password   = 'rcphboogdvnrewgm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Configuração do Destinatário
            $mail->setFrom('matheusmunskelima@gmail.com', 'SiteLogin');
            $mail->addAddress($emailDest, $emailDest);
            $mail->addReplyTo('matheusmunskelima@gmail.com', 'Information');

            //Configuração do conteúdo do email
            $mail->isHTML(true);
            $mail->Subject = "$titulo";
            $mail->Body = "$msgHtml";
            $mail->AltBody = "$msgText"; // Corpo da mensagem caso o recipiente não suporte HTML
            $mail->SMTPDebug  = 1; //PlainText, para caso quem receber o email não aceite o corpo HTML

            $mail->Send();
    }
 }
<?php
/**
 * BDSoftTech Agro - Processamento de Lead do Robô com Alerta SMTP
 */
require_once 'config/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (file_exists('phpmailer/PHPMailer.php')) {
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    $mailer_ok = true;
} else {
    $mailer_ok = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = strip_tags(trim($_POST['nome']));
    $telefone = strip_tags(trim($_POST['telefone']));
    $origem   = 'Chatbot';

    try {
        // 1. GRAVA NO BANCO DE DADOS
        $stmt = $pdo->prepare("INSERT INTO leads_contato (nome, email, telefone, assunto, mensagem, origem) VALUES (?, 'captado@bot.com', ?, 'Interesse via Bot', 'Usuário solicitou contato direto via Chatbot', ?)");
        $stmt->execute([$nome, $telefone, $origem]);

        // 2. DISPARA E-MAIL DE ALERTA
        if ($mailer_ok) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'email-ssl.com.br';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'comercial@bdsoft.com.br';
                $mail->Password   = 'BDSoft@2020'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port       = 587; 
                $mail->CharSet    = 'UTF-8';

                $mail->setFrom('comercial@bdsoft.com.br', 'Robot BDSoftech');
                $mail->addAddress('souzafelipe@bdsoft.com.br');
                $mail->addCC('comunicabdsoftech@bdsoft.com.br');
                $mail->addCC('dfnoleto@gmail.com');

                $mail->isHTML(true);
                $mail->Subject = "🤖 Novo Lead via Chatbot: $nome";
                
                $mail->Body = "
                    <div style='font-family: sans-serif; padding:20px; background:#f4f4f4;'>
                        <div style='background:#fff; padding:30px; border-radius:10px; border-left:8px solid #ffcc00;'>
                            <h2 style='color:#2c5e2e;'>🤖 Alerta do Assistente Virtual</h2>
                            <p>O Robô captou um novo lead interessado!</p>
                            <hr style='border:1px solid #eee;'>
                            <p><strong>Nome:</strong> {$nome}</p>
                            <p><strong>WhatsApp:</strong> {$telefone}</p>
                            <p><strong>Origem:</strong> Chatbot do Site</p>
                            <p><strong>Data:</strong> " . date('d/m/Y H:i') . "</p>
                        </div>
                    </div>";

                $mail->send();
            } catch (Exception $e) {}
        }
        echo "success";
    } catch (Exception $e) { echo "error"; }
}
<?php
require_once 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags($_POST['nome']);
    $telefone = strip_tags($_POST['telefone']);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO leads_contato (nome, telefone, mensagem, origem) VALUES (?, ?, 'Lead via Chatbot', 'Chatbot')");
        $stmt->execute([$nome, $telefone]);

        // Alerta simples via mail()
        $to = "souzafelipe@bdsoft.com.br";
        $subject = "🤖 Novo Lead Chatbot: $nome";
        $body = "Nome: $nome\nWhatsApp: $telefone\nOrigem: Chatbot";
        $headers = "From: comercial@bdsoft.com.br";
        
        mail($to, $subject, $body, $headers);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
}
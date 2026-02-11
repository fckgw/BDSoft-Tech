<?php
// Lógica simplificada de envio
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../config/db.php';
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $token = bin2hex(random_bytes(20));
        // Salvar token no banco... (Omitido para brevidade)
        
        $assunto = "Recuperação de Senha - BDsoftech";
        $mensagem = "Clique aqui para resetar sua senha: https://www.bdsoft.com.br/admin/reset.php?token=" . $token;
        $headers = "From: no-reply@bdsoft.com.br"; // Use um email real criado na Locaweb
        
        mail($email, $assunto, $mensagem, $headers);
        $sucesso = "Link enviado para seu e-mail!";
    }
}
?>
<!-- Formulário HTML similar ao Login aqui -->
<?php
require_once 'config/db.php';

$nome = "Administrador Owner";
$login = "Administrator";
$email = "souzafelipe@bdsoft.com.br";
$senha_pura = "Fckgw!151289";
$senha_hash = password_hash($senha_pura, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO usuarios (nome, login, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $login, $email, $senha_hash]);
    echo "Usuário Administrador criado com sucesso! delete este arquivo agora.";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
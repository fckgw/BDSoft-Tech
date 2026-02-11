<?php
/**
 * BDsoftech - Login Admin
 * Localização: /admin/index.php
 */
session_start();

// Caminho para o banco de dados (Sobe uma pasta)
$db_file = '../config/db.php';

if (!file_exists($db_file)) {
    die("Erro Crítico: O arquivo de configuração do banco de dados não foi encontrado.");
}
require_once $db_file;

// Se já estiver logado, vai direto pro Dashboard (opcional)
if (isset($_SESSION['admin_logado'])) {
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrativo - BDsoftech</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f4f7f6; display: flex; align-items: center; justify-content: center; height: 100vh; font-family: sans-serif; }
        .login-box { background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .btn-agro { background-color: #2c5e2e; color: white; border: none; padding: 12px; }
        .btn-agro:hover { background-color: #1e401f; color: white; }
        .password-wrapper { position: relative; }
        .password-wrapper i { position: absolute; right: 15px; top: 12px; cursor: pointer; color: #666; }
    </style>
</head>
<body>

<div class="login-box text-center">
    <img src="../assets/img/logo_bdsoftech.png" width="80" class="mb-3">
    <h4>Área Restrita</h4>
    <p class="text-muted">Gestão de Conteúdo BDsoftech</p>

    <form action="processa_login.php" method="POST">
        <div class="form-group text-start mb-3">
            <label class="form-label">Usuário</label>
            <input type="text" name="usuario" class="form-control" placeholder="Seu login" required>
        </div>
        
        <div class="form-group text-start mb-4">
            <label class="form-label">Senha</label>
            <div class="password-wrapper">
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Sua senha" required>
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>
        </div>

        <button type="submit" class="btn btn-agro w-100 mb-3">Entrar no Sistema</button>
        <a href="recuperar.php" class="text-decoration-none text-muted small">Esqueceu a senha?</a>
    </form>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#senha');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
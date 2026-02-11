<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - BDsoftech Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f4f7f6; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-card { width: 400px; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-green { background: #2c5e2e; color: #fff; width: 100%; }
        .password-container { position: relative; }
        .toggle-password { position: absolute; right: 10px; top: 10px; cursor: pointer; color: #666; }
    </style>
</head>
<body>

<div class="login-card text-center">
    <img src="../assets/img/logo_bdsoftech.png" width="80" alt="Logo">
    <h4 class="mt-3 mb-4">Painel BDsoftech</h4>
    
    <form action="auth.php" method="POST">
        <div class="mb-3 text-start">
            <label>Usuário</label>
            <input type="text" name="login" class="form-control" required>
        </div>
        <div class="mb-3 text-start password-container">
            <label>Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
            <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
        </div>
        <button type="submit" class="btn btn-green mb-3">Entrar</button>
        <br>
        <a href="esqueci-senha.php" class="text-muted small">Esqueci minha senha</a>
    </form>
</div>

<script>
function togglePassword() {
    const s = document.getElementById('senha');
    const icon = document.querySelector('.toggle-password');
    if (s.type === "password") {
        s.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        s.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
</body>
</html>
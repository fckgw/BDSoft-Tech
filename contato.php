<?php
/**
 * BDSoftTech Agro - Página de Contato (Versão Final Consolidada)
 * Localização: /contato.php
 */
require_once 'config/db.php';

// Silenciamos erros técnicos para o usuário, mas mantemos o log interno
ini_set('display_errors', 0);
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Carregamento da biblioteca PHPMailer
if (file_exists('phpmailer/PHPMailer.php')) {
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    $mailer_disponivel = true;
} else {
    $mailer_disponivel = false;
}

$status_msg = "";
$whatsapp_formatado = "(31) 97195-7751";
$email_comercial = "comercial@bdsoft.com.br";
$instagram_url = "https://www.instagram.com/bdsoftech/";
$linkedin_url = "https://www.linkedin.com/company/bdsoft-tecnologia/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = strip_tags(trim($_POST['nome']));
    $email    = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $telefone = strip_tags(trim($_POST['telefone']));
    $assunto  = strip_tags(trim($_POST['assunto']));
    $mensagem = strip_tags(trim($_POST['mensagem']));

    if (!empty($nome) && !empty($email) && !empty($mensagem)) {
        try {
            // 1. REGISTRO NO BANCO DE DADOS (6 colunas = 6 valores)
            $sql = "INSERT INTO leads_contato (nome, email, telefone, assunto, mensagem, origem) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $db_success = $stmt->execute([$nome, $email, $telefone, $assunto, $mensagem, 'Site']);

            if ($db_success) {
                // 2. DISPARO DO E-MAIL DE ALERTA PARA A DIRETORIA
                if ($mailer_disponivel) {
                    try {
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host       = 'email-ssl.com.br';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'comercial@bdsoft.com.br';
                        $mail->Password   = 'BDSoft@2020'; 
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                        $mail->Port       = 587; 
                        $mail->CharSet    = 'UTF-8';

                        $mail->setFrom('comercial@bdsoft.com.br', 'Falecom BDSoftTech');
                        $mail->addAddress('souzafelipe@bdsoft.com.br');
                        $mail->addCC('comunicabdsoftech@bdsoft.com.br');
                        $mail->addCC('dfnoleto@gmail.com');
                        $mail->addReplyTo($email, $nome);

                        $mail->isHTML(true);
                        $mail->Subject = "Novo Lead: $assunto - $nome";
                        $mail->Body    = "
                            <div style='font-family: sans-serif; padding:20px; background:#f4f4f4;'>
                                <div style='background:#fff; padding:30px; border-radius:10px; border-left:8px solid #2c5e2e;'>
                                    <h2 style='color:#2c5e2e;'>Novo Contato Recebido</h2>
                                    <p><strong>Nome:</strong> {$nome}</p>
                                    <p><strong>E-mail:</strong> {$email}</p>
                                    <p><strong>WhatsApp/Tel:</strong> {$telefone}</p>
                                    <p><strong>Assunto:</strong> {$assunto}</p>
                                    <hr style='border:1px solid #eee;'>
                                    <p><strong>Mensagem:</strong><br>{$mensagem}</p>
                                </div>
                            </div>";

                        $mail->send();
                    } catch (Exception $e) {
                        // Silencia erro de e-mail para o cliente não ver erro 500
                    }
                }

                // 3. MENSAGEM DE SUCESSO PREMIUM PARA O CLIENTE
                $status_msg = "
                <div class='alert shadow-lg border-0 p-4 animate__animated animate__zoomIn' style='background: #fff; border-left: 5px solid #2c5e2e !important;'>
                    <div class='d-flex align-items-center'>
                        <i class='fas fa-check-circle fa-3x me-3' style='color: #2c5e2e;'></i>
                        <div>
                            <h4 class='mb-1' style='color: #2c5e2e; font-weight: 800;'>Solicitação Recebida com Sucesso!</h4>
                            <p class='mb-0 text-dark'>Olá <strong>$nome</strong>, nossa equipe estratégica já foi notificada. Em breve, um especialista entrará em contato para arquitetar a melhor solução para o seu negócio.</p>
                        </div>
                    </div>
                </div>";
            }

        } catch (PDOException $e) {
            $status_msg = "<div class='alert alert-danger shadow'>Erro técnico ao processar. Por favor, tente o WhatsApp.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fale Conosco | BDSoftTech</title>
    
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        .navbar-brand img { max-height: 80px !important; width: auto !important; object-fit: contain !important; }
        
        .breadcrumb-area { 
            background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); 
            background-size: cover; background-position: center; padding: 140px 0; position: relative; color: #fff; text-align: center;
        }
        .breadcrumb-area::after { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 1; }
        .breadcrumb-container { position: relative; z-index: 2; }
        
        .breadcrumb-area h2 { font-size: 52px; font-weight: 800; }
        .sub-text-agro { color: #78e08f; font-size: 20px; font-weight: 600; display: block; margin-top: 30px; }

        .contact-info-box {
            padding: 30px;
            background: #fdfdfd;
            border-left: 5px solid #2c5e2e;
            border-radius: 0 15px 15px 0;
            height: 100%;
        }

        .form-box-agro { background: #fff; padding: 45px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.07); }
        .form-label { font-weight: 700; color: #2c5e2e; margin-top: 10px; }
        
        .btn-enviar { 
            background: #2c5e2e; border: none; padding: 15px; font-size: 18px; border-radius: 10px; transition: 0.3s; 
        }
        .btn-enviar:hover { background: #ffcc00; color: #2c5e2e; transform: translateY(-3px); }

        /* FOOTER CLEAN STYLE */
        .footer-clean { background: #111; color: #eee; padding: 80px 0 30px; }
        .footer-clean h4 { color: #fff; font-weight: 700; margin-bottom: 25px; font-size: 18px; text-transform: uppercase; letter-spacing: 1px; }
        .footer-clean p { font-size: 15px; opacity: 0.8; }
        .footer-clean .social-links a { 
            color: #fff; font-size: 22px; margin-right: 20px; transition: 0.3s; 
            display: inline-block; background: rgba(255,255,255,0.1); width: 45px; height: 45px; 
            line-height: 45px; text-align: center; border-radius: 50%;
        }
        .footer-clean .social-links a:hover { background: #2c5e2e; transform: translateY(-5px); }
        .footer-clean ul li { list-style: none; margin-bottom: 12px; }
        .footer-clean ul li a { color: #eee; opacity: 0.8; transition: 0.3s; text-decoration: none; }
        .footer-clean ul li a:hover { opacity: 1; color: #ffcc00; padding-left: 5px; }
        .footer-bottom-border { border-top: 1px solid rgba(255,255,255,0.05); margin-top: 50px; padding-top: 30px; font-size: 13px; opacity: 0.5; }
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-default validnavs dark">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png" alt="BDSoftTech">
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" class="btn btn-sm btn-success text-white px-4" style="border-radius: 20px;">Voltar ao Início</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="breadcrumb-area">
        <div class="breadcrumb-container container">
            <h2 class="animate__animated animate__fadeInDown">Vamos arquitetar <br> o seu sucesso juntos.</h2>
            <span class="sub-text-agro animate__animated animate__fadeInUp">Sua jornada para a transformação digital no campo e nos negócios começa aqui.</span>
        </div>
    </div>

    <div class="container" style="padding: 90px 0;">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="contact-info-box shadow-sm">
                    <h3 style="color: #2c5e2e; font-weight: 800; margin-bottom: 25px;">Canais Diretos</h3>
                    <p>Nossa matriz tecnológica está preparada para entender seu desafio e entregar uma arquitetura de solução sob medida.</p>
                    <div class="mt-5">
                        <p class="mb-1 text-muted"><strong>WhatsApp Consultivo:</strong></p>
                        <a href="https://wa.me/5531971957751" target="_blank" class="text-dark fs-4 fw-bold"><?php echo $whatsapp_formatado; ?></a>
                    </div>
                    <div class="mt-4">
                        <p class="mb-1 text-muted"><strong>E-mail de Projetos:</strong></p>
                        <a href="mailto:<?php echo $email_comercial; ?>" class="text-dark fs-5"><?php echo $email_comercial; ?></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form-box-agro">
                    <?php echo $status_msg; ?>
                    
                    <?php if($status_msg == ""): ?>
                    <form action="contato.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nome Completo ou Empresa</label>
                                <input type="text" name="nome" class="form-control" placeholder="Como devemos te chamar?" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">E-mail Corporativo</label>
                                <input type="email" name="email" class="form-control" placeholder="seu@email.com" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telefone / WhatsApp</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="(31) 90000-0000" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Qual solução você busca?</label>
                            <select name="assunto" class="form-select">
                                <option value="Demo AgroControl">Demonstração do AgroControl</option>
                                <option value="Software sob Medida">Arquitetura de Software / ERP</option>
                                <option value="BI e IA">Indicadores, BI e Inteligência Artificial</option>
                                <option value="Marketing 3D">Posicionamento de Mercado e Vídeos 3D</option>
                                <option value="Outros Assuntos">Outros Desafios / Assuntos</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Resumo do Projeto / Necessidade</label>
                            <textarea name="mensagem" class="form-control" rows="4" placeholder="Conte-nos brevemente sobre o seu cenário atual..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-enviar w-100 fw-bold shadow">
                            SOLICITAR ATENDIMENTO ESTRATÉGICO <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

      <!-- CRIAÇÃO DO RODAPE -->
    <!-- FOOTER CLEAN STYLE -->
    <footer class="footer-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                     <h4>Navegação</h4>
                    <ul class="p-0">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="gestao-financeira.php">Segmentos | Gestão Financeira</a></li>
                        <li><a href="gestao-producao.php">Segmentos | Gestão Produção</a></li>
                        <li><a href="indicadores-bi-ia.php">Segmentos | Gestão BI & IA</a></li>
                        <li><a href="automacao.php">Segmentos | Gestão Para seu Negocio</a></li>
                        <li><a href="index.php#pilares">Diferenciais</a></li>
                        <li><a href="contato.php">Fale Conosco</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 text-center">
                    <h4>Conecte-se conosco</h4>
                    <p>Acompanhe nossa jornada e as inovações que estão transformando o mercado.</p>
                    <div class="social-links mt-4">
                        <a href="<?php echo $instagram_url; ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="<?php echo $linkedin_url; ?>" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-5 text-right text-md-center">
                    <h4>Contato</h4>
                    <p>E-mail: <?php echo $email_comercial; ?></p>
                    <p>WhatsApp: <?php echo $whatsapp_formatado; ?></p>
                    <p>Atendimento Nacional</p>
                </div>
            </div>
            <div class="footer-bottom-border text-center">
                <p class="mb-0">&copy; <?php echo date("Y"); ?> BDSoftTech - Todos os Direitos Reservados. Projetando o amanhã com tecnologia hoje.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</body>
</html>
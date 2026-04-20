<?php
require_once 'config/db.php';
$whatsapp_formatado = "(31) 97195-7751";
$email_comercial = "comercial@bdsoft.com.br";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão Financeira Inteligente | BDSoftTech</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        .navbar-brand img { max-height: 80px !important; width: auto !important; object-fit: contain !important; }
        .segment-hero { background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/img/product/gestaofinanceiro.png'); background-size: cover; background-position: center; padding: 120px 0; color: #fff; text-align: center; }
        .project-card { border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 15px; transition: 0.3s; margin-bottom: 30px; }
        .project-card:hover { transform: translateY(-10px); }
        .footer-clean { background: #111; color: #eee; padding: 80px 0 30px; }
    </style>
</head>
<body>
    <div class="top-bar-area bg-dark text-light"><div class="container"><ul class="item-flex"><li>Atendimento: Seg - Sex: 08:00 - 18:00</li><li>WhatsApp: <?php echo $whatsapp_formatado; ?></li></ul></div></div>
    <header><nav class="navbar navbar-default validnavs dark"><div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png"></a><ul class="nav navbar-nav navbar-right"><li><a href="index.php">Início</a></li><li><a href="contato.php">Fale Conosco</a></li></ul></div></nav></header>

    <div class="segment-hero">
        <div class="container">
            <h1 class="display-4 fw-bold">Gestão Financeira</h1>
            <p class="lead">Arquitetura de dados para o controle absoluto da sua rentabilidade.</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 style="color: #2c5e2e; font-weight: 800;">Decisões baseadas em números reais.</h2>
                <p class="mt-4">Desenvolvemos sistemas que traduzem a complexidade financeira do Agro e do Comércio em dashboards simples e eficientes. Do fluxo de caixa à análise de DRE, garantimos que cada centavo seja monitorado.</p>
                <ul class="list-unstyled mt-4">
                    <li><i class="fas fa-check-circle text-success me-2"></i> Fluxo de Caixa Real-time</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i> Gestão de Custos Fixos e Variáveis</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i> Planejamento Orçamentário (Budget vs Actual)</li>
                </ul>
            </div>
            <div class="col-lg-6 text-center">
                <img src="assets/img/product/gestaofinanceiro.png" class="img-fluid rounded-3 shadow" alt="Finanças">
            </div>
        </div>

        <h3 class="text-center mb-5" style="font-weight: 800; color: #2c5e2e;">Projetos Demonstrativos</h3>
        <div class="row">
            <!-- Projeto 1 -->
            <div class="col-md-4">
                <div class="card project-card p-4">
                    <h5 class="fw-bold">AgroCashFlow</h5>
                    <p>Sistema especializado em projetar entradas e saídas baseadas no ciclo da safra.</p>
                </div>
            </div>
            <!-- Projeto 2 -->
            <div class="col-md-4">
                <div class="card project-card p-4">
                    <h5 class="fw-bold">RetailProfit 360</h5>
                    <p>Controle de margem de contribuição por produto para comércios de alta rotatividade.</p>
                </div>
            </div>
            <!-- Projeto 3 -->
            <div class="col-md-4">
                <div class="card project-card p-4">
                    <h5 class="fw-bold">DRE Automatizado</h5>
                    <p>Integração total de contas para geração de relatórios de lucro e perdas sem erro humano.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-clean">
        <div class="container text-center">
            <h4>Solicite uma análise financeira do seu negócio</h4>
            <a href="https://wa.me/5531971957751" class="btn btn-success btn-lg mt-3" style="border-radius: 30px;">Agendar Demonstração</a>
            <div class="footer-bottom-border mt-5 pt-3"><p>&copy; 2024 BDSoftTech - Todos os Direitos Reservados</p></div>
        </div>
    </footer>
</body>
</html>
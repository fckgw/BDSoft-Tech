<?php
require_once 'config/db.php';
$whatsapp_formatado = "(31) 97195-7751";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Produção | BDSoftTech Agro</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        .segment-hero { background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/img/product/gestaoproducao.jpg'); background-size: cover; background-position: center; padding: 120px 0; color: #fff; text-align: center; }
        .project-card { border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 15px; margin-bottom: 30px; }
        .footer-clean { background: #111; color: #eee; padding: 80px 0 30px; }
    </style>
</head>
<body>
    <header><nav class="navbar navbar-default validnavs dark"><div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png" style="max-height:80px;"></a><ul class="nav navbar-nav navbar-right"><li><a href="index.php">Início</a></li></ul></div></nav></header>

    <div class="segment-hero">
        <div class="container">
            <h1 class="display-4 fw-bold">Gestão de Produção</h1>
            <p class="lead">Eficiência operacional do plantio ao faturamento.</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center"><img src="assets/img/product/gestaoproducao.jpg" class="img-fluid rounded-circle shadow" style="width: 400px; height: 400px; object-fit: cover;"></div>
            <div class="col-lg-6">
                <h2 style="color: #2c5e2e; font-weight: 800;">Tecnologia no rastro da colheita.</h2>
                <p>Nossas soluções de produção permitem monitorar cada etapa do processo produtivo. Controlamos insumos, mão de obra e maquinário para reduzir desperdícios e maximizar a entrega final.</p>
            </div>
        </div>

        <h3 class="text-center mt-5 mb-5" style="font-weight: 800; color: #2c5e2e;">Projetos em Destaque</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card project-card p-4">
                    <h5>Monitoramento de Máquinas</h5>
                    <p>Análise de telemetria e consumo de combustível para frotas agrícolas e industriais.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card project-card p-4">
                    <h5>Rastreabilidade Total</h5>
                    <p>Controle de lote e origem para conformidade com normas internacionais de exportação.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-clean"><div class="container text-center"><p>&copy; 2024 BDSoftTech</p></div></footer>
</body>
</html>
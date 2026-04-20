<?php
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Automação Inteligente | BDSoftTech</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        .segment-hero { background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/img/product/automacao.jpg'); background-size: cover; padding: 120px 0; color: #fff; text-align: center; }
        .footer-clean { background: #111; color: #eee; padding: 60px 0; }
    </style>
</head>
<body>
    <header><nav class="navbar navbar-default validnavs dark"><div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png" style="max-height:80px;"></a></div></nav></header>

    <div class="segment-hero">
        <div class="container">
            <h1 class="fw-bold">Automação de Negócios</h1>
            <p>Ganhe escala eliminando o trabalho manual.</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2 style="color: #2c5e2e; font-weight: 800;">Integração e Agilidade.</h2>
                <p class="mt-4">Sua empresa não pode parar por causa de processos lentos. Automatizamos desde a emissão de notas fiscais até a integração entre seu CRM e seu ERP.</p>
                <div class="alert alert-success mt-4">
                    <strong>Projeto Demo:</strong> Automatização de Lançamentos Fiscais via Robôs (RPA).
                </div>
            </div>
            <div class="col-lg-5">
                <img src="assets/img/product/automacao.jpg" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
    <footer class="footer-clean text-center"><p>&copy; 2024 BDSoftTech</p></footer>
</body>
</html>
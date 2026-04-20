<?php
$id = $_GET['id'] ?? 'financeira';
$conteudo = [
    'financeira' => ['titulo' => 'Gestão Financeira', 'texto' => 'Controle total de fluxo, DRE e rentabilidade.'],
    'producao'   => ['titulo' => 'Gestão de Produção', 'texto' => 'Eficiência operacional do campo à indústria.'],
    'bi'         => ['titulo' => 'Indicadores, BI & IA', 'texto' => 'Dashboards estratégicos e Inteligência Artificial.'],
    'automacao'  => ['titulo' => 'Automação', 'texto' => 'Ganhe escala eliminando processos manuais.'],
];
$data = $conteudo[$id];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?php echo $data['titulo']; ?> | BDSoftTech</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="padding: 100px 0;">
    <div class="container text-center">
        <h1><?php echo $data['titulo']; ?></h1>
        <p class="lead"><?php echo $data['texto']; ?></p>
        <a href="index.php" class="btn btn-success">Voltar para Início</a>
    </div>
</body>
</html>
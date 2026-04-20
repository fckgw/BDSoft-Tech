<?php
/**
 * BDSoftTech Agro - Página de Segmento Dinâmica
 */
require_once 'config/db.php';

$id = $_GET['id'] ?? 'financeira';

// Mapeamento dos itens das Especialidades
$segmentos = [
    'financeira' => [
        'titulo' => 'Gestão Financeira Inteligente',
        'desc'   => 'Controle absoluto de fluxo de caixa, DRE, custos operacionais e rentabilidade estratégica.',
        'img'    => 'assets/img/product/gestaofinanceiro.png'
    ],
    'producao' => [
        'titulo' => 'Gestão de Produção de Ponta a Ponta',
        'desc'   => 'Do campo à indústria: monitoramento técnico, operacional e gestão de insumos com precisão.',
        'img'    => 'assets/img/product/gestaoproducao.jpg'
    ],
    'bi' => [
        'titulo' => 'Indicadores, BI & Inteligência Artificial',
        'desc'   => 'Aceleração de projetos com IA, dashboards estratégicos e análise preditiva para o seu negócio.',
        'img'    => 'assets/img/product/indicadores_IA_BI.jpg'
    ],
    'automacao' => [
        'titulo' => 'Automação para seu Negócio',
        'desc'   => 'Elimine gargalos manuais e ganhe escala real com processos inteligentes e integrados.',
        'img'    => 'assets/img/product/automacao.jpg'
    ]
];

$dados = $segmentos[$id] ?? $segmentos['financeira'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $dados['titulo']; ?> | BDSoftTech</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        .navbar-brand img { max-height: 80px !important; width: auto !important; }
        .page-header { background: #2c5e2e; padding: 100px 0; color: #fff; text-align: center; }
        .content-area { padding: 80px 0; background: #fdfdfd; }
        .segmento-img { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; }
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-default validnavs dark"><div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png"></a><ul class="nav navbar-nav navbar-right"><li><a href="index.php">Início</a></li></ul></div></nav>
    </header>

    <div class="page-header">
        <div class="container">
            <h2 class="fw-bold"><?php echo $dados['titulo']; ?></h2>
        </div>
    </div>

    <section class="content-area">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="<?php echo $dados['img']; ?>" class="segmento-img" alt="Imagem Segmento">
                </div>
                <div class="col-lg-6">
                    <h3 style="color: #2c5e2e; font-weight: 800;">Arquitetando Soluções</h3>
                    <p class="mt-4 fs-5"><?php echo $dados['desc']; ?></p>
                    <p>Nossa consultoria profunda analisa seu processo para aplicar a tecnologia exata que o seu negócio precisa para escalar.</p>
                    <hr>
                    <a href="contato.php" class="btn btn-success p-3 fw-bold mt-3">AGENDAR DEMONSTRAÇÃO</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light p-5 text-center">
        <p>&copy; <?php echo date("Y"); ?> BDSoftTech Agro - Tecnologia que Transforma Negócios.</p>
    </footer>

</body>
</html>
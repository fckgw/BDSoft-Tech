<?php
/**
 * BDsoftech - Home Otimizada com Vídeo Fast
 * Localização: /index.php
 */
require_once 'config/db.php';

// Desativar erros para o usuário final
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BDsoftech - Inovação e Tecnologia para o Agronegócio">

    <title>BDsoftech | Tecnologia que Impulsiona o Campo</title>

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- CSS do Template Agrica -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <link href="assets/css/flaticon-set.css" rel="stylesheet">
    <link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/validnavs.css" rel="stylesheet">
    <link href="assets/css/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        /* Hero Section com o Vídeo Fast */
        .hero-video-wrapper {
            position: relative;
            width: 100%;
            height: 90vh; /* Ocupa 90% da altura da tela */
            min-height: 550px;
            background: #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #hero-video-element {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
            z-index: 1;
            filter: brightness(0.4); /* Escurece o vídeo para o texto brilhar */
        }

        .hero-overlay-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            padding: 0 15px;
            width: 100%;
        }

        .hero-overlay-content h2 {
            font-size: 55px;
            font-weight: 800;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Botão de Área Restrita - Estilo Destaque */
        .btn-area-restrita {
            background: #ffcc00 !important;
            color: #000 !important;
            font-weight: bold !important;
            border-radius: 4px;
            padding: 8px 18px !important;
            margin-left: 15px;
            transition: 0.3s;
            border: none;
        }
        .btn-area-restrita:hover {
            background: #fff !important;
            transform: translateY(-2px);
        }

        /* Ajustes Mobile */
        @media (max-width: 768px) {
            .hero-overlay-content h2 { font-size: 32px; }
            .btn-area-restrita { margin-left: 0; margin-top: 10px; display: inline-block; }
        }
    </style>
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="agrica-preloader" class="agrica-preloader">
            <div class="animation-preloader"><div class="spinner"></div></div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs dark">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logo_bdsoftech.png" class="logo" alt="BDsoftech">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="#sobre">Sobre Nós</a></li>
                        <li><a href="#solucoes">Soluções</a></li>
                        <li><a href="#contato">Contato</a></li>
                        <!-- Link Área Restrita -->
                        <li><a href="https://www.bdsoft.com.br/admin/" target="_blank" class="btn-area-restrita"><i class="fas fa-lock"></i> ÁREA RESTRITA</a></li>
                    </ul>
                </div>
            </div>   
        </nav>
    </header>

    <!-- BANNER PRINCIPAL COM VÍDEO OTIMIZADO (FAST) -->
    <section class="hero-video-wrapper">
        <video autoplay muted loop playsinline preload="auto" id="hero-video-element">
            <source src="admin/Marketing/Fast/Marketing-Fast-Site-BDsoftech.mp4" type="video/mp4">
        </video>

        <div class="hero-overlay-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h4 class="text-white mb-3 animated fadeInDown" style="letter-spacing: 5px;">AGROTECNOLOGIA DE PONTA</h4>
                        <h2 class="animated fadeInUp">BDsoftech: Conectando o Campo ao Futuro</h2>
                        <div class="button animated fadeInUp">
                            <a class="btn btn-theme secondary btn-md radius" href="#solucoes">Nossas Soluções</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Sobre (Template Original) -->
    <div id="sobre" class="choose-us-style-four-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-3">
                    <div class="feature-style-three-item">
                        <ul>
                            <li>
                                <div class="icon"><img src="assets/img/icon/29.png" alt="Icon"></div>
                                <div class="info"><h4>Gestão Digital</h4><p>Automação total da sua fazenda.</p></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 text-center">
                    <div class="thumb-style-three">
                        <img class="animate" data-animate="pulse" src="assets/img/illustration/18.png" alt="Ilustração">
                        <div class="ex-badge">
                            <div class="fun-fact">
                                <div class="counter"><div class="timer" data-to="500" data-speed="2000">500</div><div class="operator">+</div></div>
                                <span class="medium">Clientes Satisfeitos</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="feature-style-three-item text-end">
                        <ul>
                            <li>
                                <div class="icon"><img src="assets/img/icon/30.png" alt="Icon"></div>
                                <div class="info"><h4>Monitoramento</h4><p>Sua safra acompanhada em tempo real.</p></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de Soluções (Grids do Template) -->
    <div id="solucoes" class="product-type-area text-center default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 mb-30">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/1.jpg" alt="ERP"></div>
                        <div class="info"><h4>ERP Rural</h4><p>Controle financeiro e administrativo completo.</p></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-30">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/3.jpg" alt="IoT"></div>
                        <div class="info"><h4>Sensores IoT</h4><p>Monitoramento de solo e umidade via sensores.</p></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-30">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/2.jpg" alt="NDVI"></div>
                        <div class="info"><h4>Imagens NDVI</h4><p>Saúde da vegetação via satélites e drones.</p></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-30">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/4.jpg" alt="Gado"></div>
                        <div class="info"><h4>Pecuária 4.0</h4><p>Rastreabilidade e manejo inteligente de rebanho.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="contato" class="bg-dark text-light" style="background-image: url(assets/img/shape/8.png);">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="logo" src="assets/img/logo_bdsoftech.png" alt="Logo">
                        <p class="mt-3">A BDsoftech une a tradição do campo com a inteligência da tecnologia digital.</p>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="widget-title">Contato</h4>
                        <ul><li>Email: contato@bdsoft.com.br</li><li>Tel: +55 (11) 9999-9999</li></ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <p>&copy; <?php echo date("Y"); ?> BDsoftech. Todos os Direitos Reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts do Template -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/validnavs.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
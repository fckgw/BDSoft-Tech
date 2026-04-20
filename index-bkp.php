<?php
/**
 * BDSoftTech Agro - Plataforma Estratégica
 * Localização: /index.php
 * Desenvolvido em PHP Puro
 */
require_once 'config/db.php';
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BDSoftTech - Tecnologia que transforma o Agro e Negócios">

    <title>BDSoftTech | Tecnologia, Gestão e Inovação</title>

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- CSS Base Template Agrica -->
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
        /* Banner Principal com Vídeo Background */
        .hero-section {
            position: relative; width: 100%; height: 90vh; min-height: 600px;
            overflow: hidden; background: #000;
        }
        #hero-video {
            position: absolute; top: 50%; left: 50%; width: 100%; height: 100%;
            object-fit: cover; transform: translate(-50%, -50%); z-index: 1; filter: brightness(0.4);
        }
        .hero-content-slider { position: relative; z-index: 2; height: 100%; display: flex; align-items: center; }
        
        /* Menu Área Restrita */
        .nav-restrita {
            background: #ffcc00 !important; color: #000 !important; font-weight: bold !important;
            border-radius: 5px; padding: 10px 22px !important; margin-left: 20px; transition: 0.3s;
        }
        .nav-restrita:hover { background: #fff !important; transform: scale(1.05); }

        /* Estilo da Timeline */
        .history-items {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            position: relative;
            transition: 0.3s;
            border-bottom: 5px solid #2c5e2e;
            height: 100%;
            min-height: 380px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .history-items:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .history-items .year {
            font-size: 56px;
            font-weight: 800;
            color: #ffcc00;
            line-height: 1;
            margin-bottom: 20px;
            display: block;
        }
        .history-items h3 {
            color: #2c5e2e;
            font-weight: 700;
            font-size: 22px;
            margin-bottom: 15px;
        }
        .history-items p {
            font-size: 15px;
            line-height: 1.6;
            color: #555;
        }
        .timeline-slider-container {
            position: relative;
            padding-bottom: 50px;
        }
        
        /* Listas do Banner */
        .hero-bullets { list-style: none; padding: 0; margin: 20px 0; }
        .hero-bullets li { display: inline-block; margin: 0 10px; color: #fff; font-weight: 600; font-size: 18px; }
        .hero-bullets li i { color: #ffcc00; margin-right: 8px; }

        .thumb-central img { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }

        /* Ajustes de Navegação do Swiper */
        .swiper-button-next, .swiper-button-prev { color: #ffcc00; }
        .swiper-pagination-bullet-active { background: #2c5e2e; }

        /* Custom para Especialidades */
        .product-type-item .info h4 {
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .product-type-item .info p {
            font-size: 14px;
            text-align: center;
            padding: 0 10px;
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

    <!-- Header Top -->
    <div class="top-bar-area top-bar-style-one bg-dark text-light">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8">
                    <ul class="item-flex">
                        <li><i class="fas fa-clock"></i> Atendimento: Seg - Sex: 08:00 - 18:00</li>
                        <li><a href="tel:+551199999999"><i class="fas fa-phone-alt"></i> Suporte Especializado</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <header>
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs dark">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logo_bdsoftech.png" class="logo" alt="BDSoftTech">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="#pilares">Diferenciais</a></li>
                        <li><a href="#solucoes">Soluções</a></li>
                        <li><a href="#historia">História</a></li>
                        <li><a href="https://www.bdsoft.com.br/admin/" target="_blank" class="nav-restrita"><i class="fas fa-lock"></i> ÁREA RESTRITA</a></li>
                    </ul>
                </div>
            </div>   
        </nav>
    </header>

    <!-- BANNER PRINCIPAL -->
    <section class="hero-section">
        <video autoplay muted loop playsinline id="hero-video">
            <source src="admin/Marketing/Fast/Marketing-Fast-Site-BDsoftech.mp4" type="video/mp4">
        </video>
        
        <div class="hero-content-slider container">
            <div class="swiper-container banner-fade">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide text-center text-white">
                        <h2 class="display-3 fw-bold mb-3">Tecnologia que transforma Negócios</h2>
                        <ul class="hero-bullets">
                            <li><i class="fas fa-check-circle"></i> Gestão Inteligente</li>
                            <li><i class="fas fa-check-circle"></i> Agro & Comércio</li>
                            <li><i class="fas fa-check-circle"></i> Inteligência Artificial</li>
                        </ul>
                        <a href="#pilares" class="btn btn-theme secondary btn-md radius">Conheça a BDSoftTech</a>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide text-center text-white">
                        <h2 class="display-3 fw-bold mb-3">Sua Empresa com Visão 360º</h2>
                        <ul class="hero-bullets">
                            <li><i class="fas fa-chart-line"></i> BI Estratégico</li>
                            <li><i class="fas fa-video"></i> Marketing 3D</li>
                            <li><i class="fas fa-tasks"></i> Alta Performance</li>
                        </ul>
                        <a href="#contato" class="btn btn-theme secondary btn-md radius">Solicitar Demonstração</a>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- 3. SEÇÃO NOSSOS PILARES -->
    <div id="pilares" class="choose-us-style-four-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-3 col-lg-12">
                    <div class="feature-style-three-item">
                        <ul>
                            <li>
                                <div class="icon"><img src="assets/img/icon/29.png" alt="🌱"></div>
                                <div class="info">
                                    <h4>Soluções Agro e Business</h4>
                                    <p>Sistemas inteligentes para o produtor rural, comércio e empresas de todos os portes.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/img/icon/28.png" alt="📊"></div>
                                <div class="info">
                                    <h4>Gestão que gera Lucro</h4>
                                    <p>Controle financeiro rigoroso e análise de custos baseada em dados reais e precisos.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 text-center">
                    <div class="thumb-central">
                        <img src="assets/img/illustration/18.png" alt="BDSoftTech Agro">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <div class="feature-style-three-item text-end">
                        <ul>
                            <li>
                                <div class="icon"><img src="assets/img/icon/30.png" alt="📢"></div>
                                <div class="info">
                                    <h4>Marketing e Publicidade</h4>
                                    <p>Criação de vídeos 3D e gestão de anúncios para elevar sua marca ao próximo nível.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/img/icon/31.png" alt="🤝"></div>
                                <div class="info">
                                    <h4>Consultoria Especializada</h4>
                                    <p>Entender sua dor para atender com a ferramenta certa, otimizando seus investimentos.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. SEÇÃO TIMELINE → HISTÓRIA -->
    <div id="historia" class="history-area default-padding bg-gray" style="background-image: url(assets/img/shape/brush-down.png); background-size: cover;">
        <div class="container">
            <div class="site-heading text-center">
                <h4 class="sub-title">Nossa Jornada</h4>
                <h2 class="title">Linha do Tempo: BDsoft Agro</h2>
            </div>
            
            <div class="timeline-slider-container">
                <div class="swiper-container timeline-slider">
                    <div class="swiper-wrapper">
                        
                        <!-- 2022 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2022</span>
                                <h3>A Semente da Inovação <br><small>(Junho)</small></h3>
                                <p>A BDsoft Agro nasce da paixão de um jovem por tecnologia e de seu profundo conhecimento do agronegócio. Com mais de 14 anos de experiência em desenvolvimento, o propósito ganha forma: traduzir desafios em soluções tecnológicas precisas.</p>
                            </div>
                        </div>

                        <!-- 2023 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2023</span>
                                <h3>Criando Raízes no Campo</h3>
                                <p>Ano marcado pela estruturação das primeiras soluções e validação de mercado. O desenvolvimento foca em ouvir os produtores e gestores rurais, entregando ferramentas sob medida para o dia a dia.</p>
                            </div>
                        </div>

                        <!-- 2024 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2024</span>
                                <h3>Escalabilidade e Estruturação</h3>
                                <p>Com o aumento da demanda, a empresa expande sua visão. O foco se volta para a criação de arquiteturas mais escaláveis e seguras, garantindo que os sistemas acompanhem o crescimento dos clientes.</p>
                            </div>
                        </div>

                        <!-- 2025 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2025</span>
                                <h3>O Marco do AgroControl</h3>
                                <p>A consolidação culmina no amadurecimento do AgroControl. A solução é desenhada estrategicamente para elevar a gestão agrícola, entregando dados precisos e controle de ponta a ponta.</p>
                            </div>
                        </div>

                        <!-- 2026 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2026</span>
                                <h3>Colhendo o Futuro</h3>
                                <p>A BDsoft se estabelece como parceira tecnológica estratégica, unindo desenvolvimento de ponta com posicionamento de mercado forte e ações de marketing estruturadas.</p>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. SOLUÇÕES BDSoftTech - ATUALIZADA AGRO E COMÉRCIO -->
    <div id="solucoes" class="product-type-area text-center default-padding">
        <div class="container">
            <div class="site-heading text-center">
                <h4 class="sub-title">O que fazemos</h4>
                <h2 class="title">Especialidades BDSoftTech</h2>
                <p class="mt-3">Atendemos com excelência o <strong>Agronegócio</strong>, <strong>Empresas</strong> e o <strong>Comércio em Geral</strong>, unindo tecnologia e estratégia.</p>
            </div>
            <div class="row">
                <!-- 01 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/gestaofinanceiro.png" alt="Financeiro"><span>01</span></div>
                        <div class="info">
                            <h4>Gestão Financeira</h4>
                            <p>Controle absoluto de fluxo de caixa, DRE, custos operacionais e rentabilidade para o seu negócio.</p>
                        </div>
                    </div>
                </div>
                <!-- 02 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/gestaoproducao.jpg" alt="Produção"><span>02</span></div>
                        <div class="info">
                            <h4>Gestão de Produção</h4>
                            <p>Do campo à indústria: monitoramento de insumos, processos produtivos e eficiência operacional.</p>
                        </div>
                    </div>
                </div>
                <!-- 03 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/indicadores_IA_BI.jpg" alt="BI e IA"><span>03</span></div>
                        <div class="info">
                            <h4>Indicadores, BI & IA</h4>
                            <p>Aceleração de projetos com Inteligência Artificial, Vídeos Institucionais 3D e Gestão de Publicidade segmentada.</p>
                        </div>
                    </div>
                </div>
                <!-- 04 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/automacao.jpg" alt="Automação"><span>04</span></div>
                        <div class="info">
                            <h4>Automação</h4>
                            <p>Integração total entre sistemas e automação de processos manuais para ganhar tempo e escala.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 6. VIDEO AREA -->
    <div class="video-area text-center text-light bg-cover" style="background-image: url(assets/img/banner/26.jpg);">
        <div class="shadow dark">
            <div class="container">
                <h2 class="title">Tecnologia que impulsiona o Agro e o Mercado Corporativo</h2>
                <a href="admin/Marketing/Marketing-Site-BDSoftech.mp4" class="popup-youtube video-play-button"><i class="fas fa-play"></i></a>
            </div>
        </div>
    </div>

    <!-- 7. NOSSA EQUIPE - ATUALIZADA FILOSOFIA -->
    <div class="team-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-4">
                    <h4 class="sub-title">Nosso Time</h4>
                    <h2 class="title">Especialistas em Tecnologia</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="item">
                                <h3 class="text-success mb-3">Técnica: Entender para Atender</h3>
                                <p style="font-size: 18px; line-height: 1.8;">
                                    Na BDSoftTech, acreditamos que nem sempre o sistema mais robusto ou caro é o que resolverá seu problema. Nosso foco é realizar uma <strong>consultoria profunda</strong> para compreender sua real necessidade. Muitas vezes, um ajuste estratégico e uma consultoria precisa resolvem o que anos de software não conseguiram.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 8. FAQ -->
    <div id="faq" class="faq-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2 class="title">Perguntas Frequentes</h2>
                    </div>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#c1">A BDSoftTech atende apenas o setor agrícola?</button></h2>
                            <div id="c1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion"><div class="accordion-body">Não. Embora tenhamos um DNA forte no Agro, desenvolvemos soluções de alta complexidade para indústrias, comércios e prestadores de serviços.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#c2">Como funciona a parte de vídeos 3D e Publicidade?</button></h2>
                            <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Unimos nossa capacidade tecnológica com marketing estratégico. Criamos materiais visuais de alto impacto (vídeos institucionais e 3D) e administramos campanhas para que sua empresa atinja o público ideal.</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="assets/img/logo_bdsoftech.png" class="logo" alt="Logo">
                        <p class="mt-3">Transformando desafios em soluções digitais de alta performance para o Agro e Comércio Geral.</p>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="widget-title">Contato</h4>
                        <ul class="contact-info">
                            <li><i class="fas fa-envelope"></i> suporte@bdsoft.com.br</li>
                            <li><i class="fab fa-whatsapp"></i> Atendimento Comercial</li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="widget-title">Abrangência</h4>
                        <p>Atuação em todo o território nacional com tecnologia escalável em nuvem.</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <p>&copy; <?php echo date("Y"); ?> BDSoftTech - Tecnologia que Transforma Negócios.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // Inicialização do Banner
        var swiperBanner = new Swiper(".banner-fade", {
            effect: "fade",
            loop: true,
            autoplay: { delay: 5000 },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        });

        // Inicialização da Timeline
        var swiperTimeline = new Swiper(".timeline-slider", {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            },
            autoplay: { delay: 4000 }
        });

        // Popup do Vídeo
        $('.popup-youtube').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    </script>
</body>
</html>
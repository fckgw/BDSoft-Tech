<?php
/**
 * BDSoftTech Agro - Plataforma Estratégica
 * Localização: /index.php
 * Desenvolvido em PHP Puro - Versão Completa e Integrada
 */
require_once 'config/db.php';
ini_set('display_errors', 0);

// Configurações de Contato Dinâmicas
$whatsapp_numero = "5531971957751";
$whatsapp_formatado = "(31) 97195-7751";
$email_comercial = "comercial@bdsoft.com.br";
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
        /* --- AJUSTES LOGO E RESPONSIVIDADE --- */
        .navbar-brand img {
            max-height: 85px; 
            width: auto;
            transition: 0.3s;
        }
        @media (max-width: 991px) {
            .navbar-brand img { max-height: 65px; }
            .navbar-header { display: flex; align-items: center; justify-content: space-between; width: 100%; }
        }

        /* --- SUBMENU DROPDOWN ESTILIZADO --- */
        .navbar-nav .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: #fff;
            padding: 15px;
            min-width: 250px;
        }
        .navbar-nav .dropdown-menu li a {
            color: #333 !important;
            padding: 10px 15px !important;
            border-bottom: 1px solid #f5f5f5;
            display: block;
            transition: 0.3s;
        }
        .navbar-nav .dropdown-menu li a:hover {
            color: #2c5e2e !important;
            background: #f9f9f9;
            padding-left: 20px !important;
        }

        /* --- VÍDEO HERO --- */
        .hero-section {
            position: relative; width: 100%; height: 95vh; min-height: 600px;
            overflow: hidden; background: #000;
        }
        #hero-video {
            position: absolute; top: 50%; left: 50%; width: 100%; height: 100%;
            object-fit: cover; transform: translate(-50%, -50%); z-index: 1; filter: brightness(0.45);
        }
        .hero-content-slider { position: relative; z-index: 2; height: 100%; display: flex; align-items: center; }

        /* --- CHATBOT BOOT CAPTADOR --- */
        #bdsoft-chatbot { position: fixed; bottom: 25px; right: 25px; z-index: 9999; }
        .chat-launcher { 
            width: 65px; height: 65px; background: #2c5e2e; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; 
            color: white; font-size: 30px; cursor: pointer; box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            transition: 0.3s;
        }
        .chat-launcher:hover { transform: scale(1.1); background: #ffcc00; color: #2c5e2e; }
        
        .chat-window { 
            width: 350px; height: 500px; background: white; border-radius: 20px; 
            box-shadow: 0 15px 50px rgba(0,0,0,0.25); display: none; 
            flex-direction: column; overflow: hidden; position: absolute; bottom: 85px; right: 0; 
        }
        .chat-header { background: #2c5e2e; color: white; padding: 20px; font-weight: bold; display: flex; justify-content: space-between; align-items: center; }
        .chat-body { flex: 1; padding: 20px; overflow-y: auto; background: #fdfdfd; display: flex; flex-direction: column; }
        .msg { margin-bottom: 15px; padding: 12px; border-radius: 12px; font-size: 14px; line-height: 1.5; }
        .msg-bot { background: #f1f1f1; color: #333; align-self: flex-start; border-bottom-left-radius: 0; }
        .msg-user { background: #2c5e2e; color: white; align-self: flex-end; border-bottom-right-radius: 0; }
        .chat-btn { display: block; width: 100%; background: #fff; border: 1px solid #2c5e2e; color: #2c5e2e; padding: 10px; margin-top: 10px; border-radius: 10px; text-align: center; cursor: pointer; font-weight: 600; transition: 0.2s; }
        .chat-btn:hover { background: #2c5e2e; color: #fff; }

        /* --- WHATSAPP FLUTUANTE --- */
        .whatsapp-float {
            position: fixed; width: 60px; height: 60px; bottom: 25px; left: 25px;
            background-color: #25d366; color: #FFF; border-radius: 50px; text-align: center;
            font-size: 30px; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); z-index: 1000; 
            display: flex; align-items: center; justify-content: center; transition: 0.3s;
        }
        .whatsapp-float:hover { transform: scale(1.1); background: #fff; color: #25d366; }

        /* --- ESTILOS TIMELINE E SOLUÇÕES --- */
        .history-items {
            background: #ffffff; padding: 40px; border-radius: 20px; position: relative;
            transition: 0.4s; border-bottom: 6px solid #2c5e2e; height: 100%; min-height: 400px;
        }
        .history-items:hover { transform: translateY(-12px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
        .history-items .year { font-size: 60px; font-weight: 900; color: #ffcc00; line-height: 1; margin-bottom: 20px; display: block; }
        .history-items h3 { color: #2c5e2e; font-weight: 700; margin-bottom: 15px; }

        .hero-bullets { list-style: none; padding: 0; margin: 25px 0; }
        .hero-bullets li { display: inline-block; margin: 0 15px; color: #fff; font-weight: 600; font-size: 19px; }
        .hero-bullets li i { color: #ffcc00; margin-right: 10px; }

        .thumb-central img { animation: float 6s ease-in-out infinite; width: 100%; max-width: 550px; }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-25px); } }
    </style>
</head>

<body>

    <!-- WhatsApp Flutuante -->
    <a href="https://wa.me/<?php echo $whatsapp_numero; ?>" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- ChatBot Intelectual Captador -->
    <div id="bdsoft-chatbot">
        <div class="chat-window" id="chatWindow">
            <div class="chat-header">
                <span>BDSoft Digital Assistant</span>
                <span onclick="toggleChat()" style="cursor:pointer; font-size: 26px;">&times;</span>
            </div>
            <div class="chat-body" id="chatBody">
                <div class="msg msg-bot">Olá! Sou o assistente da BDSoft Tech. Como posso te ajudar hoje?</div>
                <div id="chatOptions">
                    <button class="chat-btn" onclick="botSelect('agro')">Soluções para o Campo</button>
                    <button class="chat-btn" onclick="botSelect('business')">Software para Empresas</button>
                    <button class="chat-btn" onclick="botSelect('lead')">Falar com Especialista</button>
                </div>
            </div>
        </div>
        <div class="chat-launcher" onclick="toggleChat()"><i class="fas fa-robot"></i></div>
    </div>

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
                        <li>
                            <a href="https://wa.me/<?php echo $whatsapp_numero; ?>" target="_blank">
                                <i class="fab fa-whatsapp"></i> Suporte Especializado: <?php echo $whatsapp_formatado; ?>
                            </a>
                        </li>
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
                        <img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png" class="logo" alt="BDSoftTech">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Início</a></li>
                        
                        <!-- SEGMENTOS SUBMENU -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Segmentos</a>
                            <ul class="dropdown-menu">
                                <li><a href="segmento.php?id=financeira">Gestão Financeira</a></li>
                                <li><a href="segmento.php?id=producao">Gestão de Produção</a></li>
                                <li><a href="segmento.php?id=bi">Indicadores, BI & IA</a></li>
                                <li><a href="segmento.php?id=automacao">Automação de Negócios</a></li>
                            </ul>
                        </li>

                        <li><a href="#pilares">Diferenciais</a></li>
                        <li><a href="#historia">História</a></li>
                        <li><a href="contato.php">Fale Conosco</a></li>
                        <li><a href="https://www.bdsoft.com.br/admin/" target="_blank" class="nav-restrita"><i class="fas fa-lock"></i> ÁREA RESTRITA</a></li>
                    </ul>
                </div>
            </div>   
        </nav>
    </header>

    <!-- BANNER PRINCIPAL COM VÍDEO -->
    <section class="hero-section">
        <video autoplay muted loop playsinline id="hero-video">
            <source src="admin/Marketing/Fast/Marketing-Fast-Site-BDsoftech.mp4" type="video/mp4">
        </video>
        
        <div class="hero-content-slider container">
            <div class="swiper-container banner-fade">
                <div class="swiper-wrapper">
                    <!-- Slide Único Estratégico -->
                    <div class="swiper-slide text-center text-white">
                        <h2 class="display-3 fw-bold mb-3">Tecnologia que transforma Negócios</h2>
                        <ul class="hero-bullets">
                            <li><i class="fas fa-check-circle"></i> Gestão Inteligente</li>
                            <li><i class="fas fa-check-circle"></i> Agro & Comércio</li>
                            <li><i class="fas fa-check-circle"></i> Inteligência Artificial</li>
                        </ul>
                        <a href="contato.php" class="btn btn-theme secondary btn-md radius">Solicitar Demonstração</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. SEÇÃO PILARES COM ILUSTRAÇÃO TECH -->
    <div id="pilares" class="choose-us-style-four-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-3 col-lg-12">
                    <div class="feature-style-three-item">
                        <ul>
                            <li>
                                <div class="icon"><img src="assets/img/icon/29.png" alt="Icon"></div>
                                <div class="info">
                                    <h4>Agro & Business</h4>
                                    <p>Sistemas inteligentes para o campo e empresas de todos os portes.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/img/icon/28.png" alt="Icon"></div>
                                <div class="info">
                                    <h4>Gestão e Lucro</h4>
                                    <p>Análise de custos e performance baseada em dados reais.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 text-center">
                    <div class="thumb-central">
                        <!-- Imagem Tech que representa a fusão total -->
                        <img src="assets/img/BDSoft_Agro_Business.png" alt="BDSoftTech Inovação">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <div class="feature-style-three-item text-end">
                        <ul>
                            <li>
                                <div class="icon"><img src="assets/img/icon/30.png" alt="Icon"></div>
                                <div class="info">
                                    <h4>Marketing 3D</h4>
                                    <p>Vídeos e estratégias para elevar sua marca ao topo do mercado.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/img/icon/31.png" alt="Icon"></div>
                                <div class="info">
                                    <h4>Consultoria Premium</h4>
                                    <p>Entendemos sua dor para entregar a tecnologia perfeita.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. SEÇÃO LINHA DO TEMPO (2022 - 2026) -->
    <div id="historia" class="history-area default-padding bg-gray" style="background-image: url(assets/img/shape/brush-down.png); background-size: cover;">
        <div class="container">
            <div class="site-heading text-center">
                <h4 class="sub-title">Nossa Jornada</h4>
                <h2 class="title">Evolução BDsoft Tech</h2>
            </div>
            
            <div class="timeline-slider-container">
                <div class="swiper-container timeline-slider">
                    <div class="swiper-wrapper">
                        
                        <!-- 2022 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2022</span>
                                <h3>A Semente da Inovação</h3>
                                <p>Nasce a BDsoft da paixão por tecnologia. Com 14 anos de experiência, o propósito ganha forma: traduzir desafios em soluções precisas.</p>
                            </div>
                        </div>

                        <!-- 2023 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2023</span>
                                <h3>Criando Raízes</h3>
                                <p>Ano marcado pela validação de mercado e estruturação das primeiras soluções sob medida para gestores rurais e urbanos.</p>
                            </div>
                        </div>

                        <!-- 2024 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2024</span>
                                <h3>Escalabilidade</h3>
                                <p>Expansão da visão tecnológica com arquiteturas robustas e seguras para acompanhar o crescimento acelerado dos clientes.</p>
                            </div>
                        </div>

                        <!-- 2025 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2025</span>
                                <h3>Marco AgroControl</h3>
                                <p>Consolidação do AgroControl como solução estratégica para elevar a gestão agrícola a um novo patamar de resultados reais.</p>
                            </div>
                        </div>

                        <!-- 2026 -->
                        <div class="swiper-slide">
                            <div class="history-items">
                                <span class="year">2026</span>
                                <h3>Colhendo o Futuro</h3>
                                <p>A BDsoft se estabelece como parceira global, unindo desenvolvimento de ponta e marketing estruturado para transformar negócios.</p>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. ESPECIALIDADES -->
    <div id="solucoes" class="product-type-area text-center default-padding">
        <div class="container">
            <div class="site-heading text-center">
                <h4 class="sub-title">Segmentos Especializados</h4>
                <h2 class="title">Especialidades BDSoftTech</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/gestaofinanceiro.png" alt="Financeiro"><span>01</span></div>
                        <div class="info"><h4>Gestão Financeira</h4><p>Controle absoluto de fluxo e rentabilidade do seu negócio.</p></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/gestaoproducao.jpg" alt="Produção"><span>02</span></div>
                        <div class="info"><h4>Gestão de Produção</h4><p>Eficiência operacional total do campo à indústria.</p></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/indicadores_IA_BI.jpg" alt="IA"><span>03</span></div>
                        <div class="info"><h4>Indicadores, BI & IA</h4><p>Dashboards estratégicos e Inteligência Artificial para decisões.</p></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-type-item">
                        <div class="thumb"><img src="assets/img/product/automacao.jpg" alt="Automação"><span>04</span></div>
                        <div class="info"><h4>Automação</h4><p>Ganhe escala e reduza erros com processos automatizados.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- RODAPÉ COMPLETO E DINÂMICO -->
    <footer class="bg-dark text-light">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png" width="200" alt="Logo">
                    <p class="mt-4">Transformando desafios em soluções digitais de alta performance para o Agro e Comércio Geral.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4 class="widget-title">Canais de Contato</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope text-success"></i> <?php echo $email_comercial; ?></li>
                        <li><i class="fab fa-whatsapp text-success"></i> <?php echo $whatsapp_formatado; ?></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4 class="widget-title">Institucional</h4>
                    <ul class="list-unstyled">
                        <li><a href="contato.php" class="text-white">Fale Conosco</a></li>
                        <li><a href="admin/" class="text-white">Área Administrativa</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center p-3" style="background: #111;">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> BDSoftTech - Todos os Direitos Reservados</p>
        </div>
    </footer>

    <!-- Scripts JQuery e Bootstrap -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // Funções do ChatBot
        function toggleChat() { $('#chatWindow').fadeToggle(); }

        function botSelect(type) {
            let chatBody = $('#chatBody');
            $('#chatOptions').hide();

            if (type === 'agro') {
                chatBody.append('<div class="msg msg-user">Soluções para o Agro</div>');
                chatBody.append('<div class="msg msg-bot">Excelente! O AgroControl é focado em produtividade. Informe seus dados para um consultor te chamar:</div>');
                showLeadForm();
            } else if (type === 'business') {
                chatBody.append('<div class="msg msg-user">Software para Empresas</div>');
                chatBody.append('<div class="msg msg-bot">Temos soluções em ERP e IA. Deixe seu contato para apresentarmos as opções:</div>');
                showLeadForm();
            } else if (type === 'lead') {
                chatBody.append('<div class="msg msg-user">Falar com Especialista</div>');
                chatBody.append('<div class="msg msg-bot">Ótima escolha! Diga seu nome e WhatsApp para acelerarmos seu projeto:</div>');
                showLeadForm();
            }
        }

        function showLeadForm() {
            $('#chatBody').append('<div id="botForm"><input type="text" id="botName" class="form-control mb-2" placeholder="Seu Nome"><input type="text" id="botTel" class="form-control mb-2" placeholder="Seu WhatsApp"><button class="btn btn-success w-100" onclick="saveBotLead()">Enviar Agora</button></div>');
            $('#chatBody').animate({ scrollTop: $('#chatBody')[0].scrollHeight }, 500);
        }

        function saveBotLead() {
            let nome = $('#botName').val();
            let tel = $('#botTel').val();

            if(nome && tel) {
                $.post('save_lead.php', { nome: nome, telefone: tel, origem: 'Chatbot' }, function(res) {
                    $('#botForm').html('<div class="alert alert-success">Sucesso! Aguarde o contato. Redirecionando...</div>');
                    setTimeout(() => { window.location.href = "https://wa.me/5531971957751"; }, 2000);
                });
            } else {
                alert('Por favor, preencha nome e telefone.');
            }
        }

        // Swipers
        var swiperBanner = new Swiper(".banner-fade", { effect: "fade", loop: true, autoplay: { delay: 6000 } });
        var swiperTimeline = new Swiper(".timeline-slider", { 
            slidesPerView: 1, spaceBetween: 30, pagination: { el: ".swiper-pagination", clickable: true },
            breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
            autoplay: { delay: 5000 }
        });
    </script>
</body>
</html>
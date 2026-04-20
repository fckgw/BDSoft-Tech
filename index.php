<?php
/**
 * BDSoftTech Agro - Plataforma Estratégica
 * Localização: /index.php
 * Versão: Menu Mobile Fix + Rodapé Clean + Social LinkedIn/Instagram
 */
require_once 'config/db.php';
ini_set('display_errors', 0);

// Configurações de Contato Dinâmicas
$whatsapp_numero = "5531971957751";
$whatsapp_formatado = "(31) 97195-7751";
$email_comercial = "comercial@bdsoft.com.br";
$instagram_url = "https://www.instagram.com/bdsoftech/";
$linkedin_url = "https://www.linkedin.com/company/bdsoft-tecnologia/";
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
        /* --- AJUSTES LOGO E MENU MOBILE --- */
        .navbar-brand img { max-height: 85px; width: auto; transition: 0.3s; }

        @media (max-width: 991px) {
            .navbar-header {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                width: 100% !important;
                padding: 10px 15px !important;
                float: none !important;
            }
            .navbar-toggle {
                display: block !important;
                background-color: #2c5e2e !important;
                margin-right: 0 !important;
                border: none;
                padding: 10px;
                order: 2;
                cursor: pointer;
            }
            .navbar-toggle i { color: #fff !important; font-size: 22px; }
            .navbar-brand { order: 1; margin: 0 !important; padding: 0 !important; }
            .navbar-brand img { max-height: 50px !important; }
            
            /* Garante que o menu lateral apareça acima de tudo */
            .side { z-index: 99999 !important; }
        }

        /* --- SUBMENU DROPDOWN DESKTOP --- */
        @media (min-width: 992px) {
            li.dropdown:hover > .dropdown-menu {
                display: block; opacity: 1; visibility: visible; margin-top: 0; transition: all 0.3s ease;
            }
        }
        .dropdown-menu { border: none; border-radius: 12px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); padding: 15px; }

        /* --- BANNER PRINCIPAL --- */
        .hero-section { position: relative; width: 100%; height: 95vh; min-height: 600px; overflow: hidden; background: #000; }
        #hero-video { position: absolute; top: 50%; left: 50%; width: 100%; height: 100%; object-fit: cover; transform: translate(-50%, -50%); z-index: 1; filter: brightness(0.45); }
        .hero-content-slider { position: relative; z-index: 2; height: 100%; display: flex; align-items: center; justify-content: center; text-align: center; }
        .hero-inner-content h2, .hero-bullets li { color: #ffffff !important; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); }
        .hero-bullets { list-style: none; padding: 0; margin: 25px 0; }
        .hero-bullets li { display: inline-block; margin: 0 15px; font-weight: 600; font-size: 19px; }
        .hero-bullets li i { color: #ffcc00; margin-right: 10px; }

        /* --- CHATBOT --- */
        #bdsoft-chatbot { position: fixed; bottom: 25px; right: 25px; z-index: 9999; }
        .chat-launcher { width: 65px; height: 65px; background: #2c5e2e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 30px; cursor: pointer; box-shadow: 0 5px 20px rgba(0,0,0,0.3); }
        .chat-window { width: 350px; height: 500px; background: white; border-radius: 20px; box-shadow: 0 15px 50px rgba(0,0,0,0.25); display: none; flex-direction: column; overflow: hidden; position: absolute; bottom: 85px; right: 0; }
        .chat-header { background: #2c5e2e; color: white; padding: 20px; font-weight: bold; display: flex; justify-content: space-between; align-items: center; }
        .chat-body { flex: 1; padding: 20px; overflow-y: auto; background: #fdfdfd; display: flex; flex-direction: column; }
        .msg { margin-bottom: 15px; padding: 12px; border-radius: 12px; font-size: 14px; }
        .msg-bot { background: #f1f1f1; color: #333; align-self: flex-start; border-bottom-left-radius: 0; }
        .msg-user { background: #2c5e2e; color: white; align-self: flex-end; border-bottom-right-radius: 0; }
        .chat-btn { display: block; width: 100%; background: #fff; border: 1px solid #2c5e2e; color: #2c5e2e; padding: 10px; margin-top: 10px; border-radius: 10px; text-align: center; cursor: pointer; font-weight: 600; }

        .whatsapp-float { position: fixed; width: 60px; height: 60px; bottom: 25px; left: 25px; background-color: #25d366; color: #FFF; border-radius: 50px; text-align: center; font-size: 30px; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); z-index: 1000; display: flex; align-items: center; justify-content: center; transition: 0.3s; }
        
        /* --- TIMELINE --- */
        .history-items { background: #ffffff; padding: 40px; border-radius: 20px; position: relative; transition: 0.4s; border-bottom: 6px solid #2c5e2e; height: 100%; min-height: 400px; text-align: left; }
        .history-items .year { font-size: 60px; font-weight: 900; color: #ffcc00; display: block; margin-bottom: 20px; }
        .thumb-central img { animation: float 6s ease-in-out infinite; width: 100%; max-width: 500px; }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }

        /* --- FOOTER CLEAN --- */
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
        .footer-clean ul li a { color: #eee; opacity: 0.8; transition: 0.3s; }
        .footer-clean ul li a:hover { opacity: 1; color: #ffcc00; padding-left: 5px; }
        .footer-bottom-border { border-top: 1px solid rgba(255,255,255,0.05); margin-top: 50px; padding-top: 30px; font-size: 13px; opacity: 0.5; }
    </style>
</head>

<body>

    <!-- Botão WhatsApp -->
    <a href="https://wa.me/<?php echo $whatsapp_numero; ?>" class="whatsapp-float" target="_blank"><i class="fab fa-whatsapp"></i></a>

    <!-- ChatBot -->
    <div id="bdsoft-chatbot">
        <div class="chat-window" id="chatWindow">
            <div class="chat-header">
                <span>Assistente Virtual BDSoft</span>
                <span onclick="toggleChat()" style="cursor:pointer; font-size: 26px;">&times;</span>
            </div>
            <div class="chat-body" id="chatBody">
                <div class="msg msg-bot">Olá! Bem-vindo à BDSoft Tech. Como podemos impulsionar seu negócio hoje?</div>
                <div id="chatOptions">
                    <button class="chat-btn" onclick="botSelect('agro')">Soluções para o Campo</button>
                    <button class="chat-btn" onclick="botSelect('business')">Software para Empresas</button>
                    <button class="chat-btn" onclick="botSelect('lead')">Falar com Especialista</button>
                </div>
            </div>
        </div>
        <div class="chat-launcher" onclick="toggleChat()"><i class="fas fa-robot"></i></div>
    </div>

    <!-- Header Top -->
    <div class="top-bar-area top-bar-style-one bg-dark text-light">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8">
                    <ul class="item-flex">
                        <li><i class="fas fa-clock"></i> Atendimento: Seg - Sex: 08:00 - 18:00</li>
                        <li><a href="https://wa.me/<?php echo $whatsapp_numero; ?>" target="_blank"><i class="fab fa-whatsapp"></i> <?php echo $whatsapp_formatado; ?></a></li>
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
                    <!-- Botão Menu Mobile -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/Logo-BDSoft-Tech-CompletoOficial.png" class="logo" alt="BDSoftTech">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="index.php">Início</a></li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Segmentos</a>
                            <ul class="dropdown-menu shadow animate slideIn">
                                <li><a href="gestao-financeira.php">Gestão Financeira</a></li>
                                <li><a href="gestao-producao.php">Gestão de Produção</a></li>
                                <li><a href="indicadores-bi-ia.php">Indicadores, BI & IA</a></li>
                                <li><a href="automacao.php">Automação de Negócios</a></li>
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

    <!-- BANNER -->
    <section class="hero-section">
        <video autoplay muted loop playsinline id="hero-video">
            <source src="admin/Marketing/Fast/Marketing-Fast-Site-BDsoftech.mp4" type="video/mp4">
        </video>
        <div class="hero-content-slider container">
            <div class="hero-inner-content">
                <h2 class="display-3 fw-bold mb-3">Tecnologia que transforma Negócios</h2>
                <ul class="hero-bullets">
                    <li><i class="fas fa-check-circle"></i> Gestão Inteligente</li>
                    <li><i class="fas fa-check-circle"></i> Agro & Comércio</li>
                    <li><i class="fas fa-check-circle"></i> Inteligência Artificial</li>
                </ul>
                <div class="mt-4">
                    <a href="contato.php" class="btn btn-theme secondary btn-md radius">Solicitar Demonstração</a>
                </div>
            </div>
        </div>
    </section>

    <!-- PILARES -->
    <div id="pilares" class="choose-us-style-four-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="feature-style-three-item">
                        <ul>
                            <li>
                                <div class="info">
                                    <h4>Soluções Agro & Business</h4>
                                    <p>Sistemas sob medida para produtores rurais e empresas.</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <h4>Gestão e Lucratividade</h4>
                                    <p>Análise de dados reais para maximizar seu retorno.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 text-center">
                    <div class="thumb-central">
                        <img src="assets/img/BDSoft_Agro_Business.png" alt="BDSoftTech Inovação">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="feature-style-three-item text-end">
                        <ul>
                            <li>
                                <div class="info">
                                    <h4>Marketing e Vídeos 3D</h4>
                                    <p>Sua marca com posicionamento estratégico e visual de ponta.</p>
                                </div>
                            </li>
                            <li>
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

    <!-- TIMELINE -->
    <div id="historia" class="history-area default-padding bg-gray" style="background-image: url(assets/img/shape/brush-down.png); background-size: cover;">
        <div class="container text-center">
            <h4 class="sub-title">Nossa Jornada</h4>
            <h2 class="title">Evolução BDsoft Tech</h2>
            <div class="swiper-container timeline-slider mt-5">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><div class="history-items"><span class="year">2022</span><h3>A Semente da Inovação</h3><p>Nasce a BDsoft da paixão por traduzir desafios em soluções precisas.</p></div></div>
                    <div class="swiper-slide"><div class="history-items"><span class="year">2023</span><h3>Criando Raízes</h3><p>Estruturação das primeiras soluções e validação de mercado.</p></div></div>
                    <div class="swiper-slide"><div class="history-items"><span class="year">2024</span><h3>Escalabilidade</h3><p>Criação de arquiteturas seguras para crescimento acelerado.</p></div></div>
                    <div class="swiper-slide"><div class="history-items"><span class="year">2025</span><h3>Marco AgroControl</h3><p>Consolidação estratégica com o lançamento de produtos próprios.</p></div></div>
                    <div class="swiper-slide"><div class="history-items"><span class="year">2026</span><h3>Colhendo o Futuro</h3><p>A BDsoft se estabelece como parceira global em inovação tecnológica.</p></div></div>
                </div>
                <div class="swiper-pagination"></div>
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

    <!-- Scripts JQuery e Bootstrap -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // Fallback manual para o Menu Mobile caso o main.js falhe em alguns aparelhos
        $(document).on('click', '.navbar-toggle', function(){
            $('.navbar-collapse').toggleClass('in');
            $('.side').toggleClass('on');
        });

        function toggleChat() { $('#chatWindow').fadeToggle(); }

        function botSelect(type) {
            let cb = $('#chatBody'); $('#chatOptions').hide();
            let label = (type === 'agro') ? 'Campo' : (type === 'business' ? 'Empresas' : 'Especialista');
            cb.append('<div class="msg msg-user">'+label+'</div>');
            setTimeout(() => {
                cb.append('<div class="msg msg-bot">Excelente! Informe seu Nome e WhatsApp para iniciarmos o atendimento:</div>');
                cb.append('<div id="botForm"><input type="text" id="botName" class="form-control mb-2" placeholder="Nome"><input type="text" id="botTel" class="form-control mb-2" placeholder="WhatsApp"><button class="btn btn-success w-100" onclick="saveBotLead()">Enviar e Conversar</button></div>');
                cb.scrollTop(cb[0].scrollHeight);
            }, 600);
        }

        function saveBotLead() {
            let n = $('#botName').val(); let t = $('#botTel').val();
            if(n && t) {
                $.post('save_lead.php', { nome: n, telefone: t, origem: 'Chatbot' }, function() {
                    $('#botForm').html('<div class="alert alert-success">Dados enviados! Redirecionando...</div>');
                    setTimeout(() => { window.location.href = "https://wa.me/5531971957751?text=Olá, meu nome é "+n+". Gostaria de agendar uma consultoria."; }, 2000);
                });
            }
        }

        var swiperTimeline = new Swiper(".timeline-slider", { 
            slidesPerView: 1, spaceBetween: 30, pagination: { el: ".swiper-pagination", clickable: true },
            breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
            autoplay: { delay: 5000 }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Metro 4 -->
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link href="<?= CDN; ?>_interface/css/start.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="bg-dark fg-white">

    <div class="container-fluid start-screen no-overflow">
        <h1 class="start-screen-title">Bonjour ! $authorName</h1>

        <div class="tiles-area">
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="$RSUConfig">
                <a href="<?= THEME; ?>rsu-config" data-role="tile" class="bg-indigo fg-white">
                    <span class="mif-github icon"></span>
                    <span class="branding-bar">Github</span>
                    <span class="badge-bottom">30</span>
                </a>

                <a href="<?= BIN; ?>rsu-config" data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-envelop icon"></span>
                    <span class="branding-bar">Email</span>
                    <span class="badge-bottom">10</span>
                </a>
                
                <a href="<?= BIN; ?>rsu-config" data-role="tile" class="bg-orange fg-white" data-size="wide">
                    <span class="mif-chrome icon"></span>
                    <span class="branding-bar">Chrome</span>
                </a>
                
               <a href="<?= BIN; ?>rsu-config" data-role="tile" class="bg-orange fg-white" data-size="small">
                    <span class="mif-apple icon"></span>
                </a>

                <a href="<?= BIN; ?>rsu-config" data-role="tile" class="bg-red fg-white" data-size="small">
                     <span class="mif-bell icon"></span>
                </a>

                <a href="<?= BIN; ?>rsu-config" data-role="tile" class="bg-teal fg-white col-1 row-6" data-size="small">
                     <span class="mif-windows icon"></span>
                </a>

                <a href="<?= BIN; ?>rsu-config" data-role="tile" class="bg-brown fg-white col-2 row-6" data-size="small">
                    <span class="mif-wind icon"></span>
                </a>

                 <a href="<?= BIN; ?>rsu-config" data-role="tile" class="bg-cyan" >
                     <span class="mif-table icon"></span>
                    <span class="branding-bar">Tables</span>
                </a>
               
                
            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="$RSUManager">
                <div data-role="tile" data-cover="<?= CDN ?>_interface/images/me.jpg">
                    <span class="branding-bar">Sergey Pimenov</span>
                </div>
                <div data-role="tile" data-effect="animate-fade" data-effect-duration="1000">
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/me2.jpg"></div>
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/me.jpg"></div>
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/me3.jpg"></div>
                    <span class="branding-bar">Gallery</span>
                </div>
                <div data-role="tile" data-size="wide" data-effect="animate-slide-left">
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/1.jpg"></div>
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/2.jpg"></div>
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/3.jpg"></div>
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/4.jpg"></div>
                    <div class="slide" data-cover="<?= CDN ?>_interface/images/5.jpg"></div>
                    <span class="branding-bar">Gallery</span>
                </div>
                <div data-role="tile" data-size="wide" data-effect="image-set">
                    <img src="<?= CDN ?>_interface/images/jeki_chan.jpg">
                    <img src="<?= CDN ?>_interface/images/shvarcenegger.jpg">
                    <img src="<?= CDN ?>_interface/images/vin_d.jpg">
                    <img src="<?= CDN ?>_interface/images/jolie.jpg">
                    <img src="<?= CDN ?>_interface/images/jek_vorobey.jpg">
                </div>
            </div>

            <div class="tiles-grid tiles-group size-1 fg-white" data-group-title="$RSU-Utilitaires">
                <div data-role="tile" data-size="small">
                    <img src="<?= CDN ?>_interface/images/outlook.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-brown">
                    <img src="<?= CDN ?>_interface/images/word.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-green">
                    <img src="<?= CDN ?>_interface/images/excel.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-red">
                    <img src="<?= CDN ?>_interface/images/access.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-teal">
                    <img src="<?= CDN ?>_interface/images/powerpoint.png" class="icon">
                </div>
            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="$RSU-Blog">
                <div data-role="tile" data-cover="<?= CDN ?>_interface/images/Battlefield_4_Icon.png">
                    <span class="branding-bar">Battlefield 4</span>
                </div>
                <div data-role="tile" class="bg-green">
                    <img src="<?= CDN ?>_interface/images/x-box.png" class="icon">
                    <span class="branding-bar">XBOX ONE</span>
                </div>
                <div data-role="tile" data-size="wide" data-cover="<?= CDN ?>_interface/images/x-box.png">
                    <span class="branding-bar">XBOX LIVE</span>
                    <span class="badge-top">5</span>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Metro UI JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
    <script src="<?= CDN; ?>_interface/js/start.js"></script>
  </body>
</html>
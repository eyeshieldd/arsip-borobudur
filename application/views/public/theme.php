<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150856108-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-150856108-1');
    </script>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="robots" content="index, follow, noodp" />
    <meta name="description" content="<?=!empty($meta_description) ? $meta_description : ''?>">
    <meta name="title" content="<?=!empty($meta_title) ? $meta_title : ''?>">
    <meta name="keyword" content="<?=!empty($meta_keyword) ? $meta_keyword : ''?>">
    <meta name="tags" content="<?=!empty($meta_tags) ? $meta_tags : ''?>">
    <meta name="author" content="<?=!empty($meta_author) ? $meta_author : ''?>">


    <meta property="og:title" content="<?=!empty($meta_title) ? $meta_title : ''?>"/>
    <meta property="og:site_name" content="" />
    <meta property="og:url" content="<?=base_url()?>" />
    <meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('assets/favicon/apple-icon-57x57.png')?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('assets/favicon/apple-icon-60x60.png')?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/favicon/apple-icon-72x72.png')?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/favicon/apple-icon-76x76.png')?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/favicon/apple-icon-114x114.png')?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('assets/favicon/apple-icon-120x120.png')?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('assets/favicon/apple-icon-144x144.png')?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('assets/favicon/apple-icon-152x152.png')?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/favicon/apple-icon-180x180.png')?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/favicon/android-icon-192x192.png')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/favicon/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/favicon/favicon-96x96.png')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/favicon/favicon-16x16.png')?>">
    <link rel="manifest" href="<?=base_url('assets/favicon/manifest.json')?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=base_url('assets/favicon/ms-icon-144x144.png')?>">
    <meta name="theme-color" content="#ffffff">

    <title>
    <?php echo isset($SYS_TITLE) && !empty($SYS_TITLE) ? $SYS_TITLE : 'Borobudur Conservation Archive :: Home' ?>
    </title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url('assets/public/dist/vendors/bootstrap/css/bootstrap.min.css')?>" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/public/dist/vendors/font-awesome-4.7.0/css/font-awesome.min.css')?>" />

    <!-- REVOLUTION SLIDER-->
    <link rel="stylesheet" href="<?=base_url('assets/public/dist/vendors/revjs/css/settings.css')?>" />

    <!-- APP -->
    <link rel="stylesheet" href="<?=base_url('assets/public/dist/css/app.css')?>" />
  </head>
  <body>
    <div class="app">
      <header id="header" class="<?=$HEADER_CLASS?>">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="<?=base_url()?>">
            <img src="<?=base_url('assets/public/images/logo-large.png')?>" />
          </a>
          <button class="navbar-toggler" type="button">
            <i class="fa fa-bars"></i>
          </button>
          <div class="navbar-collapse" id="navbar-menu">
            <?php
            if($this->router->fetch_class() != "home"){
            ?>
            <form class="form-inline search-box order-1 order-lg-3" action="http://arsip.borobudurpedia.id/index.php/informationobject/browse" method="get">
              <input type="hidden" name="topLod" value="0">
              <input type="hidden" name="sort" value="relevance">
              <input class="form-control" type="text" name="query" />
              <div class="input-group-append">
                <button class="btn" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </form>
            <?php
            }
            ?>
            <ul class="navbar-nav ml-lg-auto mr-lg-3 order-2 order-lg-1">
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('nilai-penting')?>">Nilai Penting</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('memory-of-the-world')?>"
                  >Memory of the World</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('kebijakan')?>">Kebijakan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('layanan')?>">Layanan</a>
              </li>
            </ul>
            <ul class="navbar-nav social-media order-2">
              <li class="nav-item">
                <a class="nav-link" href="<?=isset($WEB_CONFIG['facebook_url']) && !empty($WEB_CONFIG['facebook_url']) ? $WEB_CONFIG['facebook_url'] : '#'?>">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=isset($WEB_CONFIG['twitter_url']) && !empty($WEB_CONFIG['twitter_url']) ? $WEB_CONFIG['twitter_url'] : '#'?>">
                  <i class="fa fa-youtube"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=isset($WEB_CONFIG['instagram_url']) && !empty($WEB_CONFIG['instagram_url']) ? $WEB_CONFIG['instagram_url'] : '#'?>">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
            <form
              class="form-inline search-box order-1 order-lg-3 d-none"
              method="GET"
              action="#"
            >
              <input class="form-control" type="text" />
              <div class="input-group-append">
                <button class="btn" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </form>
          </div>
        </nav>
      </header>
      <!-- content  -->
      <?php
if (isset($TPL_ISI) && !empty($TPL_ISI)) {
    $this->load->view($TPL_ISI);
}
if (isset($display_footer) && $display_footer) {
    $this->load->view('public/footer');
}
?>
    </div>

    <!-- jQuery-->
    <script src="<?=base_url('assets/public/dist/vendors/jquery/3.3.1/jquery-3.3.1.min.js')?>"></script>

    <!-- Popper.js -->
    <script src="<?=base_url('assets/public/dist/vendors/popper.js/popper.min.js')?>"></script>

    <!-- Bootstrap -->
    <script src="<?=base_url('assets/public/dist/vendors/bootstrap/js/bootstrap.min.js')?>"></script>

    <!-- Revolution Slider Plugins -->
    <script src="<?=base_url('assets/public/dist/vendors/revjs/js/jquery.themepunch.plugins.min.js')?>"></script>
    <script src="<?=base_url('assets/public/dist/vendors/revjs/js/jquery.themepunch.revolution.min.js')?>"></script>

    <script type="text/javascript">

        function enableSubmit(){
                $('#tombol-submit').attr('disabled', false);
        }

        function disableSubmit(){
                $('#tombol-submit').attr('disabled', true);
        }

    </script>

    <!-- App.js -->
    <script src="<?=base_url('assets/public/dist/js/app.js')?>"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Write your custom javascript on custom.js file -->
    <script type="text/javascript" src="<?=base_url('assets/public/dist/js/custom.js')?>"></script>
    <?php
if (isset($TPL_FOOTER) && $TPL_FOOTER) {
    $this->load->view($TPL_FOOTER);
}
?>
  </body>
</html>

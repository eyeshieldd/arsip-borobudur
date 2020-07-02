<footer id="footer">
        <div class="container-fluid">
          <h3 class="footer-title text-shadow text-center text-lg-left">
            <?=isset($WEB_CONFIG['web_title']) && !empty($WEB_CONFIG['web_title']) ? $WEB_CONFIG['web_title']:'Borobudur Conservation Archives'?>
          </h3>
          <div class="font-weight-light fs-15 text-center text-lg-left">
            <div class="d-lg-inline-flex">
              <?=isset($WEB_CONFIG['company_address']) && !empty($WEB_CONFIG['company_address']) ? $WEB_CONFIG['company_address']:'Jl. Badrawati Borobudur Magelang 56553'?>
            </div>
            <div class="d-none d-lg-inline-flex">|</div>
            <div class="d-lg-inline-flex">
              E.<?=isset($WEB_CONFIG['company_email']) && !empty($WEB_CONFIG['company_email']) ? $WEB_CONFIG['company_email']:'kebudayaan@kemdikbud.go.id'?> | T. <?=isset($WEB_CONFIG['company_telp']) && !empty($WEB_CONFIG['company_telp']) ? $WEB_CONFIG['company_telp']:'kebudayaan@kemdikbud.go.id'?>
            </div>
          </div>

          <ul
            class="list-unstyled social-media justify-content-end d-none d-lg-flex"
          >
            <li class="">
              <a href="<?=isset($WEB_CONFIG['facebook_url']) && !empty($WEB_CONFIG['facebook_url']) ? $WEB_CONFIG['facebook_url']:'#'?>">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="">
              <a href="<?=isset($WEB_CONFIG['twitter_url']) && !empty($WEB_CONFIG['twitter_url']) ? $WEB_CONFIG['twitter_url']:'#'?>">
                <i class="fa fa-youtube"></i>
              </a>
            </li>
            <li class="">
              <a href="<?=isset($WEB_CONFIG['instagram_url']) && !empty($WEB_CONFIG['instagram_url']) ? $WEB_CONFIG['instagram_url']:'#'?>">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
          </ul>

          <ul class="list-unstyled navbar-nav d-none d-lg-flex">
            <li class="nav-item">
              <a href="<?=base_url()?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('nilai-penting')?>" class="nav-link">Nilai Penting</a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('memory-of-the-world')?>" class="nav-link">Memory of World</a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('kebijakan')?>" class="nav-link">Kebijakan</a>
            </li>
          </ul>

          <div class="copyright text-center text-lg-left mt-2">
            <?=isset($WEB_CONFIG['web_footer']) && !empty($WEB_CONFIG['web_footer']) ? $WEB_CONFIG['web_footer']:'Copyright © 2019, Arsip Borobudur'?>
          </div>
        </div>
      </footer>
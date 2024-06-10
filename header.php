<!DOCTYPE html>
<html lang="ja" id="html">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="format-detection" content="telephone=no">
  <script type="text/javascript">
    window.onload = function() {
      var body_element = document.getElementById("body");
      body_element.style.visibility = 'visible';
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" />
  <?php wp_head(); ?>
  <script>
    console.log("")
  </script><!-- chrometransitionバグ対策 -->
  <?php if (is_page('recruit')) : ?>
    <script>
      window.addEventListener('DOMContentLoaded', function() {
        new ScrollHint('.js-scrollable', {
          scrollHintIconAppendClass: 'scroll-hint-icon-black',
          suggestiveShadow: true,
          i18n: {
            scrollable: "スクロールできます"
          }
        });
      });
    </script>
  <?php endif; ?>
</head>

<body <?php body_class(); ?> style="visibility: hidden;" id="body" ontouchstart="">
  <div class="header-and-main">
    <header id="header">

      <nav class="navbar navbar-expand-lg head global-navi global-navi_notfixed p-0" id="global-navi">
        <div id="container_id" class="container-fluid px-0">
          <div class="logo-wrap">
            <?php if (is_front_page()) : ?>
              <a class="navbar-brand me-0 py-0" href="<?php echo esc_url(home_url()); ?>">
                <h1 class="logo-inner"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" width="220" height="58" alt="<?php bloginfo('name'); ?>"></h1>
              </a>
            <?php else : ?>
              <a class="navbar-brand me-0 py-0 logo-inner" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" width="220" height="58" alt="<?php bloginfo('name'); ?>"></a>
            <?php endif; ?>
          </div>
          <!-- spのときのハンバーガーメニュー -->
          <div id="nav-outer">
            <input type="checkbox" id="nav-tgl">
            <button class="burger-btn nav-tgl-btn burger-btn_close" type="button" id="navbtn1" tabindex="0">
              <span class="bar bar_top"></span>
              <span class="bar bar_mid"></span>
              <span class="bar bar_bottom"></span>
            </button>
            <button class="burger-btn nav-tgl-btn burger-btn_open" type="button" id="navbtn2" tabindex="-1">
              <span class="bar bar_top"></span>
              <span class="bar bar_mid"></span>
              <span class="bar bar_bottom"></span>
            </button>
            <button class="menu-black-bg nav-tgl-btn" type="button" id="navbtn3" tabindex="-1"></button>
            <div class="nav-wrapper" id="nav-wrapper">
              <div class="header-nav" id="header-nav">
                <?php
                $args = array(
                  'theme_location' => 'place_header',
                  'menu' => 'header-menu',
                  'container' => false,
                  'menu_class' => 'menu_class navbar-nav'
                );
                wp_nav_menu($args);
                ?>
            
                  <div class="header-cta">
                    <div class="header-tel">
                      <a href="tel:0765-52-1793" class="header-tel__number text-blue mb-2 mb-lg-0">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/header-phone-icon.svg" alt="" class="" width="15" height="15" loading="lazy">0765-52-1793
                      </a>
                      <p class="header-tel__time">受付時間：平日00:00～00:00</p>
                    </div>
                    <a href="<?php echo esc_url(home_url()); ?>/contact/" class="header-contact"><img src="<?php echo get_template_directory_uri(); ?>/images/common/header-mail-icon.svg" alt="" class="" width="20" height="15" loading="lazy">お問い合わせ</a>
                  </div>
             

              </div>

            </div>

          </div>

        </div><!-- //container -->
      </nav>
      <?php // 現在使用しているテンプレートファイルを表示
      if (is_user_logged_in()) { // ログイン中なら以下を表示
        global $template; // テンプレートファイルのパスを取得
        $temp_name = basename($template); // パスの最後の名前（ファイル名）を取得
        echo '<!--現在使用しているテンプレートファイル：' . $temp_name . '-->'; // ファイル名の表示
      }
      ?>
    </header>
    <main id="main">

      <?php get_template_part('parts/parts-childfv'); ?>
      <?php if (!is_front_page()) : ?>
        <div class="breadcrumb-wrap">
          <div class="container">
            <?php custom_breadcrumb(); ?>
          </div>
        </div>
      <?php endif; ?>
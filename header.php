<!DOCTYPE html>
<html lang="ja" id="html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript">
      window.onload = function() {
        var body_element = document.getElementById("body");
        body_element.style.visibility='visible';
      }
    </script>
  <?php wp_head(); ?>
  <script>console.log("")</script><!-- chrometransitionバグ対策 -->
  </head>
  <body <?php body_class(); ?> style="visibility: hidden;" id="body" ontouchstart="">
    <div class="header-and-main">
    <header id="header">
      <!-- PC版スクロール後用ヘッダー -->
      <nav class="navbar navbar-expand-lg head global-navi p-0 global-navi_fixed" id="global-navi_fixed">
        <div class="container-fluid px-0">          
          <div class="logo-wrap_fixed">
           <a class="navbar-brand me-0 py-0 logo-inner" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" width="200" height="47.52" alt="<?php bloginfo('name'); ?>"></a>
          </div>
          <div class="nav-wrapper" id="nav-wrapper_fixed">
            <div class="header-nav" id="header-nav_fixed">
              <?php 
                $args = array(
                  'menu' => 'g-menu',
                  'container' => false,
                  'menu_class' => 'menu_class navbar-nav'
                );
                wp_nav_menu($args);
              ?>
            </div>
          </div>
        </div><!-- //container -->
      </nav><!-- //PC版スクロール後用ヘッダー -->
      <div class="pc-top-band-wrap">
        <div>
          <?php bloginfo('description'); ?>
        </div>
        <nav id="pc-top-band">
          <?php 
            $args = array(
              'menu' => 'header-top',
              'menu_class' => 'header-top-menu',
              'container' => false,
            );
            wp_nav_menu($args);
          ?>
        </nav>
      </div>
      <nav class="navbar navbar-expand-lg head global-navi global-navi_notfixed p-0" id="global-navi">
        <div id="container_id" class="container-fluid px-0">          
          <div class="logo-wrap">
           <?php if( is_front_page() ) : ?>         
            <a class="navbar-brand me-0 py-0" href="<?php echo esc_url( home_url() ); ?>"><h1 class="logo-inner"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" width="200" height="47.52" alt="<?php bloginfo('name'); ?>"></h1></a>
             <?php else : ?>
            <a class="navbar-brand me-0 py-0 logo-inner" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" width="200" height="47.52" alt="<?php bloginfo('name'); ?>"></a>
            <?php endif; ?>
          </div>
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
                    'menu' => 'g-menu',
                    'container' => false,
                    'menu_class' => 'menu_class navbar-nav'
                  );
                  wp_nav_menu($args);
                ?>
                <div class="search-btn-wrap pc-search">
                  <div class="search-btn-inner" id="search-btn-inner">
                    <form method="get" id="searchform-pc" action="<?php bloginfo('url'); ?>">
                      <input type="text" name="s" id="s" placeholder="検索キーワード"/>
                      <button type="submit" id="searchsubmit">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/common/search.svg" alt="検索" width="18" height="18" class="icon-search"></button>
                    </form>
                  </div>
                </div>
                <div class="d-lg-none sp-nav-sub">
                  <?php 
                    $args = array(
                      'menu' => 'header-top',
                      'container' => false
                    );
                    wp_nav_menu($args);
                  ?>
                </div>
                <div class="sp-search">
                  <form method="get" id="searchform-sp" action="<?php bloginfo('url'); ?>">
                    <input type="text" name="s" id="s-sp" placeholder="検索キーワード"/>
                    <button type="submit">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/common/search.svg" alt="検索" width="18" height="18" class="icon-search"></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- //container -->
      </nav>
        <?php // 現在使用しているテンプレートファイルを表示
          if (is_user_logged_in()){ // ログイン中なら以下を表示
            global $template; // テンプレートファイルのパスを取得
            $temp_name = basename($template); // パスの最後の名前（ファイル名）を取得
            echo '<!--現在使用しているテンプレートファイル：'.$temp_name. '-->'; // ファイル名の表示
          }
        ?>
    </header>
    <main id="main">
      <?php get_template_part('parts/parts-childfv'); ?>
      <?php if( !is_front_page() ) : ?>    
      <div class="breadcrumb-wrap">
        <div class="container">
          <?php custom_breadcrumb(); ?>
        </div>
      </div>
      <?php endif; ?>
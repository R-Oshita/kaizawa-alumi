<!DOCTYPE html>
<html lang="ja" id="html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript">
      window.onload = function() {
        var body_element = document.querySelector("body");
        body_element.style.visibility='visible';
      }
    </script>
  <?php wp_head(); ?>
  <script>console.log("")</script><!-- chrometransitionバグ対策 -->
  </head>
  <body <?php body_class(); ?> style="visibility: hidden;" onLoad="document.body.style.visibility='visible'" id="body" ontouchstart="">
    <div class="header-and-main">
    <header id="header">
      <!-- PC版スクロール後用ヘッダー -->
      <nav class="navbar navbar-expand-lg head global-navi p-0 global-navi_fixed" id="global-navi_fixed">
        <div class="container-fluid px-0">          
          <div class="logo-wrap_fixed">
           <a class="navbar-brand me-0 py-0" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" width="200" height="47.52" alt="<?php bloginfo('name'); ?>"></a>
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
            <a class="navbar-brand me-0 py-0" href="<?php echo esc_url( home_url() ); ?>"><h1><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" width="200" height="47.52" alt="<?php bloginfo('name'); ?>"></h1></a>
             <?php else : ?>
            <a class="navbar-brand me-0 py-0" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" width="200" height="47.52" alt="<?php bloginfo('name'); ?>"></a>
            <?php endif; ?>
          </div>
          <input type="checkbox" id="nav-tgl">
          <label for="nav-tgl" class="burger-btn nav-tgl-btn">
            <span class="bar bar_top"></span>
            <span class="bar bar_mid"></span>
            <span class="bar bar_bottom"></span>
          </label>
          <label for="nav-tgl" class="menu-black-bg nav-tgl-btn"></label>
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
                    <button type="submit">
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
    <main>
      <?php if( is_search("") ): ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <h1 class="head-ttl">サイト内検索</h1>
          <div class="head-subttl">Search</div>
        </div>
      </div>
      <?php elseif( is_archive() || is_category() ) : ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <?php
            $post_label = esc_html(get_post_type_object(get_post_type())->label);//現在の投稿タイプのラベルを取得
            if ( is_post_type_archive('post') || is_category() ):
              $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);//デフォルト投稿ならhas_archiveを取得
            elseif( is_date() && 'post' === get_post_type() ) :
              $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);
            else :
              $post_slug = esc_html(get_post_type_object(get_post_type())->name);//カスタム投稿のスラッグを取得
            endif;
          ?>
          <h1 class="head-ttl"><?php echo $post_label; ?></h1>
          <div class="head-subttl"><?php echo $post_slug; ?></div>
        </div>
      </div>
      <?php elseif( is_single() ) : ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <?php
            $post_label = esc_html(get_post_type_object(get_post_type())->label);//現在の投稿タイプのラベルを取得
            if ( is_singular('post') ):
              $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);//デフォルト投稿ならhas_archiveを取得
            else :
              $post_slug = esc_html(get_post_type_object(get_post_type())->name);//カスタム投稿のスラッグを取得
            endif;
          ?>
          <div class="head-ttl"><?php echo $post_label; ?></div>
          <div class="head-subttl"><?php echo $post_slug; ?></div>
        </div>
      </div>
      <?php elseif( is_page('') && !is_front_page() ) : ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <h1 class="head-ttl"><?php the_title();?></h1>
          <?php // 投稿のスラッグを取得
            $page = get_post( get_the_ID() );
            $slug = $page->post_name; 
            $slug = str_replace('-', '&nbsp;', $slug);
          ?>
          <div class="head-subttl"><?php echo $slug; ?></div>
        </div>
      </div>
      <?php else: ?>
      <?php endif; ?>
      <?php if( !is_front_page() ) : ?>    
      <div class="breadcrumb-wrap">
        <div class="container">
          <?php custom_breadcrumb(); ?>
        </div>
      </div>
      <?php endif; ?>
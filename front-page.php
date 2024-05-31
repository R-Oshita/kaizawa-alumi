<?php
/*
Template Name: トップページ
*/
get_header(); ?>
    <div class="fv-wrap text-center">
      <div class="splide mainslider">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide fv-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/top/fv-bg1.jpg);">
              <div class="fv-copy text-gray">
                <p class="fv-title">ウエブル基本テーマ</p>
                <p class="fv-desc">コーポレートサイト・採用サイト・学校サイト<br class="d-sm-none">からオウンドメディアまで<br>様々なWebサイトを制作します。</p>
              </div>
            </li>
            <li class="splide__slide fv-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/top/fv-bg2.jpg);">
              <div class="fv-copy text-white">
                <p class="fv-title">ウエブル基本テーマ</p>
                <p class="fv-desc">コーポレートサイト・採用サイト・学校サイト<br class="d-sm-none">からオウンドメディアまで<br>様々なWebサイトを制作します。</p>
              </div>
            </li>
          </ul>
        </div><!-- //splide__track -->
      </div><!-- //splide -->
    </div>
      <section class="py-5">
        <div class="container py-lg-4">
          <div class="mb-4">
            <h2 class="ttl-pattern_1">NEWS</h2>
            <div class="subttl text-center">簡易的な記事一覧（サムネ無しリスト形式）</div>
          </div>
          <!-- ↓日付～見出しまで全部記事へのリンクのver↓ -->
          <ul class="postlist-simple">
            <?php
              $args = array(
                'posts_per_page' => 3,
                'post_type' => array('post'),
              );
              $wp_query_post = new WP_Query($args);
              if ($wp_query_post->have_posts()): while($wp_query_post->have_posts()): $wp_query_post->the_post();
            ?>
            <li class="postlist-simple-items">
              <a href="<?php the_permalink(); ?>" class="postlist-simple-inner">
                <span class="postlist-simple-date"><?php the_time('Y.m.d（D）'); ?></span>
                <span class="post-cat-wrap">
                  <?php 
                    $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                    $term_array = get_the_terms( $id, 'category' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                    if (!is_array($term_array)) {
                       $term_array = array(array('title'=>''));
                    } else {
                       foreach ( $term_array as $term ) {
                           $term_name = esc_html($term->name);
                           $term_slug = $term -> slug;
                           echo ('<span class="cat-label ') ;
                           echo esc_html($term_slug) ;
                           echo ('">') ;
                           echo esc_html($term->name)  ;
                           echo ('</span>') ;
                       }
                    }
                  ?>
                </span>
                <span class="postlist-simple-ttl">
                  <?php
                    if(mb_strlen($post->post_title)>30) {
                      $title= mb_substr($post->post_title,0,30) ;
                        echo $title . '...';
                    } else {
                        echo $post->post_title;
                    }
                  ?>
                </span>
              </a>
            </li>
            <?php endwhile; else: ?>                   
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
          <!--  ↑日付～見出しまで全部記事へのリンクのver↑ -->
          <!-- ↓カテゴリはカテゴリへのリンクにしたver↓ -->
          <!--<ul class="postlist-simple">
            <?php
              $args = array(
                'posts_per_page' => 3,
                'post_type' => array('post'),
              );
              $wp_query_post = new WP_Query($args);
              if ($wp_query_post->have_posts()): while($wp_query_post->have_posts()): $wp_query_post->the_post();
            ?>
            <li class="postlist-simple-items">
              <span class="postlist-simple-inner">
                <span class="postlist-simple-date"><?php the_time('Y.m.d（D）'); ?></span>
                <span class="post-cat-wrap">
                  <?php 
                    $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                    $term_array = get_the_terms( $id, 'category' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                    if (!is_array($term_array)) {
                       $term_array = array(array('title'=>''));
                    } else {
                       foreach ( $term_array as $term ) {
                        $term_link = get_term_link( $term );
                           $term_name = esc_html($term->name);
                           $term_slug = $term -> slug;
                           echo '<a href="'.esc_url( $term_link ).'">';
                           echo ('<span class="cat-label ') ;
                           echo esc_html($term_slug) ;
                           echo ('">') ;
                           echo esc_html($term->name)  ;
                           echo ('</span></a>') ;
                       }
                    }
                  ?>
                </span>
                <a href="<?php the_permalink(); ?>">
                  <span class="postlist-simple-ttl">
                    <?php
                      if(mb_strlen($post->post_title)>30) {
                        $title= mb_substr($post->post_title,0,30) ;
                          echo $title . '...';
                      } else {
                          echo $post->post_title;
                      }
                    ?>
                  </span>
                </a>
              </span>
            </li>
            <?php endwhile; else: ?>                   
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>-->
          <!--  ↑カテゴリはカテゴリへのリンクにしたver↑ -->
          <div class="pt-md-4 text-center">
            <a href="<?php echo esc_url( home_url() ); ?>/news/" class="btn-standard btn-size300">一覧へ</a>
          </div>
        </div><!-- //container -->
      </section>
      <section class="py-5 bg-lightgray">
        <div class="container py-lg-4">
          <div class="mb-4">
            <h2 class="ttl-pattern_1">NEWS</h2>
            <div class="subttl text-center">サムネ有りリスト形式</div>
          </div>
          <!--  ↓全部記事へのリンクのver↓ -->
          <ul class="postlist-line">
          <?php
              $args = array(
                'posts_per_page' => 3,
                'post_type' => array('post'),
              );
              $wp_query_post = new WP_Query($args);
              if ($wp_query_post->have_posts()): while($wp_query_post->have_posts()): $wp_query_post->the_post();
            ?>
            <li class="postlist-line-items">
              <a href="<?php the_permalink(); ?>" class="postlist-line-inner">
                <div class="postlist-line-thumbwrap">
                  <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('thumb-200200');
                    }else {
                      echo '<img src="'. get_template_directory_uri() .'/images/common/NoImage200.png" alt="NoImage" width="200" height="200" loading="lazy">';
                    }
                  ?>
                </div>
                <div class="postlist-line-textwrap">
                  <div class="d-block d-sm-flex justify-content-between mb-2">
                    <div class="postlist-line-date"><?php the_time('Y.m.d（D）'); ?></div>
                    <div class="post-cat-wrap">
                      <?php 
                        $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                        $term_array = get_the_terms( $id, 'category' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                        if (!is_array($term_array)) {
                           $term_array = array(array('title'=>''));
                        } else {
                           foreach ( $term_array as $term ) {
                               $term_name = esc_html($term->name);
                               $term_slug = $term -> slug;
                               echo ('<span class="cat-label ') ;
                               echo esc_html($term_slug) ;
                               echo ('">') ;
                               echo esc_html($term->name)  ;
                               echo ('</span>') ;
                           }
                        }
                      ?>
                    </div>
                  </div>
                  <div class="postlist-line-ttl pb-2"><?php the_title(); ?></div>
                  <div class="postlist-line-excerpt d-none d-sm-block">
                    <?php
                      $str = get_the_excerpt();
                      echo na_trim_words($str,60);
                    ?>
                  </div>
                </div>
                <p class="postlist-line-excerpt_sp d-sm-none">
                  <?php
                    $str = get_the_excerpt();
                    echo na_trim_words($str,60);
                  ?>
                </p>
              </a>
            </li>
            <?php endwhile; else: ?>
            <li>記事がありません。</li>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
          <!--  ↑全部記事へのリンクのver↑ -->
          <!--  ↓各要素にリンクを指定したver↓ --><!--
          <ul class="postlist-line">
          <?php
              $args = array(
                'posts_per_page' => 3,
                'post_type' => array('post'),
              );
              $wp_query_post = new WP_Query($args);
              if ($wp_query_post->have_posts()): while($wp_query_post->have_posts()): $wp_query_post->the_post();
            ?>
            <li class="postlist-line-items">
              <span class="postlist-line-inner">
                <div class="postlist-line-thumbwrap">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail('thumb-200200');
                      }else {
                        echo '<img src="'. get_template_directory_uri() .'/images/common/NoImage200.png" alt="NoImage" width="200" height="200" loading="lazy">';
                      }
                    ?>
                  </a>
                </div>
                <div class="postlist-line-textwrap">
                  <div class="d-block d-sm-flex justify-content-between mb-2">
                    <div class="postlist-line-date"><?php the_time('Y.m.d（D）'); ?></div>
                    <div class="post-cat-wrap">
                      <?php 
                        $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                        $term_array = get_the_terms( $id, 'category' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                        if (!is_array($term_array)) {
                           $term_array = array(array('title'=>''));
                        } else {
                          foreach ( $term_array as $term ) {
                           $term_link = get_term_link( $term );
                              $term_name = esc_html($term->name);
                              $term_slug = $term -> slug;
                              echo '<a href="'.esc_url( $term_link ).'">';
                              echo ('<span class="cat-label ') ;
                              echo esc_html($term_slug) ;
                              echo ('">') ;
                              echo esc_html($term->name)  ;
                              echo ('</span></a>') ;
                          }
                        }
                      ?>
                    </div>
                  </div>
                  <a href="<?php the_permalink(); ?>">
                    <div class="postlist-line-ttl pb-2"><?php the_title(); ?></div>
                    <div class="postlist-line-excerpt d-none d-sm-block">
                      <?php
                        $str = get_the_excerpt();
                        echo na_trim_words($str,60);
                      ?>
                    </div>
                  </a>
                </div>
                <p class="postlist-line-excerpt_sp d-sm-none">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                      $str = get_the_excerpt();
                      echo na_trim_words($str,60);
                    ?>
                  </a>
                </p>
              </a>
            </li>
            <?php endwhile; else: ?>
            <li>記事がありません。</li>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>-->
          <!--  ↑各要素にリンクを指定したver↑ -->
          <div class="pt-4 text-center">
            <a href="<?php echo esc_url( home_url() ); ?>/news/" class="btn-standard btn-size300">一覧へ</a>
          </div>
        </div><!-- //container -->
      </section>
      <section class="py-5">
        <div class="container py-lg-4">
          <div class="mb-4">
            <h2 class="ttl-pattern_1">EVENT</h2>
            <div class="subttl text-center">イベント情報の掲載等におすすめのカード形式</div>
          </div>
          <!-- ↓カード全体に記事リンク↓ -->
          <div class="row px-2 px-lg-0 postlist-card-list">
            <?php
              $args = array(
                'paged' => $paged,
                'posts_per_page' => 4,
                'post_type' => array('event'),
              );
              $wp_query_post = new WP_Query($args);
              if ($wp_query_post->have_posts()): while($wp_query_post->have_posts()): $wp_query_post->the_post();
            ?>
            <div class="col-12 col-sm-6 col-lg-3 px-2 px-lg-3 postlist-card-item">
              <a href="<?php the_permalink(); ?>" class="postlist-card-inner">
                <div class="postlist-card-thumbwrap">
                  <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('thumb-topblog');
                    }else {
                      echo '<img src="'. get_template_directory_uri() .'/images/common/NoImage.png" alt="NoImage" width="700" height="450" loading="lazy">';
                    }
                  ?>
                </div>
                <div class="post-cat-wrap mt-2 mb-1">
                  <?php 
                    $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                    $term_array = get_the_terms( $id, 'event_taxonomy' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                    if (!is_array($term_array)) {
                       $term_array = array(array('title'=>''));
                    } else {
                       foreach ( $term_array as $term ) {
                           $term_name = esc_html($term->name);
                           $term_slug = $term -> slug;
                           echo ('<span class="cat-label ') ;
                           echo esc_html($term_slug) ;
                           echo ('">') ;
                           echo esc_html($term->name)  ;
                           echo ('</span>') ;
                       }
                    }
                  ?>
                </div>
                <div class="postlist-card-date mb-1"><?php the_time('Y.m.d（D）'); ?></div>
                <div class="postlist-card-ttl mb-1">
                  <?php
                    if(mb_strlen($post->post_title)>24) {
                      $title= mb_substr($post->post_title,0,24) ;
                        echo $title . '...';
                    } else {
                        echo $post->post_title;
                    }
                  ?>
                </div>
                <div class="postlist-card-excerpt">
                  <?php
                    $str = get_the_content();
                    echo na_trim_words($str,45);
                  ?>
                </div>
              </a>
            </div>
            <?php endwhile; else: ?>                   
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </div>
          <!-- ↑カード全体に記事リンク↑ -->
          <!-- ↓パーツ毎にリンク↓ -->
          <!--<div class="row px-2 px-lg-0 postlist-card-list">
            <?php
              $args = array(
                'paged' => $paged,
                'posts_per_page' => 4,
                'post_type' => array('event'),
              );
              $wp_query_post = new WP_Query($args);
              if ($wp_query_post->have_posts()): while($wp_query_post->have_posts()): $wp_query_post->the_post();
            ?>
            <div class="col-12 col-sm-6 col-lg-3 px-2 px-lg-3 postlist-card-item">
              <span class="postlist-card-inner">
                <div class="postlist-card-thumbwrap">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail('thumb-topblog');
                      }else {
                        echo '<img src="'. get_template_directory_uri() .'/images/common/NoImage.png" alt="NoImage" width="700" height="450" loading="lazy">';
                      }
                    ?>
                  </a>
                </div>
                <div class="post-cat-wrap mt-2 mb-1">
                  <?php 
                    $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                    $term_array = get_the_terms( $id, 'event_taxonomy' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                    if (!is_array($term_array)) {
                       $term_array = array(array('title'=>''));
                    } else {
                        foreach ( $term_array as $term ) {
                            $term_link = get_term_link( $term );
                            $term_name = esc_html($term->name);
                            $term_slug = $term -> slug;
                            echo '<a href="'.esc_url( $term_link ).'">';
                            echo ('<span class="cat-label ') ;
                            echo esc_html($term_slug) ;
                            echo ('">') ;
                            echo esc_html($term->name)  ;
                            echo ('</span></a>') ;
                        }
                    }
                  ?>
                </div>
                <div class="postlist-card-date mb-1"><?php the_time('Y.m.d（D）'); ?></div>
                <a href="<?php the_permalink(); ?>">
                  <div class="postlist-card-ttl mb-1">
                    <?php
                      if(mb_strlen($post->post_title)>24) {
                        $title= mb_substr($post->post_title,0,24) ;
                          echo $title . '...';
                      } else {
                          echo $post->post_title;
                      }
                    ?>
                  </div>
                  <div class="postlist-card-excerpt">
                    <?php
                      $str = get_the_content();
                      echo na_trim_words($str,45);
                    ?>
                  </div>
                </a>
              </span>
            </div>
            <?php endwhile; else: ?>                   
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </div>-->
          <!-- ↑パーツ毎にリンク↑ -->
          <div class="pt-sm-4 text-center">
            <a href="<?php echo esc_url( home_url() ); ?>/event/" class="btn-standard btn-size300">一覧へ</a>
          </div>
        </div><!-- //container -->
      </section>

      
      <section class="three-pr-area py-5 bg-lightgray">
        <div class="container py-lg-4">
          <div class="mb-4">
            <h2 class="ttl-pattern_1">PR</h2>
            <div class="subttl text-center">3PRエリア（リンク無しデザイン）</div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-4 col-lg-3 mb-4 mb-md-0 px-lg-4">
              <div class="three-pr-inner">
                <div class="three-pr-icon">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/images/top/icon-pc.svg" alt="アイコン" width="38" height="38" loading="lazy"></span>
                </div>
                <h3>タイトル１</h3>
                <p class="text-center"><span class="d-inline-block text-start">PRの内容が入ります。PRの内容が入ります。<br>PRの内容が入ります。PRの内容が入ります。</span></p>
              </div>
            </div>
            <div class="col-12 col-sm-10 col-md-4 col-lg-3 mb-4 mb-md-0 px-lg-4">
              <div class="three-pr-inner">
                <div class="three-pr-icon">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/images/top/icon-sp.svg" alt="アイコン" width="38" height="38" loading="lazy"></span>
                </div>
                <h3>タイトル２</h3>
                <p class="text-center"><span class="d-inline-block text-start">PRの内容が入ります。PRの内容が入ります。<br>PRの内容が入ります。PRの内容が入ります。</span></p>
              </div>
            </div>
            <div class="col-12 col-sm-10 col-md-4 col-lg-3 px-lg-4">
              <div class="three-pr-inner">
                <div class="three-pr-icon">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/images/top/icon-graph.svg" alt="アイコン" width="38" height="38" loading="lazy"></span>
                </div>
                <h3>タイトル３</h3>
                <p class="text-center"><span class="d-inline-block text-start">PRの内容が入ります。PRの内容が入ります。<br>PRの内容が入ります。PRの内容が入ります。</span></p>
              </div>
            </div>
          </div><!-- //row -->
        </div><!-- //container -->
      </section>
      <section class="three-pr-area py-5">
        <div class="container py-lg-4">
          <div class="mb-4">
            <h2 class="ttl-pattern_1">PR</h2>
            <div class="subttl text-center">3PRエリア（リンク有りデザイン）</div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-4 col-lg-3 mb-4 mb-lg-0">
              <a href="<?php echo esc_url( home_url() ); ?>" class="three-pr-inner p-3 p-lg-4 hover-shadow">
                <div class="three-pr-icon">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/images/top/icon-pc.svg" alt="アイコン" width="38" height="38" loading="lazy"></span>
                </div>
                <h3>タイトル１</h3>
                <p class="text-center"><span class="d-inline-block text-start">PRの内容が入ります。PRの内容が入ります。<br>PRの内容が入ります。PRの内容が入ります。</span></p>
                <span class="three-pr-more">詳しくはこちら</span>
              </a>
            </div>
            <div class="col-12 col-sm-10 col-md-4 col-lg-3 mb-4 mb-lg-0">
              <a href="<?php echo esc_url( home_url() ); ?>" class="three-pr-inner p-3 p-lg-4 hover-shadow">
                <div class="three-pr-icon">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/images/top/icon-sp.svg" alt="アイコン" width="38" height="38" loading="lazy"></span>
                </div>
                <h3>タイトル２</h3>
                <p class="text-center"><span class="d-inline-block text-start">PRの内容が入ります。PRの内容が入ります。<br>PRの内容が入ります。PRの内容が入ります。</span></p>
                <span class="three-pr-more">詳しくはこちら</span>
              </a>
            </div>
            <div class="col-12 col-sm-10 col-md-4 col-lg-3">
              <a href="<?php echo esc_url( home_url() ); ?>" href="" class="three-pr-inner p-3 p-lg-4 hover-shadow">
                <div class="three-pr-icon">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/images/top/icon-graph.svg" alt="アイコン" width="38" height="38" loading="lazy"></span>
                </div>
                <h3>タイトル３</h3>
                <p class="text-center"><span class="d-inline-block text-start">PRの内容が入ります。PRの内容が入ります。<br>PRの内容が入ります。PRの内容が入ります。</span></p>
                <span class="three-pr-more">詳しくはこちら</span>
              </a>
            </div>
          </div><!-- //row -->
        </div><!-- //container -->
      </section>
      <section class="py-5 bg-lightgray">
        <div class="container py-lg-4">
          <div class="FAQ-wrap p-3 p-md-4 p-lg-5">
            <div class="mb-4">
              <h2 class="ttl-pattern_1">Q&A</h2>
              <div class="subttl text-center">よくある質問</div>
            </div>
            <dl class="FAQ-items">
              <dt class="Q-box">
                <button type="button" class="Q-box-inner js-accordion-head">
                  <span class="FAQ-icon">Q</span><span>質問が入ります</span>
                </button>
              </dt>
              <dd class="A-box js-accordion-content" style="display: none;">
                <div class="A-box-inner">
                  <span class="FAQ-icon">A</span><span>回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                </div>
              </dd>
            </dl>
            <dl class="FAQ-items">
              <dt class="Q-box">
                <button type="button" class="Q-box-inner js-accordion-head">
                  <span class="FAQ-icon">Q</span><span>質問が入ります</span>
                </button>
              </dt>
              <dd class="A-box js-accordion-content" style="display: none;">
                <div class="A-box-inner">
                  <span class="FAQ-icon">A</span><span>回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                </div>
              </dd>
            </dl>
            <dl class="FAQ-items">
              <dt class="Q-box">
                <button type="button" class="Q-box-inner js-accordion-head">
                  <span class="FAQ-icon">Q</span><span>質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります</span>
                </button>
              </dt>
              <dd class="A-box js-accordion-content" style="display: none;">
                <div class="A-box-inner">
                  <span class="FAQ-icon">A</span><span>回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                </div>
              </dd>
            </dl>
            <dl class="FAQ-items">
              <dt class="Q-box">
                <button type="button" class="Q-box-inner js-accordion-head">
                  <span class="FAQ-icon">Q</span><span>質問が入ります</span>
                </button>
              </dt>
              <dd class="A-box js-accordion-content" style="display: none;">
                <div class="A-box-inner">
                  <span class="FAQ-icon">A</span><span>回答が入ります。</span>
                </div>
              </dd>
            </dl>
          </div><!-- //FAQ-wrap -->
        </div>
      </section>
<?php get_footer(); ?>
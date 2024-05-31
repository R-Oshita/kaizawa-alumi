<?php get_header(); ?>
    <?php
    add_filter( 'excerpt_length', function ( $length ) {
    return 60;//表示する文字数
    }, 999 );
    ?>
    <section class="pb-md-5">
      <div class="container py-5">
        <div class="row">
          <div class="col-12">
            <div class="search-upper-wrap mb-5">
              <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" class="search-field" placeholder="検索キーワード" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="search-submit">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/common/search.svg" alt="検索" width="18" height="18" class="icon-search">
                </button>
              </form>
            </div>
            <h2 class="ttl-pattern_4">「<?php echo get_search_query(); ?>」の検索結果</h2>
          </div>
        </div><!-- //row -->
      <ul class="postlist-line">
      <?php if(have_posts()): ?>
        <?php while(have_posts()):the_post(); ?>
          <li class="postlist-line-items">
            <a href="<?php the_permalink(); ?>">
              <div class="row">
                <div class="blog-thumbbox-line col-3 col-sm-2 col-lg-1 pe-0">
                  <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('thumb-200200');
                    }else {
                      echo '<img src="'. get_template_directory_uri() .'/images/common/NoImage200.png" alt="NoImage" width="200" height="200" loading="lazy">';
                    }
                  ?>
                </div>
                <div class="col-9 col-sm-10 col-lg-11 ps-lg-4">
                  <div class="d-block d-sm-flex justify-content-between mb-2">
                    <div class="postlist-line-date"><?php the_time('Y.m.d（D）'); ?></div>
                    <div class="post-cat-wrap">
                      <?php 
                        /* デフォルト投稿のカテゴリ */
                        $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                        $term_array = get_the_terms( $id, 'category' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                        if (!is_array($term_array)) {
                           $term_array = array(array('title'=>''));
                        } else {
                           foreach ( $term_array as $term ) {
                               $term_name = esc_html($term->name);
                               $term_slug = $term -> slug;
                               echo ('<span class="cat-label ');
                               echo esc_html($term_slug) ;
                               echo ('">') ;
                               echo esc_html($term->name);
                               echo ('</span>');
                           }
                        }
                      ?>
                      <?php 
                        /* カスタム投稿のカテゴリ */
                        $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                        $term_array = get_the_terms( $id, 'event_taxonomy' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                        if (!is_array($term_array)) {
                           $term_array = array(array('title'=>''));
                        } else {
                           foreach ( $term_array as $term ) {
                               $term_name = esc_html($term->name);
                               $term_slug = $term -> slug;
                               echo ('<span class="cat-label ');
                               echo esc_html($term_slug);
                               echo ('">') ;
                               echo esc_html($term->name);
                               echo ('</span>');
                           }
                        }
                      ?>
                    </div>
                  </div>
                  <div class="postlist-line-ttl pb-2"><?php the_title(); ?></div>
                  <div class="postlist-line-excerpt d-none d-sm-block">
                    <?php the_excerpt(); /* 抜粋の文字数はテンプレートファイル上部で設定。get_the_excerptだと検索ワードのハイライトを実装できなかったため。 */ ?>
                  </div>
                </div>
                <div class="col-12 d-sm-none mt-2 postlist-line-excerpt">
                  <?php the_excerpt(); ?>
                </div>
              </div>
            </a>
          </li>
          <?php endwhile; else: ?>
          <p>記事がありません。</p>         
          <?php endif; ?>
      </ul><!-- //row -->
      <div class="tablenav pt-5 mb-4">
        <?php global $wp_rewrite;
        $paginate_base = get_pagenum_link(1);
        if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
            $paginate_format = '';
            $paginate_base = add_query_arg('paged', '%#%');
        } else {
            $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
            user_trailingslashit('page/%#%/', 'paged');;
            $paginate_base .= '%_%';
        }
        echo paginate_links( array(
            'base' => $paginate_base,
            'format' => $paginate_format,
            'total' => $wp_query->max_num_pages,
            'mid_size' => 5,
            'current' => ($paged ? $paged : 1),
            'prev_text' => '',
            'next_text' => '',
        )); ?>
      </div>
      </div><!-- //container -->
    </section>
<?php get_footer(); ?>
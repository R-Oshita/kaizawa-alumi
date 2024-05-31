<?php get_header(); ?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-9 pe-lg-4 mb-5">
            <div class="d-block d-sm-flex justify-content-between mb-2">
              <div class="post-date"><?php the_time('Y.m.d'); ?></div>
              <div class="post-cat-wrap">
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
            </div>
            <h1 class="ttl-pattern_3"><?php the_title();?></h1>
            <div class="single-content">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div class="single-thumb"><?php the_post_thumbnail('large'); ?></div>
              <div class="blockeditor-area pt-3"><?php the_content(); ?></div>
              <?php endwhile; endif; ?>
            </div>
            <!-- ↓↓シンプルな前後記事リンク↓↓ -->
            <div class="paging paging-simple mt-5 pt-3 align-items-center mb-md-2">
              <?php $post_type = get_post_type(); ?>
              <div class="prevsingle"><?php previous_post_link('%link', '前へ'); ?></div>
              <div class="archivelink"><a href="<?php echo esc_url( home_url() ); ?>/event/">一覧へ</a></div>
              <div class="nextsingle"><?php next_post_link('%link', '次へ'); ?></div>
            </div>
            <!-- ↑↑シンプルな前後記事リンク↑↑ -->

            <!-- ↓↓リッチな前後記事リンク↓↓ --><!--
            <div class="paging paging-rich mt-5 pt-3">
              <div class="before-post ba-links-wrap">
                <?php //前の記事の投稿情報
                  $previous_post = get_previous_post();
                  if (!empty( $previous_post )): 
                  $prev_thum = get_the_post_thumbnail($previous_post->ID, 'thumb-200200' );
                  ?>
                  <a href="<?php echo get_permalink( $previous_post->ID ); ?>">
                    <div class="ba-links-label">前の記事</div>
                    <div class="ba-links-inner">
                      <div class="ba-links-img">
                      <?php if($prev_thum){ 
                            echo $prev_thum; }
                            else{
                            echo '<img loading="lazy" src="'. get_template_directory_uri() .'/images/common/NoImage100.png" alt="NoImage" width="100" height="100">';
                            }
                             ?>
                      </div>
                      <div class="ba-links-sentence">
                        <span class="post-date"><?php echo mysql2date('Y.n.j', $previous_post->post_date); ?></span>
                        <div class="post-cat-wrap">
                          <?php 
                            $id         = $previous_post->ID;
                            $term_array = get_the_terms( $id, 'event_taxonomy' );
                            if (!is_array($term_array)) {
                               $term_array = array(array('title'=>''));
                            } else {
                               foreach ( $term_array as $term ) {
                                   $term_name = esc_html($term->name);
                                   $term_slug = $term -> slug;
                                   echo ('<span class="cat-label ');
                                   echo esc_html($term_slug);
                                   echo ('">');
                                   echo esc_html($term->name);
                                   echo ('</span>');
                                   echo ('</span>');
                               }
                            }
                        ?>
                        </div>
                        <span class="ba-links-ttl"><?php echo $previous_post->post_title; ?></span>
                      </div>
                    </div>
                  </a>
                  <?php endif; ?>
              </div>
              <div class="next-post ba-links-wrap">
                <?php //次の記事の投稿情報
                $next_post = get_next_post();
                if (!empty( $next_post )): 
                $next_thum = get_the_post_thumbnail($next_post->ID, 'thumb-200200' );
                ?>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                  <div class="ba-links-label">次の記事</div>
                  <div class="ba-links-inner">
                    <div class="ba-links-img br7">
                    <?php if($next_thum){ 
                          echo $next_thum; }
                          else{
                          echo '<img loading="lazy" src="'. get_template_directory_uri() .'/images/common/NoImage100.png" alt="NoImage" width="100" height="100">';
                          }
                           ?>
                    </div>
                    <div class="ba-links-sentence">
                      <span class="post-date">
                        <?php echo mysql2date('Y.n.j', $next_post->post_date); ?>
                      </span>
                      <div class="post-cat-wrap">
                        <?php 
                            $id         = $next_post->ID;
                            $term_array = get_the_terms( $id, 'event_taxonomy' );
                            if (!is_array($term_array)) {
                               $term_array = array(array('title'=>''));
                            } else {
                               foreach ( $term_array as $term ) {
                                   $term_name = esc_html($term->name);
                                   $term_slug = $term -> slug;
                                   echo ('<span class="cat-label ');
                                   echo esc_html($term_slug);
                                   echo ('">');
                                   echo esc_html($term->name);
                                   echo ('</span>');
                                   echo ('</span>');
                               }
                            }
                        ?>
                      </div>
                      <span class="ba-links-ttl">
                        <?php echo $next_post->post_title; ?>
                      </span>
                    </div>
                  </div>
                </a>
                <?php endif; ?>
              </div>
            </div>
            <div class="text-center">
              <a href="<?php echo esc_url( home_url() ); ?>/event/" class="btn-standard btn-size300 mt-4 mb-0">一覧へ</a>
            </div>-->
            <!-- ↑↑リッチな前後記事リンク↑↑ -->
          </div>
          <aside class="col-12 col-lg-4 col-xl-3 sidebar mx-auto mx-lg-0"> 
            <?php get_sidebar('event');?>
          </aside><!-- サイドバー無しの場合はasideをコメントアウト -->
        </div>
      </div>
    </section>
<?php get_footer(); ?>
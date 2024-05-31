              <!-- ↓カード全体に記事リンク↓ -->
              <div class="col-12 col-sm-6 col-xl-3 px-2 px-lg-3 postlist-card-item">
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
                      $str = get_the_excerpt();
                      echo na_trim_words($str,45);
                    ?>
                  </div>
                </a>
              </div>

              <!-- ↑カード全体に記事リンク↑ -->

              <!-- ↓パーツ毎にリンク↓ -->
              <!--
              <div class="col-12 col-sm-6 col-xl-3 px-2 px-lg-3 postlist-card-item">
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
              </div>-->
              <!-- ↑パーツ毎にリンク↑ -->
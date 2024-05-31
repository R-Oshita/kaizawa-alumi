<!-- 一行のバージョン -->
                <!--  ↓全部記事へのリンクのver↓ -->
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
                <!--  ↑全部記事へのリンクのver↑ -->

                <!--  ↓各要素にリンクを指定したver↓ --><!--
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
                </li>-->
                <!--  ↑各要素にリンクを指定したver↑ -->
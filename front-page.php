<?php
/*
Template Name: トップページ
*/
get_header(); ?>
<section class="fv">
  <div class="fv-container">
    <div class="fv-bg"></div>
    <div class="fv-imgbox">

      <picture>
        <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/fv.webp" type="image/webp">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/fv.jpg" alt="" class="" width="1820" height="950">
      </picture>
      <div class="container">
        <div class="fv-txtbox">
          <p class="fv-txt1 josefin">An enterprise that embraces people and communities,<br>
            growing together with people.</p>
          <p class="fv-txt2 fw-600">
            人と地域に寄り添い<br>
            人とともに成長する企業へ
          </p>
        </div>
      </div>
    </div>


    <div class="scrolldown1">
      <p class="scrolldown1-txt fw-600">SCROLL</p><span></span>
    </div>
  </div>
  </div>


</section>
<section class="news">
  <div class="container py-lg-4 news-container">
    <div class="mb-4 ttx-box">
      <h2 class="top-ttl josefin">NEWS</h2>
      <div class="top-subttl">新着情報</div>
    </div>
    <!-- ↓日付～見出しまで全部記事へのリンクのver↓ -->
    <ul class="postlist-simple">
      <?php
      $args = array(
        'posts_per_page' => 3,
        'post_type' => array('post'),
      );
      $wp_query_post = new WP_Query($args);
      if ($wp_query_post->have_posts()) : while ($wp_query_post->have_posts()) : $wp_query_post->the_post();
      ?>
          <li class="postlist-simple-items">
            <a href="<?php the_permalink(); ?>" class="postlist-simple-inner">
              <span class="postlist-simple-date"><?php the_time('Y.m.d'); ?></span>

              <span class="postlist-simple-ttl">
                <?php
                if (mb_strlen($post->post_title) > 30) {
                  $title = mb_substr($post->post_title, 0, 30);
                  echo $title . '...';
                } else {
                  echo $post->post_title;
                }
                ?>
              </span>
            </a>
          </li>
        <?php endwhile;
      else : ?>
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
            if ($wp_query_post->have_posts()) : while ($wp_query_post->have_posts()) : $wp_query_post->the_post();
            ?>
            <li class="postlist-simple-items">
              <span class="postlist-simple-inner">
                <span class="postlist-simple-date"><?php the_time('Y.m.d（D）'); ?></span>
                <span class="post-cat-wrap">
                  <?php
                  $id         = get_the_ID(); //現在の投稿のID（数値）を取得
                  $term_array = get_the_terms($id, 'category');  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
                  if (!is_array($term_array)) {
                    $term_array = array(array('title' => ''));
                  } else {
                    foreach ($term_array as $term) {
                      $term_link = get_term_link($term);
                      $term_name = esc_html($term->name);
                      $term_slug = $term->slug;
                      echo '<a href="' . esc_url($term_link) . '">';
                      echo ('<span class="cat-label ');
                      echo esc_html($term_slug);
                      echo ('">');
                      echo esc_html($term->name);
                      echo ('</span></a>');
                    }
                  }
                  ?>
                </span>
                <a href="<?php the_permalink(); ?>">
                  <span class="postlist-simple-ttl">
                    <?php
                    if (mb_strlen($post->post_title) > 30) {
                      $title = mb_substr($post->post_title, 0, 30);
                      echo $title . '...';
                    } else {
                      echo $post->post_title;
                    }
                    ?>
                  </span>
                </a>
              </span>
            </li>
            <?php endwhile;
            else : ?>                   
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>-->
    <!--  ↑カテゴリはカテゴリへのリンクにしたver↑ -->
    <div class="text-center btn-box">
      <a href="<?php echo esc_url(home_url()); ?>/news/" class="button-pattern1 btn-size-top">もっと見る
        <div class="button-arrow-box">
          <div class="button-arrow"></div>
        </div>
      </a>
    </div>
  </div><!-- //container -->
</section>

<section class="company bg-blue">
  <div class="container py-lg-4 company-container">
    <div class="mb-4">
      <h2 class="top-ttl josefin">COMPANY</h2>
      <div class="top-subttl">会社案内</div>

    </div>
    <div class="company-imgbox mb-2">
      <picture>
        <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/top-img1.webp" type="image/webp">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/top-img1.jpg" alt="" class="" width="600" height="667">
      </picture>
    </div>
    <div class="company-txtbox">
      <p class="company__txt1">
        『誠意』の経営理念のもと常に相手の立場に立って考え、行動することを目指しています。<br>
        また、お客様のニーズに合わせて製品を製造し、それらを手にとっていただく皆様の生活を陰ながら支えられることが当社の喜びの一つです。これからもお客様にご満足いただけるものづくりを通して、人と地域に寄り添う会社として様々なことにチャレンジしてまいります。
      </p>
      <div class="text-center btn-box">
        <a href="<?php echo esc_url(home_url()); ?>/company" class="button-pattern1 btn-size-top">詳しく見る
          <div class="button-arrow-box">
            <div class="button-arrow"></div>
          </div>
        </a>
      </div>
    </div>
  </div> <!-- //container -->
</section>

<section class="service bg-blue">
  <div class="container py-lg-4 service-container">
    <div class="service-inner">
      <div class="mb-4">
        <h2 class="top-ttl josefin">SERVICE</h2>
        <div class="top-subttl">事業案内</div>
      </div>
      <div class="service-imgbox mb-2">
        <picture>
          <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/top-img2.webp" type="image/webp">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/top-img2.jpg" alt="" class="" width="600" height="667">
        </picture>
      </div>
      <div class="company-txtbox">
        <p class="company__txt1">
          <span class="fw-600">建材製品及び部品製造</span><br>
          集合住宅や戸建て住宅に設置される浴室のドア製品や窓製品及びそれらに関連する部品を製造しています。<br>
          <br>
          <span class="fw-600">労働者派遣事業</span><br>
          建材製造での経験を活かし、製造業向けの労働者派遣事業を行っています。
        </p>
        <div class="text-center btn-box">
          <a href="<?php echo esc_url(home_url()); ?>/company/" class="button-pattern1 btn-size-top">詳しく見る
            <div class="button-arrow-box">
              <div class="button-arrow"></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div><!-- //container -->
</section>

<section class="recruit">
  <div class="recruit-imgbox">
    <picture>
      <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/top-img3.webp" type="image/webp">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top/top-img3.jpg" alt="" class="" width="1920" height="574">
    </picture>
  </div>
  <div class="container bg-white recruit-container">

    <div class="mb-4">
      <h2 class="top-ttl josefin">RECRUIT</h2>
      <div class="top-subttl">採用情報</div>
    </div>
    <h3 class="mb-4 fw-600 text-center">一人ひとりが主役です。</h3>
    <p class="recruit-txt">私たちは社員一人ひとりが技術や経験、人間性を高めていくことでお客様の満足につながると信じています。<br>
      そのため人材育成に注力し個人の成長から組織力の向上を図ります。また社内での研修も充実しており、教育体制にも力を注いでいます。<br>
      すべての社員が働き易い職場環境を目指していますので、ぜひあなたも私たちと一緒にチャレンジしませんか？</p>
    <div class="text-center btn-box">
      <a href="<?php echo esc_url(home_url()); ?>/company/" class="button-pattern1 btn-size-top">詳しく見る
        <div class="button-arrow-box">
          <div class="button-arrow"></div>
        </div>
      </a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
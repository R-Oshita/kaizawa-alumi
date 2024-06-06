<?php get_header(); ?>
<section class="py-5">
  <div class="container py-lg-4">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8 col-xl-9 pe-lg-4 mb-5">

        <h1 class="ttl-pattern_3"><?php the_title(); ?></h1>
        <div class="d-flex justify-content-end mb-2">
          <div class="post-date"><?php the_time('Y.m.d'); ?></div>
          <div class="post-cat-wrap">
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
          </div>
        </div>
        <div class="single-content">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div class="single-thumb"><?php the_post_thumbnail('large'); ?></div>
              <div class="blockeditor-area pt-3"><?php the_content(); ?></div>
          <?php endwhile;
          endif; ?>
          <?php if (function_exists('the_ratings')) {
            the_ratings();
          } ?>
        </div>
        <!-- ↓↓シンプルな前後記事リンク↓↓ -->

        <div class="paging paging-simple mt-5 pt-3 align-items-center mb-md-2">
          <?php $post_type = get_post_type(); ?>
          <div class="prevsingle paging-label"><?php previous_post_link('%link', '前へ'); ?></div>
          <div class="archivelink paging-label"><a href="<?php echo esc_url(home_url()); ?>/news/">一覧へ</a></div>
          <div class="nextsingle paging-label"><?php next_post_link('%link', '次へ'); ?></div>
        </div>
        <!-- ↑↑シンプルな前後記事リンク↑↑ -->


      </div>
      <aside class="col-12 col-lg-4 col-xl-3 sidebar mx-auto mx-lg-0">
        <?php get_sidebar(); ?>
      </aside><!-- サイドバー無しの場合はasideをコメントアウト -->
    </div>
  </div>
</section>
<?php get_footer(); ?>
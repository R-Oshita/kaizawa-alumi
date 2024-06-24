<?php get_header(); ?>
<?php  
//メインループの場合の記述のバックアップファイルです。削除してOKです。
?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-9 pe-lg-4 mb-5">
            <?php
              $current_cat = get_queried_object();
              $cat_name = $current_cat->name;

              echo '<h2 class="ttl-pattern_4">カテゴリ：'.$cat_name.'</h2>';
            ?>
            <ul class="postlist-line">
            <?php if(have_posts()): ?>
              <?php while(have_posts()):the_post(); ?>
                <?php get_template_part('parts/parts-archiveline'); ?>
              <?php endwhile; else: ?>
              <p>記事がありません。</p>         
              <?php endif; ?>
            </ul><!-- //row -->
            <?php get_template_part('parts/parts-pagination'); ?>
          </div>
          <aside class="col-12 col-lg-4 col-xl-3 sidebar"> 
            <?php get_sidebar();?>
          </aside>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
<?php get_header(); ?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10"><?php //カンプでのグリッド数に応じてcol-○○で横幅を調節（このコメントは納品前には削除） ?>
            <?php //▼▼テンプレートファイルにコーディングを行う場合は削除（編集画面からの流し込みをする場合は使用）▼▼ ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="blockeditor-area"><?php the_content(); ?></div>
            <?php endwhile; endif; ?>
            <?php //▲▲テンプレートファイルにコーディングを行う場合は削除（編集画面からの流し込みをする場合は使用）▲▲ ?>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
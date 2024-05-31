<?php
 get_header(); ?>

    <section class="py-5 contact-form-area">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 px-xl-5">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>
              <form action="<?php echo esc_url( home_url() ); ?>/contact2" method="post">
                好きな食べ物：<input type="text" name="food">
                <input type="hidden" name="kakusu" value="隠しフィールドです">
                <input type="submit" name="send" value="送信">
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
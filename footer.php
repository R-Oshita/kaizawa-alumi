    </main>
    </div><!-- header-and-main -->
    <footer>
      <?php if (is_front_page()) : ?>
        <section class="py-5 cta-section">
          <div class="container py-lg-4">
            <div class="cta-box py-5 px-3">
              <div class="mb-4 ttx-box">
                <h2 class="top-ttl josefin">CONTACT</h2>
                <div class="top-subttl">お問い合わせ</div>
              </div>
              <div class="cta-catchcopy">お電話・お問い合わせフォームより<br class="d-sm-none">お気軽にお問い合わせください。</div>
              <div class="d-md-flex cta-content">
                <div class="cta-contact text-center">
                  <p class="cta-contact__txt1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/CTA-mail-icon.svg" alt="">メールでのお問い合わせ</p>
                  <a href="<?php echo esc_url(home_url()); ?>/contact/" class="button-pattern1 btn-size-cta"><span class="cta-contact-btn_inner">お問い合わせフォーム</span>
                    <div class="button-arrow-box">
                      <div class="button-arrow"></div>
                    </div>
                  </a>
                </div>
                <div>
                  <p class="cta-contact__txt1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/CTA-phone-icon.svg" alt="">お電話でのお問い合わせ</p>
                  <a href="" class="cta-tel-btn"><span class="cta-tel-btn_inner">0765-52-1793</span></a><br>
                  <span class="tel-time">（平日 9:00〜17:00）</span>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
      <div class="footer-wrap">
        <div class="container py-5">
          <div class="footer-content py-md-4">
            <div class="footer-content-menu">
              <?php
              $args = array(
                'menu' => 'footer-menu',
                'container' => false,
                'menu_class' => 'menu_class footer-nav ps-0 mb-0',
              );
              wp_nav_menu($args);
              ?>
            </div>
            <div class="footer-content-menu-info">
              <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" alt="<?php bloginfo('name'); ?>" loading="lazy" width="200" height="47.52" class="footer-logo"></a>
              <div class="footer-ad">
                <span class="pe-sm-2">〒000-0000 </span><span class="d-inline-block">サンプル県サンプル市サンプル町1-11-1</span>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-copy-wrap">
          <div class="container footer-copy">
            <span class="pe-sm-3">Copyright © 株式会社ウエブル</span><br class="d-block d-sm-none">All Rights Reserved.
          </div>
        </div>
      </div>
      <div class="pagetop-wrap" id="pagetop-wrap"><span class="pagetop-inner"><span>TOP</span></span></div>

    </footer>
    <?php wp_footer(); ?>
    <?php get_template_part('parts/parts-footerjs'); ?>
    </body>

    </html>
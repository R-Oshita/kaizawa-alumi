    </main>
    </div><!-- header-and-main -->
    <footer>
      <?php if (is_front_page()) : ?>
        <section class="cta-section lazyload">
          <div class="container">
            <div class="cta-box">
              <div class="ttx-box">
                <h2 class="top-ttl josefin text-center">CONTACT</h2>
                <div class="top-subttl text-center">お問い合わせ</div>
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
                  <a href="tel:0765-52-1793" class="cta-tel-btn"><span class="cta-tel-btn_inner josefin">0765-52-1793</span></a><br>
                  <p class="tel-time">（平日 9:00〜17:00）</p>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
      <div class="footer-wrap">
        <div class="container">
          <div class="footer-content">
            <div class="footer-content-menu-info">
              <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/footer-logo.svg" alt="<?php bloginfo('name'); ?>" loading="lazy" width="72" height="70" class="footer-logo"></a>

            </div>
            <div class="footer-content-menu">
              <?php
              $args = array(
                'theme_location' => 'place_footer',
                'menu' => 'footer-menu',
                'container' => false,
                'menu_class' => 'menu_class footer-nav ps-0 mb-0',
              );
              wp_nav_menu($args);
              ?>
            </div>
          </div>
        </div>
        <div class="footer-copy-wrap">
          <div class="container footer-copy">
            <span class="pe-sm-1">COPYRIGHT © 有限会社 開澤アルミ</span><br class="d-block d-sm-none">All Rights Reserved.
          </div>
        </div>
      </div>
      <div class="pagetop-wrap" id="pagetop-wrap"><span class="pagetop-inner"><span>TOP</span></span></div>

    </footer>
    <?php wp_footer(); ?>
 
    </body>

    </html>
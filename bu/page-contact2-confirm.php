<?php
$submitBack = isset($_POST['submitBack']) ? $_POST['submitBack'] : null; //戻るボタン
if($submitBack){
  $location_url = 'Location: '.esc_url( home_url() ).'/contact2';
  header($location_url, true, 307);
  exit;
}

$submitbtn = isset($_POST['submitbtn']) ? $_POST['submitbtn'] : null; //送信するボタン
if($submitbtn){
  $location_url = 'Location: '.esc_url( home_url() ).'/contact2-complete';
  header($location_url, true, 307);
  exit;
}

$food = isset($_POST['food']) ? $_POST['food'] : null;
$kakusu = isset($_POST['kakusu']) ? $_POST['kakusu'] : null;
$shimei = isset($_POST['shimei']) ? $_POST['shimei'] : null;
$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
$zip_code = isset($_POST['zip-code']) ? $_POST['zip-code'] : null;
$address1 = isset($_POST['address1']) ? $_POST['address1'] : null;
$address2 = isset($_POST['address2']) ? $_POST['address2'] : null;
$address3 = isset($_POST['address3']) ? $_POST['address3'] : null;
$content = isset($_POST['content']) ? $_POST['content'] : null;

get_header(); ?>

    <section class="py-5 contact-form-area">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 px-xl-5">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>

            <div class="mw_wp_form mw_wp_form_confirm mw_wp_form_preview">

              <dl class="form-items">
                <dt>好きな食べ物</dt>
                <dd>
                  <?php echo $food; ?>
                </dd>
              </dl>
              <dl class="form-items">
                <dt><span class="label-contact label-essential">必須</span>お名前</dt>
                <dd>
                  <?php echo $shimei; ?>
                </dd>
              </dl>
              <dl class="form-items">
                <dt><span class="label-contact label-essential">必須</span>メールアドレス：</dt>
                <dd>
                  <?php echo $mail; ?>
                </dd>
              </dl>
              <dl class="form-items">
                <dt><span class="label-contact label-essential">必須</span>郵便番号</dt>
                <dd>
                  <?php echo $zip_code; ?>
                </dd>
              </dl>
              <dl class="form-items">
                <dt><span class="label-contact label-essential">必須</span>住所</dt>
                <dd>
                  <?php echo $address1; ?><?php echo $address2; ?>
                  <br>
                  <?php echo $address3; ?>
                </dd>
              </dl>
              <dl class="form-items">
                <dt><span class="label-contact label-essential">必須</span>お問い合わせ内容</dt>
                <dd>
                  <?php echo nl2br($content); ?>
                </dd>
              </dl>

              <form action="<?php echo esc_url( home_url() ); ?>/contact2-confirm" method="post">
              <input type="hidden" name="food" value="<?php echo $food; ?>">
                <div class="act-btn-wrap">
                  <button type="submit" name="submitBack" value="back" class="back-btn">戻る</button>
                  <button type="submit" name="submitbtn" value="send" class="conf-send-btn">送信する</button>
                </div>
                <input type="hidden" name="food" value="<?php echo $food; ?>">
                <input type="hidden" name="kakusu" value="<?php echo $kakusu; ?>">
                <input type="hidden" name="shimei" value="<?php echo $shimei; ?>">
                <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                <input type="hidden" name="zip-code" value="<?php echo $zip_code; ?>">
                <input type="hidden" name="address1" value="<?php echo $address1; ?>">
                <input type="hidden" name="address2" value="<?php echo $address2; ?>">
                <input type="hidden" name="address3" value="<?php echo $address3; ?>">
                <input type="hidden" name="content" value="<?php echo $content; ?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
<?php
/*
Template Name: お問い合わせスノーモンキー用
*/
get_header(); ?>

<section class="py-5 contact-form-area <?php if (is_page('contact-finish')) :  ?>contact-form-area_finish<?php endif; ?>">
  <div class="container py-lg-4">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <div class="ttl-pattern_2-wrap text-center">
          <div class="subttl josefin">ENTRY FORM</div>
          <h2 class="ttl-pattern_2">エントリー<br class="d-sm-none">入力フォーム</h2>
        </div>
        <!-- <div class="contact-tel">
          <div class="d-flex">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/contact/tel-icon.svg" alt="tel:0765-52-1793" class="contact-tel-icon" width="26" height="26" loading="lazy">
            <a href="tel:0765-52-1793" class="contact-tel-txt josefin">0765-52-1793</a>
          </div>
          <p class="contact-tel-time">平日 9:00〜17:00</p>
        </div> -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        endif; ?>
        <p class="contact-txt1">ご入力いただきました個人情報の取扱いに関しては、<br class="d-none d-sm-block">
          下記「個人情報の取扱いに関する方針」に則り、適切かつ安全に管理いたします。</p>

      </div>
    </div>
  </div>
  <div class="personal">
    <div class="container bg-blue">
      <div class="personal-inner">
        <h2 class="ttl-pattern_4">個人情報の取扱いに関する方針</h2>
        <dl>
          <dt>個人情報の利用目的</dt>
          <dd>ご入力いただいた個人情報は、お問合せのために利用いたします。</dd>
          <dd>ご本人へのご連絡(電話、電子メール、資料送付等)</dd>
          <dt>個人情報の第三者提供について</dt>
          <dd>ご本人の同意がある場合または法令に基づく場合を除き、取得した個人情報を第三者に提供することはありません。</dd>
          <dt>個人情報の取扱いの委託について</dt>
          <dd>お預かりした個人情報の全部または、一部を委託することはありません。</dd>
          <dt>個人情報の開示等のお問合せ窓口について</dt>
          <dd>
            ご本人からの求めにより、当社が保有する個人情報の利用目的の通知、開示、内容の訂正・追加または削除、利用の停止・消去に応じます。その求めにつきましては、以下の「個人情報受付窓口」までご連絡ください。
          </dd>
          <dt>個人情報を提供されることの任意性について</dt>
          <dd>
            お客様が当社に個人情報を提供されるかどうかは、お客様の任意によるものです。<br>
            ただし、必要な項目を頂けない場合は、各サービス等が適切な状態で提供できない場合があります。
          </dd>
          <dt>本人が容易に認識できない方法による個人情報の取得</dt>
          <dd>
            クッキーやウェブビーコン等を用いるなどして、本人が容易に認識できない方法による個人情報の取得は行っておりません。
          </dd>
        </dl>
      </div>
    </div>
  </div>
</section>

<?php if (is_page('contact') || is_page('entry-form')) : ?>
  <!-- Yubinbangoを使うための処理（ボタン無し） --><!--
    <script>
      let formelements = document.querySelectorAll('.snow-monkey-form');
      formelements[0].classList.add('h-adr');
      
      document.querySelector(".p-postal-code").addEventListener(
          "keyup",
          function (e) {
              if (this.value.toString().match(/^[0-9]{7}$/) || this.value.toString().match(/^\d{3}-?\d{4}$/)) {
              document.querySelector(".p-street-address").focus();
              }
          },
          !1
      );
    </script>
    --><!-- //Yubinbangoを使うための処理（ボタン無し） -->

  <!-- Yubinbangoを使うための処理（ボタン有り） -->
  <script>
    let formelements = document.querySelectorAll('.snow-monkey-form');
    formelements[0].classList.add('h-adr');

    var hadr = document.querySelector(".h-adr"),
      cancelFlag = true;

    //イベントをキャンセルするリスナ
    var onKeyupCanceller = function(e) {
      if (cancelFlag) {
        e.stopImmediatePropagation();
      }
      return false;
    };

    // 郵便番号の入力欄
    var postalcode = hadr.querySelectorAll(".p-postal-code"),
      postalField = postalcode[postalcode.length - 1];

    //通常の挙動をキャンセルできるようにイベントを追加
    postalField.addEventListener("keyup", onKeyupCanceller, false);

    //ボタンクリック時
    var btn = hadr.querySelector(".postal-search-btn-wrap");
    btn.addEventListener("click", function(e) {
      //キャンセルを解除
      cancelFlag = false;

      //発火
      let event;
      if (typeof Event === "function") {
        event = new Event("keyup");
      } else {
        event = document.createEvent("Event");
        event.initEvent("keyup", true, true);
      }
      postalField.dispatchEvent(event);

      //キャンセルを戻す
      cancelFlag = true;
    });

    document.querySelector(".p-postal-code").addEventListener(
      "keyup",
      function(e) {
        if (this.value.toString().match(/^[0-9]{7}$/) || this.value.toString().match(/^\d{3}-?\d{4}$/)) {
          document.querySelector(".p-street-address").focus();
        }
      },
      !1
    );
  </script>
  <!-- //Yubinbangoを使うための処理（ボタン有り） -->
<?php endif; ?>
<?php get_footer(); ?>
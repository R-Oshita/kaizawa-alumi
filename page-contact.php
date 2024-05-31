<?php
/*
Template Name: お問い合わせ用
*/

 get_header(); ?>
 <?php //MW WP用の古いファイルです。削除でOKです。 ?>
    <section class="py-5 contact-form-area">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 px-xl-5">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
    </section>
    
    <?php if ( is_page('contact') || is_page('contact_snow') ) : ?>
    <!-- Yubinbangoを使うための処理（ボタン無し） --><!--
    <script>
      let formelements = document.querySelectorAll('.mw_wp_form_input form');
      formelements[0].classList.add('h-adr');
      var hadr = document.querySelector(".h-adr"), 
      cancelFlag = true;
      
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
      let formelements = document.querySelectorAll('.mw_wp_form_input form');
      formelements[0].classList.add('h-adr');

      var hadr = document.querySelector(".h-adr"), 
      cancelFlag = true;

      //イベントをキャンセルするリスナ
      var onKeyupCanceller = function(e) {
          if(cancelFlag){
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
      var btn = hadr.querySelector(".postal-search");
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
          function (e) {
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
<?php

/**
 * 別のページから受け取ったデータ
 * 確認画面へボタン押下後はこのページで送信したデータとして扱われます
 * 
 */
$food = isset($_POST['food']) ? $_POST['food'] : null;
$kakusu = isset($_POST['kakusu']) ? $_POST['kakusu'] : null;

/**フォームの項目 */
$shimei = isset($_POST['shimei']) ? $_POST['shimei'] : null;
$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
$zip_code = isset($_POST['zip-code']) ? $_POST['zip-code'] : null;
$address1 = isset($_POST['address1']) ? $_POST['address1'] : null;
$address2 = isset($_POST['address2']) ? $_POST['address2'] : null;
$address3 = isset($_POST['address3']) ? $_POST['address3'] : null;
$content = isset($_POST['content']) ? $_POST['content'] : null;

/**フォームのバリデーション */
$submitConfirm = isset($_POST['submitConfirm']) ? $_POST['submitConfirm'] : null; //確認画面へのボタン
$errors = [];

if($submitConfirm){
  if(!$shimei){
    $errors['shimei'][] = "氏名を入力してください。";
  }
  if(!$mail){
    $errors['mail'][] = "メールを入力してください。";
  }
  if($mail){
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      } else {
        $errors['mail'][] = "メールアドレスを正しく入力してください。";
      }
  }
}

//確認画面へボタン押下かつ入力エラーなしの場合、POSTリダイレクト
if( (($submitConfirm)) && (empty($errors)) ){
  $location_url = 'Location: '.esc_url( home_url() ).'/contact2-confirm';
  header($location_url, true, 307);
  exit;
}


$pref_list = [
  "選択してください",
  "北海道",
  "青森県",
  "岩手県",
  "宮城県",
  "秋田県",
  "山形県",
  "福島県",
  "茨城県",
  "栃木県",
  "群馬県",
  "埼玉県",
  "千葉県",
  "東京都",
  "神奈川県",
  "新潟県",
  "富山県",
  "石川県",
  "福井県",
  "山梨県",
  "長野県",
  "岐阜県",
  "静岡県",
  "愛知県",
  "三重県",
  "滋賀県",
  "京都府",
  "大阪府",
  "兵庫県",
  "奈良県",
  "和歌山県",
  "鳥取県",
  "島根県",
  "岡山県",
  "広島県",
  "山口県",
  "徳島県",
  "香川県",
  "愛媛県",
  "高知県",
  "福岡県",
  "佐賀県",
  "長崎県",
  "熊本県",
  "大分県",
  "宮崎県",
  "鹿児島県",
  "沖縄県",
];



 get_header(); ?>

    <section class="py-5 contact-form-area">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 px-xl-5">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>

            <div class="mw_wp_form mw_wp_form_input">
              <form action="<?php echo esc_url( home_url() ); ?>/contact2" method="post">
                <div class="p-country-name" style="display:none;">Japan</div>
                <dl class="form-items">
                  <dt>好きな食べ物</dt>
                  <dd>
                    <?php echo $food; ?><br>
                    <?php echo $kakusu; ?>
                    <input type="hidden" name="food" value="<?php echo $food; ?>">
                    <input type="hidden" name="kakusu" value="<?php echo $kakusu; ?>">
                  </dd>
                </dl>
                <dl class="form-items">
                  <dt><span class="label-contact label-essential">必須</span>お名前</dt>
                  <dd>
                    <input type="text" name="shimei" value="<?php echo $shimei; ?>" placeholder="山田　太郎">
                    <p class="text-danger">
                    <?php
                    if($errors['shimei']){
                      foreach ($errors['shimei'] as $val){
                        echo $val;
                        echo '<br>';
                      }
                    }
                    ?>
                    </p>
                  </dd>
                </dl>
                <dl class="form-items">
                  <dt><span class="label-contact label-essential">必須</span>メールアドレス：</dt>
                  <dd>
                    <input type="email" name="mail" value="<?php echo $mail; ?>">
                    <p class="text-danger">
                    <?php
                    if($errors['mail']){
                      foreach ($errors['mail'] as $val){
                        echo $val;
                        echo '<br>';
                      }
                    }
                    ?>
                    </p>
                  </dd>
                </dl>
                <dl class="form-items">
                  <dt><span class="label-contact label-essential">必須</span>郵便番号</dt>
                  <dd>
                  <p class="zip-wrap mb-0">
                    <input type="text" name="zip-code" class="p-postal-code" size="20" value="<?php echo $zip_code; ?>" placeholder="123-4567" data-conv-half-alphanumeric="true" inputmode="tel">
                    <button type="button" class="postal-search">住所を検索する</button>
                  </p>
                  </dd>
                </dl>
                <dl class="form-items">
                  <dt><span class="label-contact label-essential">必須</span>住所</dt>
                  <dd>
                    <span class="d-inline-block pb-1">都道府県</span><br>
                    <select name="address1" class="p-region">
                      <?php 
                      foreach ($pref_list as $pref_value){
                      ?>
                      <option value="<?php echo $pref_value; ?>"<?php if( strcmp($address1,$pref_value) == 0 ){ echo ' selected="selected"'; } ?>><?php echo $pref_value; ?></option>
                      <?
                      }
                      ?>
                    </select>
                    <br>
                    <span class="d-inline-block pt-3 pb-1">市区町村</span><br>
                    <input type="text" name="address2" class="p-locality p-street-address" size="60" value="<?php echo $address2; ?>" placeholder="△△市〇〇町1丁目1-11">
                    <br>
                    <span class="d-inline-block pt-3 pb-1">ビル・マンション名等</span><br>
                    <input type="text" name="address3" class="p-extended-address" size="60" value="<?php echo $address3; ?>" placeholder="〇〇マンション">
                  </dd>
                </dl>

                <dl class="form-items">
                  <dt><span class="label-contact label-essential">必須</span>お問い合わせ内容</dt>
                  <dd>
                    <textarea name="content" cols="50" rows="7"><?php echo $content; ?></textarea>
                  </dd>
                </dl>

                <div class="act-btn-wrap">
                  <button type="submit" name="submitConfirm" value="confirm" class="conf-send-btn">確認画面へ</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>


    
    <?php if ( is_page('contact2') ) : ?>
    <!-- Yubinbangoを使うための処理（ボタン無し） --><!--
    <script>
      let formelements = document.querySelectorAll('.mw_wp_form_input form');
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
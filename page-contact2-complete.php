<?php
$food = isset($_POST['food']) ? $_POST['food'] : null;
$kakusu = isset($_POST['kakusu']) ? $_POST['kakusu'] : null;
$shimei = isset($_POST['shimei']) ? $_POST['shimei'] : null;
$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
$zip_code = isset($_POST['zip-code']) ? $_POST['zip-code'] : null;
$address1 = isset($_POST['address1']) ? $_POST['address1'] : null;
$address2 = isset($_POST['address2']) ? $_POST['address2'] : null;
$address3 = isset($_POST['address3']) ? $_POST['address3'] : null;
$content = isset($_POST['content']) ? $_POST['content'] : null;

mb_language("uni") ;
mb_internal_encoding("utf-8");


$subject = 'お問い合わせありがとうございました';
$headers = array(
'From: 株式会社ウエブル <dev@weble.tokyo>',
//'Cc: Yamada Jiro <jiro@example.com>', //不要なときはコメントアウト
//'Bcc: saburo@example.com', //不要なときはコメントアウト
'Content-Type: text/plain; charset=UTF-8', //テキストメールの場合
//'Content-Type: text/html; charset=UTF-8', //HTMLメールの場合
);

$remail_text = <<< TEXT

お問い合わせありがとうございました。
早急にご返信致しますので今しばらくお待ちください。

送信内容は以下になります。

TEXT;

$form_data = '';
$form_data .= "好きな食べ物：".$food."\r\n";
$form_data .= "隠しフィールド：".$kakusu."\r\n";
$form_data .= "お名前：".$shimei."\r\n";
$form_data .= "メールアドレス：".$mail."\r\n";
$form_data .= "郵便番号：".$zip_code."\r\n";
$form_data .= "住所：".$address1.$address2."\r\n";
$form_data .= "ビル・マンション名等".$address3."\r\n";
$form_data .= "お問い合わせ内容：".$content."\r\n";

$mail_signature = <<< SIGNATURE

──────────────────────
株式会社○○○○　佐藤太郎
〒150-XXXX 東京都○○区○○ 　○○ビル○F　
TEL：03- XXXX - XXXX 　FAX：03- XXXX - XXXX
携帯：090- XXXX - XXXX 　
E-mail:xxxx@xxxx.com
URL: http://www.php-factory.net/
──────────────────────

SIGNATURE;

$message  = $remail_text.$form_data.$mail_signature; //メッセージ本文

$mail_result = wp_mail ( $mail, $subject, $message, $headers ); //問い合わせ者宛メール送信実行。返り値はtrue/false

/**以下、管理者宛 */
$admin_mail = 'dev@weble.tokyo';
//$admin_mail = array ( "aaa@example.com", "bbb@example.com" ); //複数のときは配列で
$admin_subject = $shimei."様よりお問い合わせがありました";
$admin_headers = array(
  'From: 株式会社ウエブル <dev@weble.tokyo>',
  //'Cc: Yamada Jiro <jiro@example.com>', //不要なときはコメントアウト
  //'Bcc: saburo@example.com', //不要なときはコメントアウト
  'Content-Type: text/plain; charset=UTF-8', //テキストメールの場合
  //'Content-Type: text/html; charset=UTF-8', //HTMLメールの場合
);

$admin_remail_text = <<< TEXT

ホームページよりお問い合わせありがとうございました。

送信内容は以下になります。

TEXT;

$admin_message = $admin_remail_text.$form_data;

$admin_mail_result = wp_mail ( $admin_mail, $admin_subject, $admin_message, $admin_headers ); //管理者宛メール送信実行。返り値はtrue/false

get_header(); ?>

    <section class="py-5 contact-form-area">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 px-xl-5">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>

            <div class="mw_wp_form mw_wp_form_complete">

            <?php if($mail_result){ ?>
              送信成功しました。
            <?php }else{ ?>
              送信失敗しました。
            <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
<?php
/*
Template Name: サイドバー有りテンプレート
*/
get_header(); ?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-9 pe-lg-4 mb-5">
            <div class="pb-3 fw-bold fs-4">↓↓ブロックエディタで入力したもの↓↓</div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="blockeditor-area"><?php the_content(); ?></div>
            <?php endwhile; endif; ?>
            <div class="pt-3 fw-bold fs-4">↑↑ブロックエディタで入力したもの↑↑</div>
            <div class="pt-5 pb-3 fw-bold fs-4">↓↓テンプレートファイルにコーディングしたもの↓↓</div>
              <h1 class="ttl-pattern_1">見出しパターン１</h1>
              <p class="mb-4">class="ttl-pattern_1"を指定するとこちらの見た目になります。</p>
              <h1 class="ttl-pattern_1 ttl-pattern_1_left">見出しパターン１＿左</h1>
              <p class="mb-4">class="ttl-pattern_1 ttl-pattern_1_left"を指定するとこちらの見た目になります。</p>
              <h1 class="ttl-pattern_1 ttl-pattern_1_right">見出しパターン１＿右</h1>
              <p class="mb-4">class="ttl-pattern_1 ttl-pattern_1_right"を指定するとこちらの見た目になります。</p>
              <h1 class="ttl-pattern_2">見出しパターン２</h1>
              <p class="mb-4">class="ttl-pattern_2"を指定するとこちらの見た目になります。</p>
              <h1 class="ttl-pattern_3">見出しパターン３</h1>
              <p class="mb-4">class="ttl-pattern_3"を指定するとこちらの見た目になります。</p>
              <h2 class="ttl-pattern_4">見出しパターン４</h2>
              <p class="mb-4">class="ttl-pattern_4"を指定するとこちらの見た目になります。</p>
              <h3 class="ttl-pattern_5">見出しパターン５</h3>
              <p class="mb-4">class="ttl-pattern_5"を指定するとこちらの見た目になります。</p>
              <h4 class="ttl-pattern_6">見出しパターン６</h4>
              <p class="mb-4">class="ttl-pattern_6"を指定するとこちらの見た目になります。</p>
              <h5 class="ttl-pattern_7">見出しパターン７</h5>
              <p class="mb-4">class="ttl-pattern_7"を指定するとこちらの見た目になります。</p>
              <p class="bg-lightgray p-3">class="bg-lightgray p-3"とするとこのようになります。
テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
              <ol class="ol-standard"><li>class="ol-standard"を指定したリスト項目です。</li><li>olリスト項目です</li><li>olリスト項目です</li></ol>
              <ul class="round-list"><li>class="round-list"を指定したリスト項目です</li><li>ulリスト項目です</li><li>ulリスト項目です</li></ul>
              <dl class="dl-standard mb-5">
                <dt>タイトル</dt>
                <dd>dldtddタグによる説明リストです。dlタグにクラスdl-standardを指定するとこちらの見た目になります。</dd>
                <dt>タイトル</dt>
                <dd>dldtddタグによる説明リストです。</dd>
              </dl>
              <table class="table-standard my-4">
                <caption>tableタグに「table-standard」を指定してください。なお、ブロックエディタのものと異なり、スマホ版ではカラム落ちします。</caption>
                <tbody>
                  <tr>
                    <th>Tableです</th>
                    <td>テキストテキストテキスト</td>
                  </tr>
                  <tr>
                    <th>タイトル</th>
                    <td>table-standard</td>
                  </tr>
                  <tr>
                    <th>タイトル</th>
                    <td>テキストテキストテキスト</td>
                  </tr>
                  <tr>
                    <th>タイトル</th>
                    <td>テキストテキストテキスト</td>
                  </tr>
                </tbody>
              </table>
            <table class="table-stripes">
              <caption>tableタグに「table-stripes」を指定してください。なお、ブロックエディタのものと異なり、スマホ版ではカラム落ちします。</caption>
              <tbody>
                <tr>
                  <th>Tableです</th>
                  <td>テキストテキストテキスト</td>
                </tr>
                <tr>
                  <th>タイトル</th>
                  <td>テキストテキストテキスト</td>
                </tr>
                <tr>
                  <th>タイトル</th>
                  <td>テキストテキストテキスト</td>
                </tr>
                <tr>
                  <th>タイトル</th>
                  <td>テキストテキストテキスト</td>
                </tr>
              </tbody>
            </table>
            <div class="py-5">
              <div class="d-flex gap-3">
                <a href="" class="btn-standard">ボタン</a>
                <a href="" class="btn-standard icon-newtab">ボタン</a>
                <a href="" class="btn-standard icon-pdf">ボタン</a>
              </div>
              <p>
                aタグに「btn-standard」クラスを指定するとこちらの見た目になります。<br>
                別窓用ボタンは「icon-newtab」、PDFボタンは「icon-pdf」クラスを追記することで適用されます。
              </p>
              <a href="" class="btn-standard btn-size300">クラスにbtn-size300を加えたもの。</a>
              <p>ボタンのサイズを変更する際は新たにwidthを指定したクラスを作成し、class="btn-standard btn-●●"としてください。</p>
            </div>
            <div class="bg-lightgray px-3">
              <div class="d-flex gap-3">
                <a href="" class="btn-standard">ボタン</a>
                <a href="" class="btn-standard icon-newtab">ボタン</a>
                <a href="" class="btn-standard icon-pdf">ボタン</a>
              </div>
            </div>
            <div class="pt-3 pb-5 fw-bold fs-4">↑↑テンプレートファイルにコーディングしたもの↑↑</div>
          </div>
          <aside class="col-12 col-lg-4 col-xl-3 sidebar mx-auto mx-lg-0"> 
            <?php get_sidebar('page');?>
          </aside>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
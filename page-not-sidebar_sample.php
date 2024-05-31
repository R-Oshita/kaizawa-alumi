<?php
/*
Template Name: 見本-サイドバー無し
*/
get_header(); ?>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10">
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
              <div class="d-flex flex-wrap gap-3 mb-2">
                <a href="" class="btn-standard">ボタン</a>
                <a href="" class="btn-standard icon-arrow">ボタン</a>
                <a href="" class="btn-standard icon-newtab">ボタン</a>
                <a href="" class="btn-standard icon-pdf">ボタン</a>
              </div>
              <p>
                aタグに「btn-standard」クラスを指定するとこちらの見た目になります。<br>
                別窓用ボタンは「icon-newtab」、PDFボタンは「icon-pdf」クラスを追記することで適用されます。<br>
                beforeとafterで別々にアイコンの画像URLを指定してopacityで出し分けているのはsafari対策です。<br>
                hover時にURLを変更する仕様だと、safariではhoverした際に一瞬画像が小さくなる現象が起きることがあります。
              </p>
              <a href="" class="btn-standard btn-size300 mb-2">クラスにbtn-size300を加えたもの。</a>
              <p class="mb-4">ボタンのサイズを変更する際は新たにwidthを指定したクラスを作成し、class="btn-standard btn-●●"としてください。</p>
              <div class="d-flex flex-wrap gap-3 mb-2">
                <a href="" class="text-link">テキストリンク</a>
                <a href="" class="text-link text-link_icon-newtab">テキストリンク</a>
                <a href="" class="text-link text-link_icon-pdf">テキストリンク</a>
              </div>
              <p>
                「text-link」クラスを指定すると上記のようになります。<br>
                「text-link text-link_icon-newtab」「text-link text-link_icon-pdf」とするとアイコンが付きます。
              </p>
            </div>
            <div class="bg-lightgray p-3">
              <div class="d-flex flex-wrap gap-3">
                <a href="" class="btn-standard">ボタン</a>
                <a href="" class="btn-standard icon-arrow">ボタン</a>
                <a href="" class="btn-standard icon-newtab">ボタン</a>
                <a href="" class="btn-standard icon-pdf">ボタン</a>
              </div>
            </div>
            <div class="py-5">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="py-5">
              <h3 class="ttl-pattern_3 mb-4">ボタンサンプル</h3>
              <div class="mb-3">
                <a href="" class="sns-btn sns-btn_twitter">
                  <span class="sns-btn_inner"><span class="sns-btn_text">フォローする</span></span>
                </a>
              </div>
              <div class="mb-3">
                <a href="" class="sns-btn sns-btn_instagram">
                  <span class="sns-btn_inner"><span class="sns-btn_text">フォローする</span></span>
                </a>
              </div>
              <style type="text/css">
                .sns-btn {
                  padding: 2px;
                  border-radius: 40px;
                  overflow: hidden;
                  display: block;
                  width: 200px;
                  height: 50px;
                }
                .sns-btn_twitter {
                  background: #1D9BF0;
                }
                .sns-btn_instagram {
                  background: linear-gradient(to right, #9632E2 0%, #D622D1 35%, #FF2E98 55%, #FF713F 80%, #FEBA31 100%);
                }
                .sns-btn_inner {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  text-align: center;
                  border-radius: 40px;
                  width: 100%;
                  height: 100%;
                  transition: .3s;
                }
                .sns-btn:hover {
                  opacity: 1;
                }
                .sns-btn:hover .sns-btn_inner {
                  background-color: #fff;
                }
                .sns-btn_text {
                  font-size: 1.25rem;
                  font-weight: 700;
                  color: #fff;
                  display: inline-block;
                  transition: .3s;
                }
                .sns-btn_twitter:hover .sns-btn_text {
                  color: #1D9BF0;
                }
                .sns-btn_instagram {
                  position: relative;
                }
                .sns-btn_instagram .sns-btn_text {
                  position: relative;
                }
                .sns-btn_instagram .sns-btn_text::before {
                  content: 'フォローする';
                  position: absolute;
                  top: 0;
                  left: 0;
                  opacity: 0;
                  background: linear-gradient(90deg, #9632E2 0%, #D622D1 35%, #FF2E98 55%, #FF713F 80%, #FEBA31 100%);
                  background: -webkit-linear-gradient(0deg, #9632E2 0%, #D622D1 35%, #FF2E98 55%, #FF713F 80%, #FEBA31 100%);
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;
                  transition: .3s;
                }
                .sns-btn_instagram:hover .sns-btn_text::before {
                  opacity: 1;
                }
              </style>
            </div>
            <div class="mt-3">
              <span class="before-dot">before-dotを付けると文頭に・が付きます。改行されても記号の下に文字は回り込みません。</span><br>
              <span class="before-asterisk">before-asteriskを付けると文頭に※が付きます。改行されても記号の下に文字は回り込みません。</span>
            </div>
            <div class="pt-3 pb-5 fw-bold fs-4">↑↑テンプレートファイルにコーディングしたもの↑↑</div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 bg-lightgray" id="jssample">
      <div class="container py-lg-4">
        <div class="FAQ-wrap p-3 p-md-4 p-lg-5">
          <div class="mb-4">
            <h2 class="ttl-pattern_1">Q&A</h2>
            <div class="subttl text-center">よくある質問</div>
          </div>
          <dl class="FAQ-items">
            <dt class="Q-box">
              <button type="button" class="Q-box-inner js-accordion-head">
                <span class="FAQ-icon">Q</span><span>質問が入ります</span>
              </button>
            </dt>
            <dd class="A-box js-accordion-content" style="display: none;">
              <div class="A-box-inner">
                <span class="FAQ-icon">A</span><span>回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
              </div>
            </dd>
          </dl>
          <dl class="FAQ-items">
            <dt class="Q-box">
              <button type="button" class="Q-box-inner js-accordion-head">
                <span class="FAQ-icon">Q</span><span>質問が入ります</span>
              </button>
            </dt>
            <dd class="A-box js-accordion-content" style="display: none;">
              <div class="A-box-inner">
                <span class="FAQ-icon">A</span><span>回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
              </div>
            </dd>
          </dl>
          <dl class="FAQ-items">
            <dt class="Q-box">
              <button type="button" class="Q-box-inner js-accordion-head">
                <span class="FAQ-icon">Q</span><span>質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります質問が入ります</span>
              </button>
            </dt>
            <dd class="A-box js-accordion-content" style="display: none;">
              <div class="A-box-inner">
                <span class="FAQ-icon">A</span><span>回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
              </div>
            </dd>
          </dl>
          <dl class="FAQ-items">
            <dt class="Q-box">
              <button type="button" class="Q-box-inner js-accordion-head">
                <span class="FAQ-icon">Q</span><span>質問が入ります</span>
              </button>
            </dt>
            <dd class="A-box js-accordion-content" style="display: none;">
              <div class="A-box-inner">
                <span class="FAQ-icon">A</span><span>回答が入ります。</span>
              </div>
            </dd>
          </dl>
        </div><!-- //FAQ-wrap -->
      </div>
    </section>
    <section class="py-5">
      <div class="container py-lg-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            <div class="p-4 bg-lightgray scrollcheck fadeinexample">
              クラス「scrollcheck」を付けると、スクロールに反応して「scrolled」が付きます。<br>
              フェードインエフェクト等に使用できます。<br>
              ※「scrollcheck」に直接cssを指定するのではなく、任意のクラスを新たに足して見た目を指定してください。
            </div>
          </div>
        </div>
      </div>
    </section>
    <style type="text/css">
      .fadeinexample {
        opacity: 0;
        transform: translateY(1rem);
        transition: .3s;
      }
      .fadeinexample.scrolled {
        opacity: 1;
        transform: translateY(0);
      }
    </style>
<?php get_footer(); ?>
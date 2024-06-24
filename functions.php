<?php

// =======================================
// bootstrapのCSSとJavaScriptを読み込む（header.php, footer.php のCSS, JS読み込み部分をここにまとめて書く）
// =======================================

function add_files()
{
  wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1');
  wp_enqueue_style('initial-style', get_template_directory_uri() . '/style.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/style.css')));
  wp_enqueue_style('nav', get_template_directory_uri() . '/css/style-nav.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-nav.css')));
  wp_enqueue_style('style-common', get_template_directory_uri() . '/css/style-common.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-common.css')));

  wp_enqueue_script('jquery');

  // JSの読み込み
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js?' . date("ymdHis", filemtime(get_template_directory() . '/js/custom.js')), array(), NULL, true);
  wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), NULL, true);
  wp_enqueue_script('lazy-script', get_template_directory_uri() . '/js/lazysizes.min.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'add_files');

//ページ毎の読み込み
function individual_styles()
{
  if (is_front_page()) {
    wp_enqueue_style('home', get_template_directory_uri() . '/css/style-home.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-home.css')));
  }
  if (is_page('contact') || is_page('contact2') || is_page('contact_snow') || is_page('entry-form') || is_page('contact-finish') || is_page('entry-form-finish')) {
    wp_enqueue_style('contact', get_template_directory_uri() . '/css/style-contact.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-contact.css')));
    wp_enqueue_style('contact_snow', get_template_directory_uri() . '/css/style-contact_snow.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-contact_snow.css')));
    wp_enqueue_script('yubinbango', get_template_directory_uri() . '/js/yubinbango.js', array(), false, true);
  }
  if (is_page('contact_snow')) {
    wp_enqueue_style('contact_snow', get_template_directory_uri() . '/css/style-contact_snow.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-contact_snow.css')));
    wp_enqueue_script('yubinbango', get_template_directory_uri() . '/js/yubinbango.js', array(), false, true);
  }
  if (is_page('contact-finish')) {
    wp_enqueue_style('contact_snow', get_template_directory_uri() . '/css/style-contact_snow.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-contact_snow.css')));
  }
  if (is_page('contact-confirm') || is_page('contact-complete') || is_page('contact2-confirm') || is_page('contact2-complete')) {
    wp_enqueue_style('contact', get_template_directory_uri() . '/css/style-contact.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-contact.css')));
  }
  if (is_page('company')) {
    wp_enqueue_style('company', get_template_directory_uri() . '/css/style-company.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-company.css')));
  }
  if (is_page('service')) {
    wp_enqueue_style('service', get_template_directory_uri() . '/css/style-service.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-service.css')));
  }
  if (is_page('recruit')) {
    wp_enqueue_style('recruit', get_template_directory_uri() . '/css/style-recruit.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-recruit.css')));
    wp_enqueue_style('scroll-hint', get_template_directory_uri() . '/css/scroll-hint.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/scroll-hint.css')));
    wp_enqueue_script('scroll-hint-script', get_template_directory_uri() . '/js/scroll-hint.min.js?' . date("ymdHis", filemtime(get_template_directory() . '/js/scroll-hint.min.js')), array(), NULL, true);
  }
  if (is_single() || is_archive()) {
    wp_enqueue_style('news', get_template_directory_uri() . '/css/style-news.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/style-news.css')));
  }
  /*
  //イメージマップ（クリッカブルマップ）のレスポンシブ対応のためのJSです。使用するページでのみ読み込みを行い、
  //<script>imageMapResize();</script>
  //↑こちらを記述すれば適用されます。
  //実装方法の詳細・注意点は↓
  //https://weble.welog.jp/workspace/directory/60a3c600-864a-40af-966e-909d194dcf40?n=157939a1-d3d5-47ac-8968-718a5d3a37b4
  if ( is_page('') ) {
    wp_enqueue_script( 'imageMapResizer', get_template_directory_uri() . '/js/imageMapResizer.min.js', array(), false, true );
  }*/
}
add_action('wp_enqueue_scripts', 'individual_styles');

//GutenbergにオリジナルのCSSを適用する
add_action('admin_enqueue_scripts', function ($hook_suffix) {
  // 新規・編集投稿ページのみ読み込み
  if ('post.php' === $hook_suffix || 'post-new.php' === $hook_suffix) {
    // CSSディレクトリの設定
    $uri = get_template_directory_uri() . "/css/editor-style.css?" . date("ymdHis", filemtime(get_stylesheet_directory() . '/css/editor-style.css'));
    // CSSファイルの読み込み
    wp_enqueue_style("smart-style", $uri, array(), wp_get_theme()->get('Version'));
  }
});

/* ↓親ページ含む全ての子孫ページに条件分岐を反映↓ */
/*
「if( is_tree(親ページID)) :」とすると親ページとその子孫ページ全てに条件分岐を適用できます。
*/
function is_tree($pid)
{
  global $post;
  if (!is_null($post)) :
    if (is_page($pid))
      return true;
    $anc = get_post_ancestors($post->ID);
    foreach ($anc as $ancestor) {
      if (is_page() && $ancestor == $pid) {
        return true;
      }
    }
    return false;
  endif;
}
/* ↑親ページ含む全ての子孫ページに条件分岐を反映↑ */

/* ↓親を除く子孫ページに条件分岐を反映↓ */
/*
「if( is_descendants(親ページID)) :」とすると親ページを除いた子孫ページ全てに条件分岐を適用できます。
*/
function is_descendants($pid)
{
  global $post;
  if (!is_null($post)) :
    $anc = get_post_ancestors($post->ID);
    foreach ($anc as $ancestor) {
      if ($ancestor == $pid) {
        return true;
      }
    }
    return false;
  endif;
}
/* ↑親を除く子孫ページに条件分岐を反映↑ */

add_theme_support('menus'); //カスタムメニューの有効化
add_theme_support('post-thumbnails'); //サムネイルの有効化
add_theme_support('title-tag'); //タイトルタグの出力
add_filter('show_admin_bar', '__return_false'); //管理バーを非表示
remove_filter('the_excerpt', 'wpautop'); //抜粋のpタグを削除

function na_trim_words($str, $int, $end = '…')
{
  $post_content = strip_tags($str);
  if (mb_strlen($post_content) > $int) {
    $post_content = mb_substr($post_content, 0, $int);
    $post_content = str_replace(array("\r", "\n"), '', $post_content) . $end;
  } else {
    $post_content = str_replace(array("\r", "\n"), '', $post_content);
  }
  return $post_content;
}

//bodyタグにクラス追加
add_filter('body_class', 'add_page_slug_class_name');
function add_page_slug_class_name($classes)
{
  if (is_page()) {
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name;

    $parent_id = $page->post_parent;
    if (0 == $parent_id) {
      $classes[] = get_post($parent_id)->post_name;
    } else {
      $progenitor_id = array_pop(get_ancestors($page->ID, 'page', 'post_type'));
      $classes[] = get_post($progenitor_id)->post_name;
    }
  }
  return $classes;
}

/* サムネの縦横比 */
//出力したいサムネイルのサイズを指定してください。
//サムネイルのサイズの作成を行った後は、プラグイン「Regenerate Thumbnails」の機能でサムネイルの再作成を行う必要があります。
//また、ここで指定したサムネイルサイズと同様の縦横比のNoImage画像を作成し、./images/common/に入れてください。
add_image_size('thumb-post', 298, 190, true);
add_image_size('thumb-topblog', 700, 450, true);
add_image_size('thumb-200200', 200, 200, true);
/* //サムネの縦横比 */

//概要（抜粋）の最後の文字を変更
function my_excerpt_more($more)
{
  return '…';
}
add_filter('excerpt_more', 'my_excerpt_more');

//パンくず
if (!function_exists('custom_breadcrumb')) {
  function custom_breadcrumb($wp_obj = null)
  {

    // トップページでは何も出力しない
    if (is_home() || is_front_page()) return false;

    //そのページのWPオブジェクトを取得
    $wp_obj = $wp_obj ?: get_queried_object();

    echo '<div id="breadcrumb" class="breadcrumb">' .  //id名などは任意で
      '<ul>' .
      '<li>' .
      '<a href="' . home_url() . '"><span>ホーム</span></a>' .
      '</li>';

    if (is_attachment()) {

      /**
       * 添付ファイルページ ( $wp_obj : WP_Post )
       * ※ 添付ファイルページでは is_single() も true になるので先に分岐
       */
      echo '<li><span>' . $wp_obj->post_title . '</span></li>';
    } elseif (is_singular(array('special', 'campaign'))) {
      $post_type  = $wp_obj->post_type;
      echo '<li>' .
        '<span>' . get_post_type_object($post_type)->label . '</span>' .
        '</li>';
    } elseif (is_single()) {

      /**
       * 投稿ページ ( $wp_obj : WP_Post )
       */
      $post_id    = $wp_obj->ID;
      $post_type  = $wp_obj->post_type;
      $post_title = $wp_obj->post_title;

      // カスタム投稿タイプかどうか
      if ($post_type !== 'post') {

        $the_tax = "";  //そのサイトに合わせ、投稿タイプごとに分岐させて明示的に指定してもよい

        // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
        $tax_array = get_object_taxonomies($post_type, 'names');
        foreach ($tax_array as $tax_name) {
          if ($tax_name !== 'post_format') {
            $the_tax = $tax_name;
            break;
          }
        }

        //カスタム投稿タイプ名の表示
        echo '<li>' .
          '<a href="' . get_post_type_archive_link($post_type) . '">' .
          '<span>' . get_post_type_object($post_type)->label . '</span>' .
          '</a>' .
          '</li>';
      } else {
        $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示
        $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);
        echo '<li>' .
          '<a href="' . esc_url(home_url()) . '/' . $post_slug . '/">' .
          '<span>' . get_post_type_object($post_type)->label . '</span>' .
          '</a>' .
          '</li>';
      }

      // タクソノミーが紐づいていれば表示
      if ($the_tax !== "") {


        $child_terms = array();   // 子を持たないタームだけを集める配列
        $parents_list = array();  // 子を持つタームだけを集める配列

        // 投稿に紐づくタームを全て取得
        $terms = get_the_terms($post_id, $the_tax);

        if (!empty($terms)) {
          //全タームの親IDを取得
          foreach ($terms as $term) {
            if ($term->parent !== 0) $parents_list[] = $term->parent;
          }

          //親リストに含まれないタームのみ取得
          foreach ($terms as $term) {
            if (!in_array($term->term_id, $parents_list)) $child_terms[] = $term;
          }

          // 最下層のターム配列から一つだけ取得
          $term = $child_terms[0];

          if ($term->parent !== 0) {

            // 親タームのIDリストを取得
            $parent_array = array_reverse(get_ancestors($term->term_id, $the_tax));
            foreach ($parent_array as $parent_id) {
              $parent_term = get_term($parent_id, $the_tax);
              echo '<li>' .
                '<a href="' . get_term_link($parent_id, $the_tax) . '">' .
                '<span>' . $parent_term->name . '</span>' .
                '</a>' .
                '</li>';
            }
          }

          // 最下層のタームを表示
          echo '<li>' .
            '<a href="' . get_term_link($term->term_id, $the_tax) . '">' .
            '<span>' . $term->name . '</span>' .
            '</a>' .
            '</li>';
        }
      }

      // 投稿自身の表示
      echo '<li><span>' . $post_title . '</span></li>';
    } elseif (is_page()) {

      /**
       * 固定ページ ( $wp_obj : WP_Post )
       */
      $page_id    = $wp_obj->ID;
      $page_title = $wp_obj->post_title;

      // 親ページがあれば順番に表示
      if ($wp_obj->post_parent !== 0) {
        $parent_array = array_reverse(get_post_ancestors($page_id));
        foreach ($parent_array as $parent_id) {
          echo '<li>' .
            '<a href="' . get_permalink($parent_id) . '">' .
            '<span>' . get_the_title($parent_id) . '</span>' .
            '</a>' .
            '</li>';
        }
      }
      // 投稿自身の表示
      echo '<li><span>' . $page_title . '</span></li>';
    } elseif (is_post_type_archive()) {

      /**
       * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
       */
      echo '<li><span>' . $wp_obj->label . '</span></li>';
    } elseif (is_date()) {
      $post_label = esc_html(get_post_type_object(get_post_type())->label);
      $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);
      echo '<li>' .
        '<a href="' . esc_url(home_url()) . '/' . $post_slug . '/">' .
        '<span>' . $post_label . '</span>' .
        '</a>' .
        '</li>';

      /**
       * 日付アーカイブ ( $wp_obj : null )
       */
      $year  = get_query_var('year');
      $month = get_query_var('monthnum');
      $day   = get_query_var('day');



      if ($day !== 0) {
        //日別アーカイブ
        echo '<li><a href="' . get_year_link($year) . '"><span>' . $year . '年</span></a></li>' .
          '<li><a href="' . get_month_link($year, $month) . '"><span>' . $month . '月</span></a></li>' .
          '<li><span>' . $day . '日</span></li>';
      } elseif ($month !== 0) {
        //月別アーカイブ
        echo '<li><a href="' . get_year_link($year) . '"><span>' . $year . '年</span></a></li>' .
          '<li><span>' . $month . '月</span></li>';
      } else {
        //年別アーカイブ
        echo '<li><span>' . $year . '年</span></li>';
      }
    } elseif (is_author()) {

      /**
       * 投稿者アーカイブ ( $wp_obj : WP_User )
       */
      echo '<li><span>' . $wp_obj->display_name . ' の執筆記事</span></li>';
    } elseif (is_archive()) {

      /**
       * タームアーカイブ ( $wp_obj : WP_Term )
       */
      $term_id   = $wp_obj->term_id;
      $term_name = $wp_obj->name;
      $tax_name  = $wp_obj->taxonomy;

      /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */

      // 親ページがあれば順番に表示

      if (is_post_type_archive('post') || is_category()) :
        $post_label = esc_html(get_post_type_object(get_post_type())->label); //現在の投稿タイプのラベルを取得
        $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive); //デフォルト投稿ならhas_archiveを取得
      elseif (is_tax()) :
        $taxonomy = get_query_var('taxonomy');
        $post_slug = get_taxonomy($taxonomy)->object_type[0];
        $post_label = get_post_type_object($post_slug)->label;
      else :
        $post_label = esc_html(get_post_type_object(get_post_type())->label); //現在の投稿タイプのラベルを取得
        $post_slug = esc_html(get_post_type_object(get_post_type())->name); //カスタム投稿のスラッグを取得
      endif;
      echo '<li class="post-type-name">' .
        '<a href="' . esc_url(home_url()) . '/' . $post_slug . '/">' .
        '<span>' . $post_label . '</span>' .
        '</a>' .
        '</li>';

      if ($wp_obj->parent !== 0) {

        $parent_array = array_reverse(get_ancestors($term_id, $tax_name));
        foreach ($parent_array as $parent_id) {
          $parent_term = get_term($parent_id, $tax_name);
          echo '<li>' .
            '<a href="' . get_term_link($parent_id, $tax_name) . '">' .
            '<span>' . $parent_term->name . '</span>' .
            '</a>' .
            '</li>';
        }
      }

      // ターム自身の表示
      echo '<li>' .
        '<span>' . $term_name . '</span>' .
        '</li>';
    } elseif (is_search()) {

      /**
       * 検索結果ページ
       */
      echo '<li><span>「' . get_search_query() . '」で検索した結果</span></li>';
    } elseif (is_404()) {

      /**
       * 404ページ
       */
      echo '<li><span>お探しの記事は見つかりませんでした。</span></li>';
    } else {

      /**
       * その他のページ（無いと思うが一応）
       */
      echo '<li><span>' . get_the_title() . '</span></li>';
    }

    echo '</ul></div>';  // 冒頭に合わせて閉じタグ

  }
}
/* //パンくずここまで */

/* デフォルト投稿の設定 */
function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'news'; //任意のスラッグ名。変更した後はパーマリンクの更新を行ってください。この行をコメントアウトするとデフォルト投稿のアーカイブページが存在しなくなります。
    $args['label'] = 'お知らせ'; //適宜案件に応じて名前は変更してください。
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 3);

/**
 * 投稿のパーマリンク変更.
 * add_article_post_permalink()
 *
 * @param string $permalink permalink.
 * @return string $permalink permalink.
 */
function add_article_post_permalink($permalink)
{
  $permalink = '/news' . $permalink;
  return $permalink;
}
add_filter('pre_post_link', 'add_article_post_permalink');

/**
 * 投稿のリライトルール変更
 * add_article_post_rewrite_rules()
 *
 * @param object $post_rewrite post_rewrite.
 * @return string $return_rule return_rule.
 */
function add_article_post_rewrite_rules($post_rewrite)
{
  $return_rule = array();
  foreach ($post_rewrite as $regex => $rewrite) {
    $return_rule['news/' . $regex] = $rewrite;
  }
  return $return_rule;
}
add_filter('post_rewrite_rules', 'add_article_post_rewrite_rules');


/* aタグの中に件数 */
add_filter('get_archives_link', 'my_archives_link');
function my_archives_link($output)
{
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/', ' ($2)</a>', $output);
  return $output;
}
/* mw-wp-formでビジュアルエディタを使えなくする */
function my_off_ve_in_page()
{
  global $typenow;
  if (in_array($typenow, array('mw-wp-form'))) {
    add_filter('user_can_richedit', 'my_off_ve_filter');
  }
}
function my_off_ve_filter()
{
  return false;
}
add_action('load-post.php', 'my_off_ve_in_page');
add_action('load-post-new.php', 'my_off_ve_in_page');

/*********************************
  管理画面固定ページ一覧にスラッグ表示
 **********************************/
function add_page_column_title($columns)
{
  $columns['slug'] = "スラッグ";
  return $columns;
}
function add_page_column($column_name, $post_id)
{
  if ($column_name == 'slug') {
    $post = get_post($post_id);
    $slug = $post->post_name;
    echo esc_attr($slug);
  }
}
add_filter('manage_pages_columns', 'add_page_column_title');
add_action('manage_pages_custom_column', 'add_page_column', 10, 2);

/* 非公開や下書きの固定ページを親ページに設定できるように */
add_filter('page_attributes_dropdown_pages_args', 'add_private_draft');
function add_private_draft($args)
{
  $args['post_status'] = 'publish,private,draft';
  return $args;
}

function gutenberg_support_setup()
{

  //Gutenberg用スタイルの読み込み
  add_theme_support('wp-block-styles');

  //「幅広」と「全幅」に対応
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'gutenberg_support_setup');

/**サイトのURL取得 */
function homeurl_func()
{
  return home_url('/');
}
add_shortcode('home_url', 'homeurl_func');

/**テーマのURL取得 */
function themeurl_func()
{
  return get_template_directory_uri();
}
add_shortcode('theme_url', 'themeurl_func');

/* 管理画面の記事一覧にカテゴリを表示 */
function add_custom_column($column)
{
  global $post_type;
  if ($post_type === 'event') {
    $column['event_taxonomy'] = 'イベント情報のカテゴリ';
  }
  return $column;
}
add_filter('manage_posts_columns', 'add_custom_column');

function add_custom_column_id($column_name, $id)
{
  if ($column_name === 'event_taxonomy') {
    echo get_the_term_list($id, 'event_taxonomy', '', ', ');
  }
}
add_action('manage_event_posts_custom_column', 'add_custom_column_id', 10, 2);
/* //管理画面の記事一覧にカテゴリを表示 */

/* 管理画面の記事一覧をカテゴリで絞り込めるように */
function add_post_taxonomy_restrict_filter()
{
  global $post_type;
  if ('event' == $post_type) {
?>
    <select name="event_taxonomy">
      <option value="">カテゴリー指定なし</option>
      <?php
      $terms = get_terms('event_taxonomy');
      foreach ($terms as $term) { ?>
        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
      <?php } ?>
    </select>
  <?php
  }
}
add_action('restrict_manage_posts', 'add_post_taxonomy_restrict_filter');
/* //管理画面の記事一覧をカテゴリで絞り込めるように */

/* 検索ワードをハイライトする */
function wps_highlight_results($text)
{

  if (is_search() && !is_admin()) {
    if (!empty(get_search_query())) :
      $sr = get_query_var('s');
      $keys = explode(" ", $sr);
      $text = preg_replace('/(' . implode('|', $keys) . ')/iu', '<span class="searchresult-highlight">' . $sr . '</span>', $text);
    endif;
  }
  return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_excerpt', 'wps_highlight_results');
/* //検索ワードをハイライトする */

/* ポップアップキーボードのデフォルト表示を「数字」に */
function my_do_shortcode_tag_tel($output, $tag, $attr, $m)
{
  if ($tag == 'mwform_text' && $attr['name'] == 'zip-code') {
    $output = rtrim(substr($output, 0, -3)) . ' inputmode="tel" />' . "\n";
  }
  if ($tag == 'mwform_text' && $attr['name'] == 'tel') {
    $output = rtrim(substr($output, 0, -3)) . ' inputmode="tel" />' . "\n";
  }
  return $output;
}
add_filter('do_shortcode_tag', 'my_do_shortcode_tag_tel', 10, 4);
/* //ポップアップキーボードのデフォルト表示を「数字」に */

/* ブロックエディタ拡張*/
function my_enqueue_block_editor_assets()
{
  $script = <<<SCRIPT
  wp.blocks.registerBlockStyle('core/button', {
      name: 'icon-arrow',
      label: '矢印アイコン'
  });
  wp.blocks.registerBlockStyle('core/button', {
      name: 'icon-newtab',
      label: '別窓アイコン'
  });
  wp.blocks.registerBlockStyle('core/button', {
      name: 'icon-pdf',
      label: 'PDFアイコン'
  });
  wp.blocks.registerBlockStyle('core/paragraph', {
      name: 'text-icon-newtab',
      label: '別窓アイコン'
  });
  wp.blocks.registerBlockStyle('core/paragraph', {
      name: 'text-icon-pdf',
      label: 'PDFアイコン'
  });
  SCRIPT;
  wp_add_inline_script('wp-blocks', $script);
}
add_action('enqueue_block_editor_assets', 'my_enqueue_block_editor_assets');
/* //ブロックエディタ拡張*/

//投稿のタグをチェックボックスで選択できるようにする
function change_post_tag_to_checkbox()
{
  $args = get_taxonomy('post_tag');
  $args->hierarchical = true; //Gutenberg用
  $args->meta_box_cb = 'post_categories_meta_box'; //Classicエディタ用
  register_taxonomy('post_tag', 'post', $args);
}
add_action('init', 'change_post_tag_to_checkbox', 1);

/*
 * **********************************
 * 文字の勝手な半角→全角変換はさせない
 * **********************************
 */
remove_filter("the_content", "wptexturize"); //本文の文字変換をオフに
remove_filter("the_excerpt", "wptexturize"); //抜粋の文字変換をオフに
remove_filter("the_title", "wptexturize");      //タイトルの文字変換をオフに

// メニュー
register_nav_menus(
  array(
    'place_header' => 'ヘッダーナビ',
    'place_footer' => 'フッターナビ'
  )
);

// ブロックエディタの独自スタイル追加
function my_enqueue_block_editor_assets_first_column()
{
  $script = <<<SCRIPT
  wp.blocks.registerBlockStyle('core/table', {
    name: 'firstColumn',
    label: '列見出し'
  });
  SCRIPT;
  wp_add_inline_script('wp-blocks', $script);
}
add_action('enqueue_block_editor_assets', 'my_enqueue_block_editor_assets_first_column');

function my_enqueue_block_editor_assets_quote_style()
{
  $script = <<<SCRIPT
    wp.blocks.registerBlockStyle('core/quote', {
        name: 'quote-gray',
        label: 'グレー'
    });
    SCRIPT;
  wp_add_inline_script('wp-blocks', $script);
}
add_action('enqueue_block_editor_assets', 'my_enqueue_block_editor_assets_quote_style');


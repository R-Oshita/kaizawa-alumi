    <?php if( is_search("") ): ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <h1 class="head-ttl">サイト内検索</h1>
          <div class="head-subttl">Search</div>
        </div>
      </div>
      <?php elseif( is_tax() ) : ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <?php
            $taxonomy = get_query_var('taxonomy');
            $post_slug = get_taxonomy($taxonomy)->object_type[0];
            $post_label = get_post_type_object($post_slug)->label;
          ?>
          <h1 class="head-ttl"><?php echo $post_label; ?></h1>
          <div class="head-subttl"><?php echo $post_slug; ?></div>
        </div>
      </div>
      <?php elseif( is_archive() || is_category() ) : ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <?php
            $post_label = esc_html(get_post_type_object(get_post_type())->label);//現在の投稿タイプのラベルを取得
            if ( is_post_type_archive('post') || is_category() ):
              $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);//デフォルト投稿ならhas_archiveを取得
            elseif( is_date() && 'post' === get_post_type() ) :
              $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);
            else :
              $post_slug = esc_html(get_post_type_object(get_post_type())->name);//カスタム投稿のスラッグを取得
            endif;
          ?>
          <h1 class="head-ttl"><?php echo $post_label; ?></h1>
          <div class="head-subttl"><?php echo $post_slug; ?></div>
        </div>
      </div>
      <?php elseif( is_single() ) : ?>
      <div class="head-ttl-wrap">
        <div class="container">
          <?php
            $post_label = esc_html(get_post_type_object(get_post_type())->label);//現在の投稿タイプのラベルを取得
            if ( is_singular('post') ):
              $post_slug = esc_html(get_post_type_object(get_post_type())->has_archive);//デフォルト投稿ならhas_archiveを取得
            else :
              $post_slug = esc_html(get_post_type_object(get_post_type())->name);//カスタム投稿のスラッグを取得
            endif;
          ?>
          <div class="head-ttl"><?php echo $post_label; ?></div>
          <div class="head-subttl josefin"><?php echo $post_slug; ?></div>
        </div>
      </div>
      <?php elseif( is_page('') && !is_front_page() ) : ?>
      <div class="head-ttl-wrap">
        <div class="container head-ttl-inner">
          <h1 class="head-ttl"><?php the_title();?></h1>
          <?php // 投稿のスラッグを取得
            $page = get_post( get_the_ID() );
            $slug = $page->post_name; 
            $slug = str_replace('-', '&nbsp;', $slug);
          ?>
          <div class="head-subttl"><?php echo $slug; ?></div>
        </div>
      </div>
      <?php else: ?>
      <?php endif; ?>
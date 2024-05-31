<div class="sidebar-sticky">
	<div class="mb-4">
	  <h3 class="sidebar-ttl">最新記事</h3>
		<ul class="sidebar-linklist">
	    <?php
	    	$post_type= 'post';
				$args = array(
				'post_type' => $post_type,
				'taxonomy' => 'category',
				'posts_per_page' => 5,
				'numberposts' => '-1',
				);
				$my_posts = get_posts($args);
				foreach ( $my_posts as $post ) {
				setup_postdata($post); ?>
				<li>
					<a href="<?php the_permalink() ?>" class="sidebar-link">
		      	<div class="sidebar-post-wrap">
		      		<div class="sidebar-thumbbox">
		      			<?php
		      			  if (has_post_thumbnail()) {
		      			    the_post_thumbnail('thumb-200200');
		      			  }else {
		      			    echo '<img src="'. get_template_directory_uri() .'/images/common/NoImage100.png" alt="NoImage" width="60" height="60" loading="lazy">';
		      			  }
		      			?>
		      		</div>
		      		<div class="sidebar-textbox">
	    					<div class="sidebar-date"><?php the_time('Y.m.d'); ?></div>
	    			    <div class="post-cat-wrap">
	    			      <?php 
	    			        $id         = get_the_ID(); //現在の投稿のID（数値）を取得
	    			        $term_array = get_the_terms( $id, 'category' );  //投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得
	    			        if (!is_array($term_array)) {
	    			           $term_array = array(array('title'=>''));
	    			        } else {
	    			           foreach ( $term_array as $term ) {
	    			               $term_name = esc_html($term->name);
	    			               $term_slug = $term -> slug;
	    			               echo ('<span class="cat-label ') ;
	    			               echo esc_html($term_slug) ;
	    			               echo ('">') ;
	    			               echo esc_html($term->name)  ;
	    			               echo ('</span>') ;
	    			           }
	    			        }
	    			      ?>
	    			    </div>
	    			    <div class="sidebar-post-ttl"><?php the_title(); ?></div>
		      		</div>
		      	</div>
					</a>
				</li>
				<?php
				}
			?>
	  </ul>
	</div>
	<div class="mb-4">
	  <h3 class="sidebar-ttl">カテゴリー</h3>
	    <?php 
			  $my_tax = 'category';  //取得したいタクソノミー名
			  $parent_terms = get_terms( $my_tax, array('hide_empty' => false, 'parent' => 0) );  //第一階層のタームだけ取得
			  if ( !empty( $parent_terms ) ) :
			    echo '<ul class="sidebar-linklist">';

			    //第1ループ
			    foreach ( $parent_terms as $pt ) : 
			      $pt_id = $pt->term_id;
			      $pt_name = $pt->name;
			      $pt_url = get_term_link($pt);
			?>
	    <li>
	      <a href="<?php echo $pt_url; ?>"><?php echo $pt_name; ?>(<?php echo $pt->count; ?>)</a>
	      <?php 
	        $child_terms = get_terms( $my_tax, array('hide_empty' => false, 'parent' => $pt_id) );
	        if ( !empty( $child_terms ) ) :
	          echo '<ul class="sidebar-link-child">';

	         //第2ループ
	          foreach ( $child_terms as $ct ) : 
	            $ct_id = $ct->term_id;
	            $ct_name = $ct->name;
	            $ct_url = get_term_link($ct);
	      ?>
	            <li>
	              <a href="<?php echo $ct_url; ?>"><?php echo $ct_name; ?>(<?php echo $ct->count; ?>)</a>
	            </li>
	      <?php
	          endforeach;  //End : 第２ループ
	          echo '</ul>';
	        endif;
	      ?>
	    </li>
			<?php
			    endforeach;  //End : 第1ループ
			    echo '</ul>';
			  endif;
			?>
	</div>
	<div class="mb-4">
	  <h3 class="sidebar-ttl">月別アーカイブ</h3>
	  <ul class="sidebar-linklist">
	    <?php
			wp_get_archives(array('post_type' => $post_type,
			                      'type' => 'monthly',
			                     	'show_post_count' => 1));
			?>
	  </ul>
	</div>
	<div class="mb-4">
		<h3 class="sidebar-ttl mb-3">検索</h3>
		<div class="sidebar-search-wrap">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="hidden" name="post_type[]" value="post">
			  <input name="s" id="s" type="text" class="sidebar-input">
			  <input id="submit" type="submit" value="検索">
			</form>
		</div>
	</div>
</div>
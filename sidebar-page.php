<div class="sidebar-sticky">
<?php if(is_page() && $post->post_parent) : ?>
  <!-- 子ページの場合 -->
  <?php $parent_id = $post->ancestors[count($post->ancestors) - 1]; ?>
  <div class="aside-ttl"><a class="sidebar-ttl text-gray" href="<?php echo get_permalink($parent_id); ?>"><?php echo $parent_title = get_post($parent_id)->post_title; ?></a></div>

  <?php
  $children = wp_list_pages( array(
      "child_of" => $parent_id,
      "title_li" => "",
      'echo'     => 0
    )
  );
  $children = str_replace('page_item','menu-item',$children);
  $children = str_replace('menu-item_has_children','menu-item-has-children',$children);
  $children = str_replace('current_menu-item','current-menu-item',$children);
  $children = str_replace('children','sub-menu side-sub-menu',$children);
  $children = str_replace('menu-item-has-sub-menu side-sub-menu','menu-item-has-children',$children);
  if ( $children ): ?>
  <ul class="sidebar-linklist">
  <?php echo $children; ?>
  </ul>
  <?php endif; ?>
<?php else : ?>
  <!-- 親ページの場合 -->
  <?php $id = $post->ID; ?>

  <div class="aside-ttl"><?php the_title(); ?></div>
  <?php
  $children = wp_list_pages( array(
      "child_of" => $id,
      "title_li" => "",
      'echo'     => 0
    )
  );
  $children = str_replace('page_item','menu-item',$children);
  $children = str_replace('menu-item_has_children','menu-item-has-children',$children);
  $children = str_replace('current_menu-item','current-menu-item',$children);
  $children = str_replace('children','sub-menu side-sub-menu',$children);
  $children = str_replace('menu-item-has-sub-menu side-sub-menu','menu-item-has-children',$children);
  if ( $children ): ?>
  <ul class="side-menu">
  <?php echo $children; ?>
  </ul>
  <?php endif; ?>
<?php endif; ?>
</div>
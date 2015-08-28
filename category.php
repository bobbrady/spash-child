  <?php $mts_options = get_option('splash'); ?>
  <?php get_header(); ?>
  <div id="page">
  <div class="<?php mts_article_class(); ?>">
    <div id="content_box">
     <h1 class="postsby">
      <span><?php single_cat_title(); ?><?php _e(" Category", "mythemeshop"); ?></span>
    </h1>
    <?php
    $main_cat_ID = get_query_var( 'cat' );

    // if it is page 1
    if ( $paged < 2 ) :
      echo category_description( $category_id );
      // get sticky posts and show them if they exist
      $args = array( 'category__in' => $main_cat_ID, 'include' => get_option( 'sticky_posts' ) );
      $myposts = get_posts( $args );
      if ( count( $myposts ) > 0 ) :
    ?>
        <h2>Featured Posts</h2>
    <?php foreach ( $myposts as $post ) : setup_postdata( $post );
        set_query_var( 'mts_options', $mts_options );
        get_template_part( 'articlesummary');
        endforeach;
        endif;
        else :
    ?>
        <p>For an introduction to this topic and our latest articles, please see the main
        <a href="<?php echo get_category_link( $main_cat_ID ); ?>"><?php single_cat_title(); ?></a> page.</p>
    <?php
      endif;
        wp_reset_postdata();
        $selected_layout = (!empty($mts_options['mts_sorting']) && !empty($_COOKIE['selected_layout']) && $_COOKIE['selected_layout'] == 'grid' ? 'grid' : 'list');
        if($mts_options['mts_sorting'] == '1') {
    ?>
          <div class="viewstyle">
           <span class="viewtext"><?php _e('Show Posts in','mythemeshop'); ?></span>
           <div class="viewsbox">
            <div id="list" <?php echo ($selected_layout == 'list' ? 'class="active"' : ''); ?>><a><i class="fa fa-list"></i> <?php _e('List View','mythemeshop'); ?></a></div>
            <div id="grid" <?php echo ($selected_layout == 'grid' ? 'class="active"' : ''); ?>><a><i class="fa fa-th"></i> <?php _e('Grid View','mythemeshop'); ?></a></div>
          </div>
          <div style="clear:both;"></div>
        </div>
        <?php } ?>
        <h2>Recent Posts</h2>
        <?php $j = 0; if (have_posts()) : while (have_posts()) : the_post();
        set_query_var( 'mts_options', $mts_options );
        get_template_part( 'articlesummary');
        endwhile; endif; ?>
        <!--Start Pagination-->
        <?php if ($mts_options['mts_pagenavigation'] == '1' ) { ?>
        <?php  $additional_loop = 0; mts_pagination($additional_loop['max_num_pages']); ?>
        <?php } else { ?>
        <div class="pagination">
         <ul>
          <li class="nav-previous"><?php next_posts_link( '<i class="fa fa-angle-left"></i> '. __( 'Previous', 'mythemeshop' ) ); ?></li>
          <li class="nav-next"><?php previous_posts_link( __( 'Next', 'mythemeshop' ).' <i class="fa fa-angle-right"></i>' ); ?></li>
        </ul>
      </div>
      <?php } ?>
      <!--End Pagination-->
    </div>
   </div>
  <?php get_sidebar(); ?>
  <?php get_footer(); ?>

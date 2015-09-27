<?php $mts_options = get_option('splash'); ?>
<?php get_header(); ?>
<div id="page">
  <div class="<?php mts_article_class(); ?>">
    <div id="content_box">
     <h1 class="postsby">
      <span><?php single_cat_title(); ?><?php _e(" Category", "mythemeshop"); ?></span>
    </h1>
<?php
// work out category id, then see if there are any subcategories
$main_cat_ID = get_query_var( 'cat' );
// if it is page 1
if ( $paged < 2 ) :
    // show the category description
   echo category_description();
   //  $args = array( 'category__in' => $main_cat_ID, 'include' => get_option( 'sticky_posts' ) );

   $args = array('post__in' => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1, 'order' => 'ASC' ,
   	'category__in' => $main_cat_ID);

   query_posts( $args );

   if (have_posts()) :
?>
   		<h2>Featured Posts</h2>
<?php
			// The Loop
			while ( have_posts() ) : the_post();
    		set_query_var( 'mts_options', $mts_options );
      	get_template_part( 'articlesummary');
			endwhile;
		endif;

// pages 2 and onwards don't worry about cat desc or stickies, but link to main cat page
else : ?>
        <p>For an introduction to this topic and our latest articles, please see the main
        <a href="<?php echo get_category_link( $main_cat_ID ); ?>"><?php single_cat_title(); ?></a> page.</p>
<?php
endif;
// IMPORTANT
wp_reset_query();
$j = 0; if (have_posts()) : ?>
				<h2>Recent Posts</h2>
			<?php while (have_posts()) : the_post();
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

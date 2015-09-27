<?php
function removecategorydescrption($columns)
{
 // only edit the columns on the current taxonomy
 if ( !isset($_GET['taxonomy']) || $_GET['taxonomy'] != 'category' )
 return $columns;

 // unset the description columns
 if ( $posts = $columns['description'] ){ unset($columns['description']); }

 return $columns;
}
add_filter('manage_edit-category_columns','removecategorydescrption');

// don't show stickies or posts from child categories on category pages
function bradythink_category_posts( $query = false ) {

    // Bail if not home, not a query, not main query, or if it's the admin area or a feed
    if ( ! $query->is_category || ! is_a( $query, 'WP_Query' ) || ! $query->is_main_query() || $query->is_admin || $query->is_feed )
        return;

    // only get posts not in sticky posts
    $query->set( 'post__not_in', get_option( 'sticky_posts' ) );

    // only get posts in this category (not in child categories)
    $query->set( 'category__in', get_category_by_slug( get_query_var( 'category_name' ) )->cat_ID );

}
add_action( 'pre_get_posts', 'bradythink_category_posts' );

?>

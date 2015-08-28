 <article class="latestPost excerpt  <?php echo (++$j % 3 == 0) ? 'last' : ''; if ($selected_layout == 'grid') echo ' grid'; ?>">
         <header>
          <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
            <?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>
            <?php if(get_post_meta($post->ID, 'mts_overall_score', true)): ?>
              <span class="rating"><img src="<?php bloginfo('template_directory'); ?>/images/stars/<?php echo get_post_meta($post->ID, 'mts_overall_score', true); ?>.png"/></span>
            <?php elseif (function_exists('wp_review_show_total')) :
            wp_review_show_total(true, 'rating');
            endif; ?>
          </a>
          <h3 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          <?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
          <div class="post-info">
            <span class="theauthor"><i class="fa fa-user"></i> <?php  the_author_posts_link(); ?></span>
            <span class="thetime"><i class="fa fa-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></span>
            <span class="thecategory"><i class="fa fa-tags"></i> <?php the_category(', ') ?></span>
          </div>
          <?php } ?>
        </header>
        <div class="front-view-content">
          <?php echo mts_excerpt(48);?>
        </div>
      </article><!--.post excerpt-->

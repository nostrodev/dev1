<?php get_header(); ?>

<section class="two-column row no-max pad">
  <div class="small-12 columns">
    <div class="row">
      <!-- Primary Column -->
      <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
        <div class="primary">

            <div class="leader">
            <h1><?php wp_title(); ?> Blog Posts</h1>
            </div>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article class="post">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h1>

                <h2><?php echo strip_tags( get_the_excerpt() ); ?></h2>
                <ul class="post-meta no-bullet">
                  <li class="author">
                    <a href="author.html">
                      <span class="wpt-avatar small">
                        <?php echo get_avatar( get_the_author_meta ('ID'), 24 ); ?>
                      </span>
                      by <?php the_author_posts_link(); ?>
                    </a>
                  </li>
                  <li class="cat">in <?php the_category( ', '); ?></li>
                  <li class="date">on <?php the_time( 'F j, Y' ); ?></li>
                </ul>
                <div class="img-container">
                  
                  <?php
                  $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

                  if ( ! $feat_image == "") { ?>
                  <img src="<?php echo $feat_image; ?>" alt="">
                  <?php } ?>

                  <p>Photo by <?php the_author_posts_link(); ?></p>
                </div>
            </article>    

            <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?> 

        </div>
      </div>  

      <?php get_sidebar(); ?>  
      
      	

      	
    
    

    </div>
  </div>
</section>



<?php get_footer();  ?>
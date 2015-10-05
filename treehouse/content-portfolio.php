<?php 

$num_posts = -1;
if ( is_front_page ()) $num_posts = 4;

//$num_posts = ( is_front_page() ) ? 4 : -1;


$args = array(
  'post_type' => 'portfolio',
  'posts_per_page' => $num_posts
);
$query = new WP_query( $args );
?>

<section class="row no-max pad">
  <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
  <div class="small-6 medium-4 large-3 columns grid-item">
    <a href="<?php the_permalink(); ?>">

      <img src="<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
      echo $feat_image; ?>" alt="">

    </a>
  </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>

</section>  
<?php

/**
 * Custom header setup.
 *
 * @package understrap
 */

$args = array( 'numberposts' => '5' );
$recent_posts = wp_get_recent_posts($args);
// print_r($recent_posts);
wp_reset_query();

?>

<div id="featured-slider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#featured-slider" data-slide-to="0" class="active"></li>
    <li data-target="#featured-slider" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
<?php
  $count = 0;
  foreach($recent_posts as $recent) {
    ?>
    <div class="carousel-item <?php if($count == 0) { echo "active"; } ?>">
      <img class="d-block img-fluid" src="<?php echo get_the_post_thumbnail_url($recent["ID"]); ?>">
      <div class="carousel-caption d-none d-md-block">
        <h3><?php echo $recent["post_title"]; ?></h3>
        <a href="<?php echo get_permalink($recent["ID"]); ?>" class="btn btn-primary">Läs mer</a>
      </div>
    </div>
    <?php
    $count++;
  }

?>

  </div>
  <a class="carousel-control-prev" href="#featured-slider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#featured-slider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

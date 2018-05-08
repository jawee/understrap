<?php

/**
 * Custom header setup.
 *
 * @package understrap
 */

$recent_posts = wp_get_recent_posts();

// print_r($recent_posts);

// print_r(get_the_post_thumbnail($recent_posts[0]["ID"]));

// wp_get_attachment_image_src()
// foreach( $recent_posts as $recent ){
//   echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
// }
wp_reset_query();

?>

<div id="featured-slider" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
<?php
  $count = 0;
  foreach($recent_posts as $recent) {
    ?>
    <div class="carousel-item <?php if($count == 0) { echo "active"; } ?>">
      <img class="d-block img-fluid" src="<?php echo get_the_post_thumbnail_url($recent["ID"]); ?>">
      <div class="content-headline">
        <h3><?php echo $recent["post_title"]; ?></h3>
        <a href="#" class="btn btn-primary">Läs mer</a>
      </div>
    </div>
    <?php
    $count++;
  }

?>

  </div>
  <!--
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="..." alt="Third slide">
    </div>
  </div> -->
</div>
<script>
  jQuery('#featured-slider').carousel({
    interval: 15000
  });
</script>

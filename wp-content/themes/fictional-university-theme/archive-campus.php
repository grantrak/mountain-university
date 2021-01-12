<?php get_header(); 
pageBanner(array(
  'title' => 'Campus Locations',
  'subtitle' => 'We have several conviently located campuses.'
));
?>



  <div class="container container--narrow page-section">
      <div class="acf-map">
      <?php 
        while (have_posts()) {
            the_post(); 
            $maplocation = get_field('map_location');
            ?>
            
            <div class="marker" data-lat="<?php echo $maplocation['lat']; ?>" data-lng="<?php echo $maplocation['lng']; ?>">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php echo $maplocation['address']; ?>
          </div>

        <?php } ?>
      
      </div>
  </div>

<?php get_footer(); ?>
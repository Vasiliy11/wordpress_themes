<?php
get_header();
?>

  <section class="about-us">
    <div class="about-us__content">
      <h1 class="about-us__heading"><?php the_field('about_title'); ?></h1>
      <div class="underline">
        <div class="small-underline"></div>
        <div class="big-underline"></div>
      </div>
      <h3 class="sub-heading"><?php the_field('second_about_title'); ?></h3>
      <p class="about-us__paragraph"><?php the_field('about_info'); ?></p>
      <button class="about-us__btn">
        Read More
        <i class="fas fa-angle-double-right btn-arrow"></i>
      </button>
    </div>
    <div class="about-us__images">
      <img src="<?php the_field('image1'); ?>" class="image image-1" alt="">
      <img src="<?php the_field('image2'); ?>" class="image image-2" alt="">
      <img src="<?php the_field('image3'); ?>" class="image image-3" alt="">
      <img src="<?php the_field('image4'); ?>" class="image image-4" alt="">
    </div>
  </section>

  <section class="rooms">
    <div class="common-header">
      <h1 class="common-heading">Rooms in Grand Hotel</h1>
      <div class="underline">
        <div class="small-underline"></div>
        <div class="big-underline"></div>
      </div>
    </div>

    
    <div class="rooms-cards__wrapper">
    <?php 
    $posts = get_posts( array(
      'post_type' => 'rooms'
    ));
    ?>
      <?php foreach ($posts as $post){
        setup_postdata($post);
        ?>
      <div class="room-card">
        <img src="<?php the_field('room_img'); ?>" class="room-img" alt="">
        <div class="room-card__content">
          <h4 class="room-card__heading"><?php the_field('room_type'); ?></h4>
          <p class="room-card__paragraph"><?php the_field('short_descr'); ?></p>
          <p class="room-price">$<?php the_field('price'); ?></p>
          <button class="room-card__btn">
            Book Now
            <i class="fas fa-angle-double-right btn-arrow"></i>
          </button>
        </div>
      </div>
      <?php 
      } 
        wp_reset_postdata();
      ?>
    </div>
    <div class="rooms-btn__wrapper">
      <button class="rooms-btn">Check All Rooms</button>
    </div>
  </section>

  <section class="customers">
    <div class="common-header">
      <h1 class="common-heading"><?php the_field('customers_title'); ?></h1>
      <div class="underline">
        <div class="small-underline"></div>
        <div class="big-underline"></div>
      </div>
    </div>
    <p class="customers-paragraph"><?php the_field('customers_descr'); ?></p>

    
    <div class="customers-card__wrapper" style="flex-wrap: wrap;">
    <?php 
    $posts = get_posts( array(
      'post_type' => 'reviews'
    ));
    ?>
      <?php foreach ($posts as $post){
        setup_postdata($post);
        ?>
      <div class="customer-card" style="margin: 20px 0px">
        <div class="customer-image__wrapper">
          <img src="<?php the_field('photo'); ?>" class="customer-image" alt="">
        </div>
        <div class="customer-info">
          <h3 class="customer-fullname"><?php the_field('name'); ?></h3>
          <p class="customer-paragraph-1"><?php the_field('name_descr'); ?></p>
          <p class="customer-paragraph-2"><?php the_field('feedback'); ?></p>
        </div>
      </div>
      <?php 
      } 
        wp_reset_postdata();
      ?>
    </div>
  </section>

<?php
get_footer();

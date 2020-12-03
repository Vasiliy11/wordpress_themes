
<footer class="footer">
    <div class="main-part">
      <div class="footer-list__wrapper">
        <h3 class="footer-heading">Grand Hotel</h3>
        <ul class="footer-list">
          <li class="footer-list__item">
            <a href="#" class="footer-list__link"><?php the_field('email'); ?></a>
          </li>
          <li class="footer-list__item">
            <a href="#" class="footer-list__link"><?php the_field('address'); ?></a>
          </li>
          <li class="footer-list__item">
            <a href="#" class="footer-list__link"><?php the_field('phone_number'); ?></a>
          </li>
        </ul>
      </div>

      <div class="footer-list__wrapper">
        <h3 class="footer-heading">Grand Hotel</h3>
        <?php wp_nav_menu([
        'theme_location' => 'footer_menu',
        'menu'          => 'Footer_main',
        'container'     => false,
        'menu_class'    => 'footer-list',
        'items_wrap'    => '<ul class="footer-list">%3$s</ul>',
        'depth'         => 1
      ]); ?>
      </div>
      <div class="content">
        <h3 class="footer-heading">Contact</h3>
        <p>Sign Up for News</p>
        <div class="footer-form">
          <?php echo do_shortcode('[contact-form-7 id="157" title="Контактна форма"]') ?>
        </div>
      </div>

      <div class="gallery">
        <h3 class="footer-heading">Gallery</h3>
        <div class="gallery-images">
        <?php 
    $posts = get_posts( array(
      'category_name' => 'footer_gallery',
      'numberposts'   => '6'
    ));
    ?>
      <?php foreach ($posts as $post){
        setup_postdata($post);
        ?>
          <div class="image-wrapper">
            <img src="<?php the_post_thumbnail_url(); ?>" class="footer-image" alt="">
          </div>
          <?php 
      } 
        wp_reset_postdata();
      ?>
        </div>
      </div>
    </div>
    <div class="creator-part">
      <div class="copyright-text">
        <p><?php the_field('left_copy'); ?></p>
      </div>
      <div class="text-right">
        <p><?php the_field('right_copy'); ?></p>
      </div>
    </div>
  </footer>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/libs.min.js"></script>
  <script src="js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>

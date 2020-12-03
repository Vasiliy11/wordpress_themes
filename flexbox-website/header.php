
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/assets/img/crown.png"> -->
  <?php wp_site_icon(); ?>
  <title><?php bloginfo('name'); echo " | "; bloginfo('description'); ?></title>
  
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="navbar">
    <input type="checkbox" class="checkbox" id="click" hidden>
    <div class="sidebar">
      <label for="click">
        <div class="menu-icon">
          <div class="line line-1"></div>
          <div class="line line-2"></div>
          <div class="line line-3"></div>
        </div>
      </label>

      <ul class="social-icons-list">
        <li>
          <a href="<?php the_field('facebook'); ?>" class="social-link"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="<?php the_field('twitter'); ?>" class="social-link"><i class="fab fa-twitter"></i></a>
        </li>
        <li>
          <a href="<?php the_field('google_plus'); ?>" class="social-link"><i class="fab fa-google-plus-g"></i></a>
        </li>
        <li>
          <a href="<?php the_field('instagram'); ?>" class="social-link"><i class="fab fa-instagram"></i></a>
        </li>
      </ul>

      <div class="year">
        <p><?php the_field('year'); ?></p>
      </div>
    </div>
    <nav class="navigation">
      <div class="navigation-header">
        <h1 class="navigation-heading">Grand Hotel</h1>
        <form class="navigation-search">
          <input type="text" class="navigation-search__input" placeholder="Search...">
          <button class="navigation-search__btn">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>

      <?php wp_nav_menu([
        'theme_location' => 'header_menu',
        'menu'          => 'Main',
        'container'     => false,
        'menu_class'    => 'navigation-list',
        'items_wrap'    => '<ul class="navigation-list">%3$s</ul>',
        'depth'         => 1
      ]); ?>
      <!-- <ul class="navigation-list">
        <li class="navigation-item">
          <a href="" class="navigation-link">Home</a>
        </li>
        <li class="navigation-item">
          <a href="" class="navigation-link">About us</a>
        </li>
        <li class="navigation-item">
          <a href="" class="navigation-link">Rooms</a>
        </li>
        <li class="navigation-item">
          <a href="" class="navigation-link">Events</a>
        </li>
        <li class="navigation-item">
          <a href="" class="navigation-link">Customers</a>
        </li>
        <li class="navigation-item">
          <a href="" class="navigation-link">Contacts</a>
        </li>
      </ul> -->
      <div class="copyright">
        <p>&copy; 2020. Grand Hotel. All Rights Reserved</p>
      </div>
    </nav>
  </div>

  <header class="header" style="background: linear-gradient(to top, rgba(0, 0, 0, .6), rgba(0, 0, 0, .5)), url(<?php get_background_image(); ?>) center no-repeat;">
    <div class="brand">
      <a href="<?php echo get_home_url(); ?>">
        <img src="<?php
          $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full');
          echo $custom_logo__url[0]; 
        ?>" width="80">
      </a>
      <h3 class="hotel-heading">Grand Hotel</h3>
    </div>
    <div class="banner">
      <h1 class="banner-heading"><?php the_field('header_title'); ?></h1>
      <p class="banner-paragraph"><?php the_field('second_header_title'); ?></p>
      <button class="banner-button">Check Out</button>
    </div>
  </header>


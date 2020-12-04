<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_site_icon();?>
    <title><?php bloginfo('name');
echo " | ";
bloginfo('description');?></title>
	<?php wp_head();?>
</head>

<body>
	<header class="header">
      <div class="header__top">
        <div class="container">
          <div class="header__contacts">
            <a class="header__info header__phone" href="tel:123456789"
              ><?php the_field('phone_number');?></a>
            <a
              class="header__info header__mail"
              href="mailto:layout585@gmail.com"
              ><?php the_field('email');?></a>
              <a data-fancybox data-src="#modal" href="javascript:;"class="header__btn">Бесплатная консультация</a>
          </div>
        </div>
      </div>
      <div class="header__bottom">
        <div class="container">
          <div class="header__bottom_wrapper">
            <div class="header__logo">
              <a href="#">
			  <?php
the_custom_logo();
?>
                <!-- <img src="images/logo.png" alt="" /> -->
              </a>
            </div>
            <nav class="header__menu">
              <div class="header__btn-menu">
                <span class="icon-bars"></span>
			  </div>
			  <?php
wp_nav_menu(
    array(
        'theme_location' => 'Header',
        'menu_class' => 'menu-list',
        'container' => false,
    )
);
?>
            </nav>
          </div>
        </div>
      </div>
    </header>
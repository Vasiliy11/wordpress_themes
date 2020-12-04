<footer class="footer">
      <div class="container">
        <div class="footer__top">
          <div class="footer__info">
            <h3 class="footer__title">
				<?php the_field('footer_title');?>
            </h3>
            <p class="footer__text">
				<?php the_field('footer_descr');?>
            </p>
            <a data-fancybox data-src="#modal" href="javascript:;"class="header__btn footer__btn">Бесплатная консультация</a>
            <ul class="footer__list">
              <li><a class="footer__phone" href="tel:+380961234567"><?php the_field('phone_number');?></a></li>
              <li><a class="footer__mail" href="mailto:layout585@gmail.com"><?php the_field('email');?></a></li>
              <li><a class="footer__address" href="#"><?php the_field('address');?></a></li>
            </ul>
          </div>
          <div class="footer__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1278.661059315685!2d30.435046911921457!3d50.4797655138353!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1606746448330!5m2!1sru!2sua"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
      <div class="footer__bottom">
        © 2020 Template by VM. Все права защищены.
      </div>
    </footer>
<?php wp_footer();?>
  </body>
</html>

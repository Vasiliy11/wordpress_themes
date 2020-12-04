<?php
get_header();
?>

<div id="modal">
    <form>
        <input type="text" placeholder="Ваше имя">
        <input type="tel" placeholder="Ваш телефон">
        <input type="submit" value="Отправить">
    </form>
</div>


<section class="slider"
    style="background: url('<?php echo get_template_directory_uri() ?>/assets/images/slider-fon.jpg') center no-repeat;">
    <div class="container">
        <div class="slider__wrapper">
            <?php
$posts = get_posts(array(
    'post_type' => 'slides',
));
foreach ($posts as $post) {
    setup_postdata($post);
    ?>
            <div class="slider__item">
                <div class="slider__item-content">
                    <h2 class="slider__title">
                        <?php the_field('slide_title');?>
                    </h2>
                    <p class="slider__text">
                        <?php the_field('slide_descr');?>
                    </p>
                    <a data-fancybox data-src='#modal' class="slider__button default-btn" href="javascript:;"
                        href="#">Оставить заявку</a>
                </div>
            </div>

            <?php
}
wp_reset_postdata();
?>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="services__top">
            <div class="services__title-box">
                <h3 class="services__title">
                    <?php the_field('services_title');?>
                </h3>
                <p class="services__text">
                    <?php the_field('services_descr');?>
                </p>
            </div>
            <a href="#" class="services__btn">
                Показать все услуги
            </a>
        </div>
        <div class="services__items">
        <?php
$posts = get_posts(array(
    'category_name' => 'services',
));
foreach ($posts as $post) {
    setup_postdata($post);
    ?>
            <div class="services__item">
                <img src="<?php the_field('service_img');?>" alt="">
                <h4 class="services__item-title"><?php the_field('service_title');?></h4>
                <p class="services__item-text"><?php the_field('service_descr');?></p>
                <div class="services__item-links">
                    <a class="services__item-link" href="#">Подробнее</a>
                    <a data-fancybox data-src='#modal' class="services__item-button default-btn"
                        href="javascript:;">Заказать</a>
                </div>
            </div>
            <?php
}
wp_reset_postdata();
?>
        </div>
    </div>
</section>


<section class="about" style="background: url(<?php the_field('about_bg');?>) center no-repeat;">
    <div class="container">
        <div class="about__wrapper">
            <h3 class="about__title">
                <?php the_field('about_title');?>
            </h3>
            <p class="about__text">
                <?php the_field('about_descr');?>
            </p>
            <a class="about__button default-btn" href="#">Узнать больше</a>
        </div>

    </div>
</section>

<section class="consultation">
    <div class="container">
        <div class="consultation__wrapper">
            <div class="consultation__title-box">
                <h3 class="consultation__title">
                <?php the_field('cons_title');?>
                </h3>
                <p class="consultation__text">
                <?php the_field('cons_text');?>
                </p>
            </div>
            <form class="consultation__form">
                <div class="form__column-left">
                    <label>
                        Email
                        <input type="email">
                    </label>
                    <label>
                        Контактный телефон
                        <input type="tel">
                    </label>
                    <label>
                        ФИО
                        <input type="text">
                    </label>
                    <label>
                        Тема вопроса
                        <select name="" id="">
                            <?php
$posts = get_posts(array(
    'category_name' => 'options',
));
foreach ($posts as $post) {
    setup_postdata($post);
    ?>
                            <option value=""><?php the_field('option');?></option>
                            <?php
}
wp_reset_postdata();
?>
                        </select>
                    </label>
                </div>
                <div class="form__column-right">
                    <label for="">
                        Сообщение
                        <textarea></textarea>
                    </label>
                    <button type="submit" class="consultation__button default-btn">Получить консультацию</button>
                </div>
            </form>
            <img src="images/form-fon.png" alt="">
        </div>
    </div>
</section>


<section class="advantages" style="background: url(<?php the_field('adv_bg');?>) center no-repeat;">
    <div class="container">
        <div class="advantages__wrapper">
            <?php
$posts = get_posts(array(
    'category_name' => 'advantages',
));
foreach ($posts as $post) {
    setup_postdata($post);
    ?>
            <div class="advantages__item">
                <h3 class="advantages__title">
                    <?php the_field('adv_title');?>
                </h3>
                <p class="advantages__text">
                    <?php the_field('adv_text');?>
                </p>
            </div>
            <?php
}
wp_reset_postdata();
?>
        </div>
    </div>
</section>

<section class="news">
    <div class="container">
        <div class="news__top">
            <div class="news__title-box">
                <h3 class="news__title">
                    <?php the_field('news_title');?>
                </h3>
                <p class="news__text">
                    <?php the_field('news_descr');?>
                </p>
            </div>
            <a href="#" class="news__btn">
                Открыть все новости
            </a>
        </div>
        <div class="news__bottom">
            <div class="news__slider">
            <?php
$posts = get_posts(array(
    'category_name' => 'news-slider',
));
foreach ($posts as $post) {
    setup_postdata($post);
    ?>

                <div class="news__slider-item">
                    <h3 class="news__title">
                        <?php the_field('slide_name');?>
                    </h3>
                    <p class="news__text">
                    <?php the_field('slide_text');?>
                    </p>
                    <p class="news__author"><?php the_field('author');?></p>
                </div>
                <?php
}
wp_reset_postdata();
?>
            </div>
            <?php
$posts = get_posts(array(
    'category_name' => 'news',
));
foreach ($posts as $post) {
    setup_postdata($post);
    ?>

            <a href="#" class="news__blog">
                <div class="news__images">
                    <img src="<?php the_field('news_img');?>" alt="">
                    <div class="news__date"><?php the_field('news_date');?></div>
                </div>
                <h3 class="news__title">
                <?php the_field('news_name');?>
                </h3>
                <p class="news__text">
                <?php the_field('news_text');?>
                </p>
            </a>
            <?php
}
wp_reset_postdata();
?>

        </div>
</section>
<?php
get_footer();
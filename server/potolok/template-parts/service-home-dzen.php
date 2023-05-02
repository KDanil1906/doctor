<?php
$title = carbon_get_theme_option('main-dzen-title');
$undertitle = carbon_get_theme_option('main-dzen-undertitle');
$link = carbon_get_theme_option('main-dzen-link');
$dzen_photo = carbon_get_theme_option('main-dzen-photo');
?>

<section class="dzen">
    <div class="container">
        <div class="dzen__inner">
            <div class="dzen__info">
                <div class="dzen__title">
                    <?php echo $title; ?>
                </div>
                <div class="dzen__desc">
                    <?php echo $undertitle; ?>
                </div>
                <div class="dzen__link">
                    <a href="<?php echo $link;?>" class="btn--no-form" target="_blank">Читать матриалы в Дзене</a>
                </div>
            </div>
            <div class="dzen__image">
                <img src="<?php echo carbonImageData($dzen_photo)['url'];?>" alt="<?php echo carbonImageData($dzen_photo)['url'];?>">
            </div>
        </div>
    </div>
</section>

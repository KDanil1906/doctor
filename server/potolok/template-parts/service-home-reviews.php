<?php
$title  = carbon_get_theme_option('main-reviews-title');
$undertitle  = carbon_get_theme_option('main-reviews-undertitle');
$reviews  = carbon_get_theme_option('main-reviews-reviews');
?>

<section class="voices">
    <div class="container">
        <div class="voices__inner">
            <div class="title--middle voices__title">
                <?php echo $title; ?>
            </div>
            <div class="under-middle-title__desc">
                <?php echo $undertitle; ?>
            </div>
            <div class="voices__wrap">
                <div class="voices__marks-wrap">
                    <?php $reviews_companies = carbon_get_theme_option( 'settings-reviews-companies' ) ?>
                    <?php foreach ( $reviews_companies as $company ): ?>
                        <a href="<?php echo $company['settings-reviews-companies-link']; ?>" class="voices__marks-item">
                            <div class="marks-item__title">
                                <?php echo $company['settings-reviews-companies-name']; ?>
                            </div>
                            <div class="marks-item__body">
                                <div class="marks-item__body-mark">
                                    <?php echo $company['settings-reviews-companies-mark']; ?> <span>/ 5.0</span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="voices__reviews">
                    <?php $default_image = get_stylesheet_directory_uri() . '/assets/images/webp_image/user.webp';
                    foreach ( $reviews as $review ):
                        $review_image = $review['main-reviews-review-photo'];
                        if ( $review_image ) {
                            $review_image = carbonImageData( $review_image )['url'];
                        }
                        ?>

                        <div class="voices__reviews-item">
                            <div class="voices__reviews-iteminner">
                                <div class="reviews-item__date">
                                    <?php echo $review['main-reviews-review-date'] ?>
                                </div>
                                <div class="reviews-item__person">
                                    <div class="item__person-photo"
                                         style="background-image: url(<?php echo $review_image ?: $default_image; ?>)">
                                    </div>
                                    <div class="item__person-name">
                                        <?php echo $review['main-reviews-review-name'] ?>
                                        <span>Взято с <?php echo selectReviewsOptionals()[ $review['main-reviews-review-company'] ] ?></span>
                                    </div>
                                </div>
                                <div class="reviews-item__review">
                                    <?php echo $review['main-reviews-review-desc'] ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

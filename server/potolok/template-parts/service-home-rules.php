<?php
$title = carbon_get_theme_option('main-rules-title');
$rules = carbon_get_theme_option('main-rules-rules');
$more = carbon_get_theme_option('main-rules-more');
?>

<section class="benefits">
    <div class="container">
        <div class="benefits__inner">
            <h2 class="title--middle benefits__title">
                <?= $title; ?>
            </h2>
            <div class="carts__items-wrapper">
                <?php
                $rule_counter = 1;
                foreach ( $rules as $rule ): ?>
                    <div class="carts__item">
                        <div class="carts__item-text">
                            <div class="carts__item-number">
                                Правило № <?php echo $rule_counter; ?>
                            </div>
                            <div class="carts__item-title">
                                <?php echo $rule['main-rules-rule-title']; ?>
                            </div>
                            <div class="carts__item-desc">
                                <?php echo apply_filters( 'the_content', $rule['main-rules-rule-desc'] ); ?>
                            </div>
                        </div>
                    </div>
                    <?php $rule_counter ++; ?>
                <?php endforeach; ?>
            </div>
            <div class="carts__items-more">
                <?php echo apply_filters( 'the_content', $more ); ?>
            </div>
        </div>
    </div>
</section>

<?php
$title           = carbon_get_theme_option( 'main-rules-title' );
$rules           = carbon_get_theme_option( 'main-rules-rules' );

$rule_title_slug = 'main-rules-rule-title';
$rule_desc_slug  = 'main-rules-rule-desc';


$more = carbon_get_theme_option( 'main-rules-more' );

?>

<section class="benefits">
	<div class="container">
		<div class="benefits__inner">
			<h2 class="title--small benefits__title">
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
								<?php echo $rule[ $rule_title_slug ]; ?>
							</div>
							<div class="carts__item-desc">
								<?php echo apply_filters( 'the_content', $rule[ $rule_desc_slug ] ); ?>
							</div>
						</div>
					</div>
					<?php $rule_counter ++; ?>
				<?php endforeach; ?>
                <div class="carts__items-more">
                    <div class="carts__item-number">
                        Заключение
                    </div>
					<?php echo apply_filters( 'the_content', $more ); ?>
                </div>
			</div>

		</div>
	</div>
</section>

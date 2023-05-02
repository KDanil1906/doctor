<section class="feedback">
	<div class="container">
		<div class="feedback__inner">
			<div class="feedback__form">
				<h2 class="feedback__title">
                    <?php echo __('БЕСПЛАТНАЯ КОНСУЛЬТАЦИЯ', 'potolok')?>
				</h2>
				<div class="under-middle-title__desc feedback__desc">
					<?php echo __('Оставьте заявку и мы подробно <span>проконсультируем Вас о наших услугах</span>', 'potolok')?>
				</div>
				<?php echo do_shortcode( '[wpforms id="54"]' ) ?>
			</div>
			<div class="feedback__man">
				<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/images/webp_image/man.webp" alt="Мастер по ремонту потолков">
			</div>
		</div>
	</div>
</section>
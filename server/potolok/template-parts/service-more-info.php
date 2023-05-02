<?php $data = $args['data'] ?>

<section class="more-info">
	<div class="container">
		<div class="more-info__inner">
			<div class="more-info__text">
				<h2 class="more-info__text-title">
					<?php echo $data['more-info-title'];?>
				</h2>
				<div class="more-info__text-desc">
					<?php echo $data['more-info-desc'];?>
				</div>
				<div class="more-info__text-btn">
					<a href="<?php echo $data['more-info-link'];?>" class="btn more-info__btn"><?php echo __('Подробнее', 'potolok')?></a>
				</div>
			</div>
			<div class="more-info__image">
                <?php $image = $data['more-info-image'];?>
				<img src="<?php echo carbonImageData($image)['url']?>" alt="<?php echo carbonImageData($image)['url']?>">
			</div>
		</div>
	</div>
</section>
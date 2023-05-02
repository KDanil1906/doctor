
<section class="benefits">
    <div class="container">
        <div class="single__text-header">
            <h2 class="sinlge__title">
				<?php echo carbon_get_theme_option('how-work-title'); ?>
            </h2>
        </div>
        <div class="benefits__inner">
            <div class="benefits__items">

				<?php $counter = 1;
                $items = carbon_get_theme_option('how-work-items');
				foreach ($items as $item ):
					$image = $item['how-work-items-icon'];
					?>

                    <div class="benefits__item">
                        <div class="benefits__item-icon">
                            <img src="<?php echo carbonImageData( $image )['url'] ?>"
                                 alt="<?php echo carbonImageData( $image )['alt'] ?>">
							<?php if ($counter < count($items)): ?>
                                <div class="benefits__item-iconarrow">
                                    <span></span>
                                    <span></span>
                                </div>
							<?php endif; ?>
                        </div>
                        <div class="benefits__item-text">
                            <div class="benefits__item-title">
								<?php echo $item['how-work-items-title']; ?>
                            </div>
                            <div class="benefits__item-desc">
								<?php echo $item['how-work-items-desc']; ?>
                            </div>
                        </div>
                    </div>

					<?php
					$counter ++;
				endforeach; ?>
                <!--				<div class="benefits__item">-->
                <!--					<div class="benefits__item-icon benefits__item-icon--ambulance">-->
                <!--						<svg>-->
                <!--							<use xlink:href="./images/svg_sprite/sprite.svg#ambulance"></use>-->
                <!--						</svg>-->
                <!--						<div class="benefits__item-iconarrow">-->
                <!--							<span></span>-->
                <!--							<span></span>-->
                <!--						</div>-->
                <!--					</div>-->
                <!--					<div class="benefits__item-text">-->
                <!--						<div class="benefits__item-title">-->
                <!--							ВЫЕЗД В ТЕЧЕНИЕ 15 МИНУТ-->
                <!--						</div>-->
                <!--						<div class="benefits__item-desc">-->
                <!--							Оперативный выезд, профессиональное решение проблемы. Мы спасаем 97% натяжных потолков.-->
                <!--						</div>-->
                <!--					</div>-->
                <!--				</div>-->
                <!--				<div class="benefits__item">-->
                <!--					<div class="benefits__item-icon">-->
                <!--						<img src="./images/svg_sprite/sprite.svg#warranty" alt="">-->
                <!--					</div>-->
                <!--					<div class="benefits__item-text">-->
                <!--						<div class="benefits__item-title">-->
                <!--							ДОКУМЕНТЫ И ГАРАНТИЯ-->
                <!--						</div>-->
                <!--						<div class="benefits__item-desc">-->
                <!--							Составление акта выполненных работ для виновника «торжества», для страховой или для суда.-->
                <!--							Предоставляем гарантию 3 года.-->
                <!--						</div>-->
                <!--					</div>-->
                <!--				</div>-->
            </div>
        </div>
    </div>
</section>
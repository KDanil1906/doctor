<?php $data = $args['data'] ?>

<!--<section class="more-info">-->
<!--    <div class="container">-->
<!--        <div class="more-info__inner">-->
<!--            <div class="more-info__text">-->
<!--                <h2 class="more-info__text-title">-->
<!--					--><?php //echo $data['more-info-title']; ?>
<!--					--><?php //$video = $data['more-info-video'];
//					if ( $video ):
//						$video = getVideoInfo( $video[0] );
//						?>
<!--                        <a data-fancybox href="#myVideo" class="more-info__video">-->
<!--                        </a>-->
<!--					--><?php //endif; ?>
<!--                </h2>-->
<!--				--><?php //if ( $video ): ?>
<!--                    <video controls id="myVideo" style="display:none;">-->
<!--                        <source src="--><?php //= $video['url']; ?><!--" type="--><?php //= $video['type']; ?><!--">-->
<!--                    </video>-->
<!--				--><?php //endif; ?>
<!--                <div class="more-info__text-desc">-->
<!--					--><?php //echo $data['more-info-desc']; ?>
<!--                </div>-->
<!--                <div class="more-info__text-btn">-->
<!--                    <a href="--><?php //echo $data['more-info-link']; ?><!--"-->
<!--                       class="btn more-info__btn">--><?php //echo __( 'Подробнее', 'potolok' ) ?><!--</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="more-info__image">-->
<!--				--><?php //$image = $data['more-info-image']; ?>
<!--                <img src="--><?php //echo carbonImageData( $image )['url'] ?><!--"-->
<!--                     alt="--><?php //echo carbonImageData( $image )['url'] ?><!--">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="more-video">
    <div class="container">
        <h2 class="more-video__text-title title--small">
	        <?php echo $data['more-info-title']; ?>
        </h2>
        <div class="more-video__inner">
            <div class="more-video__video-wrap">
                <div class="more-video__video">
                    <?php
                    $video = getVideoInfo( $data['more-info-video'][0] );
                    $preload = carbonImageData($data['more-info-video-preload']);
                    ?>
                    <video
                            class="video-js"
                            preload="auto"
                            poster="<?= $preload['url'];?>"
                            controls
                            data-setup="{}"
                    >
                        <source src="<?= $video['url'] ?>" poster="<?= $preload['url']?>" type="<?= $video['type']; ?>">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="more-video__text">
                <div class="more-video__image">
	                <?php $image = $data['more-info-image']; ?>
                    <a href="<?php echo carbonImageData( $image )['url'] ?>" class="works-items__item-img fancybox">
                        <img src="<?php echo carbonImageData( $image )['url'] ?>" alt="<?php echo carbonImageData( $image )['alt'] ?>">
                    </a>
                    <div class="more-video__image-title">
	                    <?php echo apply_filters( 'the_content', $data['more-info-image-text']);?>
                    </div>
                </div>
                <div class="more-video__text-wrap">
                    <div class="more-video__text-desc">
	                    <?php echo $data['more-info-desc']; ?>
                    </div>
                    <div class="more-video__text-btn">
                        <a href="<?php echo $data['more-info-link']; ?>"
                           class="btn more-info__btn"><?php echo __( 'Подробнее', 'potolok' ) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $turbo = $args['turbo'] ?? false; ?>

<section class="posts">
	<div class="container">
		<div class="posts__inner">
			<div class="posts-items">
				<?php
				if ( ! $turbo ) {
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				} else {
					$paged = 1;
				}

				$args = array(
					'post_type'      => 'post',
					'category__in'   => array( 18 ),
					'posts_per_page' => 10,
					'paged'          => $paged
				);
				$loop = new WP_Query( $args );
				?>


				<?php foreach ( $loop->posts as $post ): ?>
					<a href="<?php echo get_permalink( $post->ID ) ?>" class="posts__item">
						<img src="<?php echo carbonImageData( get_post_thumbnail_id( $post->ID ) )['url'] ?>"
						     alt="<?php echo carbonImageData( get_post_thumbnail_id( $post->ID ) )['alt'] ?>"
						     class="posts__item-img">
						<div class="posts__item-text">
							<div class="posts__item-text-title">
								<?php echo $post->post_title; ?>
							</div>
							<div class="posts__item-text-desc">
								<?php echo the_excerpt(); ?>
							</div>
						</div>
					</a>
				<?php
				endforeach;
				wp_reset_postdata();

				?>
			</div>

			<?= get_template_part( 'template-parts/pagination', '', array( 'query' => $loop ) ); ?>

		</div>
	</div>
</section>
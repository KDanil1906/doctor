<?php
/*
Template Name: Полезное
Template Post Type: page
*/

?>

<?php get_header(); ?>


<section class="posts">
    <div class="container">
        <div class="posts__inner">
            <div class="posts-items">
				<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

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
					wp_reset_postdata();
                endforeach; ?>

            </div>
			<?php
			$pagination = paginate_links( array(
				'base'               => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'             => '?paged=%#%',
				'current'            => max( 1, get_query_var( 'paged' ) ),
				'total'              => $loop->max_num_pages,
				'prev_text'          => '<',
				'next_text'          => '>',
				'type'               => 'array',
				'before_page_number' => '<span class="page-link">',
				'after_page_number'  => '</span>',
			) );

			if ( ! empty( $pagination ) ) {
				echo '<nav class="woocommerce-pagination">';
				echo '<ul class="page-numbers">';
				foreach ( $pagination as $page_link ) {
					echo '<li>' . $page_link . '</li>';
				}
				echo '</ul>';
				echo '</nav>';
			}

			?>
        </div>
    </div>
</section>

<?php get_footer(); ?>


<?php
/*
Template Name: Политика конфиденциальности
Template Post Type: page
*/

?>


<?php get_header(); ?>

<section class="policy">
	<div class="container">
		<div class="policy__inner">
			<div class="title--small">
				<?php echo __('Политика конфиденциальности', 'potolok')?>
			</div>
            <div class="wp-editor">
	            <?php the_content();?>
            </div>
		</div>
	</div>
</section>

<?php get_footer(); ?>


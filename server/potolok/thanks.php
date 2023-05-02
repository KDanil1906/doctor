<?php
/*
Template Name: Страница "Спасибо"
Template Post Type: page
*/

?>

<?php get_header(); ?>

<section class="thanks">
	<div class="container">
		<div class="thanks__inner">
			<?php echo apply_filters( 'the_content', carbon_get_post_meta(get_the_ID(), 'thanks-text') );?>

		</div>
	</div>
</section>


<?php get_footer(); ?>

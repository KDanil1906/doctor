<?php
$data = isset($args['data'])?$args['data']:false;
global $product;
if ( $product ) {
    $product_id = get_the_ID();
	$seo_article = getAssociateArticle($product_id);
}

?>

<section class="text-area">
	<div class="container">
		<div class="single__text-header">
			<?php
			$title = $data['text-block-title'];
			if ( $title ):
				?>
				<h2 class="sinlge__title">
					<?php echo $title; ?>
				</h2>
			<?php endif; ?>

			<?php
			$undertitle = $data['text-block-underitle'];
			if ( $undertitle ):
				?>
				<div class="single__desc">
					<?php echo $undertitle; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
		$desc = $data['text-block-desc'];
		?>
		<div class="wp-editor">

			<?php if($product):?>
				<?php echo apply_filters( 'the_content', $seo_article ); ?>
			<?php else:?>
				<?php echo apply_filters( 'the_content', $desc ); ?>
			<?php endif;?>


		</div>
	</div>
</section>
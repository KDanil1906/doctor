<?php get_header(); ?>

<section class="sing-post">
    <?php $postID = get_the_ID(); ?>

    <div class="sing-post__header" >
        <div class="sing-post__header-img" style="background-image: url(<?php echo carbonImageData( get_post_thumbnail_id( $postID ) )['url'] ?>);"> </div>

        <h1 class="sing-post__header-title">
            <?php echo get_the_title();?>
        </h1>
    </div>
    <div class="container">
        <div class="sing-post__inner">
            <div class="sing-post__content">
                <div class="wp-editor">
					<?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo get_template_part('template-parts/form');?>

<?php get_footer(); ?>

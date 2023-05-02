<?php
$locations = get_nav_menu_locations();
$menu_id = $locations['header-menu'];
$menu_items = wp_get_nav_menu_items($menu_id);
?>

<ul class="header__nav-links">
    <span class="header__nav-links--close-btn"></span>
    <?php foreach ($menu_items as $item):

        $class = '';
        if ($item->url == get_the_permalink(get_the_ID())) {
            $class = 'header__nav-link--active';
        }
        ?>

        <li class="<?php echo $class; ?>"><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>

    <?php endforeach; ?>

</ul>
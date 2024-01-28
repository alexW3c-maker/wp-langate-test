<?php

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body <?php body_class(); ?>>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
            <?php
                wp_nav_menu( array(
                  'theme_location' => 'top_menu',
                  'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                  'container_class' => 'collapse navbar-collapse',
                  'container_id' => 'navbarNavDropdown',
                ));
            ?>
        </div>
    </nav>
</header>
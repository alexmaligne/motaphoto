<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset=UTF-8>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" 
                content="width=device-width, initial-scale=1.0">
            <link rel="preload" href="style.css" as="style" onload="this.rel='stylesheet'">
            <title>Mota Photo</title>
            <?php wp_head(); ?>
        </head>

        <body <?php body_class(); ?>>
            <?php wp_body_open(); ?>

            <header>
                <div class="header">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img id="logo" src="<?php echo get_stylesheet_directory_uri() . './img/Logo.png'; ?> " alt="Logo Nathalie Mota"/>
                    </div>
                    <div class="menuHeader">
                        <nav id="navigation-principale" role="navigation" aria-label="<?php _e('Menu Header', 'text-domain'); ?>">
                            <?php wp_nav_menu( array( 
                                'theme_location' => 'menu-header' ) ); 
                            ?>
                        </nav>
                    </div>
                </div>
            </header>
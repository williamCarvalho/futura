<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="menu" class="scrollspy">
        <nav class="navbar-menu white" role="navigation">
            <div class="nav-wrapper container">
                <a class="brand-logo" href="<?php echo esc_url( site_url() ); ?>">
                    <?php if ($header_imag = get_header_image()) {
                        echo '<img src="' . esc_url($header_imag) . '" alt="' . get_bloginfo( 'name' ) . '"  data-aos="fade-zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000" />';
                    } else {
                        bloginfo('name'); 
                    }
                    ?>
                </a>

                <?php
                    wp_nav_menu(array(
                        'menu'           => 'main',
                        'menu_id'        => 'main-menu',
                        'theme_location' => 'main',
                        'depth'          =>  0,
                        'container'      => 'div',
                        'menu_class'     => 'right hide-on-med-and-down',
                        'walker'         => new WP_Materialize_Navwalker())
                    );
                ?>

                <div id="nav-mobile" class="sidenav">
                    <?php
                        wp_nav_menu(array(
                            'menu'           => 'main',
                            'menu_id'        => 'main-menu-mobile',
                            'theme_location' => 'main',
                            'depth'          =>  0,
                            'container'      => 'div',
                            'menu_class'     => 'collapsible',
                            'walker'         => new WP_Materialize_Navwalker())
                        );
                    ?>
                </div>

                <a href="#" data-target="nav-mobile" class="sidenav-trigger right">
                    <i class="material-icons">menu</i>
                </a>
            </div>
        </nav>
    </div>
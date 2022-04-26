
        <footer class="page-footer teal">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <?php if ($footer_title = get_theme_mod("futura_footer_title")):
                            echo '<h5 class="white-text" data-aos="fade-up" data-aos-delay="200">' . $footer_title . '</h5>';
                        endif;

                        if ($footer_description = get_theme_mod("futura_footer_description")):
                            echo '<p class="grey-text text-lighten-4" data-aos="fade-up" data-aos-delay="400">' . nl2br($footer_description) . '</p>';
                        endif; ?>
                    </div>
                    <div class="col l3 s12">
                        <?php if ($menu_name = wp_get_nav_menu_name('footer-1')):
                            echo '<h5 class="white-text" data-aos="fade-up">' . $menu_name . '</h5>';
                        endif;

                        if (has_nav_menu('footer-1')) {
                            wp_nav_menu(array(
                                'menu'           => 'footer-1',
                                'menu_id'        => 'footer-1-menu',
                                'theme_location' => 'footer-1',
                                'depth'          =>  0,
                                'container'      => 'ul',
                                'menu_class'     => '')
                            );
                        } ?>
                    </div>

                    <div class="col l3 s12">
                        <?php if ($menu_name = wp_get_nav_menu_name('footer-2')):
                                echo '<h5 class="white-text" data-aos="fade-up">' . $menu_name . '</h5>';
                            endif;

                        if (has_nav_menu('footer-2')) {
                            wp_nav_menu(array(
                                'menu'           => 'footer-2',
                                'menu_id'        => 'footer-2-menu',
                                'theme_location' => 'footer-2',
                                'depth'          =>  0,
                                'container'      => 'ul',
                                'menu_class'     => '')
                            );
                        } ?>
                    </div>
                    <a href="#menu" class="btn-floating btn-large right back-top" data-aos="zoom-in"></a>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <p><?php _e( 'Proudly powered by', 'futura' ); ?> <a class="white-text text-lighten-3" target="_blank" href="https://github.com/williamCarvalho">Will Carvalho</a>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
<?php
    // Register Custom Navigation Walker
    require_once ('scripts/wp_materialize_navwalker.php');

    /**
     * Load the theme translated
     */
    if (!function_exists('futura_setup'))
    {
        function futura_setup()
        {
            load_theme_textdomain('futura', get_template_directory() . '/languages');
        }
    }
    add_action('after_setup_theme', 'futura_setup');

    /**
     * Apply class to menu footer link
     */
    if (!function_exists('futura_nav_class'))
    {
        function futura_nav_class($atts, $item, $args)
        {
            if (in_array($args->theme_location, array(
                'footer-1',
                'footer-2'
            )))
            {
                $atts['class'] = "white-text";
            }
            return $atts;
        }
    }
    add_filter('nav_menu_link_attributes', 'futura_nav_class', 1, 3);

    /**
     * Queue styles and scripts for the theme
     */
    if (!function_exists('futura_enqueue'))
    {
        function futura_enqueue()
        {
            wp_enqueue_style('googleapis', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', false, null);
            wp_enqueue_style('material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', false, null);
            wp_enqueue_style('aos', esc_url(get_template_directory_uri()) . '/css/aos.css', false, null);
            wp_enqueue_style('materialize', esc_url(get_template_directory_uri()) . '/css/materialize.min.css', false, null);
            wp_enqueue_style('futura-style', esc_url(get_template_directory_uri()) . '/css/style.css', false, null);
            wp_enqueue_style('style', esc_url(get_stylesheet_uri()));

            wp_enqueue_script('jquery');

            wp_enqueue_script('aos', esc_url(get_template_directory_uri()) . '/js/aos.js', array(), '', true );
            wp_enqueue_script('futura-materialize', esc_url(get_template_directory_uri()) . '/js/materialize.min.js', array(), '', true );
            wp_enqueue_script('futura-script', esc_url(get_template_directory_uri()) . '/js/init.js', array(), '', true );
        }
    }
    add_action("wp_enqueue_scripts", "futura_enqueue");


    /**
     * Set theme default setup
     */
    if (!function_exists('futura_custom_theme_setup'))
    {
        function futura_custom_theme_setup()
        {
            add_theme_support('post-thumbnails');
            add_theme_support('automatic-feed-links');
            add_theme_support('title-tag');

            $header = array(
                'flex-width' => true,
                'width' => 200,
                'flex-height' => true,
                'height' => 30,
                'header-text' => array(
                    'site-title',
                    'site-description'
                ),
                'default-image' => '',
            );
            add_theme_support('custom-header', $header);

            $bg = array(
                'default-color' => 'FFFFFF',
            );
            add_theme_support('custom-background', $bg);

            register_nav_menus(array(
                'main' => __('Main Menu', 'futura'),
                'footer-1' => __('Primary Footer Menu', 'futura'),
                'footer-2' => __('Secondary Footer Menu', 'futura'),
            ));
        }
    }
    add_action('after_setup_theme', 'futura_custom_theme_setup');

    /**
     * Setup theme customize
     */
    if (!function_exists('futura_customize_register'))
    {
        function futura_customize_register($wp_customize)
        {
            // futura theme options section
            $wp_customize->add_section('futura_options', array(
                'title' => __('Futura theme options', 'futura'),
                'priority' => 10,
            ));

            // futura theme header control
            $wp_customize->add_setting('theme_header_select', array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'themeslug_sanitize_select',
                'default' => 'banner',
            ));
            $wp_customize->add_control('theme_header_select', array(
                'type' => 'select',
                'section' => 'futura_options',
                'label' => __('Header type'),
                'description' => '',
                'choices' => array(
                    'banner' => __('Banner'),
                    'carousel' => __('Carousel')
                ),
            ));

            // footer title control
            $wp_customize->add_setting('futura_footer_title', array());
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'futura_title_control', array(
                'label' => __('Footer title', 'futura'),
                'section' => 'futura_options',
                'settings' => 'futura_footer_title',
                'priority' => 30,
                'type' => 'text'
                ),
            ));

            // footer description control
            $wp_customize->add_setting('futura_footer_description', array());
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'futura_description_control', array(
                'label' => __('Footer description', 'futura'),
                'section' => 'futura_options',
                'settings' => 'futura_footer_description',
                'priority' => 30,
                'type' => 'textarea'
                ),
            ));

            // futura parallax section
            $wp_customize->add_section('futura_parallax_image', array(
                'title' => __('Parallax image', 'futura'),
                'priority' => 40,
            ));

            // futura parallax image primary title control
            $wp_customize->add_setting('parallax_image_primary_title', array());
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'parallax_image_primary_title', array(
                'label' => __('Parallax image primary title', 'futura'),
                'section' => 'futura_parallax_image',
                'settings' => 'parallax_image_primary_title',
                'type' => 'text',
            ),));

            // futura parallax image primary control
            $wp_customize->add_setting('parallax_image_primary', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw'
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'parallax_image_primary', array(
                'label' => __('Parallax image primary', 'futura'),
                'section' => 'futura_parallax_image',
                'settings' => 'parallax_image_primary'
            )));

            // futura parallax image secondary title control
            $wp_customize->add_setting('parallax_image_secondary_title', array());
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'parallax_image_secondary_title', array(
                'label' => __('Parallax image secondary title', 'futura'),
                'section' => 'futura_parallax_image',
                'settings' => 'parallax_image_secondary_title',
                'type' => 'text',
            ),));

            // futura parallax image secondary control
            $wp_customize->add_setting('parallax_image_secondary', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw'
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'parallax_image_secondary', array(
                'label' => __('Parallax image secondary', 'futura'),
                'section' => 'futura_parallax_image',
                'settings' => 'parallax_image_secondary'
            )));
        }
    }
    add_action('customize_register', 'futura_customize_register');

	/**
	 * Register Sidebar
	 */
    if (!function_exists('futura_register_sidebars'))
    {
        function futura_register_sidebars() {
            /* Register the primary sidebar. */
            register_sidebar(
                array(
                    'id'	=> 'sidebar',
                    'name'	=> __('Sidebar', 'futura'),
                    'description'	=> __('Right sidebar', 'futura'),
                    'before_widget' => '<div class="widget">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h3>',
                    'after_title'   => '</h3>',
                )
            );

            /* Repeat register_sidebar() code for additional sidebars. */
        }
    }
	add_action( 'widgets_init', 'futura_register_sidebars' );

    /**
     * Create theme category
     */
    if (!function_exists('futura_custom_category'))
    {
        function futura_custom_category()
        {
            $arrCat = array(
                'Header',
                'Main',
                'Parallex',
                'Content'
            );

            foreach ($arrCat as $cat):
                wp_insert_term("Featured $cat", 'category', array(
                    'slug' => sanitize_title("featured-$cat")
                ));
            endforeach;
        }
    }
    add_action('after_setup_theme', 'futura_custom_category');

    /**
     * Create theme meta box
     */
    if (!function_exists('futura_meta_box'))
    {
        function futura_meta_box()
        {
            add_meta_box('futura-fields-group', __('Futura Meta Box', 'futura'), 'futura_meta_box_callback', 'post');
        }
    }
    add_action('add_meta_boxes', 'futura_meta_box');

    /**
     * Save meta box information
     */
    if (!function_exists('futura_save_meta_box'))
    {
        function futura_save_meta_box($post_id)
        {
            if (!isset($_POST['futura_nonce']))
            {
                return $post_id;
            }

            $nonce = $_POST['futura_nonce'];

            if (!wp_verify_nonce($nonce, basename(__FILE__)))
            {
                return $post_id;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            {
                return $post_id;
            }

            if ('post' == $_POST['post_type'])
            {
                if (!current_user_can('edit_page', $post_id))
                {
                    return $post_id;
                }
            }
            else
            {
                if (!current_user_can('edit_post', $post_id))
                {
                    return $post_id;
                }
            }

            $futura_subtitle = sanitize_text_field($_POST['futura-subtitle']);

            update_post_meta($post_id, 'futura-subtitle', $futura_subtitle);
        }
    }
    add_action('save_post', 'futura_save_meta_box');

    /**
     * Custom link menu attributes
     */
    if (!function_exists('futura_menu_atts'))
    {
        function futura_menu_atts( $atts, $item, $args ) {
            $menu_locations = array('footer-1', 'footer-2');

            if (in_array($args->theme_location, $menu_locations)) {
                $atts['data-aos'] = 'zoom-in';
                $atts['data-aos-delay'] = $item->menu_order * 500;
            }

            return $atts;
        }
    }
    add_filter('nav_menu_link_attributes', 'futura_menu_atts', 10, 3);

    /**
     * Custom password form
     */
    if (!function_exists('futura_password_form'))
    {
        function futura_password_form() {
            global $post;
            $label = 'pwbox-' . (empty( $post->ID ) ? rand() : $post->ID);
            $action = esc_url(site_url( 'wp-login.php?action=postpass', 'login_post'));
            $button_value = esc_attr_x( 'Enter', 'post password form' );
            $content_text = __('This content is password protected. This is a custom message. To view it please enter your password below:', 'futura');
            $placeholder =  __('Password', 'futura');

            $output = "<p>$content_text</p>
                    <form action='$action' class='form-inline post-password-form' method='post'>
                        <div class='row valign-wrapper'>
                            <div class='input-field col s9 m10'>
                                <input name='post_password' id='$label' type='password' placeholder='$placeholder' size='20' class='form-control' />
                            </div>

                            <div class='input-field col s3 m2 center-align'>
                                <button class='waves-effect waves-light btn-small teal lighten-1' name='Submit' type='submit'><i class='material-icons'>send</i></button>
                            </div>
                        </div>
                    </form>";
            // $output = '
            //         <form action="' . $action . '" class="form-inline post-password-form" method="post">
            //             <p>' . __( 'This content is password protected. This is a custom message. To view it please enter your password below:' ) . '</p>
            //             <label for="' . $label . '">' . __( 'Password:' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" class="form-control" /></label><button type="submit" name="Submit" class="button-primary">' . $button_value . '</button>
            //         </form>';

            return $output;
        }
    }
    add_filter('the_password_form', 'futura_password_form', 99);

    /*****
        Methods
        *****/

    /**
     * Custom excerpt
     */
    if (!function_exists('futura_get_excerpt'))
    {
        function futura_get_excerpt($limit = 100)
        {
            return has_excerpt() ? get_the_excerpt() : wp_trim_words(strip_shortcodes(get_the_content()), $limit);
        }
    }

    if (!function_exists('themeslug_sanitize_select'))
    {
        function themeslug_sanitize_select($input, $setting)
        {
            $input = sanitize_key($input);

            $choices = $setting
                ->manager
                ->get_control($setting->id)->choices;

            return (array_key_exists($input, $choices) ? $input : $setting->default);
        }
    }

    if (!function_exists('futura_meta_box_callback'))
    {
        function futura_meta_box_callback($post)
        {
            wp_nonce_field(basename(__FILE__), 'futura_nonce');

            echo "<table>
                        <tr>
                            <td>
                                <label for='futura-subtitle'>" . __('Subtitle', 'futura') . "</label>
                            </td>
                            <td>
                                <input type='text' name='futura-subtitle' id='futura-subtitle' value='" . esc_html(get_post_meta($post->ID, 'futura-subtitle', true)) . "'/>
                            </td>
                        </tr>
                    </table>";
        }
    }

    if (!function_exists('futura_pagination'))
    {
        function futura_pagination() {
            global $wp_query;

            if ($wp_query->max_num_pages <= 1)
                return; 

            $big = 999999999; // need an unlikely integer

            $pages = paginate_links(array(
                'base'               => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'             => '?paged=%#%',
                'current'            => max(1, get_query_var('paged')),
                'total'              => $wp_query->max_num_pages,
                'type'               => 'array',
                'mid_size'           => 10,
                'prev_text'          => __('<i class="material-icons">chevron_left</i>'),
                'next_text'          => __('<i class="material-icons">chevron_right</i>'),
            ));

            echo '<div class="row">
                    <div class="col s12">
                        <ul class="pagination">';
            if (is_array($pages)) {
                foreach ($pages as $page) {
                    if (strpos($page, '<span') === false) {
                        echo '<li class="waves-effect" data-aos="fade-up" data-aos-delay="700">' . $page . '</li>';
                    } else {
                        $page = str_replace('<span', '<a href="#"', $page);
                        $page = str_replace('</span>', '</a>', $page);
                        echo '<li class="active teal lighten-1" data-aos="fade-up" data-aos-delay="700">' . $page . '</li>';
                    }
        
                }
            }
            echo '      </ul>
                    </div>
                </div>';
        }
    }

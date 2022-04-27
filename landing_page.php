<?php //Template Name: Landing Page

get_header(); ?>

    <?php if (get_theme_mod("theme_header_select") == 'carousel'):
        query_posts(array('category_name' => 'featured-header', 'order' => 'ASC'));
        if (have_posts()) : ?>

            <!-- CAROUSEL -->
            <div class="carousel carousel-slider autoplay center" data-second="10">
                <?php while(have_posts()) : the_post();
                    $thumbnail_url = esc_url(wp_get_attachment_url(get_post_thumbnail_id($post))); ?>

                    <div class="carousel-item white-text image" style='<?php echo $thumbnail_url ? "background-image: url($thumbnail_url)" : ""; ?>'>
                        <br />
                        <h2 class="header center teal-text text-lighten-2" data-aos="zoom-in" data-aos-delay="250">
                            <?php echo get_the_title(); ?>
                        </h2>

                        <?php if ($subtitle = get_post_meta(get_the_ID(), 'futura-subtitle', true)): ?>
                            <div class="row center">
                                <h3 class="header col s12 light" data-aos="zoom-in" data-aos-delay="500">
                                    <?php echo $subtitle; ?>
                                </h3>
                            </div>
                        <?php endif; ?>

                        <div class="row center">
                            <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn-large waves-effect waves-light teal lighten-1" data-aos="zoom-in" data-aos-delay="750">
                                <?php echo __('More', 'futura'); ?>
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

        <?php endif;

    else:
        query_posts(array('category_name' => 'featured-header', 'order' => 'ASC', 'showposts' => 1));
        if (have_posts()) : while(have_posts()) : the_post(); ?>

            <!-- BANNER PARALLAX -->
            <div id="index-banner" class="parallax-container">
                <div class="section no-pad-bot">
                    <div class="container">
                        <h1 class="header center teal-text text-lighten-2" data-aos="zoom-in" data-aos-delay="250">
                            <?php echo get_the_title(); ?>
                        </h1>

                        <?php if ($subtitle = get_post_meta(get_the_ID(), 'futura-subtitle', true)): ?>
                            <div class="row center">
                                <h2 class="header h5 col s12 light" data-aos="zoom-in" data-aos-delay="500">
                                    <?php echo $subtitle; ?>
                                </h2>
                            </div>
                        <?php endif; ?>

                        <div class="row center">
                            <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn-large waves-effect waves-light teal lighten-1" data-aos="zoom-in" data-aos-delay="750">
                                <?php echo __('More', 'futura'); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <?php if ($thumbnail_url = esc_url(wp_get_attachment_url( get_post_thumbnail_id($post)))): ?>
                    <div class="parallax">
                        <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo get_the_title(); ?>" />
                    </div>
                <?php endif; ?>
            </div>

        <?php endwhile; endif;
    endif; ?>

    <div class="main">
        <div class="container">
            <div class="section">
                <div class="row">
                    <?php query_posts('category_name=featured-main&showposts=3');
                        if (have_posts()) : while(have_posts()) : the_post(); ?>

                            <div class="col s12 m4">
                                <div class="icon-block center-align">
                                    <h3 class="center h5" data-aos="fade-up" data-aos-delay="200">
                                        <?php echo get_the_title(); ?>
                                    </h3>

                                    <p class="light" data-aos="fade-up" data-aos-delay="400">
                                        <?php echo futura_get_excerpt(20); ?>
                                    </p>

                                    <div class="center" data-aos="fade-up" data-aos-delay="600">
                                        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="waves-effect waves-light btn-small">
                                            <i class="material-icons right">navigate_next</i>
                                            <?php echo __('More', 'futura'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>

        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">

                        <?php if ($parallax_image_primary_title = get_theme_mod("parallax_image_primary_title")): ?>
                            <h3 class="header h5 col s12 light" data-aos="zoom-in">
                                <?php echo $parallax_image_primary_title; ?>
                            </h3>
                        <?php endif;?>

                    </div>
                </div>
            </div>

            <?php if ($parallax_image_primary = esc_url(get_theme_mod("parallax_image_primary"))): ?>
                <div class="parallax">
                    <img src="<?php echo $parallax_image_primary; ?>" alt="<?php echo $parallax_image_primary_title; ?>" />
                </div>
            <?php endif; ?>
        </div>

        <div class="container">
            <div class="section">
                <div class="row">
                    <?php query_posts('category_name=featured-content&showposts=1');
                        if (have_posts()) : while(have_posts()) : the_post(); ?>

                            <div class="col s12">
                                <h4 class="center" data-aos="fade-up" data-aos-delay="200">
                                    <?php echo get_the_title(); ?>
                                </h4>

                                <p class="light" data-aos="fade-up" data-aos-delay="400">
                                    <?php echo futura_get_excerpt(100); ?>
                                </p>

                                <div class="center">
                                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="waves-effect waves-light btn-small" data-aos="fade-up" data-aos-delay="600">
                                        <i class="material-icons right">navigate_next</i>
                                        <?php echo __('More', 'futura'); ?>
                                    </a>
                                </div>
                            </div>

                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>

        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">

                        <?php if ($parallax_image_secondary_title = get_theme_mod("parallax_image_secondary_title")): ?>
                            <h3 class="header h5 col s12 light" data-aos="zoom-in">
                                <?php echo $parallax_image_secondary_title; ?>
                            </h3>
                        <?php endif;?>

                    </div>
                </div>
            </div>

            <?php if ($parallax_image_secondary = esc_url(get_theme_mod("parallax_image_secondary"))): ?>
                <div class="parallax">
                    <img src="<?php echo $parallax_image_secondary; ?>" alt="<?php echo $parallax_image_secondary_title; ?>" />
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>
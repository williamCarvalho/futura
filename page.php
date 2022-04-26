<?php get_header(); ?>

    <div id="post-<?php the_ID(); ?>-banner" class="parallax-container parallax-post">
        <div class="section no-pad-bot">
            <div class="container">
                <h1 class="header center teal-text text-lighten-2" data-aos="zoom-in" data-aos-delay="250">
                    <?=get_the_title($post->ID);?>
                </h1>
            </div>
        </div>

        <?php if (has_post_thumbnail($post->ID)) :
            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');?>
            <div class="parallax">
                <img src="<?=$large_image_url[0]?>" alt="<?=get_the_title($post->ID);?>" />
            </div>
        <?php endif; ?>
    </div>

    <div class="main">
        <div class="container container-fluid">
            <div class="section">
                <div class="row">
                    <div class="col s12 <?=(is_active_sidebar('sidebar') ? 'm8' : ''); ?>">

                        <?php while (have_posts()) : the_post(); ?>

                            <div class="row">
                                <article id="post-<?php the_ID(); ?>" <?php post_class("col s12"); ?>>

                                    <?php if (current_user_can( 'edit_post', $post->ID )): ?>
                                        <div data-aos="fade-up" data-aos-delay="200">
                                            <?php edit_post_link(__('Edit', 'futura')); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div data-aos="fade-up" data-aos-delay="400">
                                        <?php the_content(); ?>
                                    </div>

                                    <?php
                                    $args = array (
                                        'before'           => '<div class="collection" data-aos="fade-up" data-aos-delay="600">',
                                        'after'            => '</div>',
                                        'link_before'      => '<span class="collection-item valign-wrapper">',
                                        'link_after'       => '</span>',
                                        'next_or_number'   => 'next',
                                        'separator'        => ' | ',
                                        'nextpagelink'     => __('Next', 'futura') . '<i class="material-icons teal-text text-lighten-2">navigate_next</i>',
                                        'previouspagelink' => '<i class="material-icons teal-text text-lighten-2">navigate_before</i>' . __('Previous', 'futura'),
                                    );

                                    wp_link_pages($args); ?>
                                </article>
                            </div>

                            <?php if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                        endwhile; ?>
                    </div>

                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
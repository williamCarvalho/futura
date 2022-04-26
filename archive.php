<?php get_header(); ?>

    <div class="main">
        <div class="container container-fluid">
            <div class="section">
                <div class="row">
                    <div class="col s12 <?=(is_active_sidebar('sidebar') ? 'm8' : ''); ?>">
                        <?php $post = $posts[0];
                            // Hack. Set $post so that the_date() works.
                            /* If this is a category archive */
                            if (is_category()) :
                                printf('<h3 class="h5" data-aos="fade-up" data-aos-delay="200">' . __('Category: %s', 'futura') . '</h3>', '<i>' . single_cat_title('', false) . '</i>');
                                //single_cat_title('', false)

                            /* If this is a daily archive */
                            elseif (is_day()) :
                                printf('<h3 class="h5" data-aos="fade-up" data-aos-delay="200">' . __('Archive: %s', 'futura') . '</h3>', '<i>' . get_the_time('j \d\e F \d\e Y') . '</i>');
                                //get_the_time('j \d\e F \d\e Y')

                            /* If this is a monthly archive */
                            elseif (is_month()) :
                                printf('<h3 class="h5" data-aos="fade-up" data-aos-delay="200">' . __('Archive: %s', 'futura') . '</h3>', '<i>' . get_the_time('F \d\e Y') . '</i>');
                                //get_the_time('F \d\e Y')

                            /* If this is a yearly archive */
                            elseif (is_year()) :
                                printf('<h3 class="h5" data-aos="fade-up" data-aos-delay="200">' . __('Archive: %s', 'futura') . '</h3>', '<i>' . get_the_time('Y') . '</i>');
                                //get_the_time('Y')

                            /* If this is an author archive */
                            elseif (is_author()) :
                                printf('<h3 class="h5" data-aos="fade-up" data-aos-delay="200">' . __('Archive: %s', 'futura') . '</h3>', '<i>' . get_the_author() . '</i>');
                                //get_the_author()

                            /* If this is a paged archive */
                            elseif (isset($_GET['paged']) && !empty($_GET['paged'])) :
                                printf('<h3 class="h5" data-aos="fade-up" data-aos-delay="200">' . __('Archive: %s', 'futura') . '</h3>', '<i>' . get_bloginfo('name') . '</i>');
                                //get_bloginfo('name')
                            endif;

                        if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article>
                                <h2 data-aos="fade-up" data-aos-delay="400">
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <?php if (current_user_can( 'edit_post', $post->ID )): ?>
                                    <div data-aos="fade-up" data-aos-delay="500">
                                        <?php edit_post_link(__('Edit', 'futura')); ?>
                                    </div>
                                <?php endif; ?>

                                <div data-aos="fade-up" data-aos-delay="600">
                                    <?php the_excerpt(); ?>
                                </div>
                            </article>

                        <?php endwhile;

                            futura_pagination();

                        else : ?>

                            <article>
                                <p>
                                    <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'futura' ); ?>
                                </p>

                                <?php get_search_form(); ?>
                            </article>
                    
                        <?php endif; ?>
                    </div>

                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>
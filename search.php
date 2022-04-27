<?php get_header(); ?>

    <div class="main">
        <div class="container container-fluid">
            <div class="section">
                <div class="row">
                    <div class="col s12 <?php echo (is_active_sidebar('sidebar') ? 'm8' : ''); ?>">

                        <div class="form-wrapper" data-aos="fade-up" data-aos-delay="200">
                            <?php get_search_form(); ?>
                        </div>

                        <h2 class="h5" data-aos="fade-up" data-aos-delay="400">
                            <i>
                                <?php printf( __('Search Results for: %s', 'futura'), '<i>' . get_search_query() . '</i>' ); ?>
                            </i>
                        </h2>

                        <?php if (have_posts()) :
                            while (have_posts()) : the_post(); ?>

                                <div class="row">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class("col s12"); ?>>
                                        <h3 class="h4" data-aos="fade-up" data-aos-delay="600">
                                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="teal-text text-lighten-2">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>

                                        <?php if (current_user_can( 'edit_post', $post->ID )): ?>
                                            <div data-aos="fade-up" data-aos-delay="700">
                                                <?php edit_post_link(__('Edit', 'futura')); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(has_tag()): ?>
                                            <p class="teal-text text-lighten-2" data-aos="fade-up" data-aos-delay="800">
                                                <?php the_tags('Tags: <span class="chip teal lighten-3">', '</span><span class="chip teal lighten-3">', '</span>'); ?>
                                            </p>
                                        <?php endif; ?>

                                        <p class="light" data-aos="fade-up" data-aos-delay="1000">
                                            <?php echo futura_get_excerpt(55); ?>
                                        </p>

                                        <br />
                                        <a href="<?php echo esc_url(the_permalink()); ?>" class="waves-effect waves-light btn-small teal lighten-1" data-aos="fade-up" data-aos-delay="1200">
                                            <?php echo __('Read More', 'futura'); ?>
                                        </a>

                                    </article>
                                </div>

                                <?php if (comments_open() || get_comments_number()):
                                    comments_template();
                                endif;
                            endwhile;

                            futura_pagination();
                        else : ?>

                            <div class="row">
                                <article class="col s12 center-align">
                                    <i class="material-icons teal-text text-lighten-2" data-aos="fade-up" data-aos-delay="600">sentiment_very_dissatisfied</i>
                                    <p data-aos="fade-up" data-aos-delay="800">
                                        <?php esc_attr_e( 'Oops! Nothing to see here... Try searching again!', 'futura'); ?>
                                    </p>
                                </article>
                            </div>

                            <div class="row">
                                <div class="col s12 center-align" data-aos="fade-up" data-aos-delay="1000">
                                    <a href="<?php echo get_home_url(); ?>">
                                        <?php echo __( 'Back to home page', 'futura'); ?>
                                        <br />
                                        <span class="material-icons">home</span>
                                    </a>
                                </div>
                            </div>

                        <?php endif; ?>

                    </div>

                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
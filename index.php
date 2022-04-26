<?php get_header(); ?>

    <div class="main">
        <div class="container container-fluid">
            <div class="section">
                <div class="row">
                    <div class="col s12 <?=(is_active_sidebar('sidebar') ? 'm8' : ''); ?>">
                        <?php while (have_posts()) : the_post(); ?>

                            <div class="row">
                                <article id="post-<?php the_ID(); ?>" <?php post_class("col s12"); ?>>
                                    <h3 class="h4">
                                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="teal-text text-lighten-2">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>

                                    <?php edit_post_link(__('Edit', 'futura')); ?>

                                    <p class="teal-text text-lighten-2">
                                        <?php the_tags('Tags: <span class="chip teal lighten-3">', '</span><span class="chip teal lighten-3">', '</span>'); ?>
                                    </p>

                                    <p class="light">
                                        <?=futura_get_excerpt(55);?>
                                    </p>

                                    <br />
                                    <a href="<?=esc_url(the_permalink());?>" class="waves-effect waves-light btn-small teal lighten-1">
                                        <?=__('Read More', 'futura');?>
                                    </a>

                                </article>
                            </div>

                            <?php if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;    
                        endwhile;

                        futura_pagination();?>
                    </div>

                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
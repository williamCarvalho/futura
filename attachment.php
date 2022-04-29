<?php get_header(); ?>

    <div class="main">
        <div class="container container-fluid">
            <div class="section">
                <div class="row">
                    <div class="col s12 <?php echo (is_active_sidebar('sidebar') ? 'm8' : ''); ?>">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1 class="h5" data-aos="fade-up" data-aos-delay="200">
                                <?php the_title(); ?>
                            </h1>

                            <?php if (current_user_can( 'edit_post', $post->ID )): ?>
                                <div data-aos="fade-up" data-aos-delay="300">
                                    <?php edit_post_link(__('Edit', 'futura')); ?>
                                </div>
                            <?php endif;

                            if (wp_attachment_is_image($post->id)) :
                                $att_image = wp_get_attachment_image_src($post->id, "high");
                                $att_image_alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true); ?>

                                <p class="attachment" data-aos="fade-up" data-aos-delay="400">
                                    <a href="<?php echo esc_url(wp_get_attachment_url($post->id)); ?>" title="<?php the_title(); ?>" rel="attachment">
                                        <img src="<?php echo $att_image[0]; ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" class="attachment-medium" alt="<?php echo $att_image_alt; ?>" />
                                    </a>
                                </p>

                            <?php else : ?>

                                <p class="attachment" data-aos="fade-up" data-aos-delay="400">
                                    <a href="<?php echo esc_url(wp_get_attachment_url($post->ID)); ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ); ?>" rel="attachment">
                                        <?php echo basename($post->guid); ?>
                                    </a>
                                </p>

                            <?php endif; ?>

                            <?php if (!empty($post->post_excerpt)): ?>
                                <p data-aos="fade-up" data-aos-delay="500">
                                    <small>
                                        <?php echo get_the_excerpt(); ?>
                                    </small>
                                </p>
                            <?php endif; ?>

                            <div data-aos="fade-up" data-aos-delay="600">
                                <?php the_content(); ?>
                            </div>

                            <blockquote data-aos="fade-up" data-aos-delay="700">
						        <p>
                                    <small class="valign-wrapper">
                                        <?php if ($author = get_the_author()) : ?>
                                            <strong>
                                                <?php echo $author; ?>
                                            </strong>
                                            <br />
                                        <?php endif;?>

                                        <?php the_time('d/m/Y'); ?>
                                    </small>
                                </p>
						    </blockquote>                            
                        </article>
                    </div>

                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
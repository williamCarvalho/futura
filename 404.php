<?php get_header(); ?>

    <div class="main">
        <div class="container container-fluid">
            <div class="section">
                <div class="row">
                    <div class="col s12 <?=(is_active_sidebar('sidebar') ? 'm8' : ''); ?>">
                        <article class="center">
                            <h1 class="h5" data-aos="fade-up" data-aos-delay="200">
                                <?php _e('Oops! Nothing to see here...', 'futura'); ?>
                            </h1>
                            <p data-aos="fade-up" data-aos-delay="400">
                                <?php _e('It looks like nothing was found at this location. Maybe try a search?', 'futura'); ?>
                            </p>

                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="600">
                                <?php get_search_form(); ?>
                            </div>
                        </article>

                        <div class="row">
                            <div class="col s12 center-align" data-aos="fade-up" data-aos-delay="800">
                                <a href="<?=get_home_url();?>">
                                    <?=__( 'Back to home page', 'futura');?>
                                    <br />
                                    <span class="material-icons">home</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>
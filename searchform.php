
    <form method="get" id="searchform" class="col s12 searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="row valign-wrapper">
            <div class="input-field col s9 m10">
                <input type="text" placeholder="<?php _e( 'Search', 'futura' ); ?>" value="<?=get_search_query();?>" name="s" aria-describedby="sizing-addon1">
            </div>

            <div class="input-field col s3 m2 center-align">
                <button class="waves-effect waves-light btn-small teal lighten-1" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </div>
    </form>

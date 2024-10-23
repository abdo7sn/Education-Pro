<div class="col-12">
    <form role="search" method="get" class="form-inline tm-mb-80 tm-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">                
        <input class="form-control tm-search-input" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'school-education' ); ?>" value="<?php echo get_search_query(); ?>" name="s" type="search">
        <button class="tm-search-button" type="submit">
            <i class="fa-regular fa-magnifying-glass tm-search-icon" aria-hidden="true"></i>
        </button>                                
    </form>
</div>   
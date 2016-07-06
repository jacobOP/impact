<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

    <div id="primary" class="container page-404">
        <div id="content" class="row" role="main">
            
            <header class="col-xs-12">
                <h1 class="page-title"><?php _e( 'Well that wasn\'t supposed to happen...' ); ?></h1>
                <img src="<?php echo get_template_directory_uri(); ?>/img/oops.gif" alt="" class="img-responsive">
            </header>

            <div class="page-wrapper col-xs-12">
                <div class="page-content">
                    <p><?php _e( 'We couldn\'t find the page you were looking for. Maybe try a search?'); ?></p>

                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </div><!-- .page-wrapper -->

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>
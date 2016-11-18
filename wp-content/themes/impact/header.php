<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!-- 

_ _|  \  |  _ \   \    ___|__ __|
  |  |\/ | |   | _ \  |       |  
  |  |   | ___/ ___ \ |       |  
___|_|  _|_|  _/    _\____|  _|  

ACTION ON DEMAND
 -->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- remove this when you go live! -->
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/manifest.json">
<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#f89a1c">

<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>


<?php
    //this fetches the most recent image for each tag and echoes them into a js object named impactTagsImages 
    $tags = get_tags();
    $tags_images = '';
    foreach ( $tags as $tag ) {
        $original_query = $wp_query;
        $wp_query = null;
        //need to query for the tag name w/ dashes, apparently its stored that way in the DB
        $current_tag = str_replace(' ', '-', $tag->name);
        $args=array('posts_per_page'=>1, 'tag' => $current_tag);
        $wp_query = new WP_Query( $args );
        if ( have_posts() ) :
            while (have_posts()) : the_post();
                $main_image = get_field('main_image');
                $tags_images = $tags_images .'"'. $tag->name.'" : "'.$main_image['url'].'", ';
            endwhile;
        endif;
        $wp_query = null;
        $wp_query = $original_query;
        wp_reset_postdata();
    }
    echo '<script>';
    echo 'impactTagsImages = {' . $tags_images . '}';
    echo "</script>";
?>
</head>

<body 
	<?php body_class(); 
	// This will display a class specific to whatever is being loaded by Wordpress
	// i.e. on a home page, it will return [class="home"]
	// on a single post, it will return [class="single postid-{ID}"]
	// and the list goes on. Look it up if you want more.
	?>
>
<header id="masthead" class="site-header">
<div class="site-header--small-bar">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="flex">
          <div class="site-header--social">
            <a href="https://www.youtube.com/Impact" target="_blank">
              <?php echo file_get_contents(get_site_url() . '/wp-content/themes/impact/img/social/svg-bw/youtube-play-button.svg'); ?>
            </a>
            <a href="https://www.facebook.com/actionondemand" target="_blank">
              <?php echo file_get_contents(get_site_url() . '/wp-content/themes/impact/img/social/svg-bw/facebook-letter-logo.svg'); ?>
            </a>
            <a href="https://twitter.com/actionondemand" target="_blank">
              <?php echo file_get_contents(get_site_url() . '/wp-content/themes/impact/img/social/svg-bw/twitter-logo.svg'); ?>
            </a>
          </div>
          <div class="site-header--search-icon">
            <div class="search-svg-container launch-search js_launch-search">
              <div class="spyglass">
                <?php echo file_get_contents(get_site_url() . '/wp-content/themes/impact/img/search/spyglass.svg'); ?>
              </div>
              <div class="cancel">
                <?php echo file_get_contents(get_site_url() . '/wp-content/themes/impact/img/search/cancel.svg'); ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="site-header--search hidden flex">
          <input type="text" class="form-control" id="search-input" placeholder="Search">
          <button class="js_search-submit site-header-search-button">
            <div class="search-svg-container">
              <?php echo file_get_contents(get_site_url() . '/wp-content/themes/impact/img/search/spyglass.svg'); ?>
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-header--large-bar">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="flex">
        <div id="brand" class="site-header--logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
            <img src="<?php echo get_site_url(); ?>/wp-content/themes/impact/img/logo_10-12-16.png" alt="IMPACT - Action on Demand" class="img-responsive">
          </a>
          <?php // bloginfo( 'description' ); // Display the blog description, found in General Settings ?>
        </div><!-- /brand -->
        <nav class="site-navigation main-navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
        </nav><!-- .site-navigation .main-navigation -->
      </div>
    </div>
  </div>
</div>
  
</div>
  
</header><!-- #masthead .site-header -->

<main><!-- start the page containter -->

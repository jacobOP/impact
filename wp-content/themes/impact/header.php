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
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
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
        $args=array('posts_per_page'=>1, 'tag' => $tag->name);
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

<script>
//this needs to be globally available so idk have fun  ¯\_(ツ)_/¯
var impactTags = [
    //bucket 1
    {
        "name" : "Action",
        "symbol" : "A",
        "bucket" : 1
    },
    {
        "name" : "Adrenaline",
        "symbol" : "Ad",
        "bucket" : 1
    },
    {
        "name" : "Car Chase",
        "symbol" : "Cc",
        "bucket" : 1
    },
    {
        "name" : "Westerns",
        "symbol" : "We",
        "bucket" : 1
    },
    {
        "name" : "Testosterone",
        "symbol" : "Ts",
        "bucket" : 1
    },
    {
        "name" : "Explosions",
        "symbol" : "Ex",
        "bucket" : 1
    },

    //bucket 2
    {
        "name" : "WTF",
        "symbol" : "W",
        "bucket" : 2
    },
    {
        "name" : "Gore",
        "symbol" : "G",
        "bucket" : 2
    },
    {
        "name" : "Violence",
        "symbol" : "V",
        "bucket" : 2
    },
    {
        "name" : "Pain",
        "symbol" : "P",
        "bucket" : 2
    },
    {
        "name" : "Danger",
        "symbol" : "Da",
        "bucket" : 2
    },
    {
        "name" : "Fail",
        "symbol" : "F",
        "bucket" : 2
    },

    //bucket 3
    {
        "name" : "Adventure",
        "symbol" : "Av",
        "bucket" : 3
    },
    {
        "name" : "Wild",
        "symbol" : "Wi",
        "bucket" : 3
    },
    {
        "name" : "Funny",
        "symbol" : "Fu",
        "bucket" : 3
    },
    {
        "name" : "Suspense",
        "symbol" : "Su",
        "bucket" : 3
    },
    {
        "name" : "Evil",
        "symbol" : "E",
        "bucket" : 3
    },
    {
        "name" : "Old School",
        "symbol" : "Os",
        "bucket" : 3
    },

    //bucket 4
    {
        "name" : "Tech",
        "symbol" : "Te",
        "bucket" : 4
    },
    {
        "name" : "Covert",
        "symbol" : "Cv",
        "bucket" : 4
    },
    {
        "name" : "Weapons",
        "symbol" : "We",
        "bucket" : 4
    },
    {
        "name" : "Speed",
        "symbol" : "Sp",
        "bucket" : 4
    },
    {
        "name" : "Police",
        "symbol" : "Po",
        "bucket" : 4
    },
    {
        "name" : "Reality",
        "symbol" : "Re",
        "bucket" : 4
    },

    //bucket 5
    {
        "name" : "Skills",
        "symbol" : "Sk",
        "bucket" : 5
    },
    {
        "name" : "Kick Ass",
        "symbol" : "Ka",
        "bucket" : 5
    },
    {
        "name" : "Martial Arts",
        "symbol" : "Ma",
        "bucket" : 5
    },
    {
        "name" : "Hero",
        "symbol" : "H",
        "bucket" : 5
    },
    {
        "name" : "Fight",
        "symbol" : "Fi",
        "bucket" : 5
    },
    {
        "name" : "Sports",
        "symbol" : "Sp",
        "bucket" : 5
    },

    //bucket 6
    {
        "name" : "War",
        "symbol" : "Wa",
        "bucket" : 6,
    },
    {
        "name" : "Military",
        "symbol" : "Mi",
        "bucket" : 6,
    },
    {
        "name" : "Riot",
        "symbol" : "R",
        "bucket" : 6,
    },
    {
        "name" : "Wreck",
        "symbol" : "Wr",
        "bucket" : 6,
    },
    {
        "name" : "Destruction",
        "symbol" : "De",
        "bucket" : 6,
    },
    {
        "name" : "Burn",
        "symbol" : "B",
        "bucket" : 6,
    },
];
</script>

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
    <div class="container">
	    <div class="row site-header--inner">
			<div id="brand" class="site-header--logo col-sm-6 col-sm-push-6 col-md-4 col-md-push-4 col-lg-push-4">
				<a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
					<img src="<?php echo get_site_url(); ?>/wp-content/themes/impact/img/logo_10-12-16.png" alt="IMPACT - Action on Demand" class="img-responsive">
				</a>
				<?php // bloginfo( 'description' ); // Display the blog description, found in General Settings ?>
			</div><!-- /brand -->

			<nav class="site-navigation main-navigation col-sm-6 col-sm-pull-6 col-md-4 col-md-pull-4 col-lg-pull-4">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
			</nav><!-- .site-navigation .main-navigation -->

			<div class="col-sm-12 col-md-4">
				<div class="search flex">
					<input type="text" class="form-control" id="search-input" placeholder="Search">
					<button class="btn btn-primary js_search-submit">Search</button>
				</div>
			</div>
		</div>
	</div>
		
</header><!-- #masthead .site-header -->

<main><!-- start the page containter -->

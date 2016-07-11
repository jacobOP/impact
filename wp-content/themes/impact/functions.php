<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate post thumbnails/feautred images
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' ); 
add_image_size( '272', 272, 272, true );
add_image_size( 'custom-size', 150, 150, true);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function impact_styles(){
	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'impact_styles' ); // Register this fxn and allow Wordpress to call it automatcally in the header


function naked_scripts()  { 
	// add theme scripts
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.0.0.js', array(), NAKED_VERSION, true );
	
	// add fitvid
	//wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );

	 // add featherlight lightbox script
	wp_enqueue_script( 'featherlight', get_template_directory_uri() . '/js/featherlight-1.5.0/release/featherlight.min.js', array(), NAKED_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/min/theme.min.js', array(), NAKED_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


/*-----------------------------------------------------------------------------------*/
/* ajax in more posts function
/* this is kind of a monster b/c it returns html, im sorry future dev
/*-----------------------------------------------------------------------------------*/
function more_post_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    header("Content-Type: text/html");

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'category_name' => 'editorial',
        'offset' => $offset,
    );

    $loop = new WP_Query($args);
    $article = '';
    while ($loop->have_posts()) { $loop->the_post(); 
    	$article = '<article class="read-post row ';
    	$categories = get_the_category();
    	$permalink = get_the_permalink();
    	$title = get_the_title();
    	$author = get_the_author();
    	$time = get_the_time('m/d/Y');
    	$main_image = get_field('main_image');
        $content = substr(get_the_content(), 0, 100);   	
    	$postCategory = '';
		if ( ! empty( $categories ) ) {
		    $postCategory = $categories[0]->name ;
		    $postCategory = preg_replace('/\s+/', '', $postCategory);   
		}
		
		$article .=  $postCategory . '">'  ;  

		$article .= '<div class="post--img col-md-4"><a href="' . $permalink . '"><div class="read-post--background-image" style="background:url(' . $main_image['url'] .'"></div></a></div><div class="post--details col-md-8"><div class="post--details--inner"><div class="tags">';

        if($postCategory != 'Sponsored'){ //display "sponsored" tag on sponsored content, tags on all other content
        		$taglist = get_the_tag_list( '', ', &nbsp;' ); 
                $article .= $taglist; // Display the tags this post has, as links separated by spaces and commas 
        } else{
        	$article .= '<a href="#">SPONSORED</a>';
        }
        //add title
        $article .= '</div><h1 class="title"><a class="inherit" href="' . $permalink . '" title="' . $title . '">' . $title . '</a></h1>';;
        //add post-meta
        $article .= '<div class="post--meta flex"><div class="post--author">' . $author . '</div><div class="post-meta--date">' . $time . '</div></div>';
        //add content snippet
        $article.= '<div class="the-content">' . $content . '...<a class="" href="' . $permalink . '" title="' . $title . '">Read More</a></div></div></div></article>';
		echo $article;
    };

    exit; 
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');




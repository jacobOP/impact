<?php
/**
 * The template for displaying tags.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
    <div id="primary" class="tag-page">
        <div id="content" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 tag-page--header">
                        <?php $current_tag = single_tag_title("", false); ?>
                        <div class="el">
                            <div class="el--name"><?php echo $current_tag; ?></div>
                            <div class="el--symbol"><?php echo substr($current_tag, 0, 1) ?></div>
                        </div>
                        <h1><?php echo $current_tag; ?></h1>
                    </div>
                </div>
            </div>
            <section class="bg-greyDark tag-watch">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="row">
                                <?php
                                    // The Query, for video items
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $args = array( 'category_name' => 'video', 'tag' => $current_tag, 'showposts' => 3, 'paged' => $paged );
                                    query_posts( $args );
                                    
                                    if ( have_posts() ) : 
                                    // Do we have any posts in the databse that match our query?
                                    // In the case of the home page, this will call for the most recent posts 
                                    ?>

                                        <?php while ( have_posts() ) : the_post(); 
                                        // If we have some posts to show, start a loop that will display each one the same way
                                        ?>

                                            <article class="watch-post col-md-4 <?php 
                                                $categories = get_the_category();
                                                if ( ! empty( $categories ) ) {
                                                    $postCategory = $categories[0]->name ;
                                                    $postCategory = preg_replace('/\s+/', '', $postCategory);   
                                                    echo $postCategory;
                                                }
                                                if($firstVid){
                                                    //echo ' col-lg-offset-1';
                                                    $firstVid = false;
                                                }
                                                ?>
                                            "> <!-- .watch-post -->

                                                <div class="watch-post--img"  data-featherlight="#featherlight-<?php the_ID(); ?>">
                                                    <?php $main_image = get_field('main_image'); ?>
                                                    <div class="watch-post--background-image" style="background:url(<?php echo $main_image['url'] ?>)"></div>
                                                </div>

                                                <div class="hidden">
                                                    <div class="" id="featherlight-<?php the_ID(); ?>">
                                                        <?php echo wp_oembed_get( get_field( 'youtube_link' ) ); ?>
                                                    </div>
                                                </div>  
                                                
                                                <div class="tags">
                                                    <?php if($postCategory != 'Sponsored'): //display "sponsored" tag on sponsored content, tags on all other content
                                                    ?>
                                                    <?php 
                                                            echo get_the_tag_list( '', ', &nbsp;' ); // Display the tags this post has, as links separated by spaces and commas 
                                                    ?>
                                                    <?php else: ?>
                                                        <a href="#">SPONSORED</a>
                                                    <?php endif; ?>
                                                </div>
                                                <h1 class="title">
                                                    <a class="inherit" href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
                                                        <?php the_title(); // Show the title of the posts as a link ?>
                                                    </a>
                                                </h1>
                                                <a class="" href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
                                                    Read Story
                                                </a>

                                                
                                            </article>

                                        <?php endwhile; //stop the posts loop once we've exhausted our query/number of posts ?>

                                    <?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
                                        
                                        <article class="post error">
                                            <h1>No videos with the tag <?php echo $current_tag ?> yet.</h1>
                                        </article>

                                    <?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
                                <?php // Reset Query
                                    wp_reset_query(); ?>
                            </div> <!-- .row -->
                        </div> <!-- .col-lg-10 -->
                    </div> <!-- .row -->
                </div> <!-- .container -->
            </section> <!-- section.tag-watch.bg-greyDark -->
            <section class="tag-read">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array( 'category_name' => 'editorial', 'tag' => $current_tag, 'showposts' => 10, 'paged' => $paged );
                            query_posts( $args );
                            if ( have_posts() ) : 
                            // Do we have any posts in the databse that match our query?
                            // In the case of the home page, this will call for the most recent posts 
                            ?>

                                <?php while ( have_posts() ) : the_post(); 
                                // If we have some posts to show, start a loop that will display each one the same way
                                ?>

                                    <article class="read-post row <?php 
                                                        $categories = get_the_category();
                                                        if ( ! empty( $categories ) ) {
                                                            $postCategory = $categories[0]->name ;
                                                            $postCategory = preg_replace('/\s+/', '', $postCategory);   
                                                            echo $postCategory;
                                                        }
                                                    ?>
                                                ">
                                                <?php
                                                $main_image = get_field('main_image');
                                                // if($main_image)
                                                // {
                                                //  echo '<ul>';

                                                //  foreach($main_image as $value)
                                                //  {
                                                //      echo '<li>' . $value . '</li>';
                                                //  }

                                                //  echo '</ul>';
                                                // }

                                                // // always good to see exactly what you are working with
                                                // var_dump($main_image);
                                                ?>
                                                <div class="post--img col-md-4">
                                                    <img class="img-responsive" src="<?php echo $main_image['url'] ?>" alt="<?php the_title(); ?>" />
                                                </div>
                                                <div class="post--details col-md-8">
                                                    <div class="post--details--inner">

                                                        <div class="tags">
                                                            <?php if($postCategory != 'Sponsored'): //display "sponsored" tag on sponsored content, tags on all other content
                                                            ?>
                                                            <?php 
                                                                    echo get_the_tag_list( '', ', &nbsp;' ); // Display the tags this post has, as links separated by spaces and commas 
                                                            ?>
                                                            <?php else: ?>
                                                                <a href="#">SPONSORED</a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <h1 class="title">
                                                            <a class="inherit" href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
                                                                <?php the_title(); // Show the title of the posts as a link ?>
                                                            </a>
                                                        </h1>
                                                        
                                                        <div class="post--meta">
                                                            <div class="post--author"><a href="#"><?php the_author(); ?></a></div>
                                                            <?php the_time('m/d/Y'); // Display the time published ?> 
                                                            
                                                        
                                                        </div><!--/post-meta -->
                                                        
                                                        <div class="the-content">
                                                            <?php
                                                                $content = get_the_content();
                                                                echo substr($content, 0, 220);
                                                            ?>... 
                                                            <a class="" href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
                                                                Read More
                                                            </a>

                                                            <?php //the_content( 'Continue...' ); 
                                                            // This call the main content of the post, the stuff in the main text box while composing.
                                                            // This will wrap everything in p tags and show a link as 'Continue...' where/if the
                                                            // author inserted a <!-- more --> link in the post body
                                                            ?>
                                                            
                                                            <?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
                                                        </div><!-- the-content -->
                                        
                                                        
                                                        <div class="category"><?php //echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
                                                    </div><!-- .post-details--inner -->
                                                </div> <!-- .post-details-->
                                                    
                                                </article>

                                <?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
                                
                                <!-- pagintation -->
                                <div id="pagination" class="clearfix">
                                    <div class="past-page"><?php previous_posts_link( 'newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?></div>
                                    <div class="next-page"><?php next_posts_link( 'older' ); // Display a link to  older posts, if there are any, with the text 'older' ?></div>
                                </div><!-- pagination -->


                            <?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader  ?>
                                
                                <article class="post error">
                                    <h1>No articles with the tag <?php $current_tag ?> yet.</h1>
                                </article>

                            <?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
                            <?php wp_reset_query(); ?>
                        </div><!-- .col-lg-10 -->
                    </div> <!-- .row -->
                </div> <!-- .container -->
            </div> <!-- section.tag-read -->
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
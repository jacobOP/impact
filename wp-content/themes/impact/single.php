<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<div class="container">
	<div id="primary" class="row">
		<div id="content" role="main" class="col-md-12 col-lg-10 col-lg-offset-1">
				
				<?php if ( have_posts() ) : 
				// Do we have any posts in the databse that match our query?
				?>

					<?php while ( have_posts() ) : the_post(); 
					// If we have a post to show, start a loop that will display it
					?>
						<?php
						$posttags = get_the_tags();
						$postids_str = '';
						if ($posttags) {
						  foreach($posttags as $tag) {
						    $postids_str .=  strval($tag->term_id) .',';
						  }
						  $postids_str = rtrim($postids_str, ",");
						}
						?>
						<article class="post single-post row">
							<div class="col-sm-8">
								<h1 class="title"><?php the_title(); // Display the title of the post ?></h1>
								<div class="post-meta flex">
									<div class="post-meta--author">
										By <?php the_author(); ?>
									</div>
									<div class="post-meta--date">
										<?php the_time('m.d.Y'); // Display the time it was published ?>							
									</div>
								</div><!--/post-meta -->
								<div class="post-meta-2 sm-flex">
									<div class="single-post--tags tags flex">
										<?php
											$posttags = get_the_tags();
											if ($posttags) {
											  // http://localhost:8888/impact/tag/fear/
											  foreach($posttags as $tag) {
											  	$taglink = get_site_url() . '\/tag/' . $tag->name . '/';
											    echo '<a href="' . $taglink . '" class="el el-medium el-hoverable"><div class="el--name">' . $tag->name . '</div><div class="el--symbol">' . substr($tag->name, 0, 1) . '</div></a>';
											  }
											}
											?>
									</div>
									<div class="social-icons" >
						                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=574');return false;" target="_blank" title="Share this article on Facebook" data-tar="Facebook">
						                    <img src="<?php bloginfo('template_url') ?>/img/social/facebook.svg" class="svg" alt="Share on Facebook" onerror="this.src='img/social/facebook-icon.png'; this.onerror=null;">
						                </a>
						                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;via=Impact&amp;text=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share this article on Twitter" data-tar="Twitter">
						                    <img class="svg" src="<?php bloginfo('template_url') ?>/img/social/twitter.svg" alt="Share on Twitter" onerror="this.src='img/social/twitter-icon.png'; this.onerror=null;">
						                </a>
						               <!--  <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
						                onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;"
						                target="_blank" title="Share this article on Google+">
						                    <img class="svg" src="/img/social/googleplus.svg" alt="Share on Google Plus" onerror="this.src='img/social/google-plus-icon.png'; this.onerror=null;">
						                </a> -->
						                <a href="//www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=850,width=900');return false;" title="Share this article on Reddit">
						                    <img class="svg" src="<?php bloginfo('template_url') ?>/img/social/reddit.svg" alt="Share on Reddit" onerror="this.src='img/social/reddit-icon.png'; this.onerror=null;">
						                </a>
						             <!--    <a href="http://www.stumbleupon.com/submit?url=http://www.outerplaces.com/science-fiction/item/12554-roland-emmerich-s-next-space-bound-blockbuster-fast-tracked-at-universal&amp;title=Roland Emmerich's Next Space Opera &quot;Moonfall&quot; Fast-Tracked at Universal" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=716,width=1024');return false;" title="Share this article on StumbleUpon" data-tar="StumbleUpon">
						                    <img class="svg" src="/img/social/stumble.svg" alt="Share on StumbleUpon" onerror="this.src='img/social/stumble-upon-icon.png'; this.onerror=null;">
						                </a> -->
						            </div>
								</div>
							</div>
							<div class="col-sm-8 ">
								<?php if (has_category('video')): ?>
									<div class="single-post--video video-container">
										<?php echo wp_oembed_get( get_field( 'youtube_link' ) ); ?>
									</div>
								<?php else: ?>
									<?php $main_image = get_field('main_image'); ?>
									<img src="<?php echo $main_image['url']; ?>" class="img-responsive single-post--img">
								<?php endif; ?>
								<div class="the-description">
									<p><?php the_field('description');  ?></p>
								</div>
								<div class="the-content">
									<?php the_content(); 
									// This call the main content of the post, the stuff in the main text box while composing.
									// This will wrap everything in p tags
									?>
									
									<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
								</div><!-- the-content -->
								
								<div class="meta clearfix">
									<div class="category"><?php //echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
									<div class="banner">
										<div class="banner-container">
											ad banner container
										</div>
									</div>
								</div><!-- Meta -->
								<?php
									// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
									if ( comments_open() || '0' != get_comments_number() )
										comments_template( '', true );
								?>
							</div>


							<div id="article-sidebar" class="sidebar col-sm-4">
								<section class="sidebar--related-videos">
									<div class="sidebar-section-header">
										Related Videos
									</div>
									<?php
								
									global $wp_query;
									        $args = array(
									        'category_name' => 'video', 
									        'tag__in' => $postids_str, //must use tag id for this field
									        'posts_per_page' => 2); //get all posts

									$posts = get_posts($args);
									    foreach ($posts as $post) : ?>
									  		<a href="<?php the_permalink(); ?>" class="related-video">
									  			<div class="related-video--title">
									  				<?php the_title(); ?>
									  			</div>
									  			<?php $main_image = get_field('main_image'); ?>
									  			<div class="related-video--img" style="background-image:url(<?php echo $main_image['url'] ?>)">
													<img src="<?php bloginfo('template_url') ?>/img/video-play-button.png" alt="play button" class="img-responsive play-button">
									  			</div>
									  		</a>
									 	<?php endforeach;
									
									// Reset Query
									wp_reset_query();
									?>
								</section>
								<section class="sidebar--related-articles">
									<div class="sidebar-section-header">
										Related Articles
									</div>
									<?php
									global $wp_query;
									        $args = array(
									        'category_name' => 'editorial', 
									        'tag__in' => $postids_str, //must use tag id for this field
									        'posts_per_page' => 4); //get all posts

									$posts = get_posts($args);
									    foreach ($posts as $post) : ?>
									  		<a href="<?php the_permalink(); ?>" class="related-editorial flex">
									  			<?php $main_image = get_field('main_image'); ?>
									  			<div class="related-editorial--img" style="background-image:url(<?php echo $main_image['url'] ?>)">
									  			</div>
									  			<div class="related-editorial--title">
									  				<?php the_title(); ?>
									  			</div>
									  		</a>
									 	<?php endforeach;
										// Reset Query
										wp_reset_query();
									?>
									<img src="<?php bloginfo('template_url') ?>/img/sponsor-ad-174x145.jpg" alt="Sponsor" class="img-responsive ">

								</section>
							</div> <!-- #article-sidebar -->
						</article>

					<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
					
					


				<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
					
					<article class="post error">
						<h1 class="404">Nothing has been posted like that yet</h1>
					</article>

				<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
				
		</div><!-- #content  -->
		
	</div><!-- #primary .row -->
</div> <!-- .container -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>

<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</main><!-- / end page container, begun in the header -->

<footer class="site-footer">
	<div class="site-footer--top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
            		<p>Follow Us</p>
                    <div class="site-footer--social">
                        <a href="https://www.facebook.com/actionondemand/" target="_blank">
                            <img src="<?php bloginfo('template_url') ?>/img/social/facebook.svg" class="svg" alt="Follow us on Facebook">
                        </a>
                        <a href="#" target="_blank">
                            <img class="svg" src="<?php bloginfo('template_url') ?>/img/social/twitter.svg" alt="Follow us on Twitter">
                        </a>
                    </div>
                </div>
            </div>
        </div>
	</div><!-- .site-footer--social -->
    <div class="site-footer--bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 md-flex">
                    <a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home" class="site-footer--logo">
                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/impact/img/logo.jpg" alt="IMPACT - Action on Demand" class="img-responsive">
                    </a>
                    <nav>
                        <ul>
                            <li><a href="<?php echo get_site_url(); ?>/about/">About Us</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/contact-us/">Contact Us</a></li>
                            <li><a href="<?php echo get_site_url(); ?>#">Site Map</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/terms-and-conditions/">Terms and Conditions</a></li>
                            <li><a href="<?php echo get_site_url(); ?>/privacy-policy/">Privacy Policy</a></li>
                        </ul>
                    </nav>
                    <p class="site-footer--copyright">
                        &copy; COPYRIGHT 2016 IMPACT. ALL RIGHTS RESERVED
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80423155-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>

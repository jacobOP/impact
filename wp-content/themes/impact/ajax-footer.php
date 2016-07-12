    <script>
        jQuery(document).ready(function(){
            var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
            var page = 1; // What page we are on.
            var ppp = 3; // Post per page

            jQuery("#more_posts").on("click",function(){ // When btn is pressed.
                jQuery("#more_posts").attr("disabled",true); // Disable the button, temp.
                jQuery.post(ajaxUrl, {
                    action:"more_post_ajax",
                    offset: (page * ppp) + 1,
                    ppp: ppp
                }).success(function(posts){
                    if (!posts){
                        console.log('false');
                        jQuery('.js_more-posts-container').html('<p style="text-align:center">No more articles to display</p>');
                    } else {
                         page++;
                        jQuery(".js_insert_more_posts").append(posts); // CHANGE THIS!
                        jQuery("#more_posts").attr("disabled",false);
                    }
                   
                });
           });
        });
    </script>
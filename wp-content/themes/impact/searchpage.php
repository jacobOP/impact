<?php
/*
Template Name: Search Page
*/

get_header();
?>
<section class="container">
    <div class="row">
        <div class="col-xs-12">
            <script>
              (function() {
                var cx = '018190980763536669089:ypj54jljwma';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
              })();
            </script>
            <gcse:searchresults-only></gcse:searchresults-only>
        </div>
    </div>
</section>


<?php get_footer(); ?>
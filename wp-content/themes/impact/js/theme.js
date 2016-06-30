// fitvids to make all videos full width http://fitvidsjs.com/  
// (function(e) {
//     "use strict";
//     e(function() { e(".the-content").fitVids() })
// })(jQuery);

//using jQuery instead of jQuery

var styleFirstWord = function(string){
    var styled = '';
    if(string.length > 0){
        var split = string.split(' ');
        for (var i = 0 ; i < split.length; i++) {
            if (i === 0) {
                styled += '<span class="first-word">' + split[i] + '</span> ';
            } else {
                styled += split[i] + ' ';
            }
        }
    }
    return styled;
};


jQuery('document').ready(function(){
    //style the first word of the asskicker of the week
    var assKickerTitle = jQuery('.js_asskicker--name').attr('data-name');
    jQuery('.js_asskicker--name a').html(styleFirstWord(assKickerTitle));

    //click handler for showing/hiding periodic info. all of this needs to be rewritten to handle state better 
    jQuery('.js_el').each(function(){
        jQuery(this).on('click', function(){
            console.log('clicked');
            console.log(jQuery(this));
            if ( jQuery(this).hasClass('el-active') ) {
                console.log('was active');
                jQuery(this).removeClass('el-active');
                jQuery('.js_periodic--info').addClass('hidden');
            } else {
                console.log('was not active');
                jQuery('.js_el').removeClass('el-active');
                jQuery(this).addClass('el-active');
                jQuery('.js_periodic--info').removeClass('hidden');
            }
        });
    });

    jQuery('.js_periodic--info').on('click', function(){
        jQuery(this).addClass('hidden');
        jQuery('.js_el').removeClass('el-active').blur();
    });

    if (jQuery(document).width() >= 768) {
        console.log('its biiiiig');
        jQuery('.js_hydrogen').click();
    }

});


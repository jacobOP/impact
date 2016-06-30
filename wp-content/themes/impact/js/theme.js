// fitvids to make all videos full width http://fitvidsjs.com/  
// (function(e) {
//     "use strict";
//     e(function() { e(".the-content").fitVids() })
// })(jQuery);

//using jQuery instead of $

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
});


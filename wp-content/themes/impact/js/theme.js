// fitvids to make all videos full width http://fitvidsjs.com/  
// (function(e) {
//     "use strict";
//     e(function() { e(".the-content").fitVids() })
// })(jQuery);

//using jQuery instead of jQuery

var impactTags = [
    // {name: "Fail", symbol: "F"},
    // {name: "Wild", symbol: "W"},
    // {name: "Funny", symbol: "Fu"},
    // {name: "Tech", symbol: "Te"},
    // {name: "Old School", symbol: "Os"},
    // {name: "Hero", symbol: "H"},
    // {name: "Evil", symbol: "Ev"},
    // {name: "Gore", symbol: "G"},
    // {name: "Martial Arts", symbol: "Ma"},
    // {name: "Explosions", symbol: "Ex"},
    // {name: "Weapons", symbol: "W"},
    // {name: "Destruction", symbol: "De"},
    // {name: "Adventure", symbol: "Ad"},
    // {name: "Westerns", symbol: "We"},
    // {name: "Car Chase", symbol: "Cc"},
    // {name: "Wreck", symbol: "Wr"},
    // {name: "Testosterone", symbol: "T"},
    // {name: "Adrenaline", symbol: "Ad"},
    // {name: "Kick Ass", symbol: "F"},
    // {name: "Fail", symbol: "F"},
    "WTF",
    "Wild",
    "Funny",
    "Tech",
    "Old School",
    "Hero ",
    "Evil ",
    "Gore ",
    "Martial Arts  ",
    "Explosions",
    "Weapons ",
    "Destruction ",
    "Adventure",
    "Westerns ",
    "Car Chase ",
    "Wreck ",
    "Testosterone ",
    "Adrenaline ",
    "Kick Ass ",
    "Action ",
    "Military",
    "Collision ",
    "Burn",
    "Speed",
    "Fight ",
    "Suspense",
    "Police ",
    "Danger ",
    "Violence",
    "Covert ",
    "Skills ",
    "War ",
    "Pain",  
    "Pain",  
    "Pain",
    "Pain",
];


jQuery('document').ready(function(){
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

    //put the right stuff in the element blocks;
    var renderElements = function(){
        var i = 0;
        jQuery('.js_el').each(function(){
            var tagName = impactTags[i];
            if (tagName.length <= 5) {
                var tagSymbol = tagName.substring(0,1);
            } else {
                var tagSymbol = tagName.substring(0,2);
            };
            jQuery(this).children('.el--name').text(tagName);
            jQuery(this).children('.el--symbol').text(tagSymbol);
            jQuery(this).attr('data-tag', tagName);
            i += 1;
        });
    };

    var updatePeriodicInfo = function(tag){
        jQuery('.js_periodic--info .el--name').text(tag);  
        if (tag.length < 5) {
            var tagSymbol = tag.substring(0,1);
        } else {
            var tagSymbol = tag.substring(0,2);
        };
        jQuery('.js_periodic--info .el--symbol').text(tagSymbol);
        tag = tag.trim();
        tag = tag.replace(' ', '-');
        jQuery('.js_periodic--info').attr('href','http://www.outerplaces.com/Kzvp8m2wAdvmgH/impact/tag/' + tag + '/');
    }

    //style the first word of the asskicker of the week
    var assKickerTitle = jQuery('.js_asskicker--name').attr('data-name');
    jQuery('.js_asskicker--name a').html(styleFirstWord(assKickerTitle));


    //periodic table stuff
    if (jQuery(document).width() >= 768) {

        renderElements();
        
        jQuery('.js_el').each(function(){
            //click handlers
            jQuery(this).on('click', function(){

                if ( !jQuery(this).hasClass('el-active') ) {
                    var thisTag = jQuery(this).attr('data-tag');
                    updatePeriodicInfo(thisTag);
                    jQuery('.js_el').removeClass('el-active');
                    jQuery(this).addClass('el-active');
                }
            });
        });

        //attach  click handler that hin
        // jQuery('.js_periodic--info').on('click', function(){
        //     jQuery(this).addClass('hidden');
        //     jQuery('.js_el').removeClass('el-active').blur();
        // });

        jQuery('.js_periodic').removeClass('loading');

        //lets show the first element's info block by default
        jQuery('.js_hydrogen').click();
    } else {
        //lets do the mobile layout stuff
        
    }

});


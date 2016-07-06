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

    //bucket 1
    "Reality",
    "Fail",
    "Funny",
    "Wild",
    "Hero",
    "Adrenaline",

    //bucket 2
    "Tech",
    "Speed",
    "Car Chase" ,
    "Burn",
    "Collision",
    "Wreck",

    //bucket 3
    "WTF",
    "Gore",
    "Destruction",
    "Explosions",
    "Pain",
    "Danger" ,

    //bucket 4
    "Fight",
    "Violence",
    "Martial Arts"  ,
    "Kick Ass" ,
    "Evil" ,
    "Testosterone" ,

    //bucket 5
    "Action ",
    "Old School",
    "Skills ",
    "Suspense",
    "Adventure",
    "Westerns ",

    //bucket 6
    "Military",
    "Covert ",
    "Police ",
    "Weapons ",
    "War ",
    "Riot"  
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

    var getTagSymbol = function(tagName){
        if (tagName.length <= 5) {
            return tagName.substring(0,1);
        } else {
            return tagName.substring(0,2);
        };
    }

    //put the right stuff in the element blocks;
    var renderElements = function(){
        var i = 0;
        jQuery('.js_el').each(function(){
            var tagName = impactTags[i];
            var tagSymbol = getTagSymbol(tagName);
            jQuery(this).children('.el--name').text(tagName);
            jQuery(this).children('.el--symbol').text(tagSymbol);
            jQuery(this).attr('data-tag', tagName);
            //remove loading class
            i += 1;
        });
    };

    var renderElementsXS = function (){
        //store the reference to js_periodic in a var
        var table = jQuery('.js_periodic');

        //replace html with the supertag rows
        table.html('<div class="js_supertag-row supertag-row js_supertag-row-1 supertag-row-1 flex"></div><div class="supertag-row-expanded supertag-row-expanded-1 js_supertag-row-1-expanded"></div><div class="js_supertag-row supertag-row js_supertag-row-2 supertag-row-2 flex"></div><div class="supertag-row-expanded supertag-row-expanded-2 js_supertag-row-2-expanded">');

        //build the tag groups
        for (var i = 1; i <= 6; i++) {
            if (i <= 3){
                jQuery('.js_supertag-row-1').append('<div class="el el-large el-hoverable el-supertag js_el-supertag taggroup-' + i + ' js_taggroup-' + i + '" data-target="js_bucket-' + i + '"><div class="el--name">Group ' + i + '</div><div class="el--symbol">' + i + '</div></div>');  
                jQuery('.js_supertag-row-1-expanded').append('<div class="bucket js_bucket bucket-' + i + ' js_bucket-' + i + ' hidden flex"></div>');
            } else {
                jQuery('.js_supertag-row-2').append('<div class="el el-large el-hoverable el-supertag js_el-supertag taggroup-' + i + ' js_taggroup-' + i + '" data-target="js_bucket-' + i + '"><div class="el--name">Group ' + i + '</div><div class="el--symbol">' + i + '</div></div>');  
                jQuery('.js_supertag-row-2-expanded').append('<div class="bucket js_bucket bucket-' + i + ' js_bucket-' + i + ' hidden flex"></div>');
            }
        };
          
        //add the regular tags
        for (i = 0; i < impactTags.length; i++){
            var tagSymbol = getTagSymbol(impactTags[i]);
            var elHTML = '<a href="/impact/tag/martial-arts/' + impactTags[i].replace(' ', '-') + '" class="js_el el el-hoverable"><div class="el--name">' + impactTags[i] + '</div><div class="el--symbol">' + tagSymbol + '</div></a>';

            var group1 = jQuery('.js_bucket-1'),
                group2 = jQuery('.js_bucket-2'),
                group3 = jQuery('.js_bucket-3'),
                group4 = jQuery('.js_bucket-4'),
                group5 = jQuery('.js_bucket-5'),
                group6 = jQuery('.js_bucket-6');
            //put them in the right bucket
            if (i < 6) {
                group1.append(elHTML);
            } else if (i < 12) {
                group2.append(elHTML);
            } else if (i < 18) {
                group3.append(elHTML);
            } else if (i < 24) {
                group4.append(elHTML);
            } else if (i < 30) {
                group5.append(elHTML);
            } else if (i <= 36 ) {
                group6.append(elHTML);
            }
        }

        //attach click handlers to supertags
        jQuery('.js_el-supertag').on('click', function(){
            if (jQuery(this).hasClass('el-active')) {
                jQuery('.js_el-supertag').removeClass('el-active');
                jQuery('.js_bucket').addClass('hidden');
            } else {
                jQuery('.js_el-supertag').removeClass('el-active');
                jQuery(this).addClass('el-active');
                jQuery('.js_bucket').addClass('hidden');
                jQuery('.' + jQuery(this).attr('data-target') ).removeClass('hidden');
            }
            
        });
    };

    var updatePeriodicInfo = function(tag){
        jQuery('.js_periodic--info .el--name').text(tag);  
        var tagSymbol = getTagSymbol(tag);
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

        //show the table
        jQuery('.js_periodic').removeClass('loading');

        //lets show the first element's info block by default
        jQuery('.js_hydrogen').click();
    } else {
        //lets do the mobile layout stuff
        renderElementsXS();
        jQuery('.js_periodic').removeClass('loading');
    }

});


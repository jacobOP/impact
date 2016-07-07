// fitvids to make all videos full width http://fitvidsjs.com/  
// (function(e) {
//     "use strict";
//     e(function() { e(".the-content").fitVids() })
// })(jQuery);

//using jQuery instead of jQuery

var impactTags = [
    //bucket 1
    {
        "name" : "Reality",
        "symbol" : "Re",
        "bucket" : 1
    },
    {
        "name" : "Fail",
        "symbol" : "F",
        "bucket" : 1
    },
    {
        "name" : "Funny",
        "symbol" : "Fn",
        "bucket" : 1
    },
    {
        "name" : "Wild",
        "symbol" : "W",
        "bucket" : 1
    },
    {
        "name" : "Hero",
        "symbol" : "H",
        "bucket" : 1
    },
    {
        "name" : "Adrenaline",
        "symbol" : "A",
        "bucket" : 1
    },

    //bucket 2
    {
        "name" : "Tech",
        "symbol" : "T",
        "bucket" : 2
    },
    {
        "name" : "Speed",
        "symbol" : "Sp",
        "bucket" : 2
    },
    {
        "name" : "Car Chase",
        "symbol" : "Cc",
        "bucket" : 2
    },
    {
        "name" : "Reality",
        "symbol" : "Re",
        "bucket" : 2
    },
    {
        "name" : "Collision",
        "symbol" : "Co",
        "bucket" : 2
    },
    {
        "name" : "Wreck",
        "symbol" : "Wr",
        "bucket" : 2
    },

    //bucket 3
    {
        "name" : "WTF",
        "symbol" : "W",
        "bucket" : 3
    },
    {
        "name" : "Gore",
        "symbol" : "G",
        "bucket" : 3
    },
    {
        "name" : "Destruction",
        "symbol" : "De",
        "bucket" : 3
    },
    {
        "name" : "Explosions",
        "symbol" : "Ex",
        "bucket" : 3
    },
    {
        "name" : "Pain",
        "symbol" : "P",
        "bucket" : 3
    },
    {
        "name" : "Danger",
        "symbol" : "D",
        "bucket" : 3
    },

    //bucket 4
    {
        "name" : "Fight",
        "symbol" : "F",
        "bucket" : 4
    },
    {
        "name" : "Violence",
        "symbol" : "V",
        "bucket" : 4
    },
    {
        "name" : "Martial Arts",
        "symbol" : "Ma",
        "bucket" : 4
    },
    {
        "name" : "Kick Ass",
        "symbol" : "Ka",
        "bucket" : 4
    },
    {
        "name" : "Evil",
        "symbol" : "E",
        "bucket" : 4
    },
    {
        "name" : "Testosterone",
        "symbol" : "Ts",
        "bucket" : 4
    },

    //bucket 5
    {
        "name" : "Action",
        "symbol" : "A",
        "bucket" : 5
    },
    {
        "name" : "Old School",
        "symbol" : "Os",
        "bucket" : 5
    },
    {
        "name" : "Skills",
        "symbol" : "Sk",
        "bucket" : 5
    },
    {
        "name" : "Suspense",
        "symbol" : "Su",
        "bucket" : 5
    },
    {
        "name" : "Adventure",
        "symbol" : "Av",
        "bucket" : 5
    },
    {
        "name" : "Westerns",
        "symbol" : "Ws",
        "bucket" : 5
    },

    //bucket 6
    {
        "name" : "Military",
        "symbol" : "M",
        "bucket" : 6,
    },
    {
        "name" : "Covert",
        "symbol" : "Cv",
        "bucket" : 6,
    },
    {
        "name" : "Police",
        "symbol" : "Po",
        "bucket" : 6,
    },
    {
        "name" : "Weapons",
        "symbol" : "Wp",
        "bucket" : 6,
    },
    {
        "name" : "War",
        "symbol" : "Wa",
        "bucket" : 6,
    },
    {
        "name" : "Riot",
        "symbol" : "R",
        "bucket" : 6,
    },
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

    //putting all the periodic table fxns into an object so they're namespaced away. Still storing state in the DOM because its simple and I'm a little lazy
    var pt = {
        processTagName : function(tagName){
            if (tagName.length > 9){
                return '<span class="el--name--sm">' + tagName + '</span>'
            } else {
                return tagName;
            };
        },

        // getTagSymbol : function(tagName){
        //     if (tagName.length <= 5) {
        //         return tagName.substring(0,1);
        //     } else {
        //         return tagName.substring(0,2);
        //     };
        // },

        //put the right stuff in the element blocks;
        renderElements : function(){
            var i = 0;
            jQuery('.js_el').each(function(){
                var tagName = pt.processTagName(impactTags[i].name)

                var tagSymbol = impactTags[i].symbol;

                jQuery(this).children('.el--name').html('');
                jQuery(this).children('.el--name').html(tagName);
                jQuery(this).children('.el--symbol').text(tagSymbol);
                jQuery(this).attr('data-tag', impactTags[i].name);
                //remove loading class
                i += 1;
            });
        },

        renderElementsXS : function (){
            //replace html with the supertag rows
            jQuery('.js_periodic').html('<div class="js_supertag-row supertag-row js_supertag-row-1 supertag-row-1 flex"></div><div class="supertag-row-expanded supertag-row-expanded-1 js_supertag-row-1-expanded"></div><div class="js_supertag-row supertag-row js_supertag-row-2 supertag-row-2 flex"></div><div class="supertag-row-expanded supertag-row-expanded-2 js_supertag-row-2-expanded">');

            //add 6 supertags &  6 buckets 
            for (var i = 1; i <= 6; i++) {
                if (i <= 3){
                    jQuery('.js_supertag-row-1').append('<div class="el el-hoverable el-medium el-supertag js_el-supertag taggroup-' + i + ' js_taggroup-' + i + '" data-target="js_bucket-' + i + '"><div class="el--name">Group ' + i + '</div><div class="el--symbol">' + i + '</div></div>');  
                    jQuery('.js_supertag-row-1-expanded').append('<div class="bucket js_bucket bucket-' + i + ' js_bucket-' + i + ' hidden flex"></div>');
                } else {
                    jQuery('.js_supertag-row-2').append('<div class="el el-hoverable el-medium el-supertag js_el-supertag taggroup-' + i + ' js_taggroup-' + i + '" data-target="js_bucket-' + i + '"><div class="el--name">Group ' + i + '</div><div class="el--symbol">' + i + '</div></div>');  
                    jQuery('.js_supertag-row-2-expanded').append('<div class="bucket js_bucket bucket-' + i + ' js_bucket-' + i + ' hidden flex"></div>');
                }
            };
              
            //add the regular tags
            for (i = 0; i < impactTags.length; i++){
                var tagName = pt.processTagName(impactTags[i].name);
                var tagSymbol = impactTags[i].symbol;
                var elHTML = '<a href="' + window.location.pathname + '/tag/' + impactTags[i].name.replace(' ', '-') + '/" class="js_el el el-medium el-hoverable"><div class="el--name">' + tagName + '</div><div class="el--symbol">' + tagSymbol + '</div></a>';

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
        },

        updatePeriodicInfo : function(tag, tagSymbol){
            jQuery('.js_periodic--info .el--name').html(pt.processTagName(tag));  
            jQuery('.js_periodic--info .el--symbol').text(tagSymbol);
            tag = tag.trim();
            tag = tag.replace(' ', '-');
            jQuery('.js_periodic--info').attr('href','http://www.outerplaces.com/Kzvp8m2wAdvmgH/impact/tag/' + tag + '/');
        }

    };

    //style the first word of the asskicker of the week
    var assKickerTitle = jQuery('.js_asskicker--name').attr('data-name');
    jQuery('.js_asskicker--name a').html(styleFirstWord(assKickerTitle));


    //periodic table stuff
    if (jQuery(document).width() >= 768) {

        pt.renderElements();

        jQuery('.js_el').each(function(){
            //click handlers
            jQuery(this).on('click', function(){
                if ( !jQuery(this).hasClass('el-active') ) {
                    var thisTag = jQuery(this).attr('data-tag');
                    pt.updatePeriodicInfo(thisTag, jQuery(this).children('.el--symbol').text());
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
        pt.renderElementsXS();
        jQuery('.js_periodic').removeClass('loading');
    }

});


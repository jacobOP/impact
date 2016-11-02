// fitvids to make all videos full width http://fitvidsjs.com/  
// (function(e) {
//     "use strict";
//     e(function() { e(".the-content").fitVids() })
// })(jQuery);

//using jQuery instead of jQuery

var impactTags = [
    //bucket 1
    {
        "name" : "Life Skills",
        "symbol" : "Ls",
        "bucket" : 1
    },
    {
        "name" : "Fitness",
        "symbol" : "F",
        "bucket" : 1
    },
    {
        "name" : "Adventure",
        "symbol" : "Av",
        "bucket" : 1
    },
    {
        "name" : "Actionology",
        "symbol" : "Ay",
        "bucket" : 1
    },
    {
        "name" : "Feast",
        "symbol" : "Fe",
        "bucket" : 1
    },
    {
        "name" : "Testosterone",
        "symbol" : "Ts",
        "bucket" : 1
    },

    //bucket 2
    {
        "name" : "WTF",
        "symbol" : "W",
        "bucket" : 2
    },
    {
        "name" : "Nightmare Fuel",
        "symbol" : "Nf",
        "bucket" : 2
    },
    {
        "name" : "Beast Mode",
        "symbol" : "Bm",
        "bucket" : 2
    },
    {
        "name" : "Gore",
        "symbol" : "G",
        "bucket" : 2
    },
    {
        "name" : "Pain",
        "symbol" : "P",
        "bucket" : 2
    },
    {
        "name" : "Nail-Biters",
        "symbol" : "Nb",
        "bucket" : 2
    },

    //bucket 3
    {
        "name" : "Winning",
        "symbol" : "Wg",
        "bucket" : 3
    },
    {
        "name" : "Laughs",
        "symbol" : "L",
        "bucket" : 3
    },
    {
        "name" : "Girls",
        "symbol" : "Gs",
        "bucket" : 3
    },
    {
        "name" : "Kick Ass",
        "symbol" : "Ka",
        "bucket" : 3
    },
    {
        "name" : "Hero",
        "symbol" : "H",
        "bucket" : 3
    },
    {
        "name" : "Fail",
        "symbol" : "Fl",
        "bucket" : 3
    },

    //bucket 4
    {
        "name" : "Tech",
        "symbol" : "T",
        "bucket" : 4
    },
    {
        "name" : "Weapons",
        "symbol" : "Wp",
        "bucket" : 4
    },
    {
        "name" : "War",
        "symbol" : "Wa",
        "bucket" : 4
    },
    {
        "name" : "Motors",
        "symbol" : "Mo",
        "bucket" : 4
    },
    {
        "name" : "Military",
        "symbol" : "Mi",
        "bucket" : 4
    },
    {
        "name" : "Speed",
        "symbol" : "Sp",
        "bucket" : 4
    },

    //bucket 5
    {
        "name" : "Danger",
        "symbol" : "Dg",
        "bucket" : 5
    },
    {
        "name" : "Destruction",
        "symbol" : "Dn",
        "bucket" : 5
    },
    {
        "name" : "Explosions",
        "symbol" : "Ex",
        "bucket" : 5
    },
    {
        "name" : "Burn",
        "symbol" : "B",
        "bucket" : 5
    },
    {
        "name" : "Crime Time",
        "symbol" : "Ct",
        "bucket" : 5
    },
    {
        "name" : "Sports",
        "symbol" : "Sp",
        "bucket" : 5
    },

    //bucket 6
    {
        "name" : "Masters",
        "symbol" : "Ms",
        "bucket" : 6,
    },
    {
        "name" : "Adrenaline",
        "symbol" : "Ad",
        "bucket" : 6,
    },
    {
        "name" : "Fight",
        "symbol" : "Ft",
        "bucket" : 6,
    },
    {
        "name" : "Martial Arts",
        "symbol" : "Ma",
        "bucket" : 6,
    },
    {
        "name" : "Street Smarts",
        "symbol" : "Ss",
        "bucket" : 6,
    },
    {
        "name" : "Sports",
        "symbol" : "S",
        "bucket" : 6,
    },
];


jQuery('document').ready(function(){
    var siteSearch = function(){
        var term = document.getElementById('search-input').value;
        if (term) {
            window.location.href = 'http://' + window.location.hostname + '/Kzvp8m2wAdvmgH/impact/search/?search=&q=' + term;
        } else {
            console.log('no term');
        }
    }

    jQuery('.js_search-submit').on('click', function(){
        siteSearch();
    });

    jQuery("#search-input").keyup(function (e) {
        if (e.keyCode == 13) {
            siteSearch();
        }
    });

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

        renderTagPageElement : function(el, tag){
            for (var i = 0; i < impactTags.length; i++) {
                if (impactTags[i].name === tag) {
                    el.children('.el--symbol-container').children('.el--symbol').text(impactTags[i].symbol);
                }
            }
        },

        //put the right stuff in the element blocks;
        renderElements : function(){
            var i = 0;
            jQuery('.js_el').each(function(){
                var tagName = pt.processTagName(impactTags[i].name)

                var tagSymbol = impactTags[i].symbol;

                jQuery(this).attr('href', '/tag/' + impactTags[i].name.replace(' ', '-') + '/');
                jQuery(this).children('.el--name').html('');
                jQuery(this).children('.el--name').html(tagName);
                jQuery(this).children('.el--symbol-container').children('.el--symbol').text(tagSymbol);
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
                var supertags = [
                    ["Action", "A"],
                    ["WTF", "W"],
                    ["Adventure", "Av"],
                    ["Tech", "Te"],
                    ["Skills", "Sk"],
                    ["War", "Wa"],
                ];
                if (i <= 3){
                    jQuery('.js_supertag-row-1').append('<div class="el el-hoverable el-medium el-supertag js_el-supertag taggroup-' + i + ' js_taggroup-' + i + '" data-target="js_bucket-' + i + '"><div class="el--name">' + supertags[i-1][0] + '</div><div class="el--symbol">' + supertags[i-1][1] + '</div></div>');  
                    jQuery('.js_supertag-row-1-expanded').append('<div class="bucket js_bucket bucket-' + i + ' js_bucket-' + i + ' hidden flex"></div>');
                } else {
                    jQuery('.js_supertag-row-2').append('<div class="el el-hoverable el-medium el-supertag js_el-supertag taggroup-' + i + ' js_taggroup-' + i + '" data-target="js_bucket-' + i + '"><div class="el--name">' + supertags[i-1][0] + '</div><div class="el--symbol">' + supertags[i-1][1] + '</div></div>');  
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
            jQuery('.js_periodic--info .el--symbol-container .el--symbol').text(tagSymbol);
            tag = tag.trim();
            tag = tag.replace(' ', '-');
            //jQuery('.js_periodic--info').attr('href','http://www.outerplaces.com/Kzvp8m2wAdvmgH/impact/tag/' + tag + '/');
        }

    };

    //style the first word of the asskicker of the week
    var assKickerTitle = jQuery('.js_asskicker--name').attr('data-name');
    if (assKickerTitle){
        jQuery('.js_asskicker--name a').html(styleFirstWord(assKickerTitle));        
    };

    //periodic table stuff
    if (jQuery(document).width() >= 768) {

        pt.renderElements();

        jQuery('.js_el').each(function(){
            //events 
            jQuery(this).on('mouseover', function(){
                if ( !jQuery(this).hasClass('el-active') ) {
                    var thisTag = jQuery(this).attr('data-tag');
                    var thisSymbol = jQuery(this).children('.el--symbol-container').children('.el--symbol').text();
                    pt.updatePeriodicInfo(thisTag, thisSymbol);
                    jQuery('.js_el').removeClass('el-active');
                    jQuery(this).addClass('el-active');
                    var thisTagImage = impactTagsImages[thisTag];
                    if (typeof thisTagImage != 'undefined'){
                        jQuery('.js_periodic--info').css('background-image', 'url(' +thisTagImage+ ')');
                    }
                }
            });
        });

        //show the table
        jQuery('.js_periodic').removeClass('loading');

        //lets show the first element's info block by default
        jQuery('.js_hydrogen').trigger('mouseover');
    } else {
        //lets do the mobile layout stuff
        pt.renderElementsXS();
        jQuery('.js_periodic').removeClass('loading');
    };


    //fix the symbol on the tag element for tag pages
    if ( window.location.pathname.indexOf('tag') > -1 ) {
        var tagPageEl = jQuery('.js_tag-page-el');
        pt.renderTagPageElement(tagPageEl, tagPageEl.children('.el--name').text() );
    };

    //fix the symbol on the tag elements above articles
    if(jQuery('.js_single-post--tag').length){  
      jQuery('.js_single-post--tag').each(function(){
        var tag = jQuery(this).attr('data-tag');
        pt.renderTagPageElement(jQuery(this), tag );
      });
    }

});


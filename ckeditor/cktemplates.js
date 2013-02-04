/*
 Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
 */

// Register a templates definition set named "default".

var loremIpsum = 'Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.';
var loremImage = '<a href="http://placehold.it/1200x900.jpg"><img src="http://placehold.it/400x300.jpg" alt=""></a>';

CKEDITOR.addTemplates('default',
    {
        // The name of sub folder which hold the shortcut preview images of the
        // templates.
        imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates') + 'templates/images/'),

        // The templates definitions.
        templates:[
            {
                title:'Default',
                image:'',
                description:'Heading, paragraph, thumbnails, subheading, paragraph. HINT: Use a FancyBox Widget for zoomable thumbnails.',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<p>' + loremIpsum + '</p>' +
                    '<p>' + loremIpsum + loremIpsum + '</p>' +
                    '<div class="row-fluid">' +
                    '<ul class="thumbnails"> \
                        <li class="span4">'+loremImage+'</li> \
                        <li class="span2">'+loremImage+'</li> \
                        <li class="span2">'+loremImage+'</li> \
                      </ul>' +
                    '</div>'
            },
            {
                title:'Row full width, 33%-33%-33% columns with images',
                image:'',
                description:'span4 span4 span4',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<div class="row">' +
                    '<div class="span4"><p>'+loremImage+'</p><p>' + loremIpsum + '</p></div>' +
                    '<div class="span4"><p>'+loremImage+'</p><p>' + loremIpsum + '</p></div>' +
                    '<div class="span4"><p>'+loremImage+'</p><p>' + loremIpsum + '</p></div>' +
                    '</div>'
            },
            {
                title:'Row full width, 50%-50% columns',
                image:'',
                description:'span6 span6',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<div class="row">' +
                    '<div class="span6"><p>' + loremIpsum + '</p></div>' +
                    '<div class="span6"><p>' + loremIpsum + '</p></div>' +
                    '</div>'

            },
            {
                title:'Row full width, 66%-33% columns',
                image:'',
                description:'span8 span4',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<div class="row">' +
                    '<div class="span8"><p>' + loremIpsum + '</p></div>' +
                    '<div class="span4"><p>' + loremIpsum + '</p></div>' +
                    '</div>'
            },
            {
                title:'Row full width, 33%-66% columns',
                image:'',
                description:'span4 span8',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<div class="row">' +
                    '<div class="span4"><p>' + loremIpsum + '</p></div>' +
                    '<div class="span8"><p>' + loremIpsum + '</p></div>' +
                    '</div>'
            },
            {
                title:'Row full width, 25%-25%-25%-25% columns',
                image:'',
                description:'span3 span3 span3 span3',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<div class="row">' +
                    '<div class="span3"><p>' + loremIpsum + '</p></div>' +
                    '<div class="span3"><p>' + loremIpsum + '</p></div>' +
                    '<div class="span3"><p>' + loremIpsum + '</p></div>' +
                    '<div class="span3"><p>' + loremIpsum + '</p></div>' +
                    '</div>'
            },
            {
                title:'Row 3/4 width, one column',
                image:'',
                description:'span10',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<div class="row">' +
                    '<div class="span10"><p>' + loremIpsum + '</p></div>' +
                    '</div>'
            },
            {
                title:'Row 2/3 width, 50%-50% columns',
                image:'',
                description:'span4 span4',
                html:'<h2>' + loremIpsum.substr(0, 20) + '</h2>' +
                    '<div class="row">' +
                    '<div class="span4"><p>' + loremIpsum + '</p></div>' +
                    '<div class="span4"><p>' + loremIpsum + '</p></div>' +
                    '</div>'
            }

        ]
    });

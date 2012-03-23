/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

// Register a templates definition set named "default".

var loremIpsum = 'Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.';

CKEDITOR.addTemplates( 'default',
{
    // The name of sub folder which hold the shortcut preview images of the
    // templates.
    imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

    // The templates definitions.
    templates :
    [
    {
	title: 'Default',
	image: '',
	description: 'Heading, paragraph, thumbnails, subheading, paragraph. Hint: Use a FancyBox Widget for zoomable thumbnails.',
	html: '<h2>' + loremIpsum.substr(0, 20)+'</h2>' +
	'<p>'+loremIpsum+'</p>'+
	'<ul class="thumbnails"> \
        <li class="span4"> \
          <a href="#" class="thumbnail"> \
            <img src="http://placehold.it/360x268" alt=""> \
          </a> \
        </li> \
        <li class="span2"> \
          <a href="#" class="thumbnail"> \
            <img src="http://placehold.it/160x120" alt=""> \
          </a> \
        </li> \
        <li class="span2"> \
          <a href="#" class="thumbnail"> \
            <img src="http://placehold.it/160x120" alt=""> \
          </a> \
        </li> \
      </ul>' +
	'<h3>' +loremIpsum.substr(20, 32)+'</h3>' +	
	'<p>'+loremIpsum+'</p>'

    },
    {
	title: 'Default without images',
	image: '',
	description: 'Heading, paragraph, thumbnails, subheading, paragraph. Hint: Use a FancyBox Widget for zoomable thumbnails.',
	html: '<h2>' + loremIpsum.substr(0, 20)+'</h2>' +
	'<p>'+loremIpsum+'</p>'+	
	'<h3>' +loremIpsum.substr(20, 32)+'</h3>' +	
	'<p>'+loremIpsum+loremIpsum+loremIpsum+'</p>'

    },
    {
	title: 'Row full width, 50%-50% columns',
	image: '',
	description: 'span6 span6',
	html: '<div class="row"><div class="span6"><p>'+loremIpsum+'</p></div><div class="span6 last"><p>'+loremIpsum+'</p></div></div>'
    },
    {
	title: 'Row full width, 66%-33% columns',
	image: '',
	description: 'span8 span4',
	html: '<div class="row"><div class="span8"><p>'+loremIpsum+'</p></div><div class="span4 last"><p>'+loremIpsum+'</p></div></div>'
    },
    {
	title: 'Row full width, 33%-66% columns',
	image: '',
	description: 'span4 span8',
	html: '<div class="row"><div class="span4"><p>'+loremIpsum+'</p></div><div class="span8 last"><p>'+loremIpsum+'</p></div></div>'
    },
    {
	title: 'Row full width, 33%-33%-33% columns',
	image: '',
	description: 'span4 span4 span4',
	html: '<div class="row"><div class="span4"><p>'+loremIpsum+'</p></div><div class="span4"><p>'+loremIpsum+'</p></div><div class="span4 last"><p>'+loremIpsum+'</p></div></div>'
    },
    {
	title: 'Row full width, 25%-25%-25%-25% columns',
	image: '',
	description: 'span3 span3 span3 span3',
	html: '<div class="row"><div class="span3"><p>'+loremIpsum+'</p></div><div class="span3"><p>'+loremIpsum+'</p></div><div class="span3"><p>'+loremIpsum+'</p></div><div class="span3 last"><p>'+loremIpsum+'</p></div></div>'
    },
    {
	title: 'Row 3/4 width, one column',
	image: '',
	description: 'span10',
	html: '<div class="row"><div class="span10"><p>'+loremIpsum+'</p></div></div>'
    },
    {
	title: 'Row 2/3 width, 50%-50% columns',
	image: '',
	description: 'span4 span4',
	html: '<div class="row"><div class="span4"><p>'+loremIpsum+'</p></div><div class="span4 last"><p>'+loremIpsum+'</p></div></div>'
    }

    ]
});

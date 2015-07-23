<?php
add_action( 'after_setup_theme', 'indoor_setup' );

function indoor_setup() {
	/*
	 * Registers a new image size
	 * 1. parameter  - name of the image size
	 * 2. parameter - picture width
	 * 3. parameter - picture height
	 * 4. parameter - crop (true or false)
	 * 
	 * uncomment the line if you want to use it
	 */
	add_image_size('slider', 920, 398, true);
	
	/*
	 * activate the blank_meta function
	 */
	//add_action('xtreme_meta', 'indoor_meta');
	
	// This theme allows users to set a custom background
	// ATTENTION: WordPress 3.4 deprecates some functions, thatswhy this test
	if ( version_compare( $GLOBALS['wp_version'], '3.4a', '>=' ) ) {
		add_theme_support( 'custom-background', array() );
	} else {
		add_custom_background();
	}
	/* change the size of the post thumnail in loop */
	add_filter( 'xtreme_loop_thumbnail_size', 'indoor_thumbnail_size' );
}

/**
 * Enable subtitle for posts, pages and custom post types
 */
add_theme_support('xtreme-subtitles', array( 'post', 'page' ) );

add_theme_support('xtreme-advanced-wpgallery');

add_theme_support('xtreme-fancybox', 
	array(
		'compatibility' => array(			// define the compatibility layer for already existing image viewer markup at content
			'autodetect',					// all <a> tags where href references an image
			'gallery',						// WordPress build in galleries (class="gallery")
			'fancybox',						// FancyBox itself (class="fancybox" rel="?????")
			'colorbox',						// colorbox.js (class="colorbox-?????")
			'highslide',					// HighSlide - experimental (class="highslide")
			'thickbox',						// Thickbox (class="thickbox" rel="?????")
			'shutter',						// Shutter Reloaded (class="shutter" | class="shutterset_?????")
			'lightbox',						// LigthBox - any type (rel="lightbox[?????]")
			'prettyphoto',					// PrettyPhoto (rel="prettyPhoto[?????]")
			'shadowbox'						// ShadowBox (rel="shadowbox[?????]")
		), 
		'posttypes' => array(				// define the supported post types
			'post',							// supporting any post
			'page'							// supporting any page
		),	
		'archives' => array(				// define the supported archive post types, if you have full content at archives
			//'post'						// supporting any post archive
		), 
		'specials' => array(				// define special behavoir
			'gallery' => true,				// automatic processing WordPress galleries
			'frontpage' => false			// process frontpage too because of full content display?
		),
		'options' => array (
			'padding' => 10,				// Space between FancyBox wrapper and content (default: 10)
			'margin' => 60,					// Space between viewport and FancyBox wrapper (default: 40)
			'opacity' => true,				// When true, transparency of content is changed for elastic transitions (default: false)
			'modal' => false,				// When true, 'overlayShow' is set to 'true' and 'hideOnOverlayClick', 'hideOnContentClick', 'enableEscapeButton', 'showCloseButton' are set to 'false'
			'cyclic' => false,				// When true, galleries will be cyclic, allowing you to keep pressing next/back.
			'scrolling' => 'auto',			// Set the overflow CSS property to create or hide scrollbars. Can be set to 'auto', 'yes', or 'no'
			'width' => 560,					// Width for content types 'iframe' and 'swf'. Also set for inline content if 'autoDimensions' is set to 'false'
			'height' => 340,				// Height for content types 'iframe' and 'swf'. Also set for inline content if 'autoDimensions' is set to 'false'
			'autoScale' => true,			// If true, FancyBox is scaled to fit in viewport
			'autoDimensions' => true,		// For inline and ajax views, resizes the view to the element recieves. Make sure it has dimensions otherwise this will give unexpected results
			'centerOnScroll' => false,		// When true, FancyBox is centered while scrolling page
			'hideOnOverlayClick' => true,	// Toggle if clicking the overlay should close FancyBox
			'hideOnContentClick' => false,	// Toggle if clicking the content should close FancyBox
			'overlayShow' => true,			// Toggle overlay
			'overlayOpacity' => 0.3,			// Opacity of the overlay (from 0 to 1; default - 0.3)
			'overlayColor' => '#666',		// Color of the overlay
			'titleShow' => true,			// Toggle title
			'titlePosition' => 'over',		// The position of title. Can be set to 'float', 'outside', 'inside' or 'over'
			'transitionIn' => 'elastic',	// The transition type. Can be set to 'elastic', 'fade' or 'none'
			'transitionOut' => 'elastic',	// The transition type. Can be set to 'elastic', 'fade' or 'none'
			'speedIn' => 300,				// Speed of the fade and elastic transitions, in milliseconds
			'speedOut' => 300,				// Speed of the fade and elastic transitions, in milliseconds
			'changeSpeed' => 300,			// Speed of resizing when changing gallery items, in milliseconds
			'changeFade' => 'notmal',		// Speed of the content fading while changing gallery items
			'easingIn' => 'swing',			// Easing used for elastic animations
			'easingOut' => 'swing',			// Easing used for elastic animations
			'showCloseButton' => true,		// Toggle close button
			'showNavArrows' => true,		// Toggle navigation arrows
			'enableEscapeButton' => true	// Toggle if pressing Esc button closes FancyBox
		)
	)
);


/**
 * Return the Thumbnail size
 * 
 * @param  String
 */
function indoor_thumbnail_size() {
	
	return 'medium';
}

/*
 * Add your meta data. Change it to your need.
 * 
 * @return  void
 */
function indoor_meta() {
	?>
<meta name="author" content="" />
<meta name="publisher" content="" />
<meta name="copyright" content="<?php echo xtreme_copyright() . ' ' . get_bloginfo('name') ?>" />
<meta name="distribution" content="global" />
<meta name="siteinfo" content="" />
	<?php
}

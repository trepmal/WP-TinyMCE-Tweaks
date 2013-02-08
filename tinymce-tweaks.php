<?php
//Plugin Name: TinyMCE Toolbar Tweaks

add_filter('mce_buttons', 'add_mce_buttons_row_1' );
function add_mce_buttons_row_1( $mce_buttons ) {
	$key = array_search( 'wp_more', $mce_buttons );
	array_splice( $mce_buttons, $key+1, 0, 'wp_page' );
	return $mce_buttons;
}

add_filter('mce_buttons_2', 'add_mce_buttons_row_2' );
function add_mce_buttons_row_2( $mce_buttons ) {
	// add/remove buttons from $mce_buttons
	$key = array_search( 'forecolor', $mce_buttons );
	array_splice( $mce_buttons, $key+1, 0, 'backcolor' );
	return $mce_buttons;
}

add_filter('mce_buttons_3', 'add_mce_buttons_row_3' );
function add_mce_buttons_row_3( $mce_buttons ) {
	$mce_buttons[] = 'styleselect';
	$mce_buttons[] = 'fontselect';
	$mce_buttons[] = 'fontsizeselect';

	return $mce_buttons;
}

// add_filter('mce_buttons_4', 'add_mce_buttons_row_4' );
function add_mce_buttons_row_4( $mce_buttons ) {

	$mce_buttons[] = 'cut';
	$mce_buttons[] = 'copy';
	$mce_buttons[] = 'paste';

	$mce_buttons[] = 'anchor';
	$mce_buttons[] = 'image';

	$mce_buttons[] = 'cleanup';
	$mce_buttons[] = 'code';

	$mce_buttons[] = 'hr';
	$mce_buttons[] = 'visualaid';
	$mce_buttons[] = 'sub';
	$mce_buttons[] = 'sup';
	$mce_buttons[] = 'media';

	return $mce_buttons;
}

add_filter('tiny_mce_before_init', 'change_mce_dropdown' );
function change_mce_dropdown( $initArray ) {

	// limit block formatting options
	$initArray['theme_advanced_blockformats'] = 'p,h3,h4,h5,h6,pre';

	// limit spell checker options
	$initArray['spellchecker_languages'] = '+English=en';

	// can doesn't mean should...
	// $initArray['theme_advanced_toolbar_location'] = 'bottom';

	// disable caption field in image edit popup
	// $initArray['wpeditimage_disable_captions'] = true;

	$default_palette = '000000,993300,333300,003300,003366,000080,333399,333333,800000,FF6600,808000,008000,008080,0000FF,666699,808080,FF0000,FF9900,99CC00,339966,33CCCC,3366FF,800080,999999,FF00FF,FFCC00,FFFF00,00FF00,00FFFF,00CCFF,993366,C0C0C0,FF99CC,FFCC99,FFFF99,CCFFCC,CCFFFF,99CCFF,CC99FF,FFFFFF';

	// change forecolor (text color) options
	$initArray['theme_advanced_text_colors'] = '#bada55,#c0ffee,#facade,#deface,#d00dad,#f00d1e,#0ff1ce,#5a55e5,'. $default_palette;

	// change backcolor (background color) options
	$initArray['theme_advanced_background_colors'] = '#bada55,#c0ffee,#facade,#deface,#d00dad,#f00d1e,#0ff1ce,#5a55e5,'. $default_palette;

	// change font options
	$initArray['theme_advanced_fonts'] = 	'Andale Mono=andale mono,times;'.
											'Arial=arial,helvetica,sans-serif;'.
											// 'Arial Black=arial black,avant garde;'.
											'Book Antiqua=book antiqua,palatino;'.
											// 'Comic Sans MS=comic sans ms,sans-serif;'.
											'Courier New=courier new,courier;'.
											'Georgia=georgia,palatino;'.
											'Helvetica=helvetica;'.
											// 'Impact=impact,chicago;'.
											// 'Symbol=symbol;'.
											'Tahoma=tahoma,arial,helvetica,sans-serif;'.
											'Terminal=terminal,monaco;'.
											'Times New Roman=times new roman,times;'.
											'Trebuchet MS=trebuchet ms,geneva;'.
											'Verdana=verdana,geneva;'.
											// 'Webdings=webdings;'.
											// 'Wingdings=wingdings,zapf dingbats'
											'';

	// change available font sizes
	$initArray['theme_advanced_font_sizes'] = '10px,12px,14px,16px,24px';
	// $initArray['theme_advanced_font_sizes'] = 'Big text=24px,Medium=16px,Small=small,Custom Text Size=.mytextsize';

	return $initArray;
}
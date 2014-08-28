<?php
//Plugin Name: TinyMCE Toolbar Tweaks

/**
 * Insert Page-Break button after More button
 */
function add_mce_buttons_row_1( $mce_buttons ) {
	$key = array_search( 'wp_more', $mce_buttons );
	array_splice( $mce_buttons, $key+1, 0, 'wp_page' );
	return $mce_buttons;
}
add_filter('mce_buttons', 'add_mce_buttons_row_1' );

/**
 * Insert Highlight/Background-Color button after Text-Color button
 */
function add_mce_buttons_row_2( $mce_buttons ) {
	// add/remove buttons from $mce_buttons
	$key = array_search( 'forecolor', $mce_buttons );
	array_splice( $mce_buttons, $key+1, 0, 'backcolor' );
	return $mce_buttons;
}
add_filter('mce_buttons_2', 'add_mce_buttons_row_2' );

/**
 * Insert buttons into the third row (row empty by default)
 */
function add_mce_buttons_row_3( $mce_buttons ) {
	$mce_buttons[] = 'styleselect';
	$mce_buttons[] = 'fontselect';
	$mce_buttons[] = 'fontsizeselect';

	return $mce_buttons;
}
add_filter('mce_buttons_3', 'add_mce_buttons_row_3' );

/**
 * Insert buttons into the fourth row (row empty by default)
 */
function add_mce_buttons_row_4( $mce_buttons ) {

	$mce_buttons[] = 'cut';
	$mce_buttons[] = 'copy';
	$mce_buttons[] = 'paste';

	$mce_buttons[] = 'hr';

	$mce_buttons[] = 'subscript';
	$mce_buttons[] = 'superscript';
	$mce_buttons[] = 'media';

	return $mce_buttons;
}
add_filter('mce_buttons_4', 'add_mce_buttons_row_4' );


/**
 * Make changes to the dropdown menus
 * Other misc customizations
 */
function change_mce_dropdown( $initArray ) {

	// limit block formatting options
	$initArray['block_formats'] = 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3';

	// disable caption field in image edit popup
	// $initArray['wpeditimage_disable_captions'] = true;

	// change font options
	$initArray['font_formats'] = trim( 'Andale Mono=andale mono,times;'.
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
								 'Wingdings=wingdings,zapf dingbats;'.
								 '', ';' );

	// change available font sizes
	$initArray['fontsize_formats'] = '10px 12px 14px 16px 24px';

	// set indentation size
	$initArray['indentation'] = '100px';

	// custom preset formats
	$initArray['style_formats'] = json_encode( array(
        array( 'title' => 'Example 1', 'inline' => 'span', 'classes' => 'example2' ),
		array( 'title' => 'Example 2', 'inline' => 'b' ),
		array( 'title' => 'Example 3', 'block' => 'h1', 'styles' => array( 'color' => '#ff0000' ) ),
	) );

	return $initArray;
}
add_filter('tiny_mce_before_init', 'change_mce_dropdown' );

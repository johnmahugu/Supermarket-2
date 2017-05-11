/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.extraPlugins = 'image';
	config.filebrowserUploadUrl = '../assets/js/ckeditor/ckupload.php';
	config.image_removeLinkByEmptyURL= true;
	config.image_previewText = CKEDITOR.tools.repeat( 'ตัวอย่างรูปภาพ ', 100 );
};

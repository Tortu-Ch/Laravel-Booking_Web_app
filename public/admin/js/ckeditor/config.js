/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	// Construct path to file upload route
// Useful if your dev and prod URLs are different
var path = CKEDITOR.basePath.split('/');
path[ path.length-2 ] = 'upload_image';
config.filebrowserUploadUrl = path.join('/').replace(/\/+$/, '');

// Add plugin
config.extraPlugins = 'filebrowser';
};

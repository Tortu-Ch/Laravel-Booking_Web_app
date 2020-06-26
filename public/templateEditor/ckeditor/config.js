/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	//config.filebrowserBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=files';
    //config.filebrowserImageBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=images';
    //config.filebrowserFlashBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};

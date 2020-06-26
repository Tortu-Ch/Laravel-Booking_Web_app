<!DOCTYPE HTML>
<?php
     $filepath = resource_path() . '/views/admin/fileupload'
?>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>jQuery File Upload Demo - jQuery UI version</title>
<!-- jQuery UI styles -->
<!--[if lte IE 8]>
<link rel="stylesheet" href="/css/jquery-ui-demo-ie8.css">
<![endif]-->
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo $filepath.'/css/jquery.fileupload.css';?>">
<link rel="stylesheet" href="<?php echo $filepath.'/css/jquery.fileupload-ui.css';?>">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo $filepath.'/css/jquery.fileupload-noscript.css';?>"></noscript>
<noscript><link rel="stylesheet" href="<?php echo $filepath.'/css/jquery.fileupload-ui-noscript.css';?>"></noscript>
</head>
<body>
<!-- The file upload form used as target for the file upload widget -->
<form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
    <!-- Redirect browsers with JavaScript disabled to the origin page -->
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="fileupload-buttonbar">
        <div class="fileupload-buttons">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="fileinput-button">
                <span>Add files...</span>
                <input type="file" name="files[]" multiple = "">
            </span>
            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
        </div>
        <!-- The global progress state -->
        <div class="fileupload-progress fade" style="display:none">
            <!-- The global progress bar -->
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table role="presentation"><tbody class="files"></tbody></table>
</form>
<br>
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
                <p class="name">{%=file.name%}</p>
            {% } %}
            <strong class="error"></strong>
        </td>
        <td>
            <button class="cancel">Cancel</button>
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            {% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}
                <p class="name">
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                </p>
            {% } %}
            {% if (file.error) { %}
                <div><span class="error">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
    </tr>
{% } %}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha384-Dziy8F2VlJQLMShA6FHWNul/veM9bCkRUaLqr199K94ntO5QUrLJBEbYegdSkkqX" crossorigin="anonymous"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo $filepath.'/js/jquery.iframe-transport.js';?>"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload.js';?>"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload-process.js';?>"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload-image.js';?>"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload-audio.js';?>"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload-video.js';?>"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload-validate.js';?>"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload-ui.js';?>"></script>
<!-- The File Upload jQuery UI plugin -->
<script src="<?php echo $filepath.'/js/jquery.fileupload-jquery-ui.js';?>"></script>
<!-- The main application script -->
<script src="<?php echo $filepath.'/js/main.js';?>"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
</body>
</html>

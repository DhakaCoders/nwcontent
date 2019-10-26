
<?php
wp_enqueue_style('lightgallery.css', get_template_directory_uri() . '/lightgallery/css/lightgallery.css', array(), '1.6.11');

wp_enqueue_script('jquery.lightgallery.js', get_template_directory_uri() . '/lightgallery/js/lightgallery-all.min.js', array('jquery'), '1.6.11', true);
?>
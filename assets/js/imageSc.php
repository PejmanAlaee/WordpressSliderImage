<?php
header('Content-Type: application/javascript');

$uid = $_GET['uid'];

echo <<<JS
jQuery(document).ready(function($){
    $("#$uid").billboard();
});
JS;

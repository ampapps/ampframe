<?php
/*
AMP Frame ver 1.0.0
route/trigger.php
Routing Trigger
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

$fileName = AFROOT.'route/'.$_REQUEST[AFROUTE].'.php';
$fileName = ( is_file($fileName) ) ? $fileName : AFROOT.'route/page.php';
include_once($fileName);
?>

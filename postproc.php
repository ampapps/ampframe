<?php
/*
AMP Frame ver 1.0.0
postproc.php
Post Process Scripting
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

//load routing object for environment page
if( $afModel->afmPage->page == 'environ' ){
    $afModel->afmPage->routing = $afmRouting;
}
?>

<?php
/*
AMP Frame ver 1.0.0
route/project.php
Project Routing
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

$routing = array(
    'trait' => array(
        array(
            'file' => 'aft.toolbox.php',
            'path' => 'trait/',
            'name' => 'aftToolbox'
        )
    ),
    'model' => array(
        array(
            'file' => 'afm.page.e.php',
            'path' => 'model/',
            'name' => 'afmPageE',
            'alias' => 'afmPage',
            'arg' => array(
                'responsive' => true,
                'navName' => 'projectMenu',
                'nav' => $afConfig->projectMenu
            )
        )
    ),
    'view' => array(
        'file' => 'afv.page.e.php',
        'path' => 'view/',
        'name' => 'afvPageE'
    ),
    'control' => array(
        'path' => 'control/project/',
        'name' => 'afcPage',
    )
);
if( empty($_REQUEST[AFCONTROL]) ){
    $routing['control']['file'] = 'afc.home.php';
}else{
    $fileName = AFROOT.'control/'.$_REQUEST[AFROUTE].'/afc.'.$_REQUEST[AFCONTROL].'.php';
    $routing['control']['file'] = ( is_file($fileName) ) ? 'afc.'.$_REQUEST[AFCONTROL].'.php' : 'afc.empty.php';
}
?>

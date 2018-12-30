<?php
/*
AMP Frame ver 1.0.0
route/help.php
Help Routing
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
                'navName' => 'helpMenu',
                'nav' => $afConfig->helpMenu
            )
        )
    ),
    'view' => array(
        'file' => 'afv.page.e.php',
        'path' => 'view/',
        'name' => 'afvPageE'
    ),
    'control' => array(
        'path' => 'control/help/',
        'name' => 'afcPage',
    )
);
if( empty($_REQUEST[AFCONTROL]) ){
    $routing['control']['file'] = 'afc.oview.php';
}else{
    $fileName = AFROOT.'control/'.$_REQUEST[AFROUTE].'/afc.'.$_REQUEST[AFCONTROL].'.php';
    $routing['control']['file'] = ( is_file($fileName) ) ? 'afc.'.$_REQUEST[AFCONTROL].'.php' : 'afc.empty.php';
}
?>

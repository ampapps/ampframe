<?php
/*
AMP Frame ver 1.0.0
route/page.php
Page Routing
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
                'navName' => 'siteMenu',
                'nav' => $afConfig->siteMenu
            ),
        ),
        array(
            'file' => 'afm.mysqlip.e.php',
            'path' => 'model/',
            'name' => 'afmMysqliPE',
            'alias' => 'afmMysqli',
            'arg' => array(
                'connect' => false,
                'host' => $afConfig->dbHost,
                'user' => $afConfig->dbUser,
                'pass' => $afConfig->dbPass,
                'name' => $afConfig->dbName,
                'port' => $afConfig->dbPort,
                'socket' => $afConfig->dbSocket,
                'dbTable' => $afConfig->dbTable
            )
        )
    ),
    'view' => array(
        'file' => 'afv.page.e.php',
        'path' => 'view/',
        'name' => 'afvPageE'
    ),
    'control' => array(
        'path' => 'control/page/',
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

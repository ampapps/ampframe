<?php
/*
AMP Frame ver 1.0.0
model/afm.mysqlip.e.php
mySQLi Procedural Data Model Extended
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

require_once(AFROOT.'model/afm.mysqlip.php');

class afmMysqliPE extends afmMysqliP{

    public function __construct( $arg=null ){

        parent::__construct( $arg );

    }

}
?>

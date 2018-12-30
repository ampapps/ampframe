<?php
/*
AMP Frame ver 1.0.0
model/afm.mysqlio.e.php
mySQLi Object Data Model Extended
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

require_once(AFROOT.'model/afm.mysqlio.php');

class afmMysqliOE extends afmMysqliO{

    public function __construct( $arg ){

        parent::__construct( $arg );

    }

}

?>

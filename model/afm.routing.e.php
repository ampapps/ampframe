<?php
/*
AMP Frame ver 1.0.0
model/afm.routing.e.php
Routing Model Extended
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

require_once(AFROOT.'model/afm.routing.php');

class afmRoutingE extends afmRouting{

    public function __construct( $arg=null ){

        parent::__construct( $arg );

    }

}
?>

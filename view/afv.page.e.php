<?php
/*
AMP Frame ver 1.0.0
view/afv.page.e.php
Page View Extended
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

require_once(AFROOT.'/view/afv.page.php');

class afvPageE extends afvPage{
    use aftToolbox;

    public function __construct( $arg ){

        parent::__construct( $arg );

    }

}
?>

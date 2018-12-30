<?php
/*
AMP Frame ver 1.0.0
model/afm.page.e.php
Page Model Extended
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

require_once(AFROOT.'model/afm.page.php');

class afmPageE extends afmPage{

    public function __construct( $arg=null ){

        parent::__construct( $arg );

        $this->addMeta( 'charset="utf-8"' );

    }

}
?>

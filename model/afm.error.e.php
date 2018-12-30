<?php
/*
AMP Frame ver 1.0.0
model/afm.error.e.php
Error Handling Model Extended
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

require_once(AFROOT.'model/afm.error.php');

class afmErrorE extends afmError{

    public function __construct( $arg=null ){

        parent::__construct( $arg );

    }

}
?>

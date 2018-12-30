<?php
/*
AMP Frame ver 1.0.0
control/page/afc.empty.php
Empty Page Controller
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afcPage{
    use aftToolbox;

    protected $model;

    public function __construct( $arg ){

        if( empty($arg['model']) ){
            trigger_error('Missing model for controller', E_USER_ERROR);
        }
        $this->model = $arg['model'];

        if( !empty( $_SESSION['afSession']['skin'] ) ){
            $this->model->afmPage->changeSkin( $_SESSION['afSession']['skin'] );
        }

        $this->model->afmPage->page = 'empty';
        $this->model->afmPage->title = 'Empty - '.AFSITETITLE;

    }

}
?>

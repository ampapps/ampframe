<?php
/*
AMP Frame ver 1.0.0
control/project/afc.empty.php
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

        $this->model->afmPage->templateDir = 'template/project/';
        $this->model->afmPage->page = 'empty';
        $this->model->afmPage->title = 'Oops - Bootstrap 4 Website Example';

    }

}
?>

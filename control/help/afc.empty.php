<?php
/*
AMP Frame ver 1.0.0
control/help/afc.empty.php
Empty Help Page Controller
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

        $this->model->afmPage->templateDir = 'template/help/';
        $this->model->afmPage->page = 'empty';
        $this->model->afmPage->title = 'Overview - Help AMP Frame';

    }

}
?>

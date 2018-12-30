<?php
/*
AMP Frame ver 1.0.0
control/page/afc.skin.php
Change Skin Controller
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

        $this->model->afmPage->procRequest();

        if( !empty($this->model->afmPage->request->skin) ){

            $this->model->afmPage->changeSkin( $this->model->afmPage->request->skin );

            $_SESSION['afSession']['skin'] = $this->model->afmPage->request->skin;

        }else{

            $_SESSION['afSession']['skin'] = '';

        }

        $location = ( empty($_SERVER['HTTP_REFERER']) ) ? AFURL : $_SERVER['HTTP_REFERER'];
        header('location: '.$location);
        die;

    }

}
?>

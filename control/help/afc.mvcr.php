<?php
/*
AMP Frame ver 1.1.0
control/help/afc.mvcr.php
MVC+R Help Page Controller
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
        $this->model->afmPage->page = 'mvcr';
        $this->model->afmPage->title = 'MVC plus R - Help AMP Frame';

		$this->model->afmPage->addMenuItem( 'subMenu', 'Model', returnMenuLink( 'help', 'model' ), 'model' );
		$this->model->afmPage->addMenuItem( 'subMenu', 'View', returnMenuLink( 'help', 'view' ), 'view' );
		$this->model->afmPage->addMenuItem( 'subMenu', 'Controller', returnMenuLink( 'help', 'control' ), 'control' );
		$this->model->afmPage->addMenuItem( 'subMenu', 'Router', returnMenuLink( 'help', 'route' ), 'route' );

    }

}
?>

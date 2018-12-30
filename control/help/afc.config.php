<?php
/*
AMP Frame ver 1.1.0
control/help/afc.config.php
Config Flow Help Page Controller
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
        $this->model->afmPage->page = 'config';
        $this->model->afmPage->title = 'Configuration Flow - Help AMP Frame';

        $this->model->afmPage->addMenuItem( 'subMenu', 'Start', returnMenuLink( 'help', 'start' ), 'start' );
        $this->model->afmPage->addMenuItem( 'subMenu', 'Config', returnMenuLink( 'help', 'config' ), 'config' );
        $this->model->afmPage->addMenuItem( 'subMenu', 'Routing', returnMenuLink( 'help', 'routing' ), 'routing' );
        $this->model->afmPage->addMenuItem( 'subMenu', 'Results', returnMenuLink( 'help', 'result' ), 'result' );

    }

}
?>

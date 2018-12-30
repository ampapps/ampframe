<?php
/*
AMP Frame ver 1.1.0
control/page/afc.test.php
Test Page Controller
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

        $this->model->afmPage->page = 'test';
        $this->model->afmPage->title = 'Test - '.AFSITETITLE;

        $this->model->afmPage->addMenuItem( 'siteMenu', 'Fail', returnMenuLink( 'page', 'fail' ) );

        $this->model->afmPage->procRequest();

        $this->model->afmPage->testProp = 'testProp added';

        $this->model->afmNew = new stdClass();
        $this->model->afmNew->testProp = 'New object added';

    }

}
?>

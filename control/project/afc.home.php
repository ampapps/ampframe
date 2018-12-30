<?php
/*
AMP Frame ver 1.0.0
control/project/afc.home.php
Home Page Controller
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
        $this->model->afmPage->page = 'home';
        $this->model->afmPage->title = 'Bootstrap 4 Website Example';

        $this->model->afmPage->blogData = $this->setBlogData();

    }

    private function setBlogData(){

        $return = array(
            array(
                'heading' => 'THIS PROJECT',
                'desc' => 'A responsive template to play around with',
                'image' => '<div class="fakeimg">Fake Image</div>',
                'content' => '<p>The template can be found in the template/project/ folder.</p><p>The controller for this page is the control/project/afc.home.php file.</p>'
            ),
            array(
                'heading' => 'TITLE HEADING',
                'desc' => 'Title description, Dec 7, 2017',
                'image' => '<div class="fakeimg">Fake Image</div>',
                'content' => '<p>Some text..</p><p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>'
            ),
            array(
                'heading' => 'TITLE HEADING',
                'desc' => 'Title description, Sep 2, 2017',
                'image' => '<div class="fakeimg">Fake Image</div>',
                'content' => '<p>Some text..</p><p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>'
            )
        );

        return $return;

    }

}
?>

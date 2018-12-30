<?php
/*
AMP Frame ver 1.0.0
Project Template
template/project/content/home.php
Home Page Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
  <div class="row">
    <div class="col-sm-4">
<?php
include( $this->runMethod( 'afmPage', 'returnContent', 'about' ) );
?>
    </div>
    <div class="col-sm-8">
<?php
include( $this->runMethod( 'afmPage', 'returnContent', 'blog' ) );
?>
    </div>
  </div>

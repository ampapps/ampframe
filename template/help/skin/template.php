<?php
/*
AMP Frame ver 1.0.0
Help Template
template/help/skin/template.php
Help Template
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/<?php echo AFFOLDER;?>">
        <title><?php $this->echoProperty( 'afmPage', 'title' );?></title>
        <meta charset="utf-8">
<?php
$this->echoMeta();
?>
<?php
$this->echoLink();
?>
        <link rel="icon" href="/<?php echo AFFOLDER;?>favicon.ico">
        <link rel="stylesheet" type="text/css" href="template/help/css/style.css?1.0.1">
    </head>
    <body>
        <div class="container-fluid">
            <?php $this->echoNavBar( 'helpMenu', $this->page );?>
<?php
if( !empty($this->model->afmPage->subMenu) ){
?>
            <?php $this->echoNavBar( 'subMenu', $this->page, 'navbar navbar-expand-sm bg-secondary navbar-dark' );?>
<?php
}
?>
            <div class="row">&nbsp</div>
<?php
include( $this->runMethod( 'afmPage', 'returnContent', $this->page ) );
?>
            <div class="row">
                <div class="col text-right small font-italic">Copyright &copy <?php echo date('Y');?> <?php echo AFSITETITLE;?> (<?php echo AFBRANDING;?>)</div>
            </div><!-- row -->
            <div class="row">&nbsp</div>
        </div><!-- container-fluid -->
<?php
$this->echoScript();
?>
    </body>
</html>

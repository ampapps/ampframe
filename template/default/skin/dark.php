<?php
/*
AMP Frame ver 1.0.0
Default Template
template/default/skin/dark.php
Template - Default Dark Skin
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
<?php
$this->echoMeta();
?>
<?php
$this->echoLink();
?>
        <link rel="icon" href="/<?php echo AFFOLDER;?>favicon.ico">
    </head>
    <body class="bg-dark">
        <div class="container-fluid">
            <?php $this->echoNavBar( 'siteMenu', $this->page );?>
            <div class="row">&nbsp</div>
<?php
include( $this->runMethod( 'afmPage', 'returnContent', $this->page ) );
?>
            <div class="row">
                <div class="col text-center text-light small font-italic">Copyright &copy <?php echo date('Y');?> <?php echo AFSITETITLE;?> (<?php echo AFBRANDING;?>)</div>
            </div><!-- row -->
            <div class="row">&nbsp</div>
        </div><!-- container-fluid -->
<?php
$this->echoScript();
?>
    </body>
</html>

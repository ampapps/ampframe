<?php
/*
AMP Frame ver 1.0.0
Project Template
template/project/skin/template.php
Template - Project Start
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
  <link rel="stylesheet" type="text/css" href="template/project/css/style.css?1.0.1">
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p>
  <p>Integration project of the freely distributable template found at <a href="https://www.w3schools.com/bootstrap4/bootstrap_templates.asp" target="_blank">W3 Schools</a> for you to experiment with.</p>
</div>

<?php echo $this->echoNavBar( 'projectMenu', $this->page, 'navbar navbar-expand-sm bg-dark navbar-dark');?>

<div class="container" style="margin-top:30px">
<?php
include( $this->runMethod( 'afmPage', 'returnContent', $this->page ) );
?>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

<?php
$this->echoScript();
?>
</body>
</html>

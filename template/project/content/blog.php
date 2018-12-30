<?php
/*
AMP Frame ver 1.0.0
Project Template
template/project/content/blog.php
Blog Page Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
<?php
foreach( $this->model->afmPage->blogData as $data ){
?>
      <h2><?php echo $data['heading'];?></h2>
      <h5><?php echo $data['desc'];?></h5>
      <?php echo $data['image'];?>
      <?php echo $data['content'];?>
      <br>
<?php
}
?>

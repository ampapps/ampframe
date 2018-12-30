<?php
/*
AMP Frame ver 1.0.0
Default Template
template/default/content/environ.php
Site Environment Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
$requestData = $this->returnProperty( 'afmPage', 'request' );
$routing = $this->returnProperty( 'afmPage', 'routing' );
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Environment Page</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <div><strong>PHP Version:</strong> <?php echo PHP_VERSION;?></div>
                        <div><strong>Framework Version:</strong> <?php echo AFVERSION;?></div>
                        <hr>
                        <div><strong>Server Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT'];?></div>
                        <div><strong>Script Root:</strong> <?php echo AFROOT?></div>
                        <div><strong>Script URL:</strong> <?php echo AFURL?></div>
                        <div><strong>Installation Folder:</strong> <?php echo AFFOLDER?></div>
                        <hr>
                        <div><strong>Route:</strong> <?php echo $requestData->afrte;?></div>
                        <div><strong>Control:</strong> <?php echo $requestData->afcnt;?></div>
                        <hr>
                        <dl>
                            <dt>Trait(s):</dt>
<?php
foreach($routing->trait as $trait){
?>
                            <dd><?php echo $trait->name;?> : <?php echo $trait->path.$trait->file;?></dd>
<?php
}
?>
                        </dl>
                        <hr>
                        <dl>
                            <dt>Model(s):</dt>
<?php
foreach($routing->model as $model){
?>
                            <dd><?php echo $model->name;?><?php echo ( empty($model->alias) ) ? '' : ' ('.$model->alias.')' ;?> : <?php echo $model->path.$model->file;?></dd>
<?php
}
?>
                        </dl>
                        <hr>
                        <dl>
                            <dt>Control:</dt>
                            <dd><?php echo $routing->control->name;?> : <?php echo $routing->control->path.$routing->control->file;?></dd>
                        </dl>
                        <hr>
                        <dl>
                            <dt>View:</dt>
                            <dd><?php echo $routing->view->name;?> : <?php echo $routing->view->path.$routing->view->file;?></dd>
                        </dl>
                        <hr>
                        <dl>
                            <dt>Meta Tag(s)</dt>
<?php
$metaData = $this->returnProperty( 'afmPage', 'meta' );
foreach( $metaData as $meta ){
?>
                            <dd><?php echo htmlentities($meta);?></dd>
<?php
}
?>
                        </dl>
                        <hr>
                        <dl>
                            <dt>Link(s)</dt>
<?php
$linkData = $this->returnProperty( 'afmPage', 'link' );
foreach( $linkData as $link ){
?>
                            <dd><?php echo htmlentities($link);?></dd>
<?php
}
?>
                        </dl>
                        <hr>
                        <dl>
                            <dt>Script(s)</dt>
<?php
$scriptData = $this->returnProperty( 'afmPage', 'script' );
foreach( $scriptData as $script ){
?>
                            <dd><?php echo htmlentities($script);?></dd>
<?php
}
?>
                        </dl>
                        <hr>
<?php
if( !empty( $linkData = $this->returnProperty( 'afmMysqli', 'link' ) ) ){
?>
                        <div><strong>mySQLi Client:</strong> <?php echo $linkData->client_info;?></div>
                        <div><strong>mySQLi Host:</strong> <?php echo $linkData->host_info;?></div>
<?php
}else{
?>
                        <div><strong>mySQLi</strong> not connected</div>
<?php
}
?>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->

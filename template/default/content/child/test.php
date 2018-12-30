<?php
/*
AMP Frame ver 1.0.0
Default Template
template/default/content/child/test.php
Frame Test Content - Child
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Test Page</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <dl>
                            <dt>Testing the template child page feature</dt>
                            <dd>This page is the child. Renaming/Removing the template/default/child/test.php file will display the original test page</dd>
                        </dl>
                        <dl>
                            <dt>Testing the ability to dynamically add a menu item</dt>
                            <dd>Added a new menu item named <strong>Fail</strong>. Selecting it should take you to the missing page content</dd>
                        </dl>
                        <dl>
                            <dt>Testing request variable processing</dt>
<?php
$requestData = $this->returnProperty( 'afmPage', 'request' );
if( !empty($requestData) ){
    foreach( $requestData as $key=>$value ){
?>
                            <dd><?php echo $key;?> = <?php echo $value;?></dd>
<?php
    }
}else{
?>
                            <dd>No request variables found, ensure the controller activates the procRequest method in the page model</dd>
<?php
}
?>
                        </dl>
                        <dl>
                            <dt>Testing abilty to add properties to model</dt>
                            <dd><?php $this->echoProperty( 'afmPage', 'testProp' );?></dd>
                        </dl>
                        <dl>
                            <dt>Testing random string generation from trait used by extended view</dt>
                            <dd>The winning string is: <?php echo $this->randStringTool( 10 );?></dd>
                        </dl>
                        <dl>
                            <dt>Testing new dynamic object</dt>
                            <dd><?php $this->echoProperty( 'afmNew', 'testProp' ) ;?></dd>
                        </dl>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->

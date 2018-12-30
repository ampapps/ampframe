<?php
/*
AMP Frame ver 1.1.0
Help Template
template/help/content/config.php
Configuration Flow Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Configuration Flow</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>The configuration system starts in the config/config.php file.</p>
                        <p>The default configuration settings file, config/default.php, is included.</p>
                        <p>These default setting can then be changed if needed.</p>
                        <p>The database connection settings can then be set.</p>
                        <p>Any additional settings can then be set.</p>
                        <p>The constants used by the script are set.</p>
                        <p>We include menu items that will always be on the main navigation menu here.</p>
                        <p>The clean URL module is started to manage clean URL's and aliases.</p>
                        <p>We then start the config/init.php file to handle the scripts initialization.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->

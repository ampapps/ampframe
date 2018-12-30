<?php
/*
AMP Frame ver 1.1.0
Help Template
template/help/content/cleanurl.php
Clean URL Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Clean URL</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <dl>
                            <dt>What is a clean URL?</dt>
                            <dd>Since the framework needs to know the route and controller to display the correct page, this information is passed using request key value pairs in the URL like... yoursite.com/index.php?afrte=help&amp;afcnt=cleanurl. We can clean this up to look like this instead... yoursite.com/help/cleanurl.</dd>
                        </dl>
                        <dl>
                            <dt>Activiating/Deactivating</dt>
                            <dd>The $config['cleanURL'] setting in the config/config.php file is used to activate clean URL's. AMP Frame comes with a global function returnMenuLink() that will return the standard key value pair or clean versions of links depending on the cleanURL setting.</dd>
                        </dl>
                        <dl>
                            <dt>Understanding clean links</dt>
                            <dd>The clean links appear as folders in the URL, as seen with help/cleanurl/. The first value is the route and the second is the controller, so in this case we would be routing to the help section and the controller for the cleanurl page.</dd>
                        </dl>
                        <dl>
                            <dt>How it works.</dt>
                            <dd>You may have worked with clean links before using Apache's mod_rewrite and rewrite rules, that is not how it is done in this framework. AMP Frame uses a built in model to automatically handle clean links. In this default installation, you simply provide the route and controller as folders and the model does the rest.</dd>
                            <dd>The .htaccess file uses Apache's mod_dir to set a fallback resource to the frameworks index.php file so that any request for resources that do not exist get sent to this front end controller.</dd>
                        </dl>
                        <dl>
                            <dt>Instalations in sub-folders.</dt>
                            <dd>If you have installed AMP Frame in a sub-folder off of the document root your clean URL would include those folders, something like... subfolder/help/cleanurl. The config setting $config['installFolder'] = 'subfolder/' is how you would indicate this type of installation and the clean URL model will be able to locate the route and controller in the URL.</dd>
                        </dl>
                        <dl>
                            <dt>Aliases.</dt>
                            <dd>There may be instances where the actual route or controller names are not pretty enough. You can set up aliases that will let your URL's be even more beautiful. The Template page in this help section is a working example of this feature which replaces the actual controller named 'tpl' with the text 'template'.</dd>
                            <dd>This is accomplished by mapping the alias to the real name in the config/config.php file, the Clean URL Module section. The $cleanMap array stores these alias to actual realationships where you can map as many aliases as are needed.</dd>
                            <dd>Note that aliases can also be used in key value pair links since they are also cleaned.</dd>
                        </dl>
                        <dl>
                            <dt>Simple and Complex systems</dt>
                            <dd>This installation would be considered a complex system with many routes, however you may only need a simple system with a single route where that route would not be needed in the URL. The clean URL model comes with a cleanSimple method that will use the default route or allow you to specify a route instead of including it in the URL.</dd>
                        </dl>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->

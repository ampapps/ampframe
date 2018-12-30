<?php
/*
AMP Frame ver 1.1.0
config/config.php
Configuration settings
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

include_once(AFROOT.'config/default.php');

//*START framework Configuration*//
//*Domain URL*//
//e.g. http://www.yoursite.com/ <--include trailing slash
$config['domainURL'] = 'http://localhost/';

//*Installation Folder*//
//e.g. sub/folders/ <--exclude start slash and include trailing slash
#$config['installFolder'] = '';

//*Site Title*//
#$config['siteTitle'] = 'Your Site';

//*routing trigger*//
#$config['afrte'] = 'afrte';

//*control trigger*//
#$config['afcnt'] = 'afcnt';

//*use Clean URL model*//
#$config['cleanURL'] = false;

/*
Database Settings
*/
//*Host*//
$config['dbHost'] = 'localhost';
//*User*//
$config['dbUser'] = 'root';
//*Password*//
$config['dbPass'] = '';
//*Database*//
$config['dbName'] = '';
//*Port*//
$config['dbPort'] = 0;
//*Socket*//
$config['dbSocket'] = '';

//*Database Tables*//
$config['dbTable'] = array(
    'prefix' => 'afd_',
#    'reference' => 'name',
);
//*END framework Configuration*//

//*START Constant Definitions*//
define('AFVERSION',$config['afVersion']);
define('AFFOLDER',$config['installFolder']);
define('AFSITETITLE',$config['siteTitle']);
define('AFURL',$config['domainURL'].$config['installFolder']);
define('AFROUTE',$config['afrte']);
define('AFCONTROL',$config['afcnt']);
define('AFCLEANURL',$config['cleanURL']);
define('AFBRANDING',$config['branding']);
//*END Constant Definitions*//

//*START Menu Definitions*//
/**
Menu(s)
sample configuration using built in menu system
$config[menuName] = [items] array(
    array(
        title => 'title', <-- required
        link => 'link',
        page => 'page',
        pos => 'pos',
        text => 'l/r',
        brand => true/false,
        dropid => 'dropid',
        [dropmenu] => array(
            array(
                'title',
                'link'
            ),
            array(
                '_header_',
                'header text'
            ),
            array(
                '_divider_'
            )
        )
    )
)
**/

//*Main navigation*//
$config['siteMenu'] = array(
    array(
        'title' => AFSITETITLE,
        'link' => returnMenuLink(),
        'brand' => true
    ),
    array(
        'title' => 'Test',
        'link' => returnMenuLink( 'page', 'test' ),
        'page' => 'test'
    ),
    array(
        'title' => 'Environment',
        'link' => returnMenuLink( 'page', 'environment' ),
        'page' => 'environ'
    ),
    array(
        'title' => 'Skin',
        'dropid' => 'drop-skin',
        'dropmenu' => array(
            array(
                'Default',
                returnMenuLink( 'page', 'skin' )
            ),
			array(
				'_divider_'
			),
            array(
                'Dark',
                returnMenuLink( 'page', 'skin', 'skin=dark' )
            ),
            array(
                'Light',
                returnMenuLink( 'page', 'skin', 'skin=light' )
            ),
        ),
    ),
    array(
        'title' => 'Project',
        'link' => returnMenuLink( 'project' ),
        'pos' => 'right'
    ),
    array(
        'title' => 'Help',
        'link' => returnMenuLink( 'help', 'oview' ),
        'pos' => 'right'
    )
);

//*Help navigation*//
$config['helpMenu'] = array(
    array(
        'title' => AFSITETITLE,
        'link' => returnMenuLink(),
        'brand' => true
    ),
    array(
        'title' => 'Overview',
        'link' => returnMenuLink( 'help', 'oview' ),
        'page' => 'oview'
    ),
    array(
        'title' => 'MVC+R',
        'page' => 'mvcr',
        'dropid' => 'drop-mvcr',
        'dropmenu' => array(
            array(
                'Overview',
                returnMenuLink( 'help', 'mvcr' ),
            ),
			array(
				'_divider_'
			),
            array(
                'Model',
                returnMenuLink( 'help', 'model' ),
            ),
            array(
                'View',
                returnMenuLink( 'help', 'view' ),
            ),
            array(
                'Controller',
                returnMenuLink( 'help', 'control' ),
            ),
            array(
                'Router',
                returnMenuLink( 'help', 'route' ),
            )
        ),
    ),
    array(
        'title' => 'Flow',
        'page' => 'flow',
        'dropid' => 'drop-flow',
        'dropmenu' => array(
            array(
                'Overview',
                returnMenuLink( 'help', 'flow' ),
            ),
			array(
				'_divider_'
			),
            array(
                'Start',
                returnMenuLink( 'help', 'start' ),
            ),
            array(
                'Config',
                returnMenuLink( 'help', 'config' ),
            ),
            array(
                'Routing',
                returnMenuLink( 'help', 'routing' ),
            ),
            array(
                'Results',
                returnMenuLink( 'help', 'result' ),
            )
        ),
    ),
    array(
        'title' => 'Template',
        'link' => returnMenuLink( 'help', 'template'),
        'page' => 'tpl'
    ),
    array(
        'title' => 'Clean URL',
        'link' => returnMenuLink( 'help', 'cleanurl'),
        'page' => 'cleanurl'
    )
);

//*Project navigation*//
$config['projectMenu'] = array(
    array(
        'title' => 'Navbar',
        'link' => returnMenuLink( 'project' ),
        'brand' => true
    ),
    array(
        'title' => 'Link',
        'link' => returnMenuLink( 'project' ),
    ),
    array(
        'title' => 'Link',
        'link' => returnMenuLink( 'project' ),
    ),
    array(
        'title' => 'Link',
        'link' => returnMenuLink( 'project' ),
    ),
    array(
        'title' => AFSITETITLE,
        'link' => returnMenuLink(),
        'pos' => 'right'
    )
);

//*END Menu Definitions*//

//*create afConfig object*//
$afConfig = (object) $config;
unset($config);

//*START Clean URL Module*//
include_once(AFROOT.'model/afm.cleanurl.php');

/* example map
$cleanMap = array(
    'newroute' => 'page', //<-- replace newroute text with actual route
    'newcontrol' => 'test', //<-- replace newcontrol text with actual control
    2 => 'id' //<-- generate key value pair where id={value in folder position 2}
);
*/
$cleanMap = array(
    'template' => 'tpl',
    'environment' => 'environ'
);

$afCleanURL = new afmCleanURL( $cleanMap, AFFOLDER );

if( AFCLEANURL ){
    //cleanSimple method where first folder is the control
    #$afCleanURL->cleanSimple();

    //cleanComplex method where first folder is the route and second is the control
    $afCleanURL->cleanComplex();
}else{
    //cleanKVP method where route and control are key value pairs
    $afCleanURL->cleanKVP();
}
//*END Clean URL Module*//
?>

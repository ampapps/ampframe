<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.1.1
model/afm.page.php
Page Model
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afmPage{

    public $templateDir = 'template/default/';

    public $templateFile = 'template.php';

    public $page;

    public $title;

    public $meta = array();

    public $link = array();

    public $script = array();

    public $request;

    public function __construct( $arg=null ){

        $this->title = AFSITETITLE;

        $responsive = ( empty($arg['responsive']) ) ? 0 : 1;

        if( !empty($responsive) ){

            $this->addMeta( 'name="viewport" content="width=device-width, initial-scale=1"' );
            $this->addLink( 'rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"' );
            $this->addScript( 'src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"' );
            $this->addScript( 'src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"' );
            $this->addScript( 'src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"' );

        }

        $navName = ( empty($arg['navName']) ) ? 'nav' : $arg['navName'];
        if( !empty($arg['nav']) ){
            $this->setMenu( $navName, $arg['nav'] );
        }

    }

    public function addMeta( $arg ){

        if( is_array($arg) ){
            if( empty($arg['meta']) ){
                trigger_error('Missing meta in addMeta', E_USER_ERROR);
            }
            $this->meta[] = '<meta '.$arg['meta'].">\n";
        }else{
            $this->meta[] = '<meta '.$arg.">\n";
        }

    }

    public function addLink( $arg ){

        if( is_array($arg) ){
            if( empty($arg['link']) ){
                trigger_error('Missing link in addLink', E_USER_ERROR);
            }
            $this->link[] = '<link '.$arg['link'].">\n";
        }else{
            $this->link[] = '<link '.$arg.">\n";
        }

    }

    public function addScript( $arg ){

        if( is_array($arg) ){
            if( empty($arg['script']) ){
                trigger_error('Missing script in addScript', E_USER_ERROR);
            }
            $this->script[] = '<script '.$arg['script']."></script>\n";
        }else{
            $this->script[] = '<script '.$arg."></script>\n";
        }

    }

    public function procRequest( $arg=null ){

        $this->request = new stdClass();
        if( !empty($_REQUEST) ){
            foreach( $_REQUEST as $key => $value ){
                $this->request->{$key} = $value;
            }
        }

    }

    public function setMenu( $arg, $arg1=null ){

        if( is_array($arg) ){
            if( !empty($arg['nav']) ){
                $navName = ( empty($arg['navName']) ) ? 'nav' : $arg['navName'];
                $this->{$navName} = $arg['nav'];
                return true;
            }
        }else{
            //( navName, nav )
            if( !empty($arg1) ){
                $navName = ( empty($arg) ) ? 'nav' : $arg;
                $this->{$navName} = $arg1;
                return true;
            }
        }

        return false;

    }

    public function addMenuItem( $arg, $arg1='', $arg2='', $arg3='', $arg4='', $arg5='', $arg6=null, $arg7=null, $arg8=array() ){

        if( is_array($arg) ){
            if( empty($arg['menu']) or empty($arg['title']) ){
                trigger_error('Missing one or more arguments in addMenuItem', E_USER_ERROR);
            }
            $arg['link'] = (empty($arg['link'])) ? null : $arg['link'];
            $arg['page'] = (empty($arg['page'])) ? null : $arg['page'];
            $arg['pos'] = (empty($arg['pos'])) ? null : $arg['pos'];
            $arg['text'] = (empty($arg['text'])) ? null : $arg['text'];
            $arg['brand'] = (empty($arg['brand'])) ? null : $arg['brand'];
            $arg['dropid'] = (empty($arg['dropid'])) ? null : $arg['dropid'];
            $arg['dropmenu'] = (empty($arg['dropmenu'])) ? null : $arg['dropmenu'];
            $this->{$arg['menu']}[] = array(
                'title' => $arg['title'],
                'link' => $arg['link'],
                'page' => $arg['page'],
                'pos' => $arg['pos'],
                'text' => $arg['text'],
                'brand' => $arg['brand'],
                'dropid' => $arg['dropid'],
                'dropmenu' => $arg['dropmenu']
            );
        }else{
            //( navName, title, link, page, pos, text, brand, dropid, dropmenu )
            if( empty($arg1) or empty($arg2) ){
                trigger_error('Missing one or more arguments in addMenuItem', E_USER_ERROR);
            }
            $this->{$arg}[] = array(
                'title' => $arg1,
                'link' => $arg2,
                'page' => $arg3,
                'pos' => $arg4,
                'text' => $arg5,
                'brand' => $arg6,
                'dropid' => $arg7,
                'dropmenu' => $arg8
            );
        }

    }

    public function changeSkin( $arg ){

        if( is_array($arg) ){
            if( empty($arg['skin']) ){
                trigger_error('Missing skin in changeSkin',E_USER_ERROR);
            }
            $skin = $arg['skin'];
        }else{
            $skin = $arg;
        }

        $file = AFROOT.$this->templateDir.'/skin/'.$skin.'.php';
        if( file_exists( $file ) ){
            $this->templateFile = $skin.'.php';
            return true;
        }else{
            return false;
        }

    }

    public function returnContent( $arg ){

        if( is_array($arg) ){
            if( empty($arg['page']) ){
                trigger_error('Missing page in returnContent',E_USER_ERROR);
            }
            $page = $arg['page'];
        }else{
            $page = $arg;
        }

        $this->page = $page;

        $contentPage = $page.'.php';
        if( is_file(AFROOT.$this->templateDir.'content/child/'.$contentPage) ){
            return AFROOT.$this->templateDir.'content/child/'.$contentPage;
        }elseif( is_file(AFROOT.$this->templateDir.'content/'.$contentPage) ){
            return AFROOT.$this->templateDir.'content/'.$contentPage;
        }else{
            trigger_error('Unable to locate file '.AFROOT.$this->templateDir.'content/'.$contentPage.'<br>Check the path!', E_USER_ERROR);
        }

    }

}
?>

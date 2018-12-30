<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.1.0
view/afv.page.php
Page View
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afvPage{

    public $model;

    public $page;

    public function __construct( $arg ){

        if( empty($arg['model']) ){
            trigger_error('Missing model in contruct');
        }
        $this->model = $arg['model'];

        $this->page = $this->model->afmPage->page;

    }

    public function deliver( $arg=null ){

        $templateFile = AFROOT.$this->model->afmPage->templateDir.'skin/'.$this->model->afmPage->templateFile;

        if( file_exists($templateFile) ){
            include_once($templateFile);
        }else{
            trigger_error('Template file not found at '.$templateFile.'<br>Check that the template directory and file name are set correctly');
        }

    }

    public function echoProperty( $arg, $arg1=null ){

        if( is_array($arg) ){
            $error = false;
            if( empty($arg['model']) ){
                $errorText = 'Missing model in echoProperty<br>';
            }
            if( empty($arg['prop']) ){
                $errorText = 'Missing prop in echoProperty<br>';
            }
            if( $error ){
                trigger_error($errorText, E_USER_ERROR);
            }
            if( !empty($this->model->{$arg['model']}->{$arg['prop']}) ){
                echo $this->model->{$arg['model']}->{$arg['prop']};
            }
        }else{
            if( !empty($this->model->{$arg}->{$arg1}) ){
                echo $this->model->{$arg}->{$arg1};
            }
        }

    }

    public function returnProperty( $arg, $arg1=null ){

        if( is_array($arg) ){
            $error = false;
            if( empty($arg['model']) ){
                $errorText = 'Missing model in returnProperty<br>';
            }
            if( empty($arg['prop']) ){
                $errorText = 'Missing prop in returnProperty<br>';
            }
            if( $error ){
                trigger_error($errorText, E_USER_ERROR);
            }
            if( empty($this->model->{$arg['model']}->{$arg['prop']}) ){
                return false;
            }else{
                return $this->model->{$arg['model']}->{$arg['prop']};
            }
        }else{
            if( empty($this->model->{$arg}->{$arg1}) ){
                return false;
            }else{
                return $this->model->{$arg}->{$arg1};
            }
        }

    }

    public function runMethod( $arg, $arg1=null, $arg2=null ){

        if( is_array($arg) ){
            $error = false;
            if( empty($arg['model']) ){
                $errorText = 'Missing model in runMethod<br>';
            }
            if( empty($arg['method']) ){
                $errorText = 'Missing method in runMethod<br>';
            }
            if( $error ){
                trigger_error($errorText, E_USER_ERROR);
            }
            if( !empty($arg['arg']) ){
                return $this->model->{$arg['model']}->{$arg['method']}( $arg['arg'] );
            }else{
                return $this->model->{$arg['model']}->{$arg['method']}();
            }
        }else{
            if( !empty($arg2) ){
                return $this->model->{$arg}->{$arg1}( $arg2 );
            }else{
                return $this->model->{$arg}->{$arg1}();
            }
        }

    }

    public function echoMeta( $arg=null ){

        foreach( $this->model->afmPage->meta as $meta ){
            echo $meta;
        }

    }

    public function echoLink( $arg=null ){

        foreach( $this->model->afmPage->link as $link ){
            echo $link;
        }

    }

    public function echoScript( $arg=null ){

        foreach( $this->model->afmPage->script as $script ){
            echo $script;
        }

    }

    public function echoNav( $arg, $arg1=null, $arg2=null, $arg3=null ){

        if( is_array($arg) ){
            if( empty($arg['menu']) ){
                trigger_error('Missing menu in echoNavBar', E_USER_ERROR);
            }
            $menu = $arg['menu'];
            $selected = ( empty($arg['selected']) ) ? null : $arg['selected'];
            $navtype = ( empty($arg['navtype']) ) ? null : $arg['navtype'];
            $navpos = ( empty($arg['navpos']) ) ? null : $arg['navpos'];
        }else{
            //( menu, selected, navtype, navpos )
            $menu = $arg;
            $selected = ( empty($arg1) ) ? null : $arg1;
            $navtype = ( empty($arg2) ) ? null : $arg2;
            $navpos = ( empty($arg3) ) ? null : $arg3;
        }

        $return = '<ul class="nav';
        switch( $navtype ){
            case 'vertical':
                $type = ' flex-column';
                break;
            case 'tab':
                $type = ' nav-tabs';
                break;
            case 'tabs':
                $type = ' nav-tabs';
                break;
            case 'pill':
                $type = ' nav-pills';
                break;
            case 'pills':
                $type = ' nav-pills';
                break;
            default:
                $type = '';
                break;
        }
        switch( $navpos ){
            case 'r':
                $type .= ' justify-content-end';
                break;
            case 'right':
                $type .= ' justify-content-end';
                break;
            case 'c':
                $type .= ' justify-content-center';
                break;
            case 'center':
                $type .= ' justify-content-center';
                break;
            case 'j':
                $type .= ' nav-justified';
                break;
            case 'justified':
                $type .= ' nav-justified';
                break;
        }
        $return .= $type.'">';
        foreach( $this->model->afmPage->{$menu} as $item ){
            $item['link'] = ( empty($item['link']) ) ? null : $item['link'];
            $item['page'] = ( empty($item['page']) ) ? null : $item['page'];
            $item['pos'] = ( empty($item['pos']) ) ? null : $item['pos'];
            $item['dropid'] = ( empty($item['dropid']) ) ? null : $item['dropid'];
            $item['dropmenu'] = ( empty($item['dropmenu']) ) ? null : $item['dropmenu'];
            if( empty($item['dropmenu']) ){
                $return .= '<li class="nav-item">';
                $return .= '<a class="nav-link';
                $return .= ( $selected == $item['page'] ) ? ' active' : '';
                $return .= '" href="'.$item['link'].'">'.$item['title'].'</a>';
            }else{
                $return .= '<li class="nav-item dropdown">';
                $return .= '<a class="nav-link dropdown-toggle" href="'.$item['link'].'"  id="'.$item['dropid'].'" data-toggle="dropdown">'.$item['title'].'</a>';
                $return .= ( $item['pos'] == 'r' ) ? '<div class="dropdown-menu dropdown-menu-right">' : '<div class="dropdown-menu">';
                foreach( $item['dropmenu'] as $drop ){
                    if( $drop[0] == '_divider_' ){
                        $return .= '<div class="dropdown-divider"></div>';
                    }elseif( $drop[0] == '_header_' ){
                        $return .= '<div class="dropdown-header">'.$drop[1].'</div>';
                    }else{
                        $return .= '<a class="dropdown-item" href="'.$drop[1].'">'.$drop[0].'</a>';
                    }
                }
                $return .= '</div>';
            }
            $return .= '</li>';
        }

        $return .= '</ul>';

        echo $return;

    }

    public function echoNavBar( $arg, $arg1=null, $arg2=null ){

        if( is_array($arg) ){
            if( empty($arg['menu']) ){
                trigger_error('Missing menu in echoNavBar', E_USER_ERROR);
            }
            $menu = $arg['menu'];
            $selected = ( empty($arg['selected']) ) ? null : $arg['selected'];
            $navclass = ( empty($arg['navclass']) ) ? null : $arg['navclass'];
        }else{
            //( menu, selected, navclass )
            $menu = $arg;
            $selected = $arg1;
            $navclass = $arg2;
        }

        $navclass = ( empty($navclass) ) ? 'navbar navbar-expand-sm bg-light navbar-light' : $navclass;

        $brand = '';
        $leftText = '';
        $rightText = '';
        $left = '';
        $right = '';
        $return = '<nav class="'.$navclass.'">';

        if( !empty($this->model->afmPage->{$menu}) ){
            foreach( $this->model->afmPage->{$menu} as $item ){
                if( !empty($item['brand']) ){
                    $brand = '<a class="navbar-brand" href="'.$item['link'].'">'.$item['title'].'</a>';
                }elseif( !empty($item['text']) ){
                    switch( $item['text'] ){
                        case 'r':
                            $rightText .= '<span class="">'.$item['title'].'</span>';
                            break;
                        default:
                            $leftText .= '<span class="">'.$item['title'].'</span>';
                            break;
                    }
                }else{
                    $item['link'] = ( empty($item['link']) ) ? null : $item['link'];
                    $item['page'] = ( empty($item['page']) ) ? null : $item['page'];
                    $item['pos'] = ( empty($item['pos']) ) ? null : $item['pos'];
                    $item['dropid'] = ( empty($item['dropid']) ) ? null : $item['dropid'];
                    $item['dropmenu'] = ( empty($item['dropmenu']) ) ? null : $item['dropmenu'];
                    if( $item['pos'] == 'right' or $item['pos'] == 'r' ){
                        $right .= $this->doNavPos( $item, $selected );
                    }else{
                        $left .= $this->doNavPos( $item, $selected );
                    }
                }
            }
        }
        if( empty($right) ){
            $left = '<ul class="navbar-nav">'.$left.'</ul>';
        }else{
            $left = '<ul class="navbar-nav mr-auto">'.$left.'</ul>';
            $right = '<ul class="navbar-nav">'.$right.'</ul>';
        }
        $return .= $brand.$leftText.$left.$right.$rightText.'</nav>';

        echo $return;

    }

    protected function doNavPos( $item, $selected ){

        $return = '';
        if( empty($item['dropmenu']) ){
            $return .= '<li class="nav-item';
            $return .= ( $selected == $item['page'] ) ? ' active">' : '">';
            $return .= '<a class="nav-link" href="'.$item['link'].'">'.$item['title'].'</a>';
        }else{
            $return .= '<li class="nav-item dropdown';
            $return .= ( $selected == $item['page'] ) ? ' active">' : '">';
            $return .= '<a class="nav-link dropdown-toggle" href="'.$item['link'].'"  id="'.$item['dropid'].'" data-toggle="dropdown">'.$item['title'].'</a>';
            $return .= ( $item['pos'] == 'r' or $item['pos'] == 'right' ) ? '<div class="dropdown-menu dropdown-menu-right">' : '<div class="dropdown-menu">';
            foreach( $item['dropmenu'] as $drop ){
                if( $drop[0] == '_divider_' ){
                    $return .= '<div class="dropdown-divider"></div>';
                }elseif( $drop[0] == '_header_' ){
                    $return .= '<div class="dropdown-header">'.$drop[1].'</div>';
                }else{
                    $return .= '<a class="dropdown-item" href="'.$drop[1].'">'.$drop[0].'</a>';
                }
            }
            $return .= '</div>';
        }
        $return .= '</li>';

        return $return;

    }

    public function echoPaging( $arg ){

        $arg['href'] = ( empty($arg['href']) ) ? '?' : $arg['href'];
        $arg['key'] = ( empty($arg['key']) ) ? 'afPage' : $arg['key'];
        $arg['curpage'] = ( empty($arg['curpage']) ) ? 1 : $arg['curpage'];
        $arg['totpages'] = ( empty($arg['totpages']) ) ? $arg['curpage'] : $arg['totpages'];
        $arg['pos'] = ( empty($arg['pos']) ) ? '' : $arg['pos'];
        $reqSep = ( AFCLEANURL ) ? '?' : '&';
        switch( $arg['pos'] ){
            case 'end':
                $pos = 'justify-content-end';
                break;
            case 'right':
                $pos = 'justify-content-end';
                break;
            case 'center':
                $pos = 'justify-content-center';
                break;
            default:
                $pos = 'justify-content-center';
                break;
        }
        $arg['pos'] = ( empty($arg['pos']) ) ? 'center' : $arg['pos'];

        $first = $arg['href'].$reqSep.$arg['key'].'=1';
        $last = $arg['href'].$reqSep.$arg['key'].'='.$arg['totpages'];

        $start = ( $arg['curpage'] - 3 < 1 ) ? 1 : $arg['curpage'] - 3;
        $end = $arg['curpage'] + 3;

        $return = '<ul class="pagination '.$pos.'">';
        if( $arg['curpage'] == 1 ){
            $return .= '<li class="page-item disabled"><a class="page-link" href="'.$first.'">First</a></li>';
        }else{
            $return .= '<li class="page-item"><a class="page-link" href="'.$first.'">First</a></li>';
        }


        for( $x = $start; $x < $end; $x++ ){
            if( $x == $arg['curpage'] ){
                $return .= '<li class="page-item active"><a class="page-link" href="'.$arg['href'].$reqSep.$arg['key'].'='.$x.'">'.$x.'</a></li>';
            }elseif(  $x > $arg['totpages'] ){
                break;
            }else{
                $return .= '<li class="page-item"><a class="page-link" href="'.$arg['href'].$reqSep.$arg['key'].'='.$x.'">'.$x.'</a></li>';
            }
        }

        if( $arg['curpage'] >= $arg['totpages'] ){
            $return .= '<li class="page-item disabled"><a class="page-link" href="'.$last.'">Last</a></li>';
        }else{
            $return .= '<li class="page-item"><a class="page-link" href="'.$last.'">Last</a></li>';
        }
        $return .= '</ul>';

        echo $return;

    }

}
?>

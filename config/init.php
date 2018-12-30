<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.0.0
config/init.php
Script Initialization
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

//*handle errors*//
error_reporting(0);
include_once(AFROOT.'model/afm.error.e.php');
$afmError = new afmErrorE();
set_error_handler( array($afmError,'error') );

//*handle routing*//
include_once(AFROOT.'route/trigger.php');
include_once(AFROOT.'model/afm.routing.e.php');
$arg = array(
    'trait' => $routing['trait'],
    'model' => $routing['model'],
    'view' => $routing['view'],
    'control' => $routing['control']
);
$afmRouting = new afmRoutingE( $arg );
unset($arg);
unset($routing);

//*manage traits*//
if( !empty($afmRouting->trait) ){

    $traitError = '';
    foreach( $afmRouting->trait as $trait ){
        $traitFile = AFROOT.$trait->path.$trait->file;
        if( file_exists($traitFile) ){
            include_once($traitFile);
            if( !trait_exists($trait->name) ){
                trigger_error('Trait name '.$trait->name.' does not exist<br>Check that routing <em>name</em> matches trait name', E_USER_ERROR);
            }
        }else{
            $traitError[] = $traitFile;
        }
    }
    if( !empty($traitError) ){
        $errorString = '';
        foreach( $traitError as $fileError ){
            $errorString .= '<strong>'.$fileError.'</strong><br>';
        }
        trigger_error('Trait file(s) not found<br>'.$errorString.'Check that <em>file</em> and <em>path</em> is correct in routing', E_USER_ERROR);
    }
}

//*manage models*//
if( !empty($afmRouting->model) ){

    $afModel = new stdClass();
    $modelError = '';
    foreach($afmRouting->model as $model){
        $modelFile = AFROOT.$model->path.$model->file;
        if( file_exists($modelFile) ){
            include_once($modelFile);
            if( !class_exists($model->name) ){
                trigger_error('Model name '.$model->name.' does not exist<br>Check that routing <em>name</em> matches class name', E_USER_ERROR);
            }
            if( empty($model->alias) ){
                if( empty($model->arg) ){
                    $afModel->{$model->name} = new $model->name();
                }else{
                    $afModel->{$model->name} = new $model->name($model->arg);
                }
            }else{
                if( empty($model->arg) ){
                    $afModel->{$model->alias} = new $model->name();
                }else{
                    $afModel->{$model->alias} = new $model->name($model->arg);
                }
            }
        }else{
            $modelError[] = $modelFile;
        }
    }
    if( !empty($modelError) ){
        $errorString = '';
        foreach( $modelError as $fileError ){
            $errorString .= '<strong>'.$fileError.'</strong><br>';
        }
        trigger_error('Model file(s) not found<br>'.$errorString.'Check that <em>file</em> and <em>path</em> is correct in routing', E_USER_ERROR);
    }

}else{
    trigger_error('Model file not specified<br>At least one model must be specified in routing', E_USER_ERROR);
}

//*manage controller*//
if( !empty($afmRouting->control) ){

    $controlFile = AFROOT.$afmRouting->control->path.$afmRouting->control->file;
    if( file_exists($controlFile) ){
        include_once($controlFile);
        if( class_exists($afmRouting->control->name) ){
            $arg = array(
                'model' => $afModel
            );
            $afControl = new $afmRouting->control->name($arg);
            unset($arg);
        }else{
            trigger_error('Control name '.$afmRouting->control->name.' does not exist<br>Check that routing <em>name</em> matches class name', E_USER_ERROR);
        }
    }else{
        trigger_error('Control file '.$controlFile.' not found<br>Check that <em>file</em> and <em>path</em> is correct in routing', E_USER_ERROR);
    }

}else{
    trigger_error('Control file not specified in routing', E_USER_ERROR);
}

//*manage view*//
if( !empty($afmRouting->view) ){

    $viewFile = AFROOT.$afmRouting->view->path.$afmRouting->view->file;
    if( file_exists($viewFile) ){
        include_once($viewFile);
        if( class_exists($afmRouting->view->name) ){
            $arg = array(
                'model' => $afModel
            );
            $afView = new $afmRouting->view->name($arg);
            unset($arg);
        }else{
            trigger_error('View name '.$afmRouting->view->name.' does not exist<br>Check that routing <em>name</em> matches class name', E_USER_ERROR);
        }
    }else{
        trigger_error('View file '.$viewFile.' not found<br>Check that <em>file</em> and <em>path</em> is correct in routing', E_USER_ERROR);
    }

}else{
    trigger_error('View file not specified in routing', E_USER_ERROR);
}
?>

<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.0.0
model/afm.routing.php
Routing Model
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afmRouting{

    public $trait;
    public $model;
    public $view;
    public $control;

    public function __construct( $arg=null ){

        if( !empty($arg['trait']) ){
            $arg1 = array(
                'trait' => $arg['trait']
            );
            $this->setTrait( $arg1 );
        }
        if( !empty($arg['model']) ){
            $arg1 = array(
                'model' => $arg['model']
            );
            $this->setModel( $arg1 );
        }
        if( !empty($arg['view']) ){
            $arg1 = array(
                'view' => $arg['view']
            );
            $this->setView( $arg1 );
        }
        if( !empty($arg['control']) ){
            $arg1 = array(
                'control' => $arg['control']
            );
            $this->setControl( $arg1 );
        }

    }

    protected function setTrait( $arg ){

        if( empty($arg['trait']) ){
            trigger_error('Missing trait argument', E_USER_ERROR);
        }

        foreach( $arg['trait'] as $data ){
            if( !empty($data['file']) and !empty($data['path']) and !empty($data['name']) ){
                $this->trait[] = (object) $data;
            }
        }

    }

    protected function setModel( $arg ){

        if( empty($arg['model']) ){
            trigger_error('Missing model in setModel', E_USER_ERROR);
        }

        foreach( $arg['model'] as $data ){
            if( !empty($data['file']) and !empty($data['path']) and !empty($data['name']) ){
                $this->model[] = (object) $data;
            }
        }

    }

    protected function setView( $arg ){

        if( empty($arg['view']) ){
            trigger_error('Missing view in setView', E_USER_ERROR);
        }

        $this->view = (object) $arg['view'];

    }

    protected function setControl( $arg ){

        if( empty($arg['control']) ){
            trigger_error('Missing control in setControl', E_USER_ERROR);
        }

        $this->control = (object) $arg['control'];

    }

    public function addTrait( $arg, $arg1=null, $arg2=null ){

        $error = '';
        if( is_array($arg) ){
            if( empty($arg['file']) ){
                $error .= 'Missing file in addTrait<br>';
            }
            if( empty($arg['path']) ){
                $error .= 'Missing path in addTrait<br>';
            }
            if( empty($arg['name']) ){
                $error .= 'Missing name in addTrait<br>';
            }
            if( !empty($error) ){
                trigger_error($error, E_USER_ERROR);
            }

            $this->trait[] = array(
                'file' => $arg['file'],
                'path' => $arg['path'],
                'name' => $arg['name']
            );
        }else{
            if( empty($arg) ){
                $error .= 'Missing file in addTrait<br>';
            }
            if( empty($arg1) ){
                $error .= 'Missing path in addTrait<br>';
            }
            if( empty($arg2) ){
                $error .= 'Missing name in addTrait<br>';
            }
            if( !empty($error) ){
                trigger_error($error, E_USER_ERROR);
            }

            $this->trait[] = array(
                'file' => $arg,
                'path' => $arg1,
                'name' => $arg2
            );
        }

    }

    public function addModel( $arg, $arg1=null, $arg2=null ){

        $error = '';
        if( is_array($arg) ){
            if( empty($arg['file']) ){
                $error .= 'Missing file in addModel<br>';
            }
            if( empty($arg['path']) ){
                $error .= 'Missing path in addModel<br>';
            }
            if( empty($arg['name']) ){
                $error .= 'Missing name in addModel<br>';
            }
            if( !empty($error) ){
                trigger_error($error, E_USER_ERROR);
            }

            $this->model[] = array(
                'file' => $arg['file'],
                'path' => $arg['path'],
                'name' => $arg['name']
            );
        }else{
            if( empty($arg) ){
                $error .= 'Missing file in addModel<br>';
            }
            if( empty($arg1) ){
                $error .= 'Missing path in addModel<br>';
            }
            if( empty($arg2) ){
                $error .= 'Missing name in addModel<br>';
            }
            if( !empty($error) ){
                trigger_error($error, E_USER_ERROR);
            }

            $this->model[] = array(
                'file' => $arg,
                'path' => $arg1,
                'name' => $arg2
            );
        }

    }

}
?>

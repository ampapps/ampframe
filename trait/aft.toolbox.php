<?php
/*
AMP Frame ver 1.0.0
trait/aft.toolbox.php
Toolbox Trait
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

trait aftToolbox{

    public $aftString = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

/*
Random Strings
*/

    public function randStringTool( $length, $string=null, $secure=true ){

        $string = ( empty($string) ) ? $this->aftString : $string;

        if( $length > 255 ){
            trigger_error('Random string size is greater than 255 characters', E_USER_ERROR);
        }

        $return = '';
        for($x=0; $x<$length; $x++){
            if( $secure and function_exists('random_int') ){
                $chr = random_int(0,strlen($string)-1);
            }else{
                $chr = mt_rand(0,strlen($string)-1);
            }
            $return .= $string[$chr];
        }

        return $return;

    }

    public function uniqueRandStringTool( $compare, $maxLength, $minLength=null, $string=null ){

        $flag = true;
        while( $flag ){

            if( empty( $minLength ) ){
                $length = $maxLength;
            }else{
                $length = mt_rand($minLength,$maxLength);
            }

            $randString = $this->randStringTool($length, $string);
            if( is_array($compare) ){
                if( !in_array($randString,$compare) ){
                    $flag = false;
                }
            }else{
                if( $randString == $compare ){
                    $flag = false;
                }
            }

        }

        return $randString;

    }

    public function randStringSetTool( $count, $maxLength, $minLength=null, $string=null ){

        $randArray = array();
        for( $x=0; $x<$count; $x++ ){
            $randArray[$x] = $this->uniqueRandStringTool( $randArray, $maxLength, $minLength, $string );
        }

        return $randArray;

    }

/*
Modified Strings
*/

    public function seasonString( $string, $salt, $pepper ){

        $salted = $this->saltString( $string, $salt );
        $seasoned = md5($pepper.$salted);

        return $seasoned;

    }

    public function saltString( $string, $salt ){

        return md5($string.$salt);

    }

}
?>

<?php

class Functions
{
    /**
     * @param $number
     * @return int
     */
    public function IsPositive($number){
        if($number >= 0){
            return $number;
        }else{
            return 0;
        }
    }

    /**
     * @param $message
     */
    public function message_debug($message)
    {
        if(!isset($_SESSION['debugMessage'])){
            $_SESSION['debugMessage'] = '<br>' . $message;
        }else{
            $_SESSION['debugMessage'] .= '<br>' . $message;
        }

    }

    /**
     * @param $message
     */
    public function message_info($message)
    {
        if(!isset($_SESSION['infoMessage'])){
            $_SESSION['infoMessage'] = '<br>' . $message;
        }else{
            $_SESSION['infoMessage'] .= '<br>' . $message;
        }
    }

    /**
     * @param $message
     */
    public function message_error($message)
    {
        if(!isset($_SESSION['errorMessage'])){
            $_SESSION['errorMessage'] = '<br>' . $message;
        }else{
            $_SESSION['errorMessage'] .= '<br>' . $message;
        }
    }

    /**
     * @param $page
     */
    public function redirect($page)
    {
        header("location:$page");
        exit();
    }
}
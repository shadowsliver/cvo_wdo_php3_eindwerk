<?php
function sendMail($to, $title, $msg)
{
    // use wordwrap() if lines are longer than 70 characters
    if($msg.length() > 70){
        $msg = wordwrap($msg, 70);
    }

    // send email
    mail($to, $title, $msg);

}

function safeNumberUS($number)
{
    /* thanks America!*/
    return str_replace(',', '.', $number);
}
function safeNumberEU($number)
{
    /* thanks America!*/
    return str_replace(',', '.', $number);
}

function validateTelephone($phoneNumber)
{
    $phoneNumber = preg_replace('/[^\d]/', '', $phoneNumber); //replaces none nummeric with nothing
    return preg_match('/^(0\d{10}|[1-9]\d{9})$/', $phoneNumber) and !empty($phoneNumber) ? true : false;
}

function validateEmail($email)
{
    return preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $email) and !empty($email) ? true : false;
}

function validateStringSpaces($string)
{
    //returns true if correct - a-Z and spaces only
    if (preg_match('/^[a-zA-Z ]*$/', $string) and !empty($string)) {
        return true;
    } else {
        return false;
    }
}

function message_debug($message)
{
    if(!isset($_SESSION['debugMessage'])){
        $_SESSION['debugMessage'] = '<br>' . $message;
    }else{
        $_SESSION['debugMessage'] .= '<br>' . $message;
    }

}

function message_info($message)
{
    if(!isset($_SESSION['infoMessage'])){
        $_SESSION['infoMessage'] = '<br>' . $message;
    }else{
        $_SESSION['infoMessage'] .= '<br>' . $message;
    }
}

function message_error($message)
{
    if(!isset($_SESSION['errorMessage'])){
        $_SESSION['errorMessage'] = '<br>' . $message;
    }else{
        $_SESSION['errorMessage'] .= '<br>' . $message;
    }
}

function redirect($page)
{
    header("location:$page");
    exit();
}
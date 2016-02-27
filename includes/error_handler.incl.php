<?php
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        return;
    }

    switch ($errno) {
        case E_USER_ERROR:
            message_debug("<b>My ERROR</b> [$errno] $errstr<br />\n  Fatal error on line $errline in file $errfile, PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\nAborting...<br />\n");
            exit(1);
            break;

        case E_USER_WARNING:
            message_debug("<b>My WARNING</b> [$errno] $errstr\n");
            break;

        case E_USER_NOTICE:
            message_debug("<b>My NOTICE</b> [$errno] $errstr\n");
            break;

        default:
            message_debug("<b>Unknown error type:</b> [$errno] $errstr\n");
            break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}


// set to the user defined error handler
$old_error_handler = set_error_handler("myErrorHandler");

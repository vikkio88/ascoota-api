<?php
require '../vendor/autoload.php';

function isConsole()
{
    return php_sapi_name() == "cli";
}

function logInfo($message)
{
    echo '-- ' . (new DateTime())->format('H:i:s d-m-Y') . '  --- ' . $message . PHP_EOL . (!isConsole() ? '<br />' : '');
}

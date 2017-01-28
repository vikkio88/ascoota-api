<?php
require '../vendor/autoload.php';

function logInfo($message)
{
    echo '-- ' . (new DateTime())->format('H:i:s d-m-Y') . '  --- ' . $message . PHP_EOL;
}

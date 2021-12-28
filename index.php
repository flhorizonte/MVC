<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/vendor/autoload.php';

use App\Kernel;

$kernel = new Kernel;
$kernel->run();

include './src/App/Resources/index.php'

?>


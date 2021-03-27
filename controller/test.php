<?php
error_reporting(E_ALL);
require_once(__DIR__.'/vendor/autoload.php');

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
//$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO); // MODE_DEBUG allows to pinpoint troubles.
$blade = new BladeOne();

echo $blade->setView('home.home')    // it sets the view to render
           ->share(array("titleName"=>"testValueName")) // it sets the variables to sends to the view
           ->run(); // it calls /views/hello.blade.php
?>

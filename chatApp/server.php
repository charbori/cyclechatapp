<?php
require_once(__DIR__. '/../vendor/autoload.php');

$loop = React\EventLoop\Factory::create();

$server = new React\Http\Server($loop, function (Psr\Http\Message\ServerRequestInterface $request) {
    return new React\Http\Message\Response(
        200,
        array(
            'Content-Type' => 'text/plain'
        ),
        "Hello World!\n"
    );
});

$socket = new React\Socket\Server('tcp://0.0.0.0:80', $loop);
$server->listen($socket);
$server->on('error', function (Exception $e) {
    echo 'error: ' . $e->getMessage() . PHP_EOL;
});
$loop->run();
?>

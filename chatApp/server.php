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

$socket = new React\Socket\Server('0.0.0.0:8888', $loop);
$server->listen($socket);

$loop->run();
?>

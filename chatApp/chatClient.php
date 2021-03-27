<?php
require_once(__DIR__. '/../vendor/autoload.php');

use React\Socket\ConnectionInterface;

$loop = React\EventLoop\Factory::create();
$stdin = new \React\Stream\ReadableResourceStream(STDIN, $loop);
$connector = new React\Socket\Connector($loop);

$connector
    ->connect('127.0.0.1:1337')
    ->then(
        function (ConnectionInterface $conn) use ($stdin) {
            $conn->on('data', function ($data) {
                echo $data;
            });
            $stdin->on('data', function ($data) use ($conn) {
                $conn->write($data);
            });
            echo "Connection established\n";
        },
        function (Exception $exception) use ($loop) {
            echo "Cannot connect to server: " . $exception->getMessage();
            $loop->stop();
        });

$loop->run();
?>

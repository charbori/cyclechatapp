<?php
require_once(__DIR__. '/../vendor/autoload.php');

use React\Socket\ConnectionInterface;
use ChatApp\ConnectionsPool\ConnectionsPool;

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server('127.0.0.1:1337', $loop);
$pool = new ConnectionsPool();
//$pool = new ConnectionsPool();

$socket->on('connection', function(ConnectionInterface $connection) use ($pool) {
    $pool->add($connection);
});

echo "Listening on {$socket->getAddress()}\n";

$loop->run();
?>

<?php
namespace ChatApp\ConnectionsPool;
require_once(__DIR__. '/../vendor/autoload.php');

use React\Socket\ConnectionInterface;

class ConnectionsPool {
    private $connections;

    public function __construct() {
        $this->connections = new \SplObjectStorage();
    }

    public function add(ConnectionInterface $connection) {
        $connection->write("Hi\n");

        $this->initEvents($connection);
        $this->connections->attach($connection);

        $this->sendAll("New user enters the chat\n", $connection);
    }

    private function initEvents(ConnectionInterface $connection) {
        $connection->on('data', function ($data) use ($connection) {
            $this->sendAll($data, $connection);
        });

        $connection->on('close', function () use ($connection) {
            $this->connections->detach($connection);
            $this->sendAll("A user leaves the chat\n", $connection);
        });
    }

    private function sendAll($data, ConnectionInterface $except) {
        foreach ($this->connections as $conn) {
            if ($conn != $except) $conn->write($data);
        }
    }
}
?>

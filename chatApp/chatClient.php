<?php
require_once(__DIR__. '/../vendor/autoload.php');

use React\Socket\ConnectionInterface;
use eftec\bladeone\BladeOne;

$loop = React\EventLoop\Factory::create();
$stdin = new \React\Stream\ReadableResourceStream(STDIN, $loop);
$connector = new React\Socket\Connector($loop);

$connector
    ->connect('0.0.0.0:80')
    ->then(
        function (ConnectionInterface $conn) use ($stdin) {
            $conn->on('data', function ($data) {
                $data_html = <<<HTML
                <!DOCTYPE html>
                <html>
                  <head>
                    <meta charset="utf-8">
                    <title>Chat</title>
                    <style>
                      .chat_log{ width: 95%; height: 200px; }
                      .name{ width: 10%; }
                      .message{ width: 70%; }
                      .chat{ width: 10%; }
                    </style>
                  </head>
                  <body>
                    <div>
                      <textarea id="chatLog" class="chat_log" readonly></textarea>
                    </div>
                    <span>
                        <textarea  id="name" class="name" type="text"  rows="8" cols="80"></textarea>
                    </span>
                    <span>
                        <input id="message" class="message" type="text">
                    </span>
                    <span>
                        <button class="chat" value="chat">send</button>
                    </span>
                    <div id="box" class="box">
                    <script src="//code.jquery.com/jquery-1.11.1.js"></script>
                    <script>
                      var exampleSocket = new WebSocket("wss://couhensoft.com:1337/");

                      exampleSocket.onmessage = function (data_event) {
                          $('#chatLog').append(data_event+'\n');
                          $('#chatLog').scrollTop($('#chatLog')[0].scrollHeight);
                      }
                      exampleSocket.onopen = function (event) {
                          exampleSocket.send('Connected!');
                          $('#chat').on('click', function(e) { //2
                              exampleSocket.send($('#message').val());
                              $('#message').val('');
                              $('#message').focus();
                              e.preventDefault();
                          });
                      };
                    </script>
                  </body>
                </html>
HTML;
                echo $data_html;
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

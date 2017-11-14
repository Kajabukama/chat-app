<?php

   require('vendor/autoload.php');

   use Ratchet\Server\IoServer;
   use PerformanceSupport\Chat;
   use Ratchet\Http\HttpServer;
   use Ratchet\WebSocket\WsServer;

   $server = IoServer::factory(new HttpServer(new WsServer( new Chat())),9000);

   $server->run();

 ?>

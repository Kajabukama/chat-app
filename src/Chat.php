<?php

   namespace PerformanceSupport;

   use Ratchet\MessageComponentInterface;
   use Ratchet\ConnectionInterface;

   class Chat implements MessageComponentInterface
   {
      private $clients;

      function __construct()
      {
         $this->clients = new \SplObjectStorage;
      }

      public function onOpen(ConnectionInterface $conn)
      {
         $this->clients->attach($conn);
         echo "{ $conn->resourceId } is now online\n";
      }

      public function onMessage(ConnectionInterface $from, $msg)
      {
         foreach ($this->clients as $client) {
            if ($client !== $from) {
               $client->send($msg);
            }
         }
      }

      public function onClose(ConnectionInterface $conn)
      {
         $this->clients->detach($conn);
         echo "{ $conn->resourceId } is now offline\n";
      }

      public function onError(ConnectionInterface $conn, \Exception $err)
      {
         echo " An error occured : { $err->getMessage() }";
         $conn->close();
      }
   }


?>

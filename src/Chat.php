<?php

   namespace PerformanceSupport;

   use Ratchet\MessageComponentInterface;
   use Ratchet\ConnectionInterface;
   use PerformanceSupport\Entities\Message;

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
         echo "{ $conn->resourceId } is now connected\n";
      }

      public function onMessage(ConnectionInterface $from, $msg)
      {
        $msg = json_decode($msg);
        switch ($msg->type) {
          case 'message':
            foreach ($this->clients as $client) {
              if ($client !== $from) {
                $client->send($msg->text);
              }
            }
            Message::create([
              'text' => $msg->text,
              'sender' => $msg->sender
            ]);
            break;
          
          default:
            # code...
            break;
        }
         
      }

      public function onClose(ConnectionInterface $conn)
      {
         $this->clients->detach($conn);
         echo "{$conn->resourceId} is now disconnected\n";
      }

      public function onError(ConnectionInterface $conn, \Exception $e)
      {
         echo " An error occured : {$e->getMessage()}";
         $conn->close();
      }
   }


?>

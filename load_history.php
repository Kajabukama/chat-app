<?php

   require('vendor/autoload.php');
   use \PerformanceSupport\Entities\Message;

   echo Message::all()->toJSON();


?>

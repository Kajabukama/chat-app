<?php

  namespace PerformanceSupport\Entities;

  class Message extends \Illuminate\Database\Eloquent\Model
  {
      protected $fillable = ['text', 'sender'];

  }


?>

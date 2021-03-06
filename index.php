<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>PerformanceSupport Chat</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/default.css">
</head>
<body>

   <nav class="navbar navbar-default navbar-fixed-top">
     <div class="container-fluid">
        <a class="navbar-brand" href="#">PerformanceSupport</a></a>
     </div>
   </nav>

   <nav class="navbar navbar-default navbar-fixed-bottom">
     <div class="container-fluid">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
             <form class="chat-form" method="POST">
               <div class="form-group">
                 <div class="input-group">
                   <div class="input-group-addon">+</div>
                   <input type="text" class="form-control input-lg" id="message" placeholder="Type your message here..." autocomplete="off">
                 </div>
               </div>
             </form>
          </div>
          <div class="col-md-2"></div>
        </div>
     </div>
   </nav>

   <div class="container-fluid">
      <div class="row">

         <div class="col-md-2">
            <div class="row">
               <div class="col-md-12">
                 <div class="left-chat-section">
                   <h5>Channels</h5>
                 </div>
               </div>
               <div class="col-md-12">
                  <div class="left-chat-section">
                    <h5>Direct Messages</h5>
                    <ul class="list-group">
                      <li class="list-group-item chat_name"></li>
                    </ul>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-8">
            <div class="chat-messages">
               <ul class="media-list" id="message-list"></ul>
            </div>
         </div>

         <div class="col-md-2 text-align-right">
         </div>


      </div>
   </div>


   <script src="js/jquery-3.2.1.slim.min.js"></script>
   <script src="js/jquery.cookie.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/chat.js"></script>

</body>
</html>

$(document).ready( function(){

   var conn = new WebSocket('ws://localhost:9000');
   var chatform = $('.chat-form');
   var messageInput = chatform.find('#message');
   var messageList = $('#message-list');

   chatform.on('submit', function (ev) {
      ev.preventDefault();
      message = {
         text: messageInput.val(),
         sender: $.cookie('chat_name'),
         type: 'message'
      }

      conn.send(JSON.stringify(message));

      var media = "<li class='media'><div class='media-left'>"+
      "<a href='#'><img class='media-object' src='imgs/100x100.png'></a></div>"+
         "<div class='media-body'><h5 class='media-heading'>" + message.sender + "<small>12:23 PM</small></h5>" + message.text + "</div></li>";
      
      messageList.prepend(media)
      messageInput.val("");
   })


   conn.onopen = function (e) {

     console.log('connection established');
     $.ajax({
       url: 'load_history.php',
       type: 'GET',
       dataType: 'json',
       success: function (data) {
         $.each(data, function () {

           var media = "<li class='media'><div class='media-left'>"+
           "<a href='#'><img class='media-object' src='imgs/100x100.png'></a></div>"+
           "<div class='media-body'><h5 class='media-heading'>"+ this.sender +"<small>"+ this.created_at+"</small></h5>"+ this.text +"</div></li>";
           messageList.prepend(media)
         });
       }
     });

     var chat_name = $.cookie('chat_name');
     if (!chat_name) {
       var timestamp = (new Date()).getTime();
       chat_name = timestamp;
       $.cookie('chat_name', chat_name);
       console.log(chat_name)
     }
     $('.chat_name').text(chat_name);  
   }

   conn.onmessage = function (e){
     console.log(e.data);

     var media = "<li class='media'><div class='media-left'>"+
     "<a href='#'><img class='media-object' src='imgs/100x100.png'></a></div>"+
     "<div class='media-body'><h5 class='media-heading'>"+ $.cookie('chat_name') +"<small>12:23 PM</small></h5>"+ e.data +"</div></li>";
     messageList.prepend(media)
     messageInput.val("");
   }

})

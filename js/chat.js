$(document).ready( function(){

   var conn = new WebSocket('ws://localhost:9000');
   var chatform = $('.chat-form');
   var messageInput = chatform.find('#message');
   var messageList = $('#message-list');

   chatform.on('submit', function (ev) {
      ev.preventDefault();
      message = messageInput.val();
      conn.send(message);

      var media = "<li class='media'><div class='media-left'>"+
      "<a href='#'><img class='media-object' src='imgs/100x100.png'></a></div>"+
      "<div class='media-body'><h5 class='media-heading'>Kajabukama</h5>" + message + "</div></li>";

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
           "<div class='media-body'><h5 class='media-heading'>Kajabukama</h5>"+ this.message +"</div></li>";

           messageList.prepend(media)
         });
       }
     });
   }

   conn.onmessage = function (e){
     console.log(e.data);

     var media = "<li class='media'><div class='media-left'>"+
     "<a href='#'><img class='media-object' src='imgs/100x100.png'></a></div>"+
     "<div class='media-body'><h5 class='media-heading'>Kajabukama</h5>"+ e.data +"</div></li>";

     messageList.prepend(media)
     messageInput.val("");
   }

})

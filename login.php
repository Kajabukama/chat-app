<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    if (!empty($email) && !empty($password)) {
      $_SESSION['email'] = $email;
      header('location: chat.php');
    }
  }
 ?>
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

   <!-- <nav class="navbar navbar-default navbar-fixed-top">
     <div class="container">
        <a class="navbar-brand" href="#">PerformanceSupport</a>
     </div>
   </nav> -->


   <div class="container-fluid">
      <div class="row">

         <div class="col-md-4 col-md-offset-4">
            <div class="chat-messages">
              <form method="POST" action="">
                <div class="form-group">
                  <input type="email" class="form-control input-lg" name="inputEmail" placeholder="Email address">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control input-lg" name="inputPassword" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Signin</button>
               </form>
            </div>
         </div>

      </div>
   </div>



   <script src="js/jquery-3.2.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/chat.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/chat.css">
  <script defer src="/public/js/chat.js"></script>

  <?php //require "./includes/head.php" 
  ?>
  <title>chat</title>
</head>

<body>
  <form class="container" action="/controllers/chat.php?task=write" method="POST">

    <div class="people-list" id="people-list">
      <div class="search">
        <input type="text" placeholder="search" />
        <i class="fa fa-search"></i>
      </div>
      <ul class="list">
        <li class="clearfix">
          <div class="content-img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
          </div>
          <div class="about">
            <div class="name">Vincent Porter</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>

        <li class="clearfix">
          <div class="content-img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_04.jpg" alt="avatar" />
          </div>
          <div class="about">
            <div class="name">Erica Hughes</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>

        <li class="clearfix">
          <div class="content-img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_06.jpg" alt="avatar" />
          </div>
          <div class="about">
            <div class="name">Tracy Carpenter</div>
            <div class="status">
              <i class="fa fa-circle offline"></i> left 30 mins ago
            </div>
          </div>
        </li>

        <li class="clearfix">
          <div class="content-img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_09.jpg" alt="avatar" />
          </div>
          <div class="about">
            <div class="name">Dean Henry</div>
            <div class="status">
              <i class="fa fa-circle offline"></i> offline since Oct 28
            </div>
          </div>
        </li>

        <li class="clearfix">
          <div class="content-img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_10.jpg" alt="avatar" />
          </div>
          <div class="about">
            <div class="name">Peyton Mckinney</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="chat">
      <div class="chat-header clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />

        <div class="chat-about">
          <div class="chat-with">Chat with Vincent Porter</div>
          <div class="chat-num-messages">already 1 902 messages</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->

      <div class="chat-history">
        <ul class="chat-contents">

        </ul>
      </div> <!-- end chat-history -->
      <div class="chat-message clearfix">
        <label for="validationCustom01" class="form-label">Author</label>

        <input type="text" class="form-control" name="author" id="author" id="validationCustom01">
        <textarea class="form-control" placeholder="Message" name="content" id="content"></textarea>
        <!-- <textarea name="message-to-send" id="message-to-send" placeholder="Type your message" rows="3"></textarea> -->

        <button type="submit" class="btn btn-primary">
          <img src="/public/img/icons/send.svg" alt="envoyer">
        </button>
      </div> <!-- end chat-message -->
    </div> <!-- end chat -->
  </form> <!-- end container -->
</body>
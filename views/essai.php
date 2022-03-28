<?php
require_once '../controllers/auth-post.php';
require_once '../controllers/manager.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "./includes/head.php" ?>


  <title>essai</title>
</head>

<body>

  <form>
    <label>nom:</label>
    <input type="text" name="nom" placeholder="nom" class="form-submit" />
    <br />
    <label>prenom:</label>
    <input type="text" name="prenom" placeholder="prenom" class="form-submit" /><br />
    <br>
    <input type="submit" value="Envoyer" />
  </form>
  <div></div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
    data-whatever="@mdo">Open modal for @mdo</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
    data-whatever="@fat">Open modal for @fat</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
    data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<!--  <div class="message-data">
            <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
            <span class="message-data-time">10:12 AM, Today</span>
          </div>
          <div class="message my-message">
            Are we meeting today? Project has been already finished and I have results to show you.
          </div> -->



<!--<div class="clearfix">
          <div class="message-data align-right">
            <span class="message-data-time">10:14 AM, Today</span> &nbsp; &nbsp;
            <span class="message-data-name">Olia</span> <i class="fa fa-circle me"></i>

          </div>
          <div class="message other-message float-right">
            Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have you faced any
            problems at the last phase of the project?
          </div>
        </div>
        <div class="">
          <div class="message-data">
            <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
            <span class="message-data-time">10:12 AM, Today</span>
          </div>
          <div class="message my-message">
            Are we meeting today? Project has been already finished and I have results to show you.
          </div>
        </div>

        <div class="clearfix">
          <div class="message-data align-right">
            <span class="message-data-time">10:14 AM, Today</span> &nbsp; &nbsp;
            <span class="message-data-name">Olia</span> <i class="fa fa-circle me"></i>
          </div>
          <div class="message other-message float-right">
            Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have you faced any
            problems at the last phase of the project?
          </div>
        </div> -->
<!-- <ul class="chat-contents">

        </ul> -->
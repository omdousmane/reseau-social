<?php
require_once '../controllers/auth-post.php';
require_once '../controllers/manager.php';
$currentUser = $authDBs->isLoggedin();
if (!$currentUser) {
  header('Location: /');
}
$listOnlines = $authDbChat->onlineLoggedin($currentUser['id_user']);

// var_dump($listOnlines);
?>
<!doctype html>
<html lang="fr">

<head>
  <?php require "./includes/head.php" ?>
</head>

<body>

  <?php require "./includes/header.php" ?>

  <main>

    <article class="topbar row my-40">
      <form class="topbar__form col-12" method="POST">
        <div class="user w-25 mr-20">
          <img src="/public/img/icons/user-img.svg" class="" alt="user">
        </div>
        <div class="form-floating post-area col-8 mr-20">
          <textarea class="content-text form-control" placeholder="Crée un Post" name="content"
            id="floatingTextarea"></textarea>
          <label class="label" for="floatingTextarea">Crée un Post</label>
          <?php if ($errors['content']) : ?>
          <p class="text-danger"><?= $errors['content'] ?></p>
          <?php endif; ?>
        </div>
        <select class="form-select col-2 mr-20" name="category" aria-label="Default select example">
          <?php foreach ($categories as $categorie) : ?>
          <option><?php echo $categorie['nameCat'] ?></option>
          <?php endforeach; ?>
        </select>
        <input type="text" class="form-control form-input col-2 mr-20" name="title" placeholder="Crée un Post"
          id="floatingTextarea">
        <button type="submit" class="btn btn-primary form-submit">Poster</button>
      </form>


    </article>
    <div class="row">
      <article class="col-12 main-categories">
        <section class="categories--content">
          <?php if ($currentUser) : ?>
          <?php echo $currentUser['firstname'] ?>
          <br>
          <?php echo $currentUser['lastname'] ?>
          <br>
          <?php echo $currentUser['speudo'] ?>
          <?php endif ?>
        </section>
        <section class="categories--content">
          2
        </section>
        <section class="categories--content">
          3
        </section>
        <section class="categories--content">
          4
        </section>
      </article>
    </div>
    <h3 class="mb-40-mx-10">PUBLICATIONS POPULAIRES</h3>

    <!-- 2eme block -->
    <div class="row block-posts col-8 col-lg-8 block-post">
      <!-- <div class="col-8 col-lg-8 block-post"> -->
      <?php foreach ($posts as $post) :  ?>

      <!-- les postes -->
      <div class="card text-white bg-primary mb-3 posts">
        <div class="card-header"><?php echo $post['title'] ?></div>
        <div class="card-body">
          <?php foreach ($categories as $categorie) : ?>
          <?php if ($categorie['id'] === $post['idCat']) : ?>
          <h5 class="card-title"><?php echo $categorie['nameCat'] ?></h5>
          <?php endif; ?>
          <?php endforeach; ?>
          <p class="card-text">
            <?php echo $post['content'] ?>
          </p>
        </div>
        <div class="middle-nav-comment">
          <div class="icons">
            <div class="icons-img">
              <img src="/public/img/icons/eva_message-circle-fill.svg" class="like" alt="user">
              <img src="/public/img/icons/bi_arrow-up-right-circle.svg" class="comment-toggle">
            </div>
            <div class="comment">
              commmentaire
            </div>
          </div>
          <form action="" class="row form-comment container">
            <input type="text" class="form-control col-8 mr-20" name="title" placeholder="Commenter..."
              id="floatingTextarea">
            <button type="submit" class="btn btn-primary col-3">commenter</button>
          </form>
        </div>
      </div>
      <?php endforeach;  ?>

    </div>

    <div class="col-4 col-lg-4 block-aside mb-40">
      <section class=" aside mb-20">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod temporibus iste laborum ullam, corrupti at
        reiciendis eius, ex sit molestias possimus vitae animi quae a repudiandae hic saepe voluptates. Nihil.
      </section>
      <section class=" aside mb-20">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod temporibus iste laborum ullam, corrupti at
        reiciendis eius, ex sit molestias possimus vitae animi quae a repudiandae hic saepe voluptates. Nihil.
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod temporibus iste laborum ullam, corrupti at
        reiciendis eius, ex sit molestias possimus vitae animi quae a repudiandae hic saepe voluptates. Nihil.
      </section>
    </div>
  </main>
  <!-- le chat -->
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <article class="show-chat panel-chat">
    <div class="people-list" id="people-list">
      <form class="" method="POST">
        <div class="search">
          <input type="search" name="search" name="search" placeholder="search..." />
        </div>
      </form>
      <div class="list">
        <?php foreach ($listOnlines as $listOnline) : ?>
        <?php $userOnlines = $authDbChat->getUserById($listOnline['userid']); ?>
        <?php foreach ($userOnlines as $userOnline) : ?>
        <div class="clearfix">
          <div class="content-img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
          </div>
          <div class="about">

            <div class="name"><?php echo $userOnline['firstname'] . ' ' . $userOnline['lastname'] ?></div>

            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
            <!-- form de selection du membre connecté -->
            <form class="form">
              <button type="text" class="talk btn btn-secondary"
                value="<?php echo $currentUser['id_user'] . '' . $userOnline['id_user'] . $currentUser['lastname'] ?>">
                discuter
              </button>
            </form>
          </div>
        </div>
        <?php endforeach ?>
        <?php endforeach ?>
      </div>
    </div>

    <div class="chat">
      <div class="chat-header">
        <div class="chat-about">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
          <?php if ($currentUser['id_user'] === $userOnline['id_user']) : ?>
          <div class="chat-with linkUserOnline"><?php echo $userOnline['firstname'] . ' ' . $userOnline['lastname'] ?>
            <i class="fa fa-circle online"></i> online
          </div>
          <?php endif ?>
        </div>
        <i class="fa fa-star"></i>
      </div>
      <!-- end chat-header -->

      <!-- chat history -->
      <div class="chat-history">
        <div class="chat-contents">

        </div>
      </div>
      <!-- end chat-history -->
      <form id="form-chat">
        <div class="chat-message">
          <textarea class="form-control content" placeholder="Message" name="content" id="content"></textarea>
          <button type="submit" class="send">
            <img src="/public/img/icons/send.svg" alt="envoyer">
          </button>
        </div>
        <!-- end chat-message -->
      </form>
      <!-- end container -->
    </div>
  </article>

</body>

</html>
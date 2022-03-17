<?php
require '../config.php';
$authDB = require_once '../models/security.php';
$currentUser = $authDB->isLoggedin();
if (!$currentUser) {
  header('Location: /');
}
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
          <textarea class="form-control" placeholder="Crée un Post" id="floatingTextarea"></textarea>
          <label for="floatingTextarea">Crée un Post</label>
        </div>
        <select class="form-select  col-2" aria-label="Default select example">
          <option selected>Categories</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </form>

    </article>
    <div class="row">
      <article class="col-12 main-categories">
        <section class="categories--content">
          1
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
    <div class="row block-posts">
      <div class="col-8 col-lg-8 block-post">
        <section class="posts">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum voluptates nesciunt dolorum voluptatum quod,
          saepe
          accusantium dicta veniam ut temporibus sed sit perspiciatis. Eaque soluta beatae, necessitatibus sed nam
          facere?
        </section>
        <section class="posts">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum voluptates nesciunt dolorum voluptatum quod,
          saepe
          accusantium dicta veniam ut temporibus sed sit perspiciatis. Eaque soluta beatae, necessitatibus sed nam
          facere?
        </section>
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
    </div>
  </main>
  <!-- le chat -->

  <div class="container-chat-message">
    <?php //require "./chat.php" 
    ?>
  </div>

</body>

</html>
<?php
require 'config.php';
$authDB = require_once 'models/security.php';
$currentUser = $authDB->isLoggedin();

// if (!$currentUser) {
//   header('Location: /');
// }
var_dump($currentUser);

?>
<!doctype html>
<html lang="fr">

<head>
  <?php require "./views/includes/head.php" ?>
</head>

<body>
  <?php require "./views/includes/header.php" ?>
  <main>
    <h3 class="mb-40-mx-10">TENDANCE D’AUJOURD’HUI</h3>
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
        <section class=" aside mb-20">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod temporibus iste laborum ullam, corrupti at
          reiciendis eius, ex sit molestias possimus vitae animi quae a repudiandae hic saepe voluptates. Nihil.
        </section>
        <section class=" aside mb-20">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod temporibus iste laborum ullam, corrupti at
          reiciendis eius, ex sit molestias possimus vitae animi quae a repudiandae hic saepe voluptates. Nihil.
        </section>
        <section class=" aside mb-20">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod temporibus iste laborum ullam, corrupti at
          reiciendis eius, ex sit molestias possimus vitae animi quae a repudiandae hic saepe voluptates. Nihil.
        </section>

      </div>
    </div>
  </main>
  <?php require "./views/includes/footer.php" ?>
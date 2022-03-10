<?php
require_once '../controllers/auth-order.php';
$currentUser = $authDB->isLoggedin();

if (!$currentUser) {
  header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require_once '../views/includes/head.php' ?>
  <link rel="stylesheet" href="../public/css/layout/index.css">
  <title>Profile</title>
</head>

<body>
  <div class="container">
    <header class="header-top bg-secondary" id="header">
      <div class="header-logo">
        <div>
          <div class="rotate-center text-center">Azure Guinée</div>
          <div> fruits & légume</div>
        </div>
      </div>
      <div class="header-search">
        <input type="text" name="search" placeholder="search"><i class="fas fa-search"></i>
      </div>
      <?php require_once '../views/includes/header.php' ?>
    </header>
    <div class="nav-link">
      <a href="/views/index.php"> <i class="fas fa-house-user"></i>Acceuil</a> <span>/</span>
      <a href="/views/order.php">Commande</a>
    </div>
    <main class="main-container" id="main">
      <div class="content">
        <div class="block p-20 form-container">
          <h1>Connexion</h1>
          <form action="" , method="POST" id="form-submit">
            <div class="form-control">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="<?= $email ?? '' ?>"><i
                class="fas env fa-envelope-square"></i>
              <?php if ($errors['email']) : ?>
              <p class="text-danger"><?= $errors['email'] ?></p>
              <?php endif; ?>
            </div>
            <div class="form-control">
              <label for="password">Mot de passe</label>
              <input type="password" name="password" id="password" value=""><i class="fas env fa-unlock-alt"></i>
              <?php if ($errors['password']) : ?>
              <p class="text-danger"><?= $errors['password'] ?></p>
              <?php endif; ?>
            </div>
            <div class="form-actions">
              <a href="/" class="btn btn-danger"> Annuler</a>
              <button class="btn btn-primary" type="submit">Connexion</button>
            </div>
          </form>
        </div>
      </div>
    </main>
    <?php require_once '../views/includes/footer.php' ?>
  </div>
  <!-- <script src="../public/js/order.js"></script> -->
  <script src="../public/js/request.js"></script>

</body>

</html>
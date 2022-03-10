<?php require_once '../controllers/auth-register.php' ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require_once '../views/includes/head.php' ?>
  <title>Inscription</title>
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
      <a href="/index.php">Acceuil</a>
      <hr>
      <a href="/views/register.php">Inscription</a>
    </div>
    <main id="main">

      <div class="content">
        <div class="block p-20 form-container">
          <h1 class="text-center">Inscription</h1>
          <form action="" , method="POST">
            <div class="form-control">
              <label for="lastname">Nom</label>
              <input type="text" name="lastname" id="lastname" value="<?= $lastname ?? '' ?>">
              <?php if ($errors['lastname']) : ?>
              <p class="text-danger"><?= $errors['lastname'] ?></p>
              <?php endif; ?>
            </div>
            <div class="form-control">
              <label for="firstname">Prénom</label>
              <input type="text" name="firstname" id="firstname" value="<?= $firstname ?? '' ?>">
              <?php if ($errors['firstname']) : ?>
              <p class="text-danger"><?= $errors['firstname'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-control">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="<?= $email ?? '' ?>">
              <?php if ($errors['email']) : ?>
              <p class="text-danger"><?= $errors['email'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-line">
              <div class="form-control">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" value="<?= $adresse ?? '' ?>">
                <?php if ($errors['adresse']) : ?>
                <p class="text-danger"><?= $errors['adresse'] ?></p>
                <?php endif; ?>
              </div>
              <div class="form-control">
                <label for="town">Ville</label>
                <input type="text" name="town" id="town" value="<?= $town ?? '' ?>">
                <?php if ($errors['town']) : ?>
                <p class="text-danger"><?= $errors['town'] ?></p>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-line">
              <div class="form-control">
                <label for="portable">Portable</label>
                <input type="text" name="portable" id="portable" value="<?= $portable ?? '' ?>">
                <?php if ($errors['portable']) : ?>
                <p class="text-danger"><?= $errors['portable'] ?></p>
                <?php endif; ?>
              </div>

              <div class="form-control">
                <label for="office">Bureau</label>
                <input type="text" name="office" id="office" value="<?= $office ?? '' ?>">
                <?php if ($errors['office']) : ?>
                <p class="text-danger"><?= $errors['office'] ?></p>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-control">
              <label for="company">Entreprise</label>
              <input type="text" name="company" id="company" value="<?= $company ?? '' ?>">
              <?php if ($errors['company']) : ?>
              <p class="text-danger"><?= $errors['company'] ?></p>
              <?php endif; ?>
            </div>
            <div class="form-line">
              <div class="form-control">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
                <?php if ($errors['password']) : ?>
                <p class="text-danger"><?= $errors['password'] ?></p>
                <?php endif; ?>
              </div>
              <div class="form-control">
                <label for="confirmpassword">Confirmation Mot de passe</label>
                <input type="password" name="confirmpassword" id="confirmpassword">
                <?php if ($errors['confirmpassword']) : ?>
                <p class="text-danger"><?= $errors['confirmpassword'] ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-actions">
              <a href="/" class="btn btn-danger"> Annuler</a>
              <button class="btn btn-primary" type="submit">Connexion</button>
            </div>
          </form>
        </div>
      </div>
    </main>
    <?php //require_once '../views/includes/footer.php' 
        ?>
  </div>
  <script src="../public/js/script.js"></script>
</body>

</html>
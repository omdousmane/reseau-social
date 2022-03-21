<?php require_once '../controllers/auth-register.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require "includes/head.php" ?>
  <title>Inscription</title>
</head>

<body>
  <?php require "includes/header.php" ?>
  <div class="wrapper mt-20">
    <aside class="asides block">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, laboriosam quibusdam ipsa unde tenetur
        veritatis
        natus, sint aperiam, a porro ab! Eum beatae perspiciatis animi earum omnis? Vero, at porro.
      </p>
    </aside>
    <div class="block <?= $_SERVER['REQUEST_URI'] === '/views/register.php' ? '' : 'modal' ?> fade" id="inscription"
      tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <a href="#">
              <div class="logo">Straight Talk</div>
            </a>
          </div>
          <h3 class="modal-title text-center" id="exampleModalLabel">Inscription</h3>
          <div class="modal-body">
            <form action="" , method="POST" id="form-submit">
              <div class="inline">
                <div>
                  <label for="firstname" class="col-form-label">Nom:</label>
                  <input type="text" value="<?= $firstname ?? '' ?>"
                    class="form-control <?= $firstname ? 'is-valid' : '' ?> <?= $errors['firstname'] ? 'is-invalid' : '' ?>"
                    name="firstname" id="recipient-firstname">
                  <?php if ($errors['firstname']) : ?>
                  <p class="text-danger"><?= $errors['firstname'] ?></p>
                  <?php endif; ?>
                </div>

                <div>
                  <label for="recipient-lastname" class="col-form-label">Prénom:</label>
                  <input type="text" value="<?= $lastname ?? '' ?>"
                    class=" form-control <?= $lastname ? 'is-valid' : '' ?> <?= $errors['lastname'] ? 'is-invalid' : '' ?>"
                    name="lastname" id="recipient-lastname">
                  <?php if ($errors['lastname']) : ?>
                  <p class="text-danger"><?= $errors['lastname'] ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="">
                <label for="recipient-speudo" class="col-form-label">Speudo:</label>
                <input type="text" value="<?= $speudo ?? '' ?>"
                  class="form-control <?= $speudo ? 'is-valid' : '' ?> <?= $errors['speudo'] ? 'is-invalid' : '' ?>"
                  name="speudo" id="recipient-speudo">
                <?php if ($errors['speudo']) : ?>
                <p class="text-danger"><?= $errors['speudo'] ?></p>
                <?php endif; ?>
              </div>
              <div class="">
                <label for="recipient-images" class="col-form-label">Images:</label>
                <input type="text" value="<?= $images ?? '' ?>"
                  class="form-control <?= $images ? 'is-valid' : '' ?> <?= $errors['images'] ? 'is-invalid' : '' ?>"
                  name="images" id="recipient-images">
                <?php if ($errors['images']) : ?>
                <p class="text-danger"><?= $errors['images'] ?></p>
                <?php endif; ?>
              </div>
              <div class="">
                <label for="recipient-email" class="col-form-label">Mail:</label>
                <input type="email" value="<?= $email ?? '' ?>"
                  class="form-control <?= $email ? 'is-valid' : '' ?> <?= $errors['email'] ? 'is-invalid' : '' ?>"
                  name="email" id="recipient-email">
                <?php if ($errors['email']) : ?>
                <p class="text-danger"><?= $errors['email'] ?></p>
                <?php endif; ?>
              </div>
              <div class="">
                <label for="recipient-password" class="col-form-label">Password:</label>
                <input type="password" value="<?= $password ?? '' ?>"
                  class="form-control <?= $password ? 'is-valid' : '' ?> <?= $errors['password'] ? 'is-invalid' : '' ?>"
                  name="password" id="password" data-toggle="password">
                <?php if ($errors['password']) : ?>
                <p class="text-danger"><?= $errors['password'] ?></p>
                <?php endif; ?>
              </div>
              <div class="mb-3">
                <label for="recipient-password-confirm" class="col-form-label">Confirmer Password:</label>
                <input type="password" value="<?= $confirmpassword ?? '' ?>"
                  class="form-control <?= $confirmpassword ? 'is-valid' : '' ?> <?= $errors['confirmpassword'] ? 'is-invalid' : '' ?>"
                  name="confirmpassword" id="confirmpassword" data-toggle="password">
                <?php if ($errors['confirmpassword']) : ?>
                <p class="text-danger"><?= $errors['confirmpassword'] ?></p>
                <?php endif; ?>
              </div>
              <div class="modal-more">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                  <label class="form-check-label" for="flexSwitchCheckDefault">Se souvenir de moi </label>
                </div>
                <div class="more">
                  Deja membre? <a href="/views/login.php">Connexion</a>
                </div>
              </div>
              <div class="modal-footer mb-3">
                <button type="reset" class="btn btn-secondary">Fermer</button>
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php require "includes/footer.php" ?>
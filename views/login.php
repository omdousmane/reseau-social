<?php require_once '../controllers/auth-login.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require "includes/head.php" ?>
  <title>Inscription</title>
</head>

<body>
  <?php require "includes/header.php" ?>

  <div class="wrapper">
    <aside class="block asides">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, laboriosam quibusdam ipsa unde tenetur
        veritatis
        natus, sint aperiam, a porro ab! Eum beatae perspiciatis animi earum omnis? Vero, at porro.
      </p>
      <div id="essai">
      </div>
    </aside>
    <div class="block">
      <a href="#">
        <div class="logo">Straight Talk</div>
      </a>
      <h3 class="modal-title text-center" id="exampleModalLabel">Connexion</h3>
      <?php if ($errors['full']) : ?>
      <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
        <strong>ATTENTION</strong><?php echo $errors['full'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php endif; ?>
      <div class="modal-body">
        <form action="" , method="POST" id="form-submit">
          <div class="">
            <label for="recipient-speudo" class="col-form-label">Mail ou Speudo:</label>
            <input type="text" value="<?php echo $speudo ?? '' ?>"
              class="form-control form-submit <?php echo $speudo ? 'is-valid' : '' ?> <?= $errors['speudo'] || $errors['full'] ? 'is-invalid' : '' ?>"
              name="speudo" id="recipient-speudo">
            <div class="list"></div>
            <?php if ($errors['speudo']) : ?>
            <p class="text-danger invalid-feedback fff"><?php echo $errors['speudo'] ?></p>
            <?php endif; ?>

          </div>
          <div class="mb-3">
            <label for="recipient-password" class="col-form-label">Password:</label>
            <input type="password" value="<?php echo $password ?? '' ?>"
              class="form-control form-submit <?php echo $password  ? 'is-valid' : '' ?> <?php echo $errors['password']  || $errors['full'] ? 'is-invalid' : '' ?>"
              name="password" id="password" data-toggle="password" data-size="sm">
            <?php if ($errors['password']) : ?>
            <p class="text-danger"><?= $errors['password'] ?></p>
            <?php endif; ?>
          </div>
          <div class="modal-more mb-20">
            <div class="form-check form-switch">
              <input class="form-check-input form-submit" type="checkbox" role="switch" name="remember"
                id="flexSwitchCheckDefault">
              <label class="form-check-label" for="flexSwitchCheckDefault">Se souvenir de moi </label>
            </div>
            <div class="more">
              Pas encore de compte? <a href="/views/register.php">Inscription</a>
            </div>
          </div>
          <div class="modal-footer mb-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php require "includes/footer.php" ?>
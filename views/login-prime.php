<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>




<div class="header-search">
  <input type="search" name="search" placeholder="search"><i class="fas fa-search"></i>
</div>

<?php require_once VIEW . '/includes/header.php' ?>

</header>
<div class="nav-link">
  <a href="/index.php">Acceuil</a> <span>/</span>
  <a href="/views/login.php">Connexion</a>
</div>
<main id="main">

  <div class="content">
    <div class="block p-20 form-container">
      <h1>Connexion</h1>
      <form action="" , method="POST" id="form-submit">
        <div class="form-control">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" value="<?= $email ?? '' ?>"><i class="fas env fa-envelope-square"></i>
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
<script src="../public/js/script.js"></script>
</body>

</html>
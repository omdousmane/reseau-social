<?php
require_once '../controllers/order-manager.php';


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
  <title>Gestion Commande</title>
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
      <a href="/views/order-lists.php">Liste</a>
    </div>
    <main class="main-container" id="main">
      <!-- section du tableau -->
      <section class="table-section">
        <h1>Liste des commandes</h1>
        <table class="table-content">
          <thead>
            <tr>
              <th>N°</th>
              <th>Date commande</th>
              <th>Numéro Commande</th>
              <th>Montant</th>
              <th>Status</th>
              <th>Facture(s)</th>
              <th>Afficher Commande</th>
            </tr>
          </thead>
          <tbody>
            <?php $cmp = 0 ?>
            <?php foreach ($tabContentCmdClients as $tabContentCmdClient) : ?>
            <?php $cmp++ ?>
            <tr>
              <td><?= $cmp ?></td>
              <td> <?= $tabContentCmdClient['date_cmd'] ?> </td>
              <td> <?= $tabContentCmdClient['number_invoice'] ?> </td>
              <td> <?= $tabContentCmdClient['montant_cmd'] ?> </td>
              <td> <?= $tabContentCmdClient['status_cmd'] ?> </td>
              <td>
                <a href="<?= $path. $fileName ?>" download="<?= $fileName ?>" type="file"
                  class="btn text-color">Telecharger <i class="fas fa-download"></i></a>
              </td>
              <td>
                <a href="details-commande.php?id_cmd=<?= $tabContentCmdClient['id_cmd'] ?>"
                  class="btn text-color">Afficher<i class="fas fa-eye"></i></a>
              </td>
              <?php endforeach ?>
          </tbody>
        </table>
      </section>
    </main>
    <?php require_once '../views/includes/footer.php' ?>
  </div>
  <!-- <script src="../public/js/order.js"></script>
  <script src="../public/js/request.js"></script> -->

</body>

</html>
<?php
require_once '../config.php';
require_once '../models/database.php';
$authDB      = require_once '../models/security.php';
$authDbOrder = require_once '../models/order.php';
// $aut = require '../vendor/autoload.php';

// var_dump($aut);

$tabContentProducts = $authDbOrder->getAllProducts();
$typeProds = $authDbOrder->getAllProductsType();
$status   = ['valider', 'en cours de validation'];

/**********Recuperation de l'identifiant de l'utilisateur**********/

$currentUser = $authDB->isLoggedin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = filter_input_array(
    INPUT_POST,
    [
      'oranges' => FILTER_SANITIZE_SPECIAL_CHARS,
      'quantity-oranges' =>
      FILTER_SANITIZE_NUMBER_INT,

      'price-total-oranges' => [
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_THOUSAND
      ],
      'avocat' => FILTER_SANITIZE_SPECIAL_CHARS,
      'quantity-avocat' =>
      FILTER_SANITIZE_SPECIAL_CHARS,
      'price-total-avocat' => [
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_THOUSAND
      ],
      'ananas' => FILTER_SANITIZE_SPECIAL_CHARS,
      'quantity-ananas' => FILTER_SANITIZE_NUMBER_INT,
      'price-total-ananas' => [
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_THOUSAND
      ],
      'bananes' => FILTER_SANITIZE_SPECIAL_CHARS,
      'quantity-bananes' => FILTER_SANITIZE_NUMBER_INT,
      'price-total-bananes' => [
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_THOUSAND
      ],
      'totals-price' => FILTER_SANITIZE_NUMBER_FLOAT,
    ]
  );


  $arrayContentes = array(
    "orange" => array(
      "name" => $input['oranges'] ?? '',
      "quantity" => $input['quantity-oranges'] ?? '',
      "priceTotal" => $input['price-total-oranges'] ?? ''
    ),
    "avocat" => array(
      "name" => $input['avocat'] ?? '',
      "quantity" => $input['quantity-avocat'] ?? '',
      "priceTotal" => $input['price-total-avocat'] ?? ''
    ),
    "ananas" => array(
      "name" => $input['ananas'] ?? '',
      "quantity" => $input['quantity-ananas'] ?? '',
      "priceTotal" => $input['price-total-ananas'] ?? ''
    ),
    "bananes" => array(
      "name" => $input['bananes'] ?? '',
      "quantity" => $input['quantity-bananes'] ?? '',
      "priceTotal" => $input['price-total-bananes'] ?? ''
    ),
  );

  if ($tabContentProducts[0]['name_prod']) {
    $client_id      = $currentUser['id_user'];
    $status_cmd     = $status[1];
    $number_invoice = mt_Rand(1000000000, 9999999999);
    $authDbOrder->registerCommande([
      'number_invoice' => $number_invoice,
      'client_id'      => $client_id,
      'status_cmd'     => $status_cmd,
      'montant_cmd'    => $input['totals-price'] ?? '',
    ]);
    $id = $authDbOrder->ReadOneFromComd($client_id);

    // foreach ($tabContentProducts as $key => $tabContentProduct) {
    //   foreach ($arrayContentes as $arrayContente) {
    //     $contentProd = (array_filter($tabContentProduct, function ($a) {
    //       return $a == 'name_prod' || $a == 'id_prod';
    //     }, ARRAY_FILTER_USE_KEY));
    //     if ($id['id_cmd']) {
    //       if ($contentProd['name_prod'] == $arrayContente['name']) {
    //         var_dump($contentProd['name_prod']);
    //         $authDbOrder->registerDetailCommande([
    //           'name_prod'        => $arrayContente['name'],
    //           'id_cmd'           => $id['id_cmd'],
    //           'id_prod'          => $contentProd['id_prod'],
    //           'detail_qte'       => $arrayContente['quantity'],
    //           'price_total_prod' => $arrayContente['priceTotal']
    //         ]);
    //         header('Location: invoice.php');
    //       }
    //     }
    //   }
    // }
  }
}
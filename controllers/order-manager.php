<?php
require_once '../config.php';
require_once '../models/database.php';
$authDB      = require_once '../models/security.php';
$authDbOrder = require_once '../models/order.php';


$tabContentProducts = $authDbOrder->getAllProducts();
$typeProds = $authDbOrder->getAllProductsType();
$currentUser = $authDB->isLoggedin();

/**********Recuperation de la liste des commandes**********/
$tabContentCmdClients = $authDbOrder->fetchAllCmdClient($currentUser['id_user']);
$id = $authDbOrder->ReadOneFromComd($currentUser['id_user']);
 $ContentNumIvoice = $authDbOrder->fetchGetNumberInvoice($id['id_cmd']) ;
  // var_dump($ContentNumIvoice);
  /***************paths********** */
$path      =  INVOICES.'/';
$fileName  = 'Fact-'.$ContentNumIvoice['number_invoice'].'-'.$currentUser['id_user'].'.pdf';
// echo "<pre>";
// print_r($fileName);
// echo "</pre>";
// var_dump($path);
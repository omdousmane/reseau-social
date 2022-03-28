<?php
require '../config.php';
$authDB = require_once '../models/Chat.php';

// essai

// $messages = $authDB->getAllMessages([
//   'onlineUser' => 13,
//   'currentUser' => 18,
// ]);

// $messages = $authDB->registerMessages([
//   'onlineUser' => 13,
//   'currentUser' => 13,
//   'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt itaque ducimus, aspernatur dolore fugit possimus eveniet quo numquam assumenda, hic aliquam! Id assumenda dolores ad aperiam, molestias ipsa. Ex, dignissimos."
// ]);


// var_dump($messages);
/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!array_key_exists('currentUser', $_GET) || !array_key_exists('onlineUser', $_GET)) {
    echo json_encode([
      'message' => "commencer une nouvelle conversation...!!!"
    ]);
    // echo json_encode($_GET);
    return;
  }
  $currentUser = $_GET['currentUser'];
  $onlinetUser = $_GET['onlineUser'];

  // envoie des identifiant a la fonction pour execition de la requete
  $messages = $authDB->getAllMessages([
    'onlineUser' => (int) $onlinetUser,
    'currentUser' => (int) $currentUser,
  ]);
  if ($messages) {
    echo (json_encode($messages));
  } else {
  }
}



/**
 * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
 */
// function postMessage()
// {
//   global $authDB;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 1. Analyser les paramètres passés en POST (author, content)
  if (!array_key_exists('currentUser', $_POST) || !array_key_exists('onlineUser', $_POST) || !array_key_exists('content', $_POST)) {
    echo json_encode([
      "status" => "error",
      "message" => "tout les parametre n'ont pas été envoyer diallo"
    ]);
    return;
  }
  echo json_encode($_POST);
  $onlinetUser = $_POST['onlineUser'];
  $currentUser = $_POST['currentUser'];
  $content     = $_POST['content'];

  // 2. Créer une requête qui permettra d'insérer ces données
  $messages = $authDB->registerMessages([
    'onlineUser' => (int) $onlinetUser,
    'currentUser' => (int) $currentUser,
    'content' => $content
  ]);

  // 3. Donner un statut de succes ou d'erreur au format JSON
  if ($messages === true) {
    echo json_encode([
      'status' => "succes enregistrement"
    ]);
  } else {
    echo json_encode([
      'status' => "erreur aucune conversion enregister"
    ]);
  }
}
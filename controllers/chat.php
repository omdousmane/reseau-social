<?php
require '../config.php';
$authDB = require_once '../models/Chat.php';

$task = 'list';

if (array_key_exists('task', $_GET)) {
  $task = $_GET['task'];
}

if ($task == 'write') {
  postMessage();
} else {
  getMessage();
}

//recuperatuion des messages en base de donnée
function getMessage()
{
  global  $authDB;
  $messages = $authDB->getAllMessages();
  if ($messages) {
    // foreach ($messages as $message) {
    print_r(json_encode($messages));
    // }
  }
}

//envoie des messages en base de donnée
function postMessage()
{
  global  $authDB;
  if (!array_key_exists('author', $_POST) || !array_key_exists('content', $_POST)) {
    echo json_encode([
      "status" => "erreur",
      "message" => ERROR_SENDED
    ]);
    return;
  }

  $author  = $_POST['author'];
  $content = $_POST['content'];

  //envoie de la requete
  $message = [
    'author'  => $author,
    'content' => $content
  ];
  $authDB->registerMessages($message);
  echo json_encode([
    "status" => "success"
  ]);
}
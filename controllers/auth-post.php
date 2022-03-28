<?php
require '../config.php';
$authDB = require_once '../models/Post.php';
$authDBs = require_once '../models/security.php';
$categories = $authDB->getAllCategorie();
$posts = $authDB->getAllPosts();
$currentUser = $authDBs->isLoggedin();

// var_dump($posts);
// var_dump($categories);
// var_dump($currentUser['id_user']);

$errors = [
  'category' => '',
  'content' => '',
  'idUser' => '',
  'title' => '',
];
$category = $input['category'] ?? '';
$content  = $input['content'] ?? '';
$title    = $input['title'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = filter_input_array(INPUT_POST, [
    'category' => FILTER_SANITIZE_SPECIAL_CHARS,
    'content' => [
      'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
      'flags' => FILTER_FLAG_NO_ENCODE_QUOTES
    ],
    'title' => FILTER_SANITIZE_SPECIAL_CHARS,
  ]);
  $category = $input['category'] ?? '';
  $content  = $input['content'] ?? '';
  $title    = $input['title'] ?? '';


  // foreach ($categories as $categorie) {
  //   if ($categorie['nameCat'] === $category) {
  //     var_dump($categorie['id']);
  //   }
  // }
  // die;


  if (!$category) {
    $errors['category'] = ERROR_REQUIRED;
  }

  if (!$content) {
    $errors['content'] = ERROR_REQUIRED;
  } elseif (mb_strlen($content) < 20) {
    $errors['content'] = ERROR_CONTENT_TOO_SHORT;
  }

  if (!$title) {
    $errors['title'] = ERROR_REQUIRED;
  } elseif (mb_strlen($title) < 2) {
    $errors['title'] = ERROR_TOO_SHORT;
  }
  //recherher la cle de ma categorie
  $catId = $authDB->getIdCategorieByMail($category);
  // var_dump($catId);
  if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
    $authDB->registerPost([
      'idCat' => $catId['id'],
      'content' => $content,
      'idUser' => $currentUser['id_user'],
      'title' => $title,
    ]);
    header('Location: /views/profile.php');
  }
}
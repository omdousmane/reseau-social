<?php

// print_r($_POST);

require '../config.php';
$authDB = require_once '../models/security.php';
$users = $authDB->getUserFromEmail($_POST['content']);
foreach ($users as $user) {
  // print_r($user);
}
echo json_encode($users);


// echo json_encode($user);

// print_r($user);

// echo $json;

$errors = [
  'email' => '',
  'password' => '',
];
// print_r("vous exister:" . $_POST['content']);
// print_r("vous exister pas:" . $_POST['content']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = filter_input_array(INPUT_POST, [
    'email' => FILTER_SANITIZE_EMAIL,
  ]);
  $email = $input['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if (!$email) {
    $errors['email'] = ERROR_REQUIRED;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = ERROR_EMAIL_INVALID;
  }
  if (!$password) {
    $errors['password'] = ERROR_REQUIRED;
  } elseif (mb_strlen($password) < 6) {
    $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
  }

  if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
    $user = $authDB->getUserFromEmail($email);
    if (!$user) {
      $errors['email'] = ERROR_EMAIL_UNKOWN;
    } else {
      if (!password_verify($password, $user['password'])) {
        $errors['password'] = ERROR_PASSWORD_MISMATCH;
      }
      // else {
      //             $authDB->login($user['id']);
      //             header('Location: /');
      //           }
    }
    // json_encode($errors['password']);
    // json_encode($errors['email']);
  }
  // print_r($errors);
}



// echo 'test diallo';
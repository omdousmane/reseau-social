<?php
require '../config.php';
$authDB = require_once '../models/security.php';

$errors = [
    'firstname' => '',
    'lastname' => '',
    'speudo' => '',
    'email' => '',
    'password' => '',
    'confirmpassword' => ''
];
$firstname = $input['firstname'] ?? '';
$lastname  = $input['lastname'] ?? '';
$speudo    = $input['speudo'] ?? '';
$email     = $input['email'] ?? '';
$password  = $_POST['password'] ?? '';
$confirmpassword = $_POST['confirmpassword'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'speudo' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);
    $firstname = $input['firstname'] ?? '';
    $lastname  = $input['lastname'] ?? '';
    $speudo    = $input['speudo'] ?? '';
    $email     = $input['email'] ?? '';
    $password  = $_POST['password'] ?? '';
    $confirmpassword = $_POST['confirmpassword'] ?? '';

    if (!$firstname) {
        $errors['firstname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($firstname) < 2) {
        $errors['firstname'] = ERROR_TOO_SHORT;
    }
    if (!$lastname) {
        $errors['lastname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($lastname) < 2) {
        $errors['lastname'] = ERROR_TOO_SHORT;
    }

    if (!$speudo) {
        $errors['speudo'] = ERROR_REQUIRED;
    } elseif (mb_strlen($speudo) < 2) {
        $errors['speudo'] = ERROR_TOO_SHORT;
    }

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL_INVALID;
    }
    $checkMail = $authDB->getUserFromEmails($email);
    if ($checkMail) {
        $errors['email'] = ERROR_EMAIL_EXIST;
    }
    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 6) {
        $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
    }
    if (!$confirmpassword) {
        $errors['confirmpassword'] = ERROR_REQUIRED;
    } elseif ($confirmpassword !== $password) {
        $errors['confirmpassword'] = ERROR_PASSWORD_MISMATCH;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $authDB->register([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'speudo' => $speudo,
            'email' => $email,
            'password' => $password
        ]);
        header('Location: /views/profile.php');
    }
}
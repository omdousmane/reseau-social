<?php
require '../config.php';
$authDB = require_once '../models/security.php';

$errors = [
    'speudo' => '',
    'password' => '',
    'full' => '',
];
$speudo   = $input['speudo'] ?? '';
$password = $_POST['password'] ?? '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'speudo' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);
    $speudo   = $input['speudo'] ?? '';
    $password = $_POST['password'] ?? '';

    // verification du speudo
    if (!$speudo) {
        $errors['speudo'] = ERROR_REQUIRED;
    } elseif (mb_strlen($speudo) < 2) {
        $errors['speudo'] = ERROR_TOO_SHORT;
    }
    if (preg_match("/{@}/i", $speudo)) {
        if (!filter_var($speudo, FILTER_VALIDATE_EMAIL)) {
            $errors['speudo'] = ERROR_EMAIL_INVALID;
        }
    }
    // verification du mdp

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 6) {
        $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
    }

    // verification du tableu d'erreur
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $userByMail   = $authDB->getUserFromEmails($speudo);
        $userBySpeudo = $authDB->getUserFromspeudo($speudo);
        if ($userByMail == false) {
            if ($userBySpeudo == false) {
                $errors['full'] = 'Ni l\'email ni le speudo n\'est enregristrer';
            } else {
                if (!password_verify($password, $userBySpeudo['password'])) {
                    $errors['password'] = ERROR_PASSWORD_MISMATCH;
                } else {
                    $authDB->login($userBySpeudo['id_user']);
                    header('Location: /views/profile.php');
                }
            }
        } else {
            if (!password_verify($password, $userByMail['password'])) {
                $errors['password'] = ERROR_PASSWORD_MISMATCH;
            } else {
                $authDB->login($userByMail['id_user']);
                header('Location: /views/profile.php');
            }
        }
    }
}
<?php
require_once '../config.php';
require_once '../models/database.php';
$authDB = require_once '../models/security.php';

// var_dump($authDB);

const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
const ERROR_TOO_SHORT = 'Ce champ est trop court';
const ERROR_PASSWORD_TOO_SHORT = 'Le mot de passe doit faire au moins 6 caractères';
const ERROR_PASSWORD_MISMATCH = 'Le mot de passe de confirmation est différent';
const ERROR_EMAIL_INVALID = 'L\'email n\'est pas valide';
const ERROR_TEL_INVALID = 'Le Le numero de télephone doit comporter 6 chiffres';
// const ERROR_EMAIL_INVALID = 'L\'email n\'est pas valide';



$errors = [
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'adresse' => '',
    'town' => '',
    'portable' => '',
    'office' => '',
    'company' => '',
    'password' => '',
    'confirmpassword' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'adresse' => FILTER_SANITIZE_SPECIAL_CHARS,
        'town' => FILTER_SANITIZE_SPECIAL_CHARS,
        'portable' => FILTER_SANITIZE_NUMBER_INT,
        'office' => FILTER_SANITIZE_NUMBER_INT,
        'company' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $firstname       = $input['firstname'] ?? '';
    $lastname        = $input['lastname'] ?? '';
    $email           = $input['email'] ?? '';
    $password        = $_POST['password'] ?? '';
    $confirmpassword = $_POST['confirmpassword'] ?? '';
    $adresse         = $input['adresse'] ?? '';
    $town            = $input['town'] ?? '';
    $portable        = $input['portable'] ?? '';
    $office          = $input['office'] ?? '';
    $company         = $input['company'] ?? '';


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
    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL_INVALID;
    }
    if (!$adresse) {
        $errors['adresse'] = ERROR_REQUIRED;
    } elseif (mb_strlen($adresse) < 2) {
        $errors['adresse'] = ERROR_TOO_SHORT;
    }
    if (!$town) {
        $errors['adresse'] = ERROR_REQUIRED;
    } elseif (mb_strlen($town) < 2) {
        $errors['adresse'] = ERROR_TOO_SHORT;
    }
    if (!$portable) {
        $errors['portable'] = ERROR_REQUIRED;
    } elseif (mb_strlen($portable) < 6) {
        $errors['portable'] = ERROR_TEL_INVALID;
    }
    if (!$office) {
        $errors['office'] = ERROR_REQUIRED;
    } elseif (mb_strlen($office) < 6) {
        $errors['office'] = ERROR_TEL_INVALID;
    }
    if (!$company) {
        $errors['company'] = ERROR_REQUIRED;
    } elseif (mb_strlen($company) < 2) {
        $errors['company'] = ERROR_EMAIL_INVALID;
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
            'lastname'  => $lastname,
            'email'     => $email,
            'adresse'   => $adresse,
            'town'      => $town,
            'portable'  => $portable,
            'office'    => $office,
            'company'   => $company,
            'password'  => $password,
        ]);
        header('Location: /views/index.php');
    }
}
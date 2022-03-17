<?php
require '../config.php';
$authDB = require_once '../models/security.php';
$sessionId = $_COOKIE['session'];
if ($sessionId) {
    $authDB->logout($sessionId);
    header('Location: /index.php');
}
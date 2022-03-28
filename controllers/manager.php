<?php
require_once '../config.php';
$authDbChat = require_once '../models/Chat.php';
$authDb = require_once '../models/security.php';
// $currentUser = $authDb->isLoggedin();

// var_dump($currentUser);
//requete de recuperation des menbres en ligne

// foreach ($listOnlines as $listOnline) {
//   // var_dump($listOnline);
//   $userOnlines  = $authDbChat->getUserById($listOnline['userid']);
//   foreach ($userOnlines as $userOnline) {
//     var_dump($userOnline['firstname']);
//   }
// };
// $userOnline  = $authDbChat->getUserById('13');
<?php

//fichier de configuration 
/*========================== LES IMAGES =============================== */
define('WEB_DIR_NAME', 'reseau/');
// define('TARGET', '/assets/');    // Repertoire cible
define('IMAGE_DIR_NAME', 'public/assets/');
define('IMAGE_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . IMAGE_DIR_NAME  . '/');
define('IMAGE_DIR_URL', $_SERVER['HTTP_HOST'] . '/' . IMAGE_DIR_NAME  . '/');
// var_dump(IMAGE_DIR_PATH);
// define('UPLOAD_ERR_OK', 0);
define('MAX_SIZE', 1500000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 10000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 10000);    // Hauteur max de l'image en pixels
/*======================================ERROR==================================== */
const ERROR_REQUIRED        = 'Veuillez renseigner ce champ';
const ERROR_TEL_INVALID     = 'Ce champ doit contenir minimum 6 chiffres';
const ERROR_REQUIERED_IMAGE = 'Aucune image choisie';
const ERROR_TOO_SHORT       = 'Ce champ est trop court';
const ERROR_REQUIRED_ETAT   = 'Aucune etat choisie';
const ERROR_REQUIRED_ALL    = 'Veillez remplir tous les champs';
const ERROR_EMAIL_UNKOWN    = 'L\'email n\'est pas enregistrée';
const ERROR_SPEUDO_UNKOWN   = 'Le speudo \'est pas enregistrée';
const ERROR_EMAIL_EXIST     = 'L\'email est pas enregistrée';
const ERROR_EMAIL_INVALID   = 'L\'email n\'est pas valide';
const ERROR_PASSWORD_MISMATCH = 'Le mot de passe n\'est pas valide';

/**********************************produits************************************************/

const ERROR_REGISTER        = 'Echec d\'enregistrement';
const ERROR_DELETE          = 'Echec de suppresion';
const ERROR_UPDATE          = 'Echec de mise à jours';
const ERROR_EDITE           = 'Echec de la modification';

/*=====================================SUCCESS===================================== */
const SUCCESS_UPDATE        = 'Mise à jours effectué avec succès';
const SUCCESS_SENDED        = 'succes';
const ERROR_SENDED          = 'erreur d\'envoie de donner';
const SUCESS_REGISTER       = 'Enregistrement effectué avec succès';
const SUCESS_DELETE         = 'Suppresion effectué avec succès';
const SUCESS_EDITE          = 'Modification effectué avec succès';
const ERROR_PASSWORD_TOO_SHORT = 'Le mot de passe doit faire au moins 6 caractères';

/**********************************categories************************************************/
const ERROR_REGISTER_EXIST  = 'Echec d\'enregistrement cette categoeie existe deja';
const ERROR_UPDATE_EXIST    = 'Echec de mise a jour cette categoeie existe deja';

require_once 'models/database.php';
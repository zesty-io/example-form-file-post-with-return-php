<?php

require('../vendor/autoload.php');

// Log errors (but don't display any publicly)
error_reporting(-1);
ini_set('display_errors', 0);

// Load environment variables from .env if present
if (file_exists('../.env')) {
    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();
}

if (empty($_FILES)) {
    die('Service online');
}

$originalFilename = basename($_FILES['userfile']['name']);
$originalExtension = (count(explode('.', $originalFilename)) > 1) ? '.' . array_reverse(explode('.', $originalFilename))[0] : '';

$newFilename = uniqid() .  $originalExtension;
$uploadTarget = 'uploads/' . $newFilename;

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadTarget)) {
    //echo "File is valid, and was successfully uploaded.\n";

        $redirectTarget = (!empty($_POST['redirect_target'])) ? $_POST['redirect_target'] : $_SERVER['HTTP_REFERER'];
        header('Location: ' . $redirectTarget);
        die();
}

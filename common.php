<?php

session_start();

require_once 'config.php';
require_once 'translations.php';

$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// instantiate cart as empty array
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
};

/**
 * @param $data
 * @return string
 */
function sanitize($data) {
    
    $data = htmlspecialchars($data);

    return $data;
}
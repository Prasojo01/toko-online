<?php
/**
 * EliteStore - Premium Online Shopping Platform
 * MVC Architecture
 * 
 * Entry Point: index.php
 */

require_once __DIR__ . '/controllers/Controller.php';

$controller = new Controller();
$controller->handleRequest();
?>

<?php 
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use WpNonces\Nonces;
$action = 'Upload_save_Student_record';
echo Nonces::wp_create_nonce($action);
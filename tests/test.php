<?php 
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use WpNonces\Nonces;

// Create an object of the class
$nonce_Action = new WpNonces();

// $action = 'Upload_save_Student_record';
// echo Nonces::wp_create_nonce($action);

//creating a nonce:
$newnonce = $nonce_Action->wp_create_nonce( 'action_'.$post->id );

//Verifying a nonce
$nonce_Action->wp_verify_nonce_field( 'delete-student_'.$post_id );

//Verifying a nonce passed in some other context:
$complete_url->wp_check_admin_referer( $_REQUEST['my_nonce'], 'update-student_'.$post->ID );

//Adding a nonce to a URL
$url="admin/update-student.php?post=7";
$complete_url = $nonce_Action->get_wp_nonce_url( $url, 'update-student_'.$post->ID );
//

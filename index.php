<?php 
// MULAI SESI
if(empty(session_id())) session_start();
// PANGGIL FILE UTAMA
require_once './app/init.php';
// APPS
if (file_exists('app/core/App.php')) {
 	new App();
} 

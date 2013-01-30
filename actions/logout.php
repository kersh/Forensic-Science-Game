<?php

// Inialize session
// session_start();

// Delete certain session
// unset($_SESSION['username']);
// Delete all session variables
// session_destroy();

// clean it now, otherwise template can get incorrect data
$_SESSION = array();

// destroy the session
session_destroy();

// Jump to login page
header('Location: index.php?action=login');
?>
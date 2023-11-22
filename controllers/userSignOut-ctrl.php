<?php

require_once __DIR__ . '/../helpers/init.php';

unset($_SESSION['users']);
session_regenerate_id();

setcookie('users', '', time() - 3600, '/');

header('location: /');
die;

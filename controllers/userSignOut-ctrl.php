<?php

require_once __DIR__ . '/../helpers/init.php';

unset($_SESSION['user']);
session_regenerate_id();

header('location: /');
die;

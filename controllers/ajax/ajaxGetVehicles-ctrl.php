<?php
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Galleries.php';

$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

$vehicles = Galleries::getAll(search: $search);

echo json_encode($vehicles);
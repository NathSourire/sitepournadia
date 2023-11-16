<?php
// connexion base de données
define('DSN', 'mysql:host=localhost;dbname=nadia');
define('USER', 'admin');
define('PASSWORD', 'vpXy5KVf.y@_GroK');
// image 
define('EXTENSION', ['JPG' => 'image/jpeg', 'PNG' => 'image/png', 'GIF' => 'image/gif', 'WEBP' => 'image/webp']);
define('FILESIZE', [3 * 1000 * 1000]);
// temps validation mail 20mins
define('TIME_TO_EXPIRE', 20 * 60);
// hash mdp
define ('HOST', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
define('SECRET_KEY', 'jfdshksd544-_543fsdFSFSQ');
// role
define('ADMIN', 1);
// flashmessages
define('ERROR', 0);
define('SUCCESS', 1);
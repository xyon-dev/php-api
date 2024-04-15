<?php 
$request = $_SERVER['REQUEST_URI'];
$base_url = '/php-api';
$viewDir = '/views';

switch($request){
    case $base_url.'/':
        require __DIR__.$viewDir.'\\home.php';
        break;
    case $base_url.'/users':
        require __DIR__.$viewDir.'\\users.php';
        break;
    case $base_url.'/contact':
        require __DIR__.$viewDir.'\\contact.php';
        break;
    case $base_url.'/api':
        echo "Future JSON object";
        break;
    default:
        http_response_code(404);
        require __DIR__.$viewDir.'\\404.php';
        echo $_SERVER['REQUEST_URI'];
    }
?>
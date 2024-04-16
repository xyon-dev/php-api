<?php 
// 
$request = $_SERVER['REQUEST_URI'];
$base_url = '/php-api';
$viewDir = '/views';
$POSTS = array(
    0 =>array(
        'ID'=> 123456,
        'author'=>'terence hastings',
        'title'=>'Sunday Blog',
        'email'=>'terenceth@email.com',
        'post'=> 'Sunday: Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde quae id hic sunt eligendi molestiae, sed maiores labore quasi soluta aliquid dolorum adipisci, aspernatur ut nemo deleniti voluptatibus fugiat asperiores!'    
    ),
    1 =>array(
        'ID'=> 123456,
        'author'=>'terence hastings',
        'title'=>'Monday Blog',
        'email'=>'terenceth@email.com',
        'post'=> 'Monday: Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde quae id hic sunt eligendi molestiae, sed maiores labore quasi soluta aliquid dolorum adipisci, aspernatur ut nemo deleniti voluptatibus fugiat asperiores!'    
    ),
    2 =>array(
        'ID'=> 123456,
        'author'=>'terence hastings',
        'title'=>'Tuesday Blog',
        'email'=>'terenceth@email.com',
        'post'=> 'Tuesday: Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde quae id hic sunt eligendi molestiae, sed maiores labore quasi soluta aliquid dolorum adipisci, aspernatur ut nemo deleniti voluptatibus fugiat asperiores!'    
    ),

);
// 
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
    case $base_url.'/blog':
        header("Content-Type: application/json");
        include 'get-posts.php';
        getPosts();
        break;
    case $base_url.'/c/blog':
        header("Content-Type: application/json");
        include 'create-post.php';
        createPost();
        break;
    case $base_url.'/x/blog?id='.$_GET['id']:
        header("Content-Type: application/json");
        include 'delete-post.php';
        deletePost($_SERVER, $_GET['id']);
        break;
    case $base_url.'/read/blog?id='.$_GET['id']:
        header("Content-Type: application/json");
        include 'get-posts.php';
        getOnePost($_GET['id']);
        break;
    case $base_url.'/edit/blog?id='.$_GET['id']:
        header("Content-Type: application/json");
        include 'get-posts.php';
        editPost($_POST, $_GET['id']);
        break;
    default:
        http_response_code(404);
        require __DIR__.$viewDir.'\\404.php';
        echo $_SERVER['REQUEST_URI'];
    }
?>
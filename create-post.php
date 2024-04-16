<?php
function createPost(){  
    include 'connections.php';
    // 
    $form_data = array(
        'author'=>'terence hastings',
        'title'=>'Wednesday Blog',
        'email'=>'terenceth@email.com',
        'post'=>'wednesday blog'
    );
    extract($form_data);
    $sql = "INSERT INTO posts (author, title, email, post) VALUES ('$author', '$title', '$email', '$post');";
    $postData = mysqli_query($conn, $sql);
    // 
    if(!$postData){ 
        die("ERROR: try again");
    }else{
        echo 'post created';
    };
}; 
?>
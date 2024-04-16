<?php

function deletePost($server){  
    include 'connections.php';
    // 
    // $deleteRequestUrl= parse_url($server['REQUEST_URI']); 
    // parse_str($deleteRequestUrl['query'], $params);
    // $id=$params['id'];
    $id=$_GET['id'];
    $sql = "DELETE FROM posts WHERE ID=$id;";
    $deleteData = mysqli_query($conn, $sql);
    if(!$deleteData){ 
        die("ERROR: try again");
    }else{
        echo $deleteData.' post deleted';
    };
}; 
?>
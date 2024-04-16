<?php

function editPost($id){
    include 'connections.php';
    $patchQuery = "SELECT * FROM `posts` WHERE ID=$id;";
    $patchData = mysqli_query($conn, $patchQuery);
    // 
    if(mysqli_num_rows($patchData) < 1){ 
        die("ERROR: try again");
    };
    while($postRow = mysqli_fetch_assoc($patchData)){
        $post = json_encode($postRow);
        echo $post;     
    };
}

?>
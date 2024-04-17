<?php

function getPosts(){  
    include 'connections.php';
    $sql = "SELECT * FROM `posts`;";
    $dbData = mysqli_query($conn, $sql);
    // 
    if(mysqli_num_rows($dbData) < 1){ 
        die("ERROR: try again");
    };
    $i = 0;
    $api_data=array();
    while($row = mysqli_fetch_assoc($dbData)){
        $post_id = 'post-'.$i;
        array_push($api_data, $row);
        $i++;
    };
    echo json_encode($api_data);
    

}; 
function getOnePost($id){
    include 'connections.php';
    $postQuery = "SELECT * FROM `posts` WHERE ID=$id;";
    $postData = mysqli_query($conn, $postQuery);
    // 
    if(mysqli_num_rows($postData) < 1){ 
        die("ERROR: try again");
    };
    while($postRow = mysqli_fetch_assoc($postData)){
        $post = json_encode($postRow);
        echo $post;     
    };
}
// 
// UPDATE when form is created
// 
// $body = file_get_contents('php://input');
// $body_dec = json_decode($body, true);
// $body_enc = json_encode($body);
// echo $body_enc;

function editPost($post, $id){
    include 'connections.php';
    extract($post);
    // UPDATE table_name SET column1 = value1, column2 = value2 WHERE id=100;
    $patchQuery = "UPDATE 'posts' SET ID=$postID, author=$author, title=$title, email=$email, post=$post WHERE ID=$id;";
    $patchData = mysqli_query($conn, $patchQuery);
    // 
    if(mysqli_num_rows($patchData) < 1){ 
        die("ERROR: try again");
    };
    while($postRow = mysqli_fetch_assoc($patchData)){
        $editedPost = json_encode($postRow);
        echo $editedPost;     
        //  redirect to edited post
    };
}
?>
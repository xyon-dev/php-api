<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home</h1>
    <p>Welcome to my app.</p>
    <script src="./client/script.js"></script>
    <?php
        $header_body =  getallheaders();
        ?><pre><?php
        var_dump($header_body);
        ?></pre>
</body>
</html>

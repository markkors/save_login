<?php

if(isset($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'login':
            echo "we gaan inloggen";
            break;

        case 'create':
            echo "we gaan een account aanmaken";
            break;
    }
}


$submitmessage = "Log In";
$bottommessage = <<< TEXT
        <div>
            <p>Not an account?, <a href="index.php?action=create">create</a> one...</p>
        </div>
TEXT;
$secondpassword = null;
$postaction = "login";

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch($action) {
        case 'create':
            $postaction = "create";
            $submitmessage = "Create";
            $bottommessage = "";
            $secondpassword = "<input type=\"password\" id=\"password2\" name=\"password2\" placeholder=\"retype password\">";
            break;

    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/styles.css" type="text/css" rel="stylesheet"/>

    <title>Login</title>
</head>
<body>
<div class="container">
    <div id="formContent">
        <form action="index.php" method="post">
            <input type="text" id="login"name="login" placeholder="login">
            <input type="password" id="password" name="password" placeholder="password">
            <?=$secondpassword?>
            <input type="hidden" name="action" value="<?=$postaction?>">
            <input type="submit" class="fadeIn fourth" value="<?=$submitmessage?>">
        </form>
        <?=$bottommessage?>
</div>

</div>
</body>
</html>
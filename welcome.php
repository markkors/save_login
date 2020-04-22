<?php
session_start();

    if(isset($_SESSION['sessionid']) && $_SESSION['sessionid'] == session_id()) {
        // user is ingelogd
        $result = "welkom thuis";
        session_destroy();
        $_SESSION['sessionid'] = null;
    } else {
        header("location: index.php");
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome home</title>
</head>
<body>
    <?=$result?>
</body>
</html>

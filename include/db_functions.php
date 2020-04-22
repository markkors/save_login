<?php

error_reporting(E_ALL);

function connect() {
    $host = "localhost";
    $user = "save_login_user";
    $password = "save_login_user";
    $dbname = "save_login";

    static $mysqli = null;
    if(!isset($mysqli)) {
        $mysqli = new mysqli($host,$user,$password,$dbname);
    }

    if($mysqli->connect_error) {
        die("Sorry database is offline, error: $mysqli->connect_error");
    }
    return $mysqli;
}

function insert_user($username,$password) {
    $result = false;

    $sql = "INSERT INTO `login` (`id`, `username`, `password`, `updated`) VALUES (NULL, ?, ?, CURRENT_TIMESTAMP);";
    $mysqli = connect();
    $stmt = $mysqli->prepare($sql);

    $hpw = password_hash($password,PASSWORD_DEFAULT);

    $stmt->bind_param("ss",$username,$hpw);
    if($stmt->execute()) {
        $result = true;
    }
    return $result;
}

function check_user($username,$password) {
    $result = false;
    $hashed_password = null;

    $sql = "SELECT `password` FROM `login` WHERE `username` = ?;";
    $mysqli = connect();
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s",$username);
    if($stmt->execute()) {
        $stmt->bind_result($hashed_password);
        if($stmt->fetch()) {
            if(password_verify($password,$hashed_password)) {
                $result = true;
            }

        }
    }

    return $result;
}

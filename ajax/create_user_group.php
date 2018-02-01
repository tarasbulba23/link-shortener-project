<?php

// Allow the config
define('__CONFIG__', true);

// Require the config
require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    header('Content-Type: application/json');

    $return = [];

    $name = Filter::String( $_POST['name'] );

    $SQLdata = $con->prepare("SELECT count(1) FROM `add_user_group` WHERE `name` = :name LIMIT 1");
    $SQLdata->bindParam(':name', $name, PDO::PARAM_STR);
    $SQLdata->execute();
    $res = $SQLdata->fetch(PDO::FETCH_COLUMN);
    $SQLdata->closeCursor();

    if ($res == 0) {

        $SQLdata = $con->prepare("INSERT INTO `add_user_group` (`name`) VALUES(:name)");
        $SQLdata->bindParam(':name', $name, PDO::PARAM_STR);
        $SQLdata->execute();

        if ($SQLdata->rowCount() == 0) {
            $return['error'] = 'Some error';
        } else {
            $return['success'] = 'Created';
        }
    } else {
        $return['error'] = 'Name already exist';
    }

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
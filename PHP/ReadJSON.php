<?php
    $json = file_get_contents('dummy_data.json');
    $users = json_decode($json, true);

    foreach ($users as $user) {
        echo "Name: {$user['name']}, Email: {$user['email']}<br/>";
    }
?>
<?php

session_start();
require_once __DIR__ . '/../config/app.php'; ?>


<!DOCTYPE html>
<html dir="<?php echo $config['dir']?> lang=<?php echo $config['lang'] ?>">
    <head >
        <title><?php echo $config['app_name'] ." | " .$title ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            .costem-card-image{
                height: 200px;
                background-size:cover;
                background-position: center;
                
               
            }
        </style>
    </head>
    <body>  
        <div class="container">

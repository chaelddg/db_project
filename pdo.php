<?php

    $db = new PDO('mysql:host=localhost;dbname=db_project', 'root', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>
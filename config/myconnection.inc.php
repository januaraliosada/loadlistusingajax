<?php

    // Create a new PDO instance to establish a database connection
    $db = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '');
    
    // Set the error mode to throw exceptions for easier error handling
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set the default fetch mode to fetch associative arrays
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

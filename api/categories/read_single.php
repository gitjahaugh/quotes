<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require('../../config/Database.php');
    require('../../models/Category.php');

    $database = new Database();
    $db = $database->connect();

    $category = new Category($db);

    $category->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    $category->read_single();

    $category_arr = array(
        'id' => $category->id,
        'category' => $category->category,
    );

    if (empty($category_arr['category'])) {
        echo json_encode(
            array('message' => "No category found.")
        );
    } else {
        echo json_encode($category_arr);
    }
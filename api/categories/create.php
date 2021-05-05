<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    require('../../config/Database.php');
    require('../../models/Category.php');

    $database = new Database();
    $db = $database->connect();

    $category = new Category($db);

    $data = json_decode(file_get_contents('php://input'));

    $category->category = $data->category;

    if(!empty($cat->category)) {
        //create category
        $cat->create();
        echo json_encode(
            array('message' => 'Category created')
        );
    } else {
        echo json_encode(
            array('message' => 'Category was not created')
        );
    }
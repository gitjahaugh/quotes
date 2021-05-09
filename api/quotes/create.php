<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    require('../../config/Database.php');
    require('../../models/Quote.php');

    $database = new Database();
    $db = $database->connect();

    $quote = new Quote($db);

    $data = json_decode(file_get_contents('php://input'));

    $quote->categoryId = $data->categoryId;
    $quote->authorId = $data->authorId;
    $quote->quote = $data->quote;

    if(!empty($quote->quote) && !empty($quote->authorId) && !empty($quote->categoryId)) {
        $quote->create();
        echo json_encode(
            array('message' => 'Quote creaed')
        );
    } else {
        echo json_encode(
            array('message' => 'Quote was not created.')
        );
    }
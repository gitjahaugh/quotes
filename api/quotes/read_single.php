<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require('../../config/Database.php');
    require('../../models/Quote.php');

    $database = new Database();
    $db = $database->connect();

    $quote = new Quote($db);

    $quote->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $quote->read_single();

    $quote_arr = array(
        'id' => $quote->id,
        'quote' => $quote->quote,
        'category' => $quote->category,
        'author' => $quote->author
    );

    if (empty($quote_arr['quote'])) {
        echo json_encode(
            array('message' => "No quotes found.")
        );
    } else {
        echo json_encode($quote_arr);
    }
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

    $quoteArray = array(
        'id' => $quote->id,
        'category' => $quote->category,
        'author' => $quote->author,
        'quote' => $quote->quote
    );

    if (empty($quoteArray['quote'])) {
        echo json_encode(
            array('message' => "No quotes found.")
        );
    } else {
        echo json_encode($quoteArray);
    }
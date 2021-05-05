<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require('../../config/Database.php');
    require('../../models/Quote.php');

    $database = new Database();
    $db = $database->connect();

    $quote = new Quote($db);

    $quote->authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);
    $quote->categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
    $quote->limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);

    if (isset($_GET['authorId']) && isset($_GET['categoryId'])) {
        $result = $quote->author_category_read();
    } elseif (isset($_GET['authorId'])) {
        $result = $quote->author_read();
    } elseif (isset($_GET['categoryId'])) {
        $result = $quote->category_read();
    } elseif (isset($_GET['limit'])) {
        $result = $quote->limit_read();
    } else {
        $result = $quote->read();
    }

    $num = $result->rowCount();

    if ($num > 0) {
        $quotes_arr = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $quoteItem = array(
                'id' => $id, 
                'category' => $category, 
                'author' => $author, 
                'quote' => $quote
            );
            array_push($quotes_arr, $quoteItem);
        }
        echo json_encode($quotes_arr);
    } else {
        echo json_encode(
            array('message' => "No quotes found.")
        );
    }
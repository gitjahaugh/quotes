<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

require '../../config/Database.php';
require '../../models/Quote.php';

$database = new Database();
$db = $database->connect();

$quote = new Quote($db);

$data = json_decode(file_get_contents("php://input"));

$quote->quote = $data->quote;
$quote->authorId = $data->authorId;
$quote->categoryId = $data->categoryId;
$quote->id = $data->id;

if(!empty($quote->quote) &&
!empty($quote->authorId) &&
!empty($quote->categoryId) &&
!empty($quote->id)) {
    $quote->update();
    echo json_encode(
        array('message' => 'Quote updated')
    );
} else {
    echo json_encode(
        array('message' => 'Quote was not updated')
    );
}
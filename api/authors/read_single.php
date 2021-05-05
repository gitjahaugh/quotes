<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require('../../config/Database.php');
require('../../models/Author.php');

$database = new Database();
$db = $database->connect();

$author = new Author($db);

$author->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$author->read_single();

$author_arr = array(
    'id' => $author->id,
    'author' => $author->author,
);

if (empty($author_arr['author'])) {
    echo json_encode(
        array('message' => "No author found.")
    );
} else {
    echo json_encode($author_arr);
}
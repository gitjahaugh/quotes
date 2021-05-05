<?php

require('./config/Database.php');
require('./models/Author.php');
require('./models/Category.php');
require('./models/Quote.php');

$database = new Database();
$db = $database->connect();

$author = new Author($db);
$category = new Category($db);
$quote = new Quote($db);

$authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);
$categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

if($authorId) {$quote->authorId = $authorId;}
if($categoryId) {$quote->categoryId =$categoryId;}

if ($categoryId == NULL || $categoryId == FALSE) {
    if ($authorId == NULL || $authorId == FALSE) {
        $quotes = $quote->read();
    } else {
        $quote->authorId = $authorId;
        $quotes = $quote->author_read();
    }
} else {
    if ($authorId == NULL || $authorId == FALSE) {
        $quote->categoryId = $categoryId;
        $quotes = $quote->category_read();
    } else {
        $quote->categoryId = $categoryId;
        $quote->authorId = $authorId;
        $quotes = $quote->author_category_read();
    }
}

switch($action) {
    default: 
    $authors = $author->read();
    $categories = $category->read();
    include('view/list_quotes.php');
}

?>
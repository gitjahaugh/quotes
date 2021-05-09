<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    require('../../config/Database.php');
    require('../../models/Author.php');

    $database = new Database();
    $db = $database->connect();

    $author = new Author($db);

    $data = json_decode(file_get_contents('php://input'));

    $author->id = $data->id;

    if(!empty($author->id)) {
        $author->delete();
        echo json_encode(
            array('message' => 'Author deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Author did not deleted')
        );
    }
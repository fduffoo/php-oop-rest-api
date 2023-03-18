<?php
// Headers
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Quote.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate 
$quote = new Quote($db);

// Blog quote query
$result = $quote->read();
// Get row count
$num = $result->rowCount();

// Check if any quotes
if($num > 0) {
    // Quotes array
    $quotes_arr = array();
    $quotes_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quotes_item = array(
            'id' => $id,
            'quote' => $quote,
            'author_id' => $author_id,
            'category_id' => $category_id,
        );

        // Push to "data"
        array_push($quotes_arr['data'], $quotes_item);
    }

    // Turn to JSON & output
    echo json_encode($quotes_arr);
} else {
  // No Quotes
  echo json_encode(
    array('message' => 'No Quotes Found')
  );
}
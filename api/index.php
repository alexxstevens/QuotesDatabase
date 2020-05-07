<?php 
    require('../config/database.php');
    require('../models/Submission.php');
    require('../models/Author.php');
    require('../models/Category.php');


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['categoryID'])) {
            $categoryID = trim(filter_input(INPUT_GET, 'categoryID'));}
        if (isset($_GET['authorID'])) {
            $authorID = trim(filter_input(INPUT_GET, 'authorID'));}
        if (isset($_GET['limit'])) {
            $limit = trim(filter_input(INPUT_GET, 'limit'));}
        if (isset($_GET['quote'])) {
            $quote = trim(filter_input(INPUT_GET, 'quote'));}
        if ((empty($_GET['authorID'])) && (empty($_GET['categoryID'])) && (empty($_GET['limit']))) {
            $approved_quotes = view_approved_quotes();
            if (empty($approved_quotes)) {
                $errorArray = array("message"=>"No quotes active. Try again later.");
                header('Content-Type: application/json');
                echo json_encode($errorArray);
            } else {
                header('Content-Type: application/json');
                echo json_encode($approved_quotes);}
        } else if (isset($_GET['authorID'], $_GET['categoryID'])) {
            $auth_cat_quotes = view_by_author_category();
            if (empty($auth_cat_quotes)) {
                $errorArray = array("message"=>"No results matching your authorID and categoryID.  Please try again.");
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);
            } else {
                header('Content-Type: application/json');
                echo json_encode($auth_cat_quotes);}
        } else if ((!empty($authorID)) && ($authorID == "all")) {
            $all_authors = get_authors();
            if (empty($all_authors)) {
                $errorArray = array("message"=>"No authors available. Please try again.");
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);
            } else {
                header('Content-Type: application/json');
                echo json_encode($all_authors);}
        } else if ((isset($categoryID)) && ($categoryID == "all")) {
            $all_categories = get_categories();
            if (empty($all_categories)) {
                $errorArray = array("message"=>"No categories available. Please try again.");
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);
            } else {
                header('Content-Type: application/json');
                echo json_encode($all_categories);}
        } else if (isset($_GET['categoryID'])) {
            $cat_quotes = view_by_category();
            if (empty($cat_quotes)) {
                $errorArray = array("message"=>"No quotes available with that categoryID. Please try again.");
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);
            } else {
                header('Content-Type: application/json');
                echo json_encode($cat_quotes);}
        } else if (isset($_GET['authorID'])) {
            $auth_quotes = view_by_author();
            if (empty($auth_quotes)) {
                $errorArray = array("message"=>"No quotes available with that authorID. Please try again.");
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);
            } else {
                header('Content-Type: application/json');
                echo json_encode($auth_quotes);}
        } else if (isset($_GET['limit'])) {
            $random_quotes = view_random();
            header('Content-Type: application/json');
            echo json_encode($random_quotes);
        }
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!isset($_SERVER["CONTENT_TYPE"]) == "application/json") {
            $errorArray = array("message"=>"Required: Content-Type: application/json header");
            var_dump(http_response_code(400));
            header('Content-Type: application/json');
            echo json_encode($errorArray);
        } else if ($_SERVER["CONTENT_TYPE"] == "application/json") {
            //if we receive raw json data
            $json = file_get_contents('php://input');
            //$data is a php array
            $data = json_decode($json);
            if (property_exists($data, 'authorID')) {
                $authorID = $data->authorID;
            } else {
                $errorArray = array("message"=>"Required: valid authorID");
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);}
            if (property_exists($data, 'categoryID')) {
                $categoryID = $data->categoryID;
            } else {
                $errorArray = array("message"=>"Required: valid categoryID"); 
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);}
            if (property_exists($data, 'quote')) {
                $quote = $data->quote;
            } else {
                $errorArray = array("message"=>"Required: valid quote");
                var_dump(http_response_code(400));
                header('Content-Type: application/json');
                echo json_encode($errorArray);}
            global $errorArray;
            if (!isset($ErrorArray)) {
            submit_quote($authorID, $categoryID, $quote);
            $successArray = array("message"=>"Quote successfully submitted.  Pending approval.");
            header('Content-Type: application/json');
            echo json_encode($successArray);}
        }
    }
    
            

    




    ?>
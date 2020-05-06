<?php
    session_start();
    require_once('util/valid_admin.php');
    require('config/Database.php');
    require('models/Author.php');
    require('models/Category.php');
    require('models/Submission.php');
   
   $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'show_quotes';
        }
    }

  //populate table
  if ($action == 'show_quotes') {
        //pull data for variables
        if(isset($_GET['authorID'])){
        $authorID = filter_input(INPUT_GET, 'authorID', FILTER_VALIDATE_INT);}
        if(isset($_GET['categoryID'])){
        $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);}
        if(isset($_GET['quote'])){
        $quote = filter_input(INPUT_GET, 'quote', FILTER_SANITIZE_SPECIAL_CHARS);}
        // call function to populate dropdowns
        $all_authors = get_authors();
        $all_categories = get_categories();
        //no criteria message
        // $message = no_search();
        //call functions to populate inventory table
        $approved_quotes = view_approved_quotes(); 
        $auth_cat_quotes = view_by_author_category();
        if (isset($auth_cat_quotes)) {
          if ($auth_cat_quotes == FALSE) {
            $emptyArray = "There are no results for your selected search criteria.";
            include_once('view/quote_list.php'); 
          } else {
          include_once('view/quote_list.php'); }
        } else {
        $cat_quotes = view_by_category();
        $auth_quotes = view_by_author();
        $random_quotes = view_random(); 
        include_once('view/quote_list.php'); }
    //call add form
  } else if ($action == 'show_add_form') {
        // call function to populate dropdowns
        $all_authors = get_authors();
        $all_categories = get_categories();
        include('submit.php');

    //pull add inputs
  } else if ($action == 'submit_quote') {
        //run
        if(isset($_GET['authorID'])){
        $authorID = filter_input(INPUT_GET, 'authorID', FILTER_VALIDATE_INT);}
        if(isset($_GET['categoryID'])){
        $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);}
        if(isset($_GET['quote'])){
        $quote = filter_input(INPUT_GET, 'quote', FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_GET['quote'])){
        $quote = preg_replace("/[^A-Za-z0-9. ]/", '', $quote);}
            //invalid inputs
            if ($authorID == NULL || $categoryID == NULL || $quote == NULL) {
                $error = "Invalid entry. Check all fields and try again.";
                include('errors/error.php');
            //add vehicle
            } else {
                submit_quote();
                header("Location: .?quoteID=$quoteID");}
        $action =='show_quotes';
  }
        ?>

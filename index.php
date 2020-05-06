<?php
    require('config/Database.php');
    require('models/Author.php');
    require('models/Category.php');
    require('models/Submission.php');
   
   $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'show_quotes';
        } else {
            $action = 'show_quotes';
        }
    }

  if ($action == 'show_quotes') {
        //pull data for variables
        if(isset($_GET['authorID'])){
        $authorID = $_GET['authorID'];}
        if(isset($_GET['categoryID'])){
        $categoryID = $_GET['categoryID'];}
        if(isset($_GET['quote'])){
        $quote = $_GET['quote'];}
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
  } else {
        $action =='show_inventory';
  }
        ?>

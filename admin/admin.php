<?php
    session_start();
    require_once('../util/valid_admin.php');
    require('../config/Database.php');
    require('../models/Author.php');
    require('../models/Category.php');
    require('../models/Submission.php');
    require('../models/Users.php');
   
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
            include_once('../admin/admin_list.php'); 
          } else {
          include_once('../admin/admin_list.php'); }
        } else {
        $cat_quotes = view_by_category();
        $auth_quotes = view_by_author();
        $random_quotes = view_random(); 
        include_once('../admin/admin_list.php'); }
    //call add form
  } else if ($action == 'show_add_form') {
        // call function to populate dropdowns
        $all_authors = get_authors();
        $all_categories = get_categories();
        include('../admin/admin_submit.php');

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
                include('../errors/error.php');
            //add vehicle
            } else {
                submit_quote();
                header("Location: .?quoteID=$quoteID");}
        $action =='show_quotes';
  } else if ($action == 'logout') {
        //delete session variable
        unset ($_SESSION['is_valid_admin']);
        //destroy session
        session_destroy();
        //delete session cookie
        $name = session_name();
        $expire = strtotime('-1 year');
        $params = session_get_cookie_params();
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie ($name, '', $expire, $path, $domain, $secure, $httponly);
        header("Location: admin_login.php");
  } else if ($action == 'delete_quote') {
        $quoteID= filter_input(INPUT_POST, 'quoteID', FILTER_VALIDATE_INT);
        if ($quoteID == NULL || $quoteID == FALSE) {
            $error = "Missing or incorrect product id.";
            include('../errors/error.php');
        } else {
            delete_quote($quoteID);
            header("Location: ../admin/admin.php"); }
  } else if ($action == 'see_submitted') {
            $submitted_quotes = view_submitted_quotes();
            include_once('approve_quote.php');
  } else if ($action == 'approve_quote') {
            $quoteID= filter_input(INPUT_POST, 'quoteID', FILTER_VALIDATE_INT);
            if ($quoteID == NULL || $quoteID == FALSE) {
            $error = "Missing or incorrect product id.";
            include('../errors/error.php');
        } else {
            approve_quote();
            header("Location: admin.php?action=see_submitted"); }
  } else if ($action == 'delete_submission') {
        $quoteID= filter_input(INPUT_POST, 'quoteID', FILTER_VALIDATE_INT);
        if ($quoteID == NULL || $quoteID == FALSE) {
            $error = "Missing or incorrect product id.";
            include('../errors/error.php');
        } else {
          delete_quote($quoteID);
          header("Location: admin.php?action=see_submitted"); }
  } else if ($action == 'manage') {
        $all_authors = get_authors();
        $all_categories = get_categories();
        include_once('manage.php');
  } else if ($action == 'delete_author') {
        $authorID= filter_input(INPUT_POST, 'authorID', FILTER_VALIDATE_INT);
        if ($authorID == NULL || $authorID == FALSE) {
            $error = "Missing or incorrect author id.";
            include('../errors/error.php');
        } else {
          delete_author($authorID);
          header("Location: admin.php?action=manage"); }
  } else if ($action == 'add_author') {
        $author= filter_input(INPUT_POST, 'author');
        if ($author == NULL || $author == FALSE) {
          $error = "Missing or incorrect author.";
          include('../errors/error.php');
        } else {
          add_author($author);
          header("Location: admin.php?action=manage"); }
  } else if ($action == 'delete_category') {
        $categoryID= filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
        if ($categoryID == NULL || $categoryID == FALSE) {
            $error = "Missing or incorrect author id.";
            include('../errors/error.php');
        } else {
          delete_category($categoryID);
          header("Location: admin.php?action=manage"); }
  } else if ($action == 'add_category') {
        $category= filter_input(INPUT_POST, 'category');
        if ($category == NULL || $category == FALSE) {
          $error = "Missing or incorrect category id.";
          include('../errors/error.php');
        } else {
          add_category($category);
          header("Location: admin.php?action=manage"); }
  } else if ($action == 'add_quote') {
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
                include('../errors/error.php');
            //add vehicle
            } else {
                add_quote();
                header("Location: admin.php?quoteID=$quoteID");}
        $action =='show_quotes';}


        
?> 
      




















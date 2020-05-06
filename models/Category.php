<?php

//get all catgeories
function get_categories() {
  global $db;
  $query = 'SELECT * FROM Categories';
  $statement = $db->prepare($query);
  $statement->execute();
  $all_categories = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $all_categories;
  }

    //delete  category
function delete_category() {
  global $db;
  global $categoryID;
  $query = 'DELETE FROM z4lwhm9kotsqv1ou.Categories 
            WHERE categoryID = :categoryID';
  $statement = $db->prepare($query);
  $statement->bindValue(':categoryID', $categoryID);
  $statement->execute();
  $statement->closeCursor();
  }

      //add  category
function add_category() {
  global $db;
  global $category;
    $query = 'INSERT INTO Categories (category)
              VALUES (:category)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category', $category);
    $statement->execute();
    $statement->closeCursor();
  }

  ?>

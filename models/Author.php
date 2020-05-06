<?php

//get all authors
function get_authors() {
  global $db;
  $query = 'SELECT 
              authorID,
              author
            FROM Authors
            ORDER BY author';
  $statement = $db->prepare($query);
  $statement->execute();
  $all_authors = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $all_authors;
  }


  //delete  authors
function delete_author() {
  global $db;
  global $authorID;
  $query = 'DELETE FROM z4lwhm9kotsqv1ou.Authors 
            WHERE authorID = :authorID';
  $statement = $db->prepare($query);
  $statement->bindValue(':authorID', $authorID);
  $statement->execute();
  $statement->closeCursor();
  }


  //add author
  function add_author() {
    global $db;
    global $author;
    $query = 'INSERT INTO Authors (author)
              VALUES (:author)';
    $statement = $db->prepare($query);
    $statement->bindValue(':author', $author);
    $statement->execute();
    $statement->closeCursor();
  }














?>
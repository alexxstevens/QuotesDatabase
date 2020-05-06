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












?>